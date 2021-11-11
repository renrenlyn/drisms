@extends('layouts.header') 
@section('content')     
        <!-- Admin home page --> 
        <!-- sidebar --> 

@include("layouts/includes/sidebar")   

@include("admin/modal/student")  

<!-- main content -->
<div class="main-content">
    <div class="page-header">
        
        <!-- 
            <button type="button" class="btn btn-primary btn-icon pull-right ml-5"><i class="mdi mdi-account-plus-outline"></i> Add Student </button>
        -->
        
        <button type="button" class="btn btn-success btn-icon pull-right toggle-search">
            <i class=" mdi mdi-filter-outline"></i> Filter & Search </button>
        
        
        <h3>Students</h3>
    </div> 
    <!-- page content -->
 

    <div class="row"> 
        <!-- search & Filter -->
        <div class="col-md-12 search-filter" style="display: none;">
            <div class="card">
                <form class="row" action="{{ route('student-search') }}" method="GET" role="search">
                    <div class="col-md-4">
                            <div class="form-group">
                            <label>Search Name, Email or Phone</label>
                            <input type="text" class="form-control" placeholder="Search Name, Email or Phone" name="search">
                            </div>
                    </div>
                    <div class="col-md-2">
                            <div class="form-group">
                                <label for="email">Progress</label>
                                <select class="form-control" name="status">
                                    <option value="0">Select Progress*</option>
                                    <option value="All">All</option>
                                    <option value="Complete">Complete</option>
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="New">New</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="email">Fees</label>
                            <select class="form-control" name="istatus"> 
                                <option value="0">Select Fee Category*</option>
                                <option value="All">All</option>
                                <option value="Paid">Paid</option>
                                <option value="Partially">Partially</option>
                                <option value="Updaid">Unpaid</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                            <div class="form-group">
                            <label for="email">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="">Select Gender*</option>
                                <option value="">All</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-icon btn-block btn-sm" type="submit">
                            <i class=" mdi mdi-filter-outline"></i> 
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
    
    <div class="row"> 
    @forelse($students as $student)
        <!-- user grid -->
        <div class="col-md-4">
            <div class="user-grid card">
                <div class="user-grid-pic">
                    @if( !empty($student->image_name) ) 
                    <img src="{{url('/images'). '/' .$student->image_name }} " class="img-responsive">    
                    @else
                    <img src="{{ url('assets/images/avatar.png') }} ">
                    @endif
                </div>
                <div class="user-grid-info">
                    <h5>{{ $student->fname }} {{ $student->lname }}</h5>
                    <p>{{ $student->courses }} course(s) Enrolled </p>
                    <p>{{ $student->phone }}</p>
                </div>
                <div class="row user-grid-buttons">

                    <div class="col-md-6">
                        <a class="btn btn-primary btn-block" href="">
                            Profile
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-default btn-block" href="">
                            Schedule
                        </a>
                    </div>
 
                    <div class="col-md-12 mt-2">
                        <a class="btn btn-success btn-block" href="#"  data-toggle="modal" data-target="#create{{ $student->id }}">
                            Update
                        </a>
                    </div>
                </div>
                <div class="user-grid-class-left">
                    <p class="text-success"><i class=" mdi mdi-counter"></i> student completed Class(es) Completed</p>
                </div>
            </div>
        </div>
        @empty 
            @include("admin/empty/empty")   
        @endforelse
    </div>
</div>



    @include('../layouts/includes/footer') 
    <script>
     //Hide Payment Method
     $('.paymentmethod').hide();
     //Conditionally show payment method
     $('.amountpaid').on('keyup',function(){
        if($(this).val() > 0){
            $('.paymentmethod').show();
            $('.method').attr('required',true);
        } else {
            $('.paymentmethod').hide();
            $('.method').attr('required',false); 
        }
     });
   </script>

@endsection