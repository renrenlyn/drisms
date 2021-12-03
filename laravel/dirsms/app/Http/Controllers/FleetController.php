<?php

namespace App\Http\Controllers;

use App\Fleet;
use App\User;  
use App\Image;
use App\FleetSchedule;
use Auth;
use App\Permission;
use Illuminate\Http\Request;

class FleetController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); 
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $profile_pic = User::join('images', 'users.id', '=', 'images.user_id')
        ->where('users.id', Auth::user()->id)
        ->get(['users.*', 'images.name as image_name']);

        $users= User::orderBy('created_at', 'DESC')
                ->where('role', 'Instructor')
                ->get();
 

        $fleet = Fleet::join('users', 'fleet.instructor_id', '=', 'users.id')
                ->orderBy('fleet.created_at', 'DESC')
                ->get(['fleet.*', 'users.fname', 'users.lname']);


        $permission = Permission::where('staff_id', '=', Auth::user()->id)->first(); 
        $permission_status = "";
        if($permission) {
            if($permission->fleet == "read_only") {
                $permission_status = "disabled";
            } 
        }
        return view('admin/fleet', compact('users', 'fleet', 'profile_pic', 'permission_status'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $fleet = new Fleet();
        $fleet->car_no = $request->carno;
        $fleet->car_plate = $request->carplate;
        $fleet->make = $request->make;
        $fleet->model = $request->model;
        $fleet->model_year = $request->modelyear;
       // $fleet->instructor_id = $request->instructor;

        $is_save = $fleet->save();
        if($is_save){
            return  redirect()
                ->back()
                ->with('success', 'New fleet record saved!');
        }else{
            return  redirect()
                ->back()
                ->with('error', 'Failed to save data!!!');
        }
 
    } 

    public function showSchedule($id){

        $fleet = Fleet::where('id', $id)->first();
  
        $instructors = User::where('role', '=', 'Instructor')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('admin/form/addFleet', compact('instructors', 'fleet'))->with('id', $id);
    }

    public function storeSchedule(Request $request){
   
            $data = ''; 
            foreach($request->day as $key => $val){ 
                if($key == array_key_last($request->day)){
                    $data .= '' . $val;
                }else{ 
                    $data .= '' . $val . ', ';
                }
            }   

            $exist = FleetSchedule::where([
                ['instructor_id', '=', $request->instructor_id],
                ['time_start_end', '=', $request->start_end]
            ])->first();
            if($exist){
                return redirect()->back()->with('exists', 'Time and instructor is already exists please go to the fleet schedule and you can just update if you want to add something.');
            }else{ 
                $newFleetSchedule = new FleetSchedule(); 
                $newFleetSchedule->fleet_id = $request->fleet_id;
                $newFleetSchedule->instructor_id = $request->instructor_id;
                $newFleetSchedule->time_start_end = $request->start_end;
                $newFleetSchedule->day = $data;
                $newFleetSchedule->start = $request->start;
                $newFleetSchedule->end = $request->end;
                $newFleetSchedule->duration = $request->duration;
                $newFleetSchedule->period = $request->period;
                $is_save = $newFleetSchedule->save();
    
                if($is_save){
                    return redirect()->back()->with('success', 'Successfully added schedule.');
                }else{
                    return redirect()->back()->with('success', 'Error added schedule.'); 
                }
            } 
    } 
    /**
     * Display the specified resource.
     *
     * @param  \App\Fleet  $fleet
     * @return \Illuminate\Http\Response
     */
    public function editInstructorSchedule($id){ 
        $fleet = FleetSchedule::find($id); 
        return view('admin/modified/instructorFleetSchedule', compact('fleet'))->with('id', $id);
    } 

    public function updateInstructorSchedule(Request $request, $id){ 
         
        $fleetExists = FleetSchedule::find($id); 
        $data = ''; 
        foreach($request->day as $key => $val){ 
            if($key == array_key_last($request->day)){
                $data .= '' . $val;
            }else{ 
                $data .= '' . $val . ', ';
            }
        }    

        if($fleetExists){  
            $newFleetSchedule->time_start_end = $request->start_end;
            $newFleetSchedule->day = $data;
            $newFleetSchedule->start = $request->start;
            $newFleetSchedule->end = $request->end;
            $newFleetSchedule->duration = $request->duration;
            $newFleetSchedule->period = $request->period; 
            $is_save = $newFleetSchedule->save();

            if($is_save){
                return  redirect()
                    ->back()
                    ->with('success', 'Update instructor fleet schedule.');
            }else{
                return  redirect()
                    ->back()
                    ->with('error', 'Failed to update instructor fleet schedule!');
            }
        }else{
            return  redirect()
                    ->back()
                    ->with('not_exists', "Instructor doesn't exists!");

        }
    }
 

    public function show($id)
    {

        $fleets = Fleet::leftJoin('fleet_schedules as fs', 'fs.fleet_id', '=', "fleet.id")
                            ->join('users as s', 's.id', '=', 'fs.instructor_id')
                            ->where('fleet.id', '=', $id)
                            ->orderBy('fs.created_at', 'desc')
                            ->get(['fleet.*', 's.fname as fname', 's.lname as lname', 'fs.*']);

        $fleet_single = Fleet::where('id', '=', $id)->first();

        $permission = Permission::where('staff_id', '=', Auth::user()->id)->first(); 
        $permission_status = "";
        
        if($permission) {
            if($permission->fleet == "read_only") {
                $permission_status = "disabled";
            } 
        }
 
        return view('admin/review/reviewFleetSchedule', compact('fleets', 'fleet_single'));
    } 


    public function destroyFleetSchedule($id){
        
        $fleetExists = FleetSchedule::find($id); 
        
        if( $fleetExists )
        {
            $fleetExists->delete();  
            return  redirect()->back()->with('success', 'Fleet Schedule deleted successfully!');
        } 
        return redirect()->back()->with('error', 'Sorry, we have trouble to delete data from branch');
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fleet  $fleet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $existingFleet = Fleet::find( $id ); 
        if( $existingFleet ){
            $existingFleet->car_no = $request->carno;
            $existingFleet->car_plate = $request->carplate;
            $existingFleet->make = $request->make;
            $existingFleet->model = $request->model;
            $existingFleet->model_year = $request->modelyear;
            $existingFleet->instructor_id = $request->instructor;

            $is_save = $existingFleet->save(); 

            if($is_save){
                return  redirect()
                    ->back()
                    ->with('success', 'New fleet record saved!');
            }else{
                return  redirect()
                    ->back()
                    ->with('error', 'Failed to save data!!!');
            }
        }
        return redirect()->back()->with('error', 'Sorry, we have trouble to update the fleet'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fleet  $fleet
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    { 
        
        $existingFleet = Fleet::find( $id );

        if( $existingFleet )
        {
            $existingFleet->delete();  
            return  redirect()->back()->with('success', 'Fleet deleted successfully!');
        } 
        return redirect()->back()->with('error', 'Sorry, we have trouble to delete this fleet.');
 
    }
}
