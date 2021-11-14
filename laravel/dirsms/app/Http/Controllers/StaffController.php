<?php

namespace App\Http\Controllers;

use App\Staff; 
use App\User; 
use App\Image;
use Auth;
use Illuminate\Http\Request;

class StaffController extends Controller
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


        $users = User::join('images', 'users.id', '=', 'images.user_id')
        ->where('users.role', 'Staff')
        ->orderBy('created_at', 'DESC')
        ->get(['users.*', 'images.name as image_name']);

 
        return view('admin/staff', compact('users', 'profile_pic'));
     
    }



     /**
     * Search data from source storage
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request){

        $search = $request->search;  

        $users = User::join('images', 'users.id', '=', 'images.user_id')
        ->where([
            ['users.role', '=', 'Staff'],
            ['users.phone', 'LIKE', '%'.$search.'%'] 
        ])
        ->orwhere([
            ['users.role', '=', 'Staff'],
            ['users.email', 'LIKE', '%'.$search.'%']
        ]) 
        ->orWhere([
            ['users.role', '=', 'Staff'],
            ['users.fname', 'LIKE', '%'.$search.'%'] 
        ]) 
      ->orderBy('created_at', 'DESC')
      ->get(['users.*', 'images.name as image_name']);
         
      return view('admin/staff', compact('users'));
 
}




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
