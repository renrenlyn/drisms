@extends('layouts.header') 
@section('content')      
    @include("layouts/includes/sidebar")     
<!-- main content -->
<div class="main-content"> 
    @if(Auth::user()->role == 'Admin') 
        @include('admin/dashboard') 
    @else 
        <div>
            <div>
                <img src="" alt="" />
                <div>
                    APE Pile Driving School
                    Registration Form
                    <small>
                        FAx # (xxx xxxx xxxx)  Driving School
                    </small>
                </div>
            </div>
            <div>
                <form action="" method="POST">
                     
                    <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
    
                            <label>Course</label>
                            <select class="form-control select2" name="course_id" required=""> 
                                <option value="">Select Course</option>  
                                <option value="">Course Name</option>  
                            </select>
                          </div>
                        </div> 
                    </div> 

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Years of Experience</label> 
                                <input 
                                    type="text" 
                                    class="form-control"  
                                    name="y-e"    
                                > 
                                @error('email')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror 
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Class Date Requested</label> 
                                <input 
                                    type="email" 
                                    class="form-control"  
                                    name="email"  
                                > 
                                @error('email')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror 
                            </div>
                        </div>
                    </div>


                    
                </form> 
            </div>
        </div>
    @endif
</div> 
    @include('../layouts/includes/footer')  
@endsection