
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

                                            @forelse($student_enrollment_records as $key=>$val) 
                                                <tr>
                                                    <th scope="row">{{ $val->school_name }}</th>
                                                    <td>{{ $val->branch_name }}</td> 
                                                    <td>{{ $val->course_name }}</td> 
                                                    <td>{{ $val->classes_type }}</td> 
                                                    <td>{{ $val->price }}</td> 
                                                    <td>{{ $val->day }}</td> 
                                                    <td>{{ $val->time_start_end }}</td> 
                                                    <td>{{ $val->end }}</td> 
                                                    <td>{{ $val->start }}</td> 
                                                    <td>{{ $val->duration }}</td> 
                                                    <td>{{ $val->period }}</td> 
                                                
                                                </tr> 

                                            @empty 
                                                @include("admin/empty/empty")   
                                            @endforelse
                                        </tbody>
                                    </table>
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
 