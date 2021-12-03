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
        <h3>Your Schedule for fleet</h3>
    </div>  
    <!-- students growth -->
    <div class="row">   

        <div class="col-md-12"> 

            @forelse($fleet_schedules as $key => $val)
                <table class="table table-striped">
                    <thead>
                        <tr> 
                            <th scope="col">Select</th>
                            <th scope="col">No. </th>
                            <th scope="col">Instructor</th>
                            <th scope="col">Make and Model</th>
                            <th scope="col">Model Year</th>
                            <th scope="col">Car Number</th>
                            <th scope="col">Car Plate</th>
                            <th scope="col">Time Start & End</th> 
                            <th scope="col">Date Start</th>
                            <th scope="col">Date End</th>
                            <th scope="col">Days</th>
                            <th scope="col">Duration & Period</th>                                                           
                        </tr>
                    </thead>
                    <tbody> 
                            <tr> 
                                <td><input type="radio" name="" class="ec_forn_c" rel=""> </td> 
                                <td> {{ $key + 1 }} </td> 
                                <td>{{ $val->fname }} {{ $val->lname }}</td> 
                                <td>{{ $val->make }} {{ $val->model }} </td>  
                                <td>{{ $val->model }}</td>  
                                <td>{{ $val->car_no }}</td>  
                                <td>{{ $val->car_plate }}</td>  
                                <td>{{ $val->time_start_end }}</td>  
                                <td>{{ $val->start }}</td> 
                                <td>{{ $val->end }}</td> 
                                <td>{{ $val->day }}</td> 
                                <td>{{ $val->duration }} {{ $val->period }}</td>  
                            </tr>  
                    <tbody>
                </table> 

            @empty
            @endforelse

        </div>
    </div> 
</div>


@include('../layouts/includes/footer')  

<script> 
</script>
@endsection