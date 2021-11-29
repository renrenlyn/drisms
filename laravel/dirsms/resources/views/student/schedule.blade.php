@extends('layouts.header') 
@section('content')      
    @include("layouts/includes/sidebar")     

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
                                                                <th scope="col">Select</th>
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
                                                                                    <td><input type="radio" name="ec_form{{$sc->id}}-{{Auth::user()->id}}-{{$school->id}}-{{$branch->id}}"   class="ec_forn_c" rel="ec_form{{$sc->id}}-{{Auth::user()->id}}-{{$school->id}}-{{$branch->id}}"> </td> 
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
                                                                                    <td>{{  date('l, F d y', strtotime( $sc->start ))  }}</td> 
                                                                                    <td>{{  date('l, F d y', strtotime( $sc->end ))   }}</td> 
                                                                                    <td>{{ $sc->duration }}</td> 
                                                                                    <td>{{ $sc->period }}</td> 
                                                                                    <td>{{ $course->price }}</td> 
                                                                                    <td>{{ $course->status }}</td>  
 
                                                                                </tr>  
                                                                                <tr  class="dc-cls hidden" id="ec_form{{$sc->id}}-{{Auth::user()->id}}-{{$school->id}}-{{$branch->id}}"> 
                                                                                    <td colspan ="10">



                                                                                            <div class="mb-3">Please Check {{$sc->id}}-{{Auth::user()->id}}-{{$school->id}}-{{$branch->id}}</div> 
                                                                                    


                                                                                    
                                                                                            <form action="{{ route('enrollment.store' )}}" method="POST">
                                                                                                @csrf 
                                                                                                    
                                                                                                <div class="form-group">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-4"> 
                                                                                                            <table class="table table-borderless form-drisms">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td class=""><input type="checkbox" name=""/></td>
                                                                                                                        <td> <label>Driving for LTO requirement</label></td>
                                                                                                                    </tr> 
                                                                                                                    <tr>
                                                                                                                        <td><input type="checkbox" name=""/></td>
                                                                                                                        <td><label>15 Hours Theoretical Driving Course</label> </td>
                                                                                                                    </tr> 
                                                                                                                    <tr>
                                                                                                                        <td><input type="checkbox" name=""/></td>
                                                                                                                        <td><label>8 Hours Practical Driving Course (MV)</label> </td>
                                                                                                                    </tr> 
                                                                                                                    <tr> 
                                                                                                                        <td><input type="checkbox" name=""/></td>
                                                                                                                        <td>  <label>Manual Transmission</label> </td>
                                                                                                                    </tr> 
                                                                                                                    <tr>
                                                                                                                        <td><input type="checkbox" name=""/></td>
                                                                                                                        <td><label>Automatic Transmission</label></td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>  
                                                                                                        </div>

                                                                                                        <div class="col-md-4"> 
                                                                                                            <table class="table table-borderless form-drisms">
                                                                                                                <tbody> 
                                                                                                                    <tr>
                                                                                                                        <td><input type="checkbox" name=""/></td>
                                                                                                                        <td><label>8 Hours Practical Driving Course (MC)</label> </td>
                                                                                                                    </tr>  
                                                                                                                    <tr> 
                                                                                                                        <td><input type="checkbox" name=""/></td>
                                                                                                                        <td>  <label>Manual Transmission</label> </td>
                                                                                                                    </tr> 
                                                                                                                    <tr>
                                                                                                                        <td><input type="checkbox" name=""/></td>
                                                                                                                        <td><label>Automatic Transmission</label></td>
                                                                                                                    </tr>
                                                                                                                    
                                                                                                                    <tr >
                                                                                                                        <td><input type="checkbox" name=""/></td>
                                                                                                                        <td><label>OTHERS</label></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td colspan="2">
                                                                                                                            <label>
                                                                                                                                <input type="text" name=""/>
                                                                                                                            </label>
                                                                                                                        </td> 
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>  
                                                                                                        </div>
 
                                                                                                        <div class="col-md-4">
                                                                                               
                                                                                                            <label>Where did you know {{$school->name}} ( School )</label>

                                                                                                            <div class="row">
                                                                                                                
                                                                                                                <div class="col-md-6"> 
                                                                                                                    <table class="table table-borderless form-drisms">
                                                                                                                        <tbody>
                                                                                                                            
                                                                                                                            <tr>
                                                                                                                                <td><input type="checkbox" name=""/></td>
                                                                                                                                <td><label>Facebook</label> </td>
                                                                                                                            </tr>
                                                                                                                            
                                                                                                                            <tr> 
                                                                                                                                <td><input type="checkbox" name=""/></td>
                                                                                                                                <td>  <label>Radio</label> </td>
                                                                                                                            </tr>

                                                                                                                            
                                                                                                                            <tr>
                                                                                                                                <td><input type="checkbox" name=""/></td>
                                                                                                                                <td><label>Google</label></td>
                                                                                                                            </tr>
                                                                                                                            
                                                                                                                            <tr>
                                                                                                                                <td><input type="checkbox" name=""/></td>
                                                                                                                                <td><label>Refferal</label></td>
                                                                                                                            </tr>
                                                                                                                            
                                                                                                                        </tbody>
                                                                                                                    </table>  
                                                                                                                </div>
                                                                                                                <div class="col-md-6"> 
                                                                                                                    <table class="table table-borderless form-drisms">
                                                                                                                        <tbody> 
                                                                                                                            <tr>
                                                                                                                                <td><input type="checkbox" name=""/></td>
                                                                                                                                <td><label>TV</label> </td>
                                                                                                                            </tr> 
                                                                                                                            <tr> 
                                                                                                                                <td><input type="checkbox" name=""/></td>
                                                                                                                                <td>  <label>Flyers</label> </td>
                                                                                                                            </tr> 
                                                                                                                            <tr>
                                                                                                                                <td><input type="checkbox" name=""/></td>
                                                                                                                                <td><label>Billboard</label></td>
                                                                                                                            </tr> 
                                                                                                                            <tr>
                                                                                                                                <td><input type="checkbox" name=""/></td>
                                                                                                                                <td><label>Others</label></td>
                                                                                                                            </tr> 
                                                                                                                        </tbody>
                                                                                                                    </table>   
                                                                                                                </div> 
                                                                                                                    <label> Refered by: </label> 
                                                                                                                    <input type="text" name=""> 
                                                                                                            </div> 
                                                                                                        </div>

                                                                                                    </div> 
                                                                                                </div>
 

                                                                                                <div class="form-group">
                                                                                                    <label>Additional information about you</label>
                                                                                                    <div class="row">
                                                                                                    

                                                                                                        <div class="col-md-6"> 
                                                                                                            <table class="table table-borderless form-drisms">
                                                                                                                <tbody>
                                                                                                                   
                                                                                                                    <tr>
                                                                                                                        <td><label>Civil Status</label> </td>
                                                                                                                        <td><input type="text" name=""/></td>
                                                                                                                    </tr> 
                                                                                                                    <tr> 
                                                                                                                        <td>  <label>Place of Birth</label> </td>
                                                                                                                        <td><input type="text" name=""/></td>
                                                                                                                    </tr> 
                                                                                                                    <tr> 
                                                                                                                        <td><label>Height</label></td>
                                                                                                                        <td><input type="text" name=""/></td>
                                                                                                                    </tr>
                                                                                                                    
                                                                                                                    <tr> 
                                                                                                                        <td><label>Weigth</label></td>
                                                                                                                        <td><input type="text" name=""/></td>
                                                                                                                    </tr>
                                                                                                                    
                                                                                                                    <tr> 
                                                                                                                        <td><label>Blood Type</label></td>
                                                                                                                        <td><input type="text" name=""/></td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>  
                                                                                                        </div> 


                                                                                                        <div class="col-md-6"> 
                                                                                                            <table class="table table-borderless form-drisms">
                                                                                                                <tbody> 
                                                                                                                    <tr>
                                                                                                                         <td> <label>Name of Mother</label></td>  <td class=""><input type="text" name=""/></td>
                                                                                                                     
                                                                                                                    </tr> 
                                                                                                                    <tr>
                                                                                                                        <td><label>Name of Father</label> </td>
                                                                                                                        <td><input type="text" name=""/></td>
                                                                                                                    </tr> 
                                                                                                                    <tr>      
                                                                                                                        <td> <label>Person to Notify in Case of Emergency:</label></td> 
                                                                                                                        <td class=""><input type="text" name=""/></td>
                                                                                                                    </tr> 
                                                                                                                    <tr>
                                                                                                                        <td><label>Address</label> </td>
                                                                                                                        <td><input type="text" name=""/></td>
                                                                                                                    </tr> 
                                                                                                                    <tr>
                                                                                                                        <td><label>Contact Number</label> </td>
                                                                                                                        <td><input type="text" name=""/></td>
                                                                                                                    </tr> 
                                                                                                                    <tr> 
                                                                                                                        <td>  <label>Place of Birth</label> </td>
                                                                                                                        <td><input type="text" name=""/></td>
                                                                                                                    </tr> 
                                                                                                                    <tr>
                                                                                                                        <td><label>Relation</label></td>
                                                                                                                        <td><input type="text" name=""/></td>
                                                                                                                    </tr>
                                                                                                                     
                                                                                                                </tbody>
                                                                                                            </table>  
                                                                                                        </div> 
                                                                                                    </div>
                                                                                                </div>
 


                                                                                                <div class="form-group">
                                                                                                    <div class="row"> 
                                                                                                        <div class="col-md-6"> 
                                                                                                            <label>Years of Experience</label>
                                                                                                            <select class="form-control" name="y_e" required="">  
                                                                                                                <option value="more than a months" selected>more than a months</option>   
                                                                                                                <option value="1 year">1 year</option>   
                                                                                                                <option value="2 years">2 years</option>   
                                                                                                                <option value="more than 5 years">more than 5 years</option>    
                                                                                                            </select>  
                                                                                                        </div>
                                                                                                        <div class="col-md-6"> 


                                                                                                        <label>TO BE ACCOMPLISHED BY PERSONEL</label>

                                                                                                            <table class="table table-borderless form-drisms">
                                                                                                                <tbody>
                                                                                                                    <tr>      
                                                                                                                        <td><label>O.R.No.</label></td> 
                                                                                                                        <td class=""><input type="text" name=""/></td>
                                                                                                                    </tr> 
                                                                                                                    <tr>
                                                                                                                        <td><label>Amount Paid</label> </td>
                                                                                                                        <td><input type="text" name=""/></td>
                                                                                                                    </tr>  
                                                                                                                     
                                                                                                                </tbody>
                                                                                                            </table>  
                                                                                                        </div> 

                                                                                                    </div> 
                                                                                                </div> 




                                                                                                <div class="form-group">
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
                                                                                                </div> 
                                                                             
                                                                                                <div class="form-group">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-12"> 
                                                                                                            <input type="submit" value="Register"  class="btn btn-primary"  @if(Auth::user()->enrollment_status == 1)  disabled @endif/>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>


                                                                                            </form> 
                                                                                    </td>
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


@include('../layouts/includes/footer')  

<script>
    $('.ec_forn_c').on('change', function(){
     
            $('.ec_forn_c').not(this).prop('checked',false);

            $data = $(this).attr('rel');
            
            $('.dc-cls').addClass('hidden'); 
            $('#'+$data).removeClass('hidden'); 
         
    })
</script>
@endsection