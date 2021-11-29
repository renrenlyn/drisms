<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Branch;
 
use App\Day;
use App\SchoolCourse;


use App\Invoice;
use App\School;
use DB;


use App\StudentCourse;
use App\Classes;
use App\Permission;

use App\Image;
use Auth;
class StudentController extends Controller
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


        $students = User::join('images', 'users.id', '=', 'images.user_id')
        ->orderBy('users.fname')
        ->where('users.role', 'Student') 
        ->get(['users.*', 'images.name as image_name']);
 
 
        $invoiceAmount = DB::table('invoices')
        ->select('*', 'courses.*', DB::raw('SUM(invoices.amount) As total_amount'))
        ->leftJoin('courses', 'courses.id', '=', 'invoices.course_id')
        ->where('invoices.user_id', 14)
        ->get();
 
        $courses = Course::orderBy('created_at', 'DESC')->get();

        $permission = Permission::where('staff_id', '=', Auth::user()->id)->first(); 

        $permission_status = "";
        if($permission) {
            if($permission->students == "read_only") {
                $permission_status = "disabled";
            } 
        }
            

        return view('admin/students', compact('courses', 'students', 'profile_pic', 'invoiceAmount', 'permission_status'));
    }

    /**
     * Search data from source storage
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request){ 

        $search = $request->search;  

        $students = User::join('images', 'users.id', '=', 'images.user_id')
        ->orderBy('created_at', 'DESC') 
        ->where([
            ['users.role', '=', 'Student'],
            ['users.phone', 'LIKE', '%'.$search.'%'],
            ['users.gender', 'LIKE', '%'.$request->gender.'%'] 
        ])
        ->orwhere([
            ['users.role', '=', 'Student'],
            ['users.email', 'LIKE', '%'.$search.'%'],
            ['users.gender', 'LIKE', '%'.$request->gender.'%'] 
        ]) 
        ->orWhere([
            ['users.role', '=', 'Student'],
            ['users.fname', 'LIKE', '%'.$search.'%'],
            ['users.gender', 'LIKE', '%'.$request->gender.'%'] 
        ])  
        ->orWhere([
            ['users.role', '=', 'Student'],
            ['users.lname', 'LIKE', '%'.$search.'%'],
            ['users.gender', 'LIKE', '%'.$request->gender.'%'] 
        ]) 
        ->orderBy('created_at', 'DESC')
        ->get(['users.*', 'images.name as image_name']);
        
        $courses = Course::orderBy('created_at', 'DESC')->get();
 
        return view('admin/students', compact('courses', 'students'));
 
    }  



    public function scheduling(){

        // $student_enrollment_records = StudentCourse::join('classes as c', 'c.student_id', '=', 'student_course.student_id')
        // ->join('schools as s', 's.id', '=', 'student_course.school_id')
        // ->join('courses as cr', 'cr.id', '=', 'student_course.course_id')
        // ->join('school_course as sc', 'sc.course_id', '=', 'student_course.course_id')
        // ->leftJoin('branches as b', 'b.id', '=', 'student_course.branch_id')
        // ->join('days as d', 'd.sc_id', '=', 'student_course.id')
        // ->where('student_course.student_id', '=', Auth::user()->id ) 
        // ->get([
        //     'sc.time_start_end',
        //     'sc.start',
        //     'sc.end',
        //     'sc.duration',
        //     'sc.period',
        //     'c.type as classes_type',
        //     'd.day',
        //     'b.name as branch_name', 
        //     'b.address as branch_address', 
        //     'b.type as branch_type', 
        //     's.name as school_name', 
        //     's.address as school_address', 
        //     'cr.price as price',
        //     'cr.name as course_name',  
        //     'student_course.*'
        // ]); 


            $schools=School::all();
 
            $branches = Branch::all();
            $courses = Course::all();
 

 
            $school_courses =SchoolCourse::all();
            $days =Day::all();
            // Day;
            // SchoolCourse;

            // days
            // school_course 
        return view('student/schedule', compact('schools', 'branches', 'school_courses', 'courses', 'days'));
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
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
