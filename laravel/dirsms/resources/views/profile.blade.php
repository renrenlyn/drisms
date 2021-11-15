@extends('layouts.header') 
@section('content')     
        <!-- Admin home page --> 
        <!-- sidebar -->  
    @include("layouts/includes/sidebar")   

    
    <div class="main-content">
        <div class="page-header">
            <h3>{{ $user->fname }} {{ $user->lname }}</h3>
        </div>


        <!-- page content -->
            <div class="row">

                <div class="page-rightbar profile-right-bar p-0">
                    <div class="slimscroll-profile-menu">
                        <div class="user-profile-options">
                            <div class="dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class=" mdi mdi-account-edit"></i> 
                                    </div>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                    <li role="presentation"><a role="menuitem" href="" data-toggle="modal" data-target="#update"> <i class="mdi mdi-account"></i> Edit Profile</a></li>
                                    <li role="presentation"><a role="menuitem" href=""  class="send-to-server-click" warning-title="Are you sure?" warning-message="This account will be deleted completly." warning-button="Proceed" class="delete"> <i class="mdi mdi-delete"></i> Delete</a></li>
                                    </ul>
                            </div>
                        </div>
                        <div class="user-profile-pic"> 
                            <img src="{{ url('') }}assets/images/avatar.png"> 
                        </div>
                        <div class="user-profile-info">
                            <h5>{{ $user->fname }} {{ $user->lname }}</h5>
                            <p>{{ $user->phone }}</p>
                        </div>
                        <div class="row user-profile-buttons">
                            <div class="col-md-6 p-5">
                                <button 
                                    class="btn btn-primary btn-icon btn-block"  
                                    data-toggle="modal" 
                                    data-target="#sendsms"
                                >
                                    <i class=" mdi mdi-message-text-outline"></i> 
                                    Send SMS
                                </button>
                            </div>
                            <div class="col-md-6 p-5">
                                <button 
                                    class="btn btn-success btn-icon btn-block"  
                                    data-toggle="modal" 
                                    data-target="#sendemail"
                                >
                                    <i class=" mdi mdi-email-outline"></i> 
                                    Send Email
                                </button>
                            </div>
                        </div>
                        <div class="profile-more-section">
                            <ul class="nav nav-tabs">
                            <li><a data-toggle="tab" href="#account" class="active">Account Info</a></li>
                            <li><a data-toggle="tab" href="#activity">Activity</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="account" class="tab-pane fade in show active">
                                    <table>
                                        <tr>
                                            <td class="profile-item-title">Email</td>
                                            <td class="profile-item-value">{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <td class="profile-item-title">Phone</td>
                                            <td class="profile-item-value">{{$user->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td class="profile-item-title">Date of Birth</td>
                                            <td class="profile-item-value">
                                            @if( $user->dob != '0000-00-00' ) 
                                            <span>{{ date('F j, Y', strtotime($user->dob)) }}</span>
                                            @else
                                            <span class="text-muted">Not set</span>
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="profile-item-title">Gender</td>
                                            <td class="profile-item-value">{{$user->gender}}</td>
                                        </tr>
                                        <tr>
                                            <td class="profile-item-title">Address</td>
                                            <td class="profile-item-value">{{$user->address}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div id="activity" class="tab-pane fade">
                                    <ol class="activity-feed">
                                    
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div> 

                </div> 
            </div>
    </div>


    @include('../layouts/includes/footer') 

@endsection