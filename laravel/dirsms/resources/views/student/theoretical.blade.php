@extends('layouts.header') 
@section('content')      
    @include("layouts/includes/sidebar")   

    <style>
        ul li{
            list-style: none;
        }
        .form-drisms tbody tr td{
            /* padding-top: 0px !important; 
            padding-bottom: 0px !important */
        }
        .form-drisms tbody tr{
            background-color:white !important;
        } 

        @media print
        {
            .page-header { display: none; }
            #student-enrollment-record { display: none; }
        } 
    </style> 
    
<!-- main content -->
<div class="main-content"> 
        <div class="page-header"> 
            <h3></h3>
        </div> 
  
        @if(Auth::user()->enrollment_status == 1)   
            <div class="row"> 
                <!-- students theoretical page -->
                <div class="row"> 
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>{{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
                                </div> 
                                <div class="card-body p-0">
                                    <div class="row">
                                        
                                        <div class="col-md-12 growth-left">

                                @if($studentcourses)
                                    @foreach($studentcourses as $key=>$val) 
                                            <div cladd="item-center">
                                                <label>
                                                    <h2>  
                                                        {{ $val->s_name}}  
                                                    </h2>
                                                    <small> {{ $val->s_address}}  </small>
                                                </label>
                                                <p>{{ $val->b_name}}   <small> {{ $val->b_address}}  </small> </p>
                                            </div>
                                            <div class="row">  
                                                <div class="col-md-12">
                                                    <table class="table table-borderless form-drisms">
                                                        <thead>
                                                            <th>Course</th>
                                                            <th>Price</th>
                                                            <th>Days</th>
                                                            <th>Time Start & End</th>
                                                            <th>Start</th>
                                                            <th>End</th>
                                                            <th>Duration</th>
                                                            <th>Period</th>
                                                        </thead>
                                                        <tbody> 
                                                            <tr> 
                                                                <td> {{ $val->c_name}} </td> 
                                                                <td> {{ $val->c_price}} </td> 
                                                                <td> {{ $val->day}} </td> 
                                                                <td> {{ $val->time_start_end}} </td> 
                                                                <td> {{ $val->start}} </td> 
                                                                <td> {{ $val->end}} </td> 
                                                                <td> {{ $val->duration }} </td> 
                                                                <td> {{ $val->period }} </td>
                                                            </tr>  
                                                        </tbody>
                                                    </table>  
                                                </div> 
                                                <hr />
                                                <div class="col-md-4"> 
                                                    <table class="table table-borderless form-drisms">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    {{ $val->driving_lto_requirement }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ $val->theoretical_driving_course }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ $val->practical_driving_course_mv }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ $val->manual_transmission_mv }} </td>
                                                            </tr> 
                                                            <tr>
                                                                <td>{{ $val->automatic_transmission_mv }}</td>
                                                            </tr> 
                                                        </tbody>
                                                    </table>  
                                                </div>
                                                <div class="col-md-4"> 
                                                    <table class="table table-borderless form-drisms">
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $val->practical_driving_course_mc }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ $val->manual_transmission_mc }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td> {{ $val->automatic_transmission_mc }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>OTHERS: {{ $val->others_mc }}</td>
                                                            </tr> 
                                                        </tbody>
                                                    </table> 
                                                </div>
                                                <div class="col-md-4"> 
                                                    <div cladd="item-center">
                                                        <p> Where did you know {{ $val->s_name}} : </p> 
                                                    </div> 
                                                    <table class="table table-borderless form-drisms">
                                                        <tbody>
                                                            <tr>
                                                                <td> {{ $val->where_did_you_know_school_ }} </td>
                                                            </tr> 
                                                        </tbody>
                                                    </table>  
                                                </div> 
                                            </div>  
                                            <div class="row"> 
                                                <div class="col-md-8">
                                                    <h5>Additional information about you</h5> 
                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                                            <table class="table form-drisms">
                                                                <tbody>
                                                                    <tr>
                                                                        <th>Civil Status: </th>
                                                                        <td>{{ $val->civil_status }}  </td>
                                                                    </tr>  
                                                                    <tr>
                                                                        <th>Place of Birth: </th>
                                                                        <td>{{ $val->pob }}</td>
                                                                    </tr> 
                                                                    <tr>
                                                                        <th>Height: </th>
                                                                        <td> {{ $val->height }} </td>
                                                                    </tr> 
                                                                    <tr>
                                                                        <th>Weigth: </th>
                                                                        <td> {{ $val->weigth }}  </td>
                                                                    </tr> 
                                                                    <tr>
                                                                        <th>Blood Type: </th>
                                                                        <td>{{ $val->blood_type }}  </td>
                                                                    </tr> 
                                                                </tbody>
                                                            </table>  
                                                        </div> 
                                                        <div class="col-md-6"> 
                                                            <table class="table form-drisms">
                                                                <tbody>
                                                                    <tr>
                                                                        <th>Name of Mother: </th>
                                                                        <td> {{ $val->name_of_mother }}  </td>
                                                                    </tr>  
                                                                    <tr>
                                                                        <th>Name of Father: </th>
                                                                        <td> {{ $val->name_of_father }} </td>
                                                                    </tr> 
                                                                    <tr>
                                                                        <th>Person to Notify in Case of Emergency:  </th>
                                                                        <td> {{ $val->person_notify_in_case_of_emergency }} </td>
                                                                    </tr> 
                                                                    <tr>
                                                                        <th>Address: </th>
                                                                        <td> {{ $val->guardian_address }} </td>
                                                                    </tr> 
                                                                    <tr>
                                                                        <th>Contact Number: </th>
                                                                        <td> {{ $val->guardian_number }}  </td>
                                                                    </tr>  
                                                                    <tr>
                                                                        <th> Place of Birth: </th>
                                                                        <td>{{ $val->guardian_pob }}</td>
                                                                    </tr> 
                                                                    <tr>
                                                                        <th> Relation: </th>
                                                                        <td> {{ $val->guardian_relation }} </td>
                                                                    </tr>  
                                                                </tbody>
                                                            </table>  
                                                        </div>  
                                                    </div>
                                                </div> 

                                                <div class="col-md-4 text-right">
                                                    <h5>TO BE ACCOMPLISHED BY PERSONEL</h5> 
                                                    <div class="row">  
                                                        <table class="table  form-drisms">
                                                            <tbody>
                                                                <tr>      
                                                                    <td><label>O.R.No.</label></td> 
                                                                    <td class="">{{ $val->orno }} </td>
                                                                </tr> 
                                                                <tr>
                                                                    <td><label>Amount Paid</label> </td>
                                                                    <td>{{ $val->amount_paid }}</td>
                                                                </tr>   
                                                            </tbody>
                                                        </table>    
                                                    </div>
                                                </div> 
                                            </div> 

                                            <div class="row">  
                                                <div class="col-md-4" >
                                                    <table class="table table-borderless form-drisms">
                                                        <thead> 
                                                        </thead>
                                                        <tbody>
                                                            <tr>      
                                                                <th scope="row">Years of Experience: </th> 
                                                                <td>  {{ $val->y_e }}  </td>
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
                                                                <td> <label>Signature: </label></td> 
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
                                        @endforeach 
                                    @else
                                        @include("admin/empty/empty")         
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
    @else 
        @include("admin/empty/empty")   
    @endif

</div> 
@endsection