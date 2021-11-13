@extends('layouts.header') 
@section('content')     
        <!-- Admin home page --> 
        <!-- sidebar --> 

    @include("layouts/includes/sidebar")   
    @include("admin/modal/staff")  
 

<!-- main content -->
<div class="main-content">

    @if(Auth::user()->role == 'Admin')

        @include('admin/dashboard') 
    @else
        <h1>
            Dashboard    
        </h1>
    @endif
</div>


    @include('../layouts/includes/footer') 

@endsection