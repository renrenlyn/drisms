@extends('layouts.header') 
@section('content')      
    @include("layouts/includes/sidebar")  


    <style>
        footer{
            margin: 0 !important;
        }
    </style>
<!-- main content -->
<div class="main-content"> 


    <div class="row"> 
        <div class="col-md-12">
            @if(!$view_student_enroll->isEmpty())
            <table class="border borderless table">
                <thead> 
                    <th>#</th>
                    <th>Name</th>   
                    <th colspan="2" class="text-center">Action</th> 
                </thead>
                <tbody> 
                    @foreach($view_student_enroll as $key=>$val)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ ucfirst($val->fname) }} {{ ucfirst($val->lname) }} </td>
                            @if($val->evaluation == 'pass' || $val->evaluation == 'failed')
                            <td colspan="2"  class="text-center alert @if($val->evaluation == 'pass') alert-success @else alert-danger @endif" > <b> {{ ucfirst($val->evaluation) }} </b> </td>
                             @else
                                <td> <a href ="{{ route('theoretical.instructor.view.student', $val->id)}}" class="btn btn-success @if($val->status == 'completed') disabled @endif" >Pass</a> </td>
                                <td> <a href ="{{ route('theoretical.instructor.view.student', $val->id)}}" class="btn btn-danger @if($val->status == 'completed') disabled @endif">Failed</a> </td>
                                
                            @endif

                        </tr> 
                    @endforeach


                </tbody>
            </table> 
            @else 
                @include("admin/empty/empty") 
            @endif  
        <div>
    </dov>

</div> 

@include('../layouts/includes/footer')  
@endsection