<?php

namespace App\Http\Controllers;

use App\School;

use App\User;
use App\Image;
use App\Communication;
use App\Communication_user_school_branch; 

use Auth;
use Mail;
//use illuminate\contract\Mailer;
use Illuminate\Http\Request;

class SchoolController extends Controller
{

    
    // protected $mail;
    
    // /**
    //  * Create the event listener.
    //  *
    //  * @param Mail $mail
    //  */
    public function __construct(Mail $mail)
    {

        $this->middleware('auth');   
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();  
            if($this->user->role != 'Admin'){
                return redirect()->back();
            } 
            return $next($request);
        });  
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

        $schools = School::orderBy('Created_at', 'DESC')->get();

        return view('admin/school', compact('schools', 'profile_pic'));
    }


    public function sendEmail(Request $request){
       
        $school_ = School::where('id', '=', $request->school_id)->first();
         
        $communication = new Communication();
        $communication->type = 'email'; 
        $communication->suject = $request->subject_m; 
        $communication->messages =  $request->message;  
        $communication->save();

        $communication_user_school_branch = new Communication_user_school_branch();
        $communication_user_school_branch->user_sender_id = auth()->id();
        $communication_user_school_branch->school_receiver_id = $request->school_id;
        $communication_user_school_branch->comm_id =$communication->id;
    
        $communication_user_school_branch->save();
 
        $to_name = $school_->name;
        $to_email = $school_->email;
        $subject = $request->subject_m;

        $data = array(
                'name'=>"$to_name", 
                'body' => $request->message
            );
        $is_send = Mail::send(
                'emails.mail', 
                $data, 
            function($message) use ($to_name, $to_email, $subject)
            {
                $message->from(Auth::user()->email,"from ".Auth::user()->fname);
                $message->to($to_email, $to_name)->subject($subject);
            }
        );
    
        if($is_send){

            return redirect()->back()->with('success', 'Email has been sent!');
 
        }else{

            return redirect()->back()->with('error', 'We have trouble sending your email!');
        }
    }



    /**
     *  @send sms using traccar sms getway 
     * 
     */
    public function sendSms(Request $request){
 
        $school_phone = School::where('id', '=', $request->school_id)->first();
         
        $communication = new Communication();
        $communication->type = 'sms'; 
        $communication->messages =  $request->message;  
        $communication->save();

        $communication_user_school_branch = new Communication_user_school_branch();
        $communication_user_school_branch->user_sender_id = auth()->id();
        $communication_user_school_branch->school_receiver_id = $request->school_id;
        $communication_user_school_branch->comm_id =$communication->id;
    
        $communication_user_school_branch->save();

        $apikey = '33856c4a';
        //$to = '09676620398';  
        $to = $school_phone->phone; 
        $message = $request->message;
        $mobile_ip = 'http://192.168.1.18:8082/'; 
 
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $mobile_ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"to\":\"$to\",\"message\":\"$message\"}");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: ' . $apikey)
        );

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
           // echo 'Error:' . curl_error($ch);
            return redirect()->back()->with('error', "We have error to send your sms " . curl_error($ch) . "!");
        }
        curl_close($ch);

        return redirect()->back()->with('success', 'Sent SMS successfully!!!');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        $request->validate([
            'name' => 'required|unique:schools|max:255',
            'email' => 'required|string|email|max:255|unique:schools',
            'phone' => 'required',
            'address' => 'required ',
        ]);
        
        //validate number numeric|min:2|max:5

        $school = new School();
        $school->name = $request->name;
        $school->email = $request->email;
        $school->phone = $request->phone;
        $school->address = $request->address;
        $is_save = $school->save();
        if($is_save){
            return  redirect()
                    ->back()
                    ->with('success', 'New school record saved!');
        }else{ 
            return  redirect()
                    ->back()
                    ->with('error', 'Failed to save data!!!');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required',
            'address' => 'required ',
        ]);

        $existingSchool = School::find($id);
        
        if($existingSchool){ 
            $existingSchool->name = $request->name;
            $existingSchool->email = $request->email;
            $existingSchool->phone = $request->phone;
            $existingSchool->address = $request->address;
            $is_save = $existingSchool->save();
            if($is_save){
                return  redirect()
                        ->back()
                        ->with('success', 'Successfully update the school!');
            }else{ 
                return  redirect()
                        ->back()
                        ->with('error', 'Failed to update the school!');
            } 
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
 
        $existingSchool = School::find( $id );

        if( $existingSchool )
        {
            $existingSchool->delete();  
            return  redirect()->back()->with('success', 'School deleted successfully!');
        } 
        return redirect()->back()->with('error', 'Sorry, we have trouble to delete data from School');
 
    }
}
