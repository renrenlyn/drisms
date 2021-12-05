@extends('layouts.header') 
@section('content')      
    @include("layouts/includes/sidebar")  


<style>
    footer{
        margin: 0 !important;
        margin-top: 20px !important;
    }
    @media print{
        #print-fleet{
            display: none;
        }
        footer{
            display: none;
        }
        
    }

</style>
    <!-- main content -->
<div class="main-content">   
    <div class="page-header"> 
        <h3></h3>
    </div> 
 

    <div class="row">  
        <div class="col-md-12">
        <table class="table table-bordered ">
            <thead>
                <th>Instructor</th>
                <th>Make Model</th>
                <th>Model Year</th>
                <th>Car No</th>
                <th>Time start & end</th>
                <th>Start</th>
                <th>End</th>
                <th>Days</th>
                <th>Duration & Period</th> 
            </thead>
            <tbody> 
                <tr>
                    <td>{{ $fleet_schedule->fname }} {{ $fleet_schedule->lname }}</td>
                    <td>{{ $fleet_schedule->make }} {{ $fleet_schedule->model }}</td>
                    <td>{{ $fleet_schedule->model_year }} </td>
                    <td>{{ $fleet_schedule->car_no }} </td>
                    <td>{{ $fleet_schedule->time_start_end }} </td>
                    <td>{{ $fleet_schedule->start }} </td>
                    <td>{{ $fleet_schedule->end }} </td>
                    <td>{{ $fleet_schedule->day }} </td>
                    <td>{{ $fleet_schedule->duration }}  {{ $fleet_schedule->period }} </td>
                </tr>
            </tbody>  
        <table> 



        <button class="btn btn-primary" id="print-fleet">Print</button>
            
        </div>
    </div> 
</div>

@include('layouts/includes/footer')

<script>
    $('#print-fleet').on('click touchstart', function(e){
        e.preventDefault();

        window.print();
    });

</script>
@endsection