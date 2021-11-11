<?php

namespace App\Http\Controllers;

use App\BranchMessage;

use App\User;
use App\Image;
use Auth;
use Illuminate\Http\Request;

class BranchMessageController extends Controller
{
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
     * @param  \App\BranchMessage  $branchMessage
     * @return \Illuminate\Http\Response
     */
    public function show(BranchMessage $branchMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BranchMessage  $branchMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BranchMessage $branchMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BranchMessage  $branchMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(BranchMessage $branchMessage)
    {
        //
    }
}
