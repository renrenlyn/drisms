@extends('layouts.header') 
@section('content')     
        <!-- Admin home page --> 
        <!-- sidebar --> 

    @include("layouts/includes/sidebar")   
    <!-- main content -->
    <div class="main-content">
        <div class="page-header">
            <h3>Notifications</h3>
        </div>

        <!-- page content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="notifications">
                      



                        <!-- single notification -->


                        @forelse($notifications as $notification)
                            <div class="single-notification">
<!-- 
                            
                                 <span class="unread-notification"> <i class=" mdi mdi-circle text-primary"></i></span>
                              -->
                                @if ( $notification->type == "message" )
                                    <div class="notification-icon bg-purple">
                                        <i class=" mdi mdi-message-text-outline"></i>
                                    </div>
                                @elseif ( $notification->type == "delete" )
                                    <div class="notification-icon bg-danger"> 
                                        <i class=" mdi mdi-delete"></i> 
                                    </div>
                                @elseif ( $notification->type == "calendar" )
                                    <div class="notification-icon bg-secondary"> 
                                        <i class=" mdi mdi-calendar"></i> 
                                    </div>
                                @elseif ( $notification->type == "newaccount" )
                                    <div class="notification-icon bg-warning"> 
                                        <i class="mdi mdi-account-plus"></i>  
                                    </div>
                                @elseif ( $notification->type == "payment" )
                                    <div class="notification-icon bg-success"> 
                                        <i class="mdi mdi-credit-card"></i> 
                                    </div>
                                @endif 
                                    <div class="notification-message">
                                        <div class="notification-date">{{ date('F j, Y h:ia', strtotime($notification->created_at)) }}</div>
                                        {!! $notification->message !!} 
                                    </div> 
                            </div>
                        @empty 
                            @include("admin/empty/empty") 
                        @endforelse

                        
                    </div>
                      
                </div>
            </div>
        </div>
    </div>
</div> 

    
@include('../layouts/includes/footer') 
<script>
       

      </script>




@endsection