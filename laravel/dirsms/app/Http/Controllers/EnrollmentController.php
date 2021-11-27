<?php

namespace App\Http\Controllers;
 
use App\User;
use App\Course;
use App\Branch;
  
use App\School;  
use App\StudentCourse;
use App\Classes;
 
use App\Student;
use Auth;

 


use App\Day;
 
use App\SchoolCourse;
  


use App\Image;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    //

 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); 
    } 
    
    public function enrollment(){ 


        // $school_corses = SchoolCourse::leftJoin('days as d', 'd.sc_id', '=', 'school_course.id')
        // ->leftJoin('courses as c', 'c.id', '=', 'school_course.course_id')
        // ->where('school_course.school_id', '=', 3)
        // ->orderBy('c.created_at', 'desc') 
        // ->get(['c.*', 'd.*', 'school_course.*']);


        // dd($school_corses);


        $profile_pic = User::join('images', 'users.id', '=', 'images.user_id')
        ->where('users.id', Auth::user()->id)
        ->get(['users.*', 'images.name as image_name']);

        $schools = School::all();  
        return view('student/enrollment', compact('schools', 'profile_pic'));
    }


    public function getEnrollmentBranch($id){ 
        $branches = Branch::where('school_id', '=', $id)->get();   
        return $branches; 
    }


    public function getEnrollmentCourse($school_id, $course_id){ 
        $schools = School::leftJoin('school_course as sc', 'sc.school_id', '=', 'schools.id')
                    ->leftJoin('courses as c', 'sc.course_id', '=', 'c.id')    
                    ->where('sc.school_id', '=', $school_id)
                    ->get(['c.*', 'sc.*']);   
 
        return $schools; 
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
            'student_id' => 'unique:student_course', 
        ]);
 
        $newStudentEnrollment = new StudentCourse();
        $newStudentEnrollment->student_id = Auth::user()->id;
        $newStudentEnrollment->school_id = $request->school_id;
        $newStudentEnrollment->branch_id = $request->branch_id;
        $newStudentEnrollment->school_course_id = $request->course_id;
        $newStudentEnrollment->y_e = $request->y_e;
        $is_save = $newStudentEnrollment->save(); 
        
        if($is_save){
            $newClass = new Classes();
            $newClass->student_id = Auth::user()->id;
            $newClass->school_id = $request->school_id;
            $newClass->course_id = $request->course_id;  
            $is_save = $newClass->save();  

            if($is_save){ 
                    
                $id = Auth::user()->id;
                $existUser = User::find($id);
                $existUser->enrollment_status = 1;
                $existUser->save();
                
                return  redirect()
                        ->back()
                        ->with('success', 'Congratualation!');
            }else{ 
                return  redirect()
                        ->back()
                        ->with('error', 'Failed to save data!!!');
            } 
        
        } 
    }

}


