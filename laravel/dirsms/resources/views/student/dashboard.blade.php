
    <div class="page-header">
        <a href="{{ route('student.scheduling') }}" class="btn btn-success btn-icon pull-right">
            <i class="mdi mdi-calendar-text"></i> 
            Scheduling 
        </a>
        <h3>Dashboard</h3>
    </div> 


        <!-- students growth -->
        <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                                <h5>Welcome {{Auth::user()->fname}} {{Auth::user()->lname}}</h5>
                        </div>


                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-12 growth-left">
                                @if(Auth::user()->enrollment_status == 1)  
  

 
                                        @if($student_courses)
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr> 
                                                        <th scope="col">School</th>
                                                        <th scope="col">Branch</th>
                                                        <th scope="col">Course</th>
                                                        <th scope="col">Classes</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Day</th>
                                                        <th scope="col">Time</th>
                                                        <th scope="col">Start</th>
                                                        <th scope="col">End</th>
                                                        <th scope="col">Duration</th>
                                                        <th scope="col">Period</th>  
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($student_courses as $key=>$val) 
                                                        @foreach($schools as $school) 
                                                            @if($val->school_id == $school->id) 
                                                                @foreach($school_courses as $sc) 
                                                                    @if($sc->id == $val->school_course_id)  
                                                                        @foreach($courses as $course) 
                                                                            @if($sc->course_id == $course->id)  
                                                                                @foreach($days as $day) 
                                                                                    @if($sc->id == $day->sc_id)  
                                                                                        @if(Auth::user()->id == $val->student_id)  
                                                                                            @foreach($classes as $class)    
                                                                                                <tr>
                                                                                                    <th scope="row">{{ $school->name }}</th>
                                                                                                    <td>  
                                                                                                        @if($branches) 
                                                                                                            @foreach($branches as $branch) 
                                                                                                                @if($val->branch_id == $branch->id)
                                                                                                                    {{ $branch->name }}  
                                                                                                                @endif

                                                                                                            @endforeach 
                                                                                                        @else
                                                                                                            No branch specify
                                                                                                        @endif 
                                                                                                    </td> 
                                                                                                    <td>{{ $course->name }}</td> 
                                                                                                    <td>{{ $class->type }}</td> 
                                                                                                    <td>{{ $course->price }}</td> 
                                                                                                    <td>{{ $day->day }}</td> 
                                                                                                    <td>{{ $sc->time_start_end }}</td> 
                                                                                                    <td>{{ $sc->end }}</td> 
                                                                                                    <td>{{ $sc->start }}</td> 
                                                                                                    <td>{{ $sc->duration }}</td> 
                                                                                                    <td>{{ $sc->period }}</td>  
                                                                                                </tr>
                                                                                            @endforeach  
                                                                                         @endif
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
 
                                        @else
                                            @include("admin/empty/empty")         
                                        @endif
                                    @endif 
                                </div>
                                <div class="col-md-6">
                                    <div class="student-growth-chart mt-15"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
 