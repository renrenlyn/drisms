<?php

namespace App\Http\Controllers;

use App\Schedule;

use App\User;
use App\Image;


use App\Fleet; 
use App\FleetSchedule;


use App\StudentCourse;
use App\SchoolCourse;

use Auth;
use Illuminate\Http\Request;

class ScheduleController extends Controller
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
 
        return view('admin/scheduling', compact('profile_pic'));
    } 
    public function theoretical(){
        
        $studentcourses = StudentCourse::rightJoin('users as u', 'u.id', '=', 'student_course.student_id') 
                            ->leftJoin('school_course as sc', 'sc.id', '=', 'student_course.school_course_id')
                            ->join('schools as s', 's.id', '=', 'student_course.school_id')
                            ->leftJoin('branches as b', 'b.id', '=', 'student_course.branch_id')
                            ->join('courses as c', 'c.id', '=', 'sc.course_id')
                            ->join('days as d', 'd.sc_id', '=', 'sc.id')
                            ->where('student_course.student_id', '=', Auth::user()->id)
                            ->get(['d.day as day','c.name as c_name', 'c.price as c_price', 'sc.*','s.name as s_name', 's.address as s_address','b.name as b_name', 'b.address as b_address', 'student_course.*', 'u.*']);  
           
        return view('student/theoretical', compact('studentcourses'));
    }

    public function practical(){    
        return view('student/practical'); 
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
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $user = User::where('id', '=', $id)->first(); 
 
        $fleets = Fleet::leftJoin('fleet_schedules as fs', 'fs.fleet_id', '=', "fleet.id") 
                            ->where('fs.instructor_id', '=', $id)
                            ->orderBy('fs.created_at', 'desc')
                            ->get(['fleet.*', 'fs.*']);

                            
        $school_course_instructors = SchoolCourse::join('users as u', 'u.id', '=', 'school_course.instructor_id')
                            ->join('courses as c', 'c.id', '=', 'school_course.course_id')
                            ->join('schools as s', 's.id', '=', 'school_course.school_id')
                            ->leftJoin('branches as b', 'b.id', '=', 'school_course.branch_id')
                            ->join('days as d', 'd.sc_id','=', 'school_course.id')
                            ->where('school_course.instructor_id', '=', $id)
                            ->orderBy('school_course.created_at', 'desc')
                            ->get(
                                ['u.fname as fname', 
                                'u.lname as lname', 
                                'c.name as c_name', 
                                'c.price', 
                                's.name as s_name',
                                'b.name as b_name',
                                'd.day as days',
                                'school_course.*'
                                ]
                            );
 
 
        return view('admin/review/reviewInstructorSchedule', compact('user', 'fleets', 'school_course_instructors')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
