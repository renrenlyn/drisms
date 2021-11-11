<?php

namespace App\Http\Controllers;

use App\School;

use App\User;
use App\Image;
use Auth;
use Illuminate\Http\Request;

class SchoolController extends Controller
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

        $schools = School::orderBy('Created_at', 'DESC')->get();

        return view('admin/school', compact('schools', 'profile_pic'));
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
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        //
    }
}
