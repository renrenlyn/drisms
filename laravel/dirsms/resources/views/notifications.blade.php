@extends('layouts.header') 
@section('content')      
    @include("layouts/includes/sidebar")   
    <!-- main content --> 
    <style>
        .notification-active{
            background-color: #e4fbf9 !important;
        }
    </style>
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
                            <div class="single-notification @if($notification->nstatus == 'active') notification-active @endif">

                                <div style="display:flex">
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
                                            @if($notification->image_name) 
                                                <img 
                                                    src="{{ url('/images'). '/' .$notification->image_name }} " 
                                                    class="img-responsive" 
                                                    style="height: 50px; width: auto;"
                                                >    
                                            @else 
                                                <div class="notification-icon bg-warning"> 
                                                    <i class="mdi mdi-account-plus"></i>  
                                                    
                                                </div>
                                            @endif
                                    @elseif ( $notification->type == "payment" )
                                        <div class="notification-icon bg-success"> 
                                            <i class="mdi mdi-credit-card"></i> 
                                        </div>
                                    @endif 
                                        <div class="notification-message  " >
                                            <div class="notification-date">{{ date('F j, Y h:ia', strtotime($notification->created_at)) }}</div>
                                            {!! $notification->message !!} 
                                        </div> 
                                </div>
                                <form id="deleteNotification{{$notification->id}}" action="{{ route('notification.update', $notification->id) }}" method="POST" >
                                    @csrf
                                    @method('PUT') 

                                    <a href="#" class="delete_notification" rel="deleteNotification{{$notification->id}}">
                                        <i class="mdi mdi-eye"></i> 
                                    </a>
                                </form>
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
    $('.delete_notification').on('click touchstart', function(e){
        e.preventDefault();
        var data = $(this).attr('rel');
        $('#'+data).submit();
    });
</script> 
@endsection