<?php

namespace App\Http\Controllers;

use App\Instructor;
use App\User;
 
use App\Image;
use Auth;
use Illuminate\Http\Request;

class InstructorController extends Controller
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
        //  
        $profile_pic = User::join('images', 'users.id', '=', 'images.user_id')
        ->where('users.id', Auth::user()->id)
        ->get(['users.*', 'images.name as image_name']);

        $users = User::join('images', 'users.id', '=', 'images.user_id')
        ->where('users.role', 'Instructor')
        ->orderBy('created_at', 'DESC')
        ->get(['users.*', 'images.name as image_name']);
           
        return view('admin/instructor', compact('users', 'profile_pic'));
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
                ['users.role', '=', 'Instructor'],
                ['users.phone', 'LIKE', '%'.$search.'%'] 
            ])
            ->orwhere([
                ['users.role', '=', 'Instructor'],
                ['users.email', 'LIKE', '%'.$search.'%']
            ]) 
            ->orWhere([
                ['users.role', '=', 'Instructor'],
                ['users.fname', 'LIKE', '%'.$search.'%'] 
            ]) 
          ->orderBy('created_at', 'DESC')
          ->get(['users.*', 'images.name as image_name']);
             
          return view('admin/instructor', compact('users'));
     
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        //
    }
}
