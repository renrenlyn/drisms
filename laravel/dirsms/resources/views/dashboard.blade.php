@extends('layouts.header') 
@section('content')      
    @include("layouts/includes/sidebar")     
<!-- main content -->
<div class="main-content"> 
    @if(Auth::user()->role == 'Admin') 
        @include('admin/dashboard') 
    @else
        <h1>
            Welcome {{ Auth::user()->role }}
        </h1> 
    @endif
</div> 
    @include('../layouts/includes/footer')  
@endsection