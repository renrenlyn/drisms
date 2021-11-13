<?php

namespace App\Http\Controllers;

use App\Notification;

use App\User;
use App\Image;
use Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
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

        $notifications = Notification::join('users', 'users.id', '=', 'notifications.user_id') 
                        ->leftJoin('images', 'images.id', '=', 'notifications.image_id')
                        ->where( 'users.role', Auth::user()->role)
                        ->orderBy('notifications.created_at', 'desc')
                        ->get(['users.*', 'notifications.status as nstatus','notifications.*', 'images.name as image_name']);
        
        return view('notifications', compact('profile_pic', 'notifications'));
    }


    public function notify(){
        $notification = Notification::where(
                            [
                                ['user_id', Auth::user()->id],
                                ['type', 'newaccount'],
                                ['status', 'active'],
                            ]
                        )
                        ->orWhere([
                            ['user_id', Auth::user()->id],
                            ['type', 'payment'],
                            ['status', 'active']
                        ])
                        ->orWhere([
                            ['user_id', Auth::user()->id],
                            ['type', 'message'],
                            ['status', 'active']
                        ])
                        ->orWhere([
                            ['user_id', Auth::user()->id],
                            ['type', 'delete'],
                            ['status', 'active']
                        ])
                        ->orWhere([
                            ['user_id', Auth::user()->id],
                            ['type', 'calendar'],
                            ['status', 'active']
                        ])->count();


        return response()->json(['notifify'=>$notification]);
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
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    { 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        Notification::where('id', $id)->update(array('status' => 'not active'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
