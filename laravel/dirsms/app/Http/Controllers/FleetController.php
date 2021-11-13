<?php

namespace App\Http\Controllers;

use App\Fleet;
use App\User;  
use App\Image;
use Auth;
use Illuminate\Http\Request;

class FleetController extends Controller
{
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

        return view('admin/fleet', compact('users', 'fleet', 'profile_pic'));
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
        $fleet->instructor_id = $request->instructor;

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Fleet  $fleet
     * @return \Illuminate\Http\Response
     */
    public function show(Fleet $fleet)
    {
        //
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
        return redirect()->back()->with('error', 'Sorry, we have trouble to delete data from branch');
 
    }
}
