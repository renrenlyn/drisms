<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\User;
use App\Course;
 
use App\Invoice;
use DB;

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
        ->orderBy('created_at', 'DESC')
        ->where('users.role', 'Student') 
        ->get(['users.*', 'images.name as image_name']);


        // $student_payments = Invoice::join('users as u', 'u.id', '=', 'invoices.user_id')     
        //     ->join('courses as c', 'c.id', '=', 'invoices.course_id')
        //     ->where('u.role', 'Student') 
        //     ->get(['invoices.*', 'u.*', 'c.*', 'invoices.amount as total_amount']);
  
        // $student_payments = Invoice::join('users as u', 'u.id', '=', 'invoices.user_id')     
        //     ->join('courses as c', 'c.id', '=', 'invoices.course_id')
        //     ->where('u.role', 'Student') 
        //     ->get(['invoices.*', 'u.*', 'c.*', 'invoices.amount as total_amount']);



        // $student_payments = Invoice::join('users as u', 'u.id', '=', 'invoices.user_id')     
        //     ->leftJoin('courses as c', 'c.id', '=', 'invoices.course_id')
        //     ->where('u.role', 'Student') 
        //     ->get(['invoices.*', 'u.*', 'c.*', 'invoices.amount as total_amount'])->sum('total_amount');

        // dd($student_payments);
 

    //     $invoiceAmount = Invoice::where('user_id', $student->id)->sum('amount');
        // $courseAmount = Course::join('invoices as i', 'i.course_id', '=', 'courses.id') 
        //                 ->first(['courses.price']);
        //                 dd($courseAmount);
    // $total =  intval($courseAmount->price) - intval($invoiceAmount);

 

 


        
    $invoiceAmount = DB::table('invoices')
    ->select('*', 'courses.*', DB::raw('SUM(invoices.amount) As total_amount'))
    ->leftJoin('courses', 'courses.id', '=', 'invoices.course_id')
    ->where('invoices.user_id', 14)
    ->get();

        //dd(intval($Total)); 

       // $totalCredits = Model::where('type', 'credit')->sum('balance');

        $courses = Course::orderBy('created_at', 'DESC')->get();

        // 
        return view('admin/students', compact('courses', 'students', 'profile_pic', 'invoiceAmount'));
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

    public function enrollment(Request $request){
        return view('student/enrollment');
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
