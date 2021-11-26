<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\User; 
use App\Image; 
use App\Notification;



use App\Course;
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

        $cstudent = User::where('role', 'Student')->count();
        $cinstructor = User::where('role', 'Instructor')->count();


        $cnew_student = User::where([
            ['role', '=', 'Student'],
            ['created_at', '>=', Carbon::now()->subDays(30)]
        ])->count();

        $notifications = Notification::join('users', 'users.id', '=', 'notifications.user_id') 
                        ->orderBy('notifications.created_at', 'desc')
                        ->get(['users.*', 'notifications.*']); 

        $student_enrollment_records = StudentCourse::join('classes as c', 'c.student_id', '=', 'student_course.student_id')
                                    ->join('schools as s', 's.id', '=', 'student_course.school_id')
                                    ->join('courses as cr', 'cr.id', '=', 'student_course.course_id')
                                    ->join('school_course as sc', 'sc.course_id', '=', 'student_course.course_id')
                                    ->leftJoin('branches as b', 'b.id', '=', 'student_course.branch_id')
                                    ->join('days as d', 'd.sc_id', '=', 'student_course.id')
                                    ->where('student_course.student_id', '=', Auth::user()->id ) 
                                    ->get([
                                        'sc.time_start_end',
                                        'sc.start',
                                        'sc.end',
                                        'sc.duration',
                                        'sc.period',
                                        'c.type as classes_type',
                                        'd.day',
                                        'b.name as branch_name', 
                                        'b.address as branch_address', 
                                        'b.type as branch_type', 
                                        's.name as school_name', 
                                        's.address as school_address', 
                                        'cr.price as price',
                                        'cr.name as course_name',  
                                        'student_course.*'
                                    ]); 
        return view('dashboard', compact('cstudent', 'cinstructor', 'cnew_student', 'notifications', 'profile_pic', 'student_enrollment_records'));
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
    public function show(Dashboard $dashboard)
    {
        //
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
