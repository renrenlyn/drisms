@extends('layouts.header') 
@section('content')      
    @include("layouts/includes/sidebar")     

<div class="main-content"> 
    <div class="page-header"> 
        <h3>School</h3>
    </div> 


    <!-- students growth -->
    <div class="row"> 

                @forelse($schools as $school)

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>{{$school->name}} ( School )</h5> 
                                <small>{{$school->address}}</small>
                            </div> 

                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-12 growth-left">
 
                                        @forelse($branches as $branch)
                                            @if($branch->school_id == $school->id)
                                               

                                                <h5>{{$branch->name}} ( Branch )</h5> 
                                                <small>{{$branch->address}}</small>
                                    
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr> 
                                                                <th scope="col">Course Name</th>
                                                                <th scope="col">Hourly</th>
                                                                <th scope="col">Day</th> 
                                                                <th scope="col">Date Start</th>
                                                                <th scope="col">Date End</th>
                                                                <th scope="col">Duration</th>
                                                                <th scope="col">Period</th> 
                                                                <th scope="col">Price</th>
                                                                <th scope="col">Status</th>  
                                                            </tr>
                                                        </thead>
                                                        <tbody> 
                                                            @forelse($courses as $course)

                                                                    @forelse($school_courses as $sc)

                                                                        @if($sc->course_id == $course->id)

                                                                            @if($sc->school_id == $school->id) 
                                                                                <tr> 
                                                                                    <td>{{ $course->name }}</td> 
                                                                                    <td>{{ $sc->time_start_end }}</td>  
                                                                                    <td>
                                                                                        @forelse($days as $day)
                                                                                            @if($sc->id == $day->sc_id)
                                                                                                {{ $day->day }} 
                                                                                            @endif
                                                                                        @empty
                                                                                            No day available yet
                                                                                        @endforelse 
                                                                                    </td>  
                                                                                    <td>{{ $sc->start }}</td> 
                                                                                    <td>{{ $sc->end }}</td> 
                                                                                    <td>{{ $sc->duration }}</td> 
                                                                                    <td>{{ $sc->period }}</td> 
                                                                                    <td>{{ $course->price }}</td> 
                                                                                    <td>{{ $course->status }}</td>  
                                                                                </tr>  
                                                                            @endif

                                                                        @endif
                                                                    @empty
                                                                    
                                                                    @endforelse 
                                                            @empty
                                                            
                                                            @endforelse
                                                        </tbody>
                                                    </table> 

                                            @endif 
                                        @empty
 
                                        @endforelse

                                               
                                    </div>
                                    <div class="col-md-6">
                                        <div class="student-growth-chart mt-15"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                @empty
                @endforelse 
    </div> 
</div>
@endsection