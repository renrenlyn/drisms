<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\User; 
use App\Image; 
use App\Notification;
 
use App\Course;
use App\Fleet;
use App\Branch; 
use App\School;  
use App\StudentCourse;
use App\Classes;
use App\Day;
use App\SchoolCourse;



use Illuminate\Http\Request;
use Auth; 

use Illuminate\Support\Carbon;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
 
    public function __construct()
    {
        $this->middleware('auth');   
        // $this->middleware(function ($request, $next) {
        //     $this->user = Auth::user();  
        //     if($this->user->role != 'Admin'){
        //         return redirect()->back();
        //     } 
        //     return $next($request);
        // });  
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

        $cstudent = User::where([ ['role', '=','Student'], ['status', '=','Active'] ])->count();
        $cinstructor = User::where([ ['role', '=','Instructor'], ['status', '=','Active'] ] )->count();
        $cstaff = User::where('role', 'Staff')->count();

        $cschool = School::all()->count();
        $cnew_student = User::where([
            ['role', '=', 'Student'],
            ['created_at', '>=', Carbon::now()->subDays(30)]
        ])->count(); 
        $notifications = Notification::join('users', 'users.id', '=', 'notifications.user_id') 
                        ->orderBy('notifications.created_at', 'desc')
                        ->get(['users.*', 'notifications.*']);  
        $student_courses = StudentCourse::all();  
        $classes = Classes::all(); 
        $schools = School::all();
        $courses = Course::all();
        $school_courses = SchoolCourse::all();
        $branches = Branch::all();
        $days = Day::all();
        $fleets = Fleet::all(); 
        
        return view('dashboard', compact('cstudent', 'cschool','fleets', 'cstaff','cinstructor', 'cnew_student', 'notifications', 'profile_pic', 'branches', 'days', 'student_courses', 'classes', 'schools', 'courses', 'school_courses'));
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
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    { 
        $profile_pic = User::join('images', 'users.id', '=', 'images.user_id')
        ->where('users.id', Auth::user()->id)
        ->get(['users.*', 'images.name as image_name']); 
        $user = User::where('username', '=', $username)->first(); 
        $student_courses = StudentCourse::all();  
        $classes = Classes::all(); 
        $schools = School::all();
        $courses = Course::all();
        $school_courses = SchoolCourse::all();
        $branches = Branch::all();
        $days = Day::all(); 
        return view('admin/student_schedule',compact( 'student_courses', 'classes', 'schools', 'courses', 'school_courses', 'branches', 'days', 'user', 'profile_pic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
