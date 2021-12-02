
    <style>
        ul li{
            list-style: none;
        }
        .form-drisms tbody tr td{
            padding-top: 0px !important; 
            padding-bottom: 0px !important
        }
        .form-drisms tbody tr{
            background-color:white !important;
        }
    </style>
    
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
 

                            <div cladd="item-center">
                                <h2>  School  </h2>
                                <p>Branch</p>
                            </div>

                            <div class="row">
                                
                                
                                <div class="col-md-12">
                                    <table class="table table-borderless form-drisms">
                                        <tbody>
                                            <tr>
                                                <td> Course Name </td>
                                            
                                                <td> Price </td>
                                            
                                                <td> Day </td>
                                            
                                                <td> Time </td>
                                            
                                                <td> Start </td>
                                            
                                                <td> End </td>
                                            
                                                <td> Duration </td>
                                            
                                                <td> Period </td>
                                            </tr> 
                                        </tbody>
                                    </table>  
                                </div>

                                
                                <div class="col-md-4">

                                    <table class="table table-borderless form-drisms">
                                        <tbody>
                                            <tr>
                                                <td>Driving for LTO requirement</td>
                                            </tr>
                                            <tr>
                                                <td>15 Hours Theoretical Driving Course</td>
                                            </tr>
                                            <tr>
                                                <td>8 Hours Practical Driving Course (MV) </td>
                                            </tr>
                                            <tr>
                                                <td>Manual Transmission</td>
                                            </tr> 
                                            <tr>
                                                <td>Automatic Transmission</td>
                                            </tr> 
                                        </tbody>
                                    </table> 


                                </div>
                                <div class="col-md-4">

                                    <table class="table table-borderless form-drisms">
                                        <tbody>
                                            <tr>
                                                <td>8 Hours Practical Driving Course (MC)</td>
                                            </tr>
                                            <tr>
                                                <td>Manual Transmission</td>
                                            </tr>
                                            <tr>
                                                <td> Automatic Transmission </td>
                                            </tr>
                                            <tr>
                                                <td>OTHERS</td>
                                            </tr> 
                                        </tbody>
                                    </table> 
                                </div>
                                <div class="col-md-4">

                                    <div cladd="item-center">
                                        <p> Where did you know (School)  </p> 
                                    </div>
                                        
                                    <table class="table table-borderless form-drisms">
                                        <tbody>
                                            <tr>
                                                <td> Facebook,  Radio, Billboard </td>
                                            </tr> 
                                        </tbody>
                                    </table> 


                                </div>

                            </div> 


                            <div class="row">

                               
                                <div class="col-md-12">
                                    <label>Additional information about you</label>
                                </div>

                                <div class="col-md-4">
                                     
                                    <table class="table table-borderless form-drisms">
                                        <tbody>
                                            <tr>
                                                <td> Civil Status </td>
                                            </tr>  
                                            <tr>
                                                <td>Place of Birth</td>
                                            </tr> 
                                            <tr>
                                                <td> Height </td>
                                            </tr> 
                                            <tr>
                                                <td> Weigth </td>
                                            </tr> 
                                            <tr>
                                                <td> Blood Type </td>
                                            </tr> 
                                        </tbody>
                                    </table> 

                                </div>


                                
                                <div class="col-md-4"> 
                                    <table class="table table-borderless form-drisms">
                                        <tbody>
                                            <tr>
                                                <td> Name of Mother </td>
                                            </tr>  
                                            <tr>
                                                <td>Name of Father</td>
                                            </tr> 
                                            <tr>
                                                <td> Person to Notify in Case of Emergency: </td>
                                            </tr> 
                                            <tr>
                                                <td> Address </td>
                                            </tr> 
                                            <tr>
                                                <td> Contact Number </td>
                                            </tr> 
                                            
                                            <tr>
                                                <td> Place of Birth </td>
                                            </tr> 
                                            <tr>
                                                <td> Relation </td>
                                            </tr>  
                                        </tbody>
                                    </table>  
                                </div> 


                            </div>


                            <div class="row"> 
                                
                                <div class="col-md-6" >
                                        <table class="table table-borderless form-drisms">
                                            <tbody>
                                                <tr>      
                                                    <td><label>Years of Experience</label></td> 
                                                    <td class=""> </td>
                                                </tr>    
                                                
                                            </tbody>
                                        </table>  

                                </div>
                                <div class="col-md-6" >

                                    <label>TO BE ACCOMPLISHED BY PERSONEL</label>

                                    <table class="table table-borderless form-drisms">
                                        <tbody>
                                            <tr>      
                                                <td><label>O.R.No.</label></td> 
                                                <td class=""></td>
                                            </tr> 
                                            <tr>
                                                <td><label>Amount Paid</label> </td>
                                                <td></td>
                                            </tr>  
                                            
                                        </tbody>
                                    </table>  
                                </div>
                            </div>
                            <div class="row">  
                                <div class="col-md-12">  
                                    <table class="table table-borderless form-drisms">
                                        <tbody>
                                            <tr>      
                                                <td> <label>Signature:</label></td> 
                                                <td><label>Assisted by: </label> </td>
                                            </tr> 
                                            <tr>
                                                    <td class=""><hr></td> 
                                                    <td class=""><hr></td>
                                            </tr>   
                                        </tbody>
                                    </table>   
                                    <div class="alert alert-danger">NOTE: REGISTRATION FEE OF P2000 IS NON-REFUNDABLE</div>
                                </div>  
                            </div>  

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
                                    <div class="student-growth-chart mt-15">
                                        <button class="btn btn-primary" id="student-enrollment-record">Print</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
 