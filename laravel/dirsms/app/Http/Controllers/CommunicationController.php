<?php

namespace App\Http\Controllers;

use App\Communication;

use App\User;
use App\Image; 
use App\Communication_user_school_branch;

use Auth; 
use Mail;

use Illuminate\Http\Request;

class CommunicationController extends Controller
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
     
        $users = $users = User::where('id', '!=', auth()->id())->get();



        return view('communication', compact('profile_pic', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Maximum execution time of 60 seconds exceeded
     * Update php.ini in your xampp for the 
     * 
     * max_execution_time=1800  
     * max_input_time=1200
     * memory_limit=5120M
     */

    function messages($request, $user_condition, $user_condition_operation, $user_condition_){ 


        $subject = $request->subject; 

        $communication = new Communication();
        $communication->type = $request->type;
        $communication->subject = $request->subject;
        $communication->messages =  $request->message; 

        $communication->save();


        $users = User::where($user_condition, $user_condition_operation, $user_condition_)->get();
        
        $count = 0;
        foreach($users as $user){ 
            $communication_user_school_branch = new Communication_user_school_branch();
    
            $communication_user_school_branch->user_sender_id = auth()->id();
            $communication_user_school_branch->user_receiver_id = $user->id;
            $communication_user_school_branch->comm_id = $communication->id;
           
            $communication_user_school_branch->save();
            $count++;   

            $to_email = $user->email;
            $to_name = $user->fname . ' ' . $user->lname;
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
        }

        return redirect()->back()->with('success', 'Message has been sent to ' . $count . ' ' . $request->recipient);  

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 


        if($request->recipient){ 
            if($request->recipient == 'student'){
                $this->messages($request, 'id', '!=', auth()->id());
            }else if($request->recipient == 'staff'){ 
                $this->messages($request, 'role', '=', $request->recipient); 
            }else if($request->recipient == 'instructor'){ 

                $this->messages($request, 'role', '=', $request->recipient); 
          
            }else if($request->recipient == 'branches'){
                return;
            }else if($request->recipient == 'schools'){
                return;
            }else if($request->recipient == 'everyone'){
               
            }else{ 
                $this->messages($request, 'id', '=', $request->recipient); 
          
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\communication  $communication
     * @return \Illuminate\Http\Response
     */
    public function show(communication $communication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\communication  $communication
     * @return \Illuminate\Http\Response
     */
    public function edit(communication $communication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\communication  $communication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, communication $communication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\communication  $communication
     * @return \Illuminate\Http\Response
     */
    public function destroy(communication $communication)
    {
        //
    }
}
