<?php

namespace App\Http\Controllers;

use App\Branch;

use App\User;
use App\Image;
use Auth;
use Illuminate\Http\Request;
 
class BranchController extends Controller
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

        $branches = Branch::orderBy('created_at', 'DESC')->get();
        return view('admin/branch', compact('branches', 'profile_pic'));
    }




    /**
     * Send Email in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function sendEmail(Request $request){
 
        $to_name = $request->branch_name;
        $to_email = $request->branch_email;
        $subject = $request->subject;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|string|email|max:255|unique:branches',
            'phone' => 'required',
            'address' => 'required' 
        ]);

        $branch = new Branch(); 
        $branch->name = $request->name;
        $branch->email = $request->email;
        $branch->phone = $request->phone;
        $branch->address = $request->address;
        $is_save = $branch->save();

        if($is_save){
            return  redirect()
                ->back()
                ->with('success', 'New branch record saved!');
        }else{
            return  redirect()
                ->back()
                ->with('error', 'Failed to save data!!!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required',
            'address' => 'required' 
        ]);

        $existingBranch = Branch::find($id);

        if($existingBranch){ 
            $existingBranch->name = $request->name;
            $existingBranch->email = $request->email;
            $existingBranch->phone = $request->phone;
            $existingBranch->address = $request->address;

            $is_save = $existingBranch->save();
            if($is_save){
                return  redirect()
                    ->back()
                    ->with('success', 'New branch record saved!');
            }else{
                return  redirect()
                    ->back()
                    ->with('error', 'Failed to save data!!!');
            }
        } 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {  
        
        $existingBranch = Branch::find( $id );

        if( $existingBranch )
        {
            $existingBranch->delete();  
            return  redirect()->back()->with('success', 'Branch deleted successfully!');
        } 
        return redirect()->back()->with('error', 'Sorry, we have trouble to delete data from branch');
 
    }
}
