@extends('layouts.header') 
@section('content')     
        <!-- Admin home page --> 
        <!-- sidebar --> 

    @include("layouts/includes/sidebar")   
    @include("admin/modal/school")  

 
  
<!-- main content -->
<div class="main-content">
    <div class="page-header">

    <a href="{{ route('school.course.add', $id) }}" class="btn btn-primary btn-icon pull-right ml-5" >
        <i class=" mdi mdi-plus-circle-outline">

        </i> 
        Add Course 
    </a>
       
        <h3>List of School Course</h3> 
    </div>
 

    <!-- page content -->
    <div class="row">

        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Day</th>
                <th scope="col">Time</th>
                <th scope="col">Start</th>
                <th scope="col">End</th>
                <th scope="col">Duration</th>
                <th scope="col">Period</th> 
                </tr>
            </thead>
            <tbody>

                @forelse($school_corses as $key=>$val)

                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $val->name }}</td> 
                        <td>{{ $val->price }}</td> 
                        <td>{{ $val->status }}</td> 
                        <td>{{ $val->day }}</td> 
                        <td>{{ $val->time_start_end }}</td> 
                        <td>{{ $val->start }}</td> 
                        <td>{{ $val->end }}</td> 
                        <td>{{ $val->duration }}</td> 
                        <td>{{ $val->period }}</td> 
                      
                    </tr> 

                @empty 
                    @include("admin/empty/empty")   
                @endforelse
            </tbody>
        </table>


    </div>

</div>  
@include('../layouts/includes/footer')
 
@endsection