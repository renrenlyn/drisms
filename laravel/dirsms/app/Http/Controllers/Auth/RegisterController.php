<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Image;
use App\Permission;
use App\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
 
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^\S*$/u'],
            'address' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'before:5 years ago'],
            'phone' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string'],  
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender' => ['required', 'string'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        
        $notification_user_id = User::where('role', 'Admin')->first();

        if($notification_user_id){
            $notification_user_id = $notification_user_id->id;
        }else{
            $notification_user_id = NULL;
        }
 
        $image = $data['profile_image'];
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = str_random(10) . '.png';
        $is_store = Storage::disk('local')->put($imageName, base64_decode($image));

        $user = User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'username' => $data['username'],
            'address' => $data['address'],
            'dob' => $data['dob'],
            'phone' => $data['phone'],
            'role' => $data['role'],
            'email' => $data['email'],
            'gender' => $data['gender'], 
            'password' => Hash::make($data['password']),
        ]);
        
        if($is_store){  
            $imagemodel= new Image();
            $imagemodel->name="$imageName";
            $imagemodel->user_id = $user->id;
            $imagemodel->save(); 
        }
        $fname = $data['fname'];
        $lname = $data['lname'];
        $role = $data['role'];

        $notification = new Notification();
        $notification->image_id = $imagemodel->id;
        $notification->user_id = $notification_user_id;
        $notification->status = 'active';
        $notification->type = 'newaccount';
        $notification->message = "New $role account created for <strong>$fname $lname</strong>.";
        $notification->save();


        if($role == 'Staff'){
            $permission = new Permission();
            $permission->staff_id = $user->id;
            $permission->save();
        }

        return $user;
    }
}
