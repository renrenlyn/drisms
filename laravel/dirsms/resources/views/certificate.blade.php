@extends('layouts.header') 
@section('content')      
        <!-- sidebar -->  
    @include("layouts/includes/sidebar")   
    <style> 
        @media print{
          footer{
              display: none;
          }  
          #cert-print{
              display:none;
          }
        }
        footer{
            margin: 0 !important;
        }
    </style>
<div class="main-content"> 
<!-- (!$student_cert->isEmpty()) -->
    @if(!empty($student_cert)) 
        <div class="page-header flex flex-row items-center justify-center"> 
            <div class="user-profile-pic  mr-2">  
                <img 
                    src="{{ asset('/assets/images/icon.ico') }}" 
                    class="img-responsive" 
                >   
            </div>  
            <div class="user-profile-pic  ml-2">  
                <img 
                    src="{{ url('/assets/images/avatar.png') }} "" 
                    class="img-responsive" 
                >   
            </div>   
        </div> 
        <div class="page-header flex flex-column justify-center items-center">   
            <h4>Republic of the Philippines</h4>
            <h4>Department of Transportation</h4>
            <h4>Land Transportation Office</h4>
        </div>  
        <!-- page content -->
        <div class="row">   
            <dic class="col-md-12 text-center">
                <h3>CERTIFICATE OF DRIVING COURSE COMPLETION</h3>
            </div> 
            <div class="col-md-12">
                <div class="" style="background-color:gray; padding: 10px;">
                    <p class="m-0" ><b>Student Driver Information</b></p>
                </div> 
                <table>
                    <tbody>
                        <tr>
                            <th>Name: </th>
                            <td>First Name </td>
                            <td>Middle Name</td>
                            <td>Last Name</td>
                        </tr>
                        <tr>
                            <th>Address: </th>
                            <td>First Name </td> 
                        </tr> 
                        <tr>
                            <th>Driver's License Number: </th>
                            <td></td> 
                            <th>Date of Birth: </th>
                            <td> </td> 
                        </tr> 
                        <tr>
                            <th>Nationality: </th>
                            <td></td> 
                            <th>Age: </th>
                            <td> </td> 
                            <th>Gender: </th>
                            <td> </td> 
                            <th>Marital Status: </th>
                            <td> </td> 
                        </tr>
                    </tbody>
                </table>
            </div> 
            <div class="col-md-12">
                <div class="" style="background-color:gray; padding: 10px;">
                    <p class="m-0" ><b>Driving Course Training Information</b></p>
                </div> 
                <table>
                    <tbody>
                        <tr>
                            <th>Driving Course Name: </th>
                            <td></td> 
                        </tr>
                        <tr>
                            <th>Program Type: </th>
                            <td></td> 
                            <th>Training Purposes: </th>
                            <td></td> 
                        </tr> 
                        <tr>
                            <th>MV type Used: </th>
                            <td></td>  
                        </tr> 
                        <tr>
                            <th>DL Codes: </th>
                            <td></td>  
                        </tr>
                    </tbody>
                </table>
            </div>
    
            <div class="col-md-12"> 
                <hr> 
                <table>
                    <tbody>
                        <tr>
                            <th>Date Started: </th>
                            <td></td>
                            <th>Date Completed: </th>
                            <td></td> 
                            
                            <th>Total Number of Hourse: </th>
                            <td></td> 
                        </tr>
                        
                    </tbody>
                </table>
            </div>




            <div class="col-md-12">
                <div class="" style="background-color:gray; padding: 10px;">
                    <p class="m-0" ><b>Driving Course Training Evaluation</b></p>
                </div> 
                <table>
                    <thead>
                        <th></th>
                        <th>PASSED</th>
                        <th>FAILED</th>
                        <th></th>
                        <th></th>

                    </thead>
                    <tbody>
                        <tr>
                            <th>Assessment: </th>
                            <td></td>
                            <td></td>
                            <th>Additional Remarks: </th>
                            <td></td> 
                        </tr>
                        <tr> 
                            <th>Overall Rating: </th>  
                            <td></td>
                            <td></td>
                        </tr> 
                    </tbody>
                </table>
            </div>
    
            <div class="page-header  text-center">   
                <P class="m-0">This Driving Course Completion Certificate with </P>
                <P class="m-0">Control Number DS-SFDSX0900-A-2020-00000001 has been issued</P>
                <P class="m-0">on December 05, 2021</P>
            </div> 


            <div class="page-header  text-center">   
                <P class="m-0">Prepared and issued by:</P>
                <h3 class="m-0">DRISMS SCHOOL</h3> 
            </div> 

            <div class="page-header  text-center">   
                <hr>
                <h1 class="m-0">Instructor Name</h1>
                <p class="m-0">Authorized Instructor</p> 
                <p class="m-0">Accred Number: IDS-2020-00010-09</p> 
            </div> 

            <div class="page-header  text-center">    
                <p class="m-0">This Certificate was uploaded on December 5, 2021 at 9:00 AM</p> 
            </div> 


            <button class="btn btn-primary" id="cert-print">Print</button>
        </div> 
        @else
            @include("admin/empty/empty") 
        @endif
    </div>


    @include('../layouts/includes/footer') 
        <script>
            $('#cert-print').on('click touchstart', function(){
                window.print();
            })

    </script>
@endsection