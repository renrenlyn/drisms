@extends('layouts.header') 
@section('content')     
        <!-- Admin home page --> 
        <!-- sidebar --> 

    @include("layouts/includes/sidebar")   

    <!-- main content -->
    <div class="main-content">
        <div class="page-header">
            <button type="button" class="btn btn-success btn-icon pull-right ml-5"  data-toggle="modal" data-target="#sendemail"><i class=" mdi mdi-email-outline"></i> Send Email </button>
            <button type="button" class="btn btn-primary btn-icon pull-right"  data-toggle="modal" data-target="#sendsms"><i class=" mdi mdi-message-text-outline"></i> Send SMS </button>
            <h3>Communication</h3>
        </div>

        @if( \Session::has('success'))
            <div class="alert alert-success">

                {!! \Session::get('success') !!}
            </div>
        @endif 
        <!-- page content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-0 " id="communication-content">

                        <ul class="nav nav-tabs" id="communication">
                            <li>
                                <a href="" class="active" rel="to-users">
                                    To Users
                                </a>
                            </li>
                            <li>
                                <a href="#" rel="to-branches">
                                    To Branches
                                </a>
                            </li> 
                            <li>
                                <a href="#" rel="to-schools">
                                    To Schools
                                </a>
                            </li> 
                        </ul>





                        <div class="table-responsive hidden d-block" id="to-users">
                            <table class="table table-striped mb-0 mw-1000" id="data-table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Receiver Users</th>
                                    <th>Status + Date</th>
                                    <th>Message</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody> 
                                    <tr>
                                        <th scope="row">1</th>
                                        <td> 
                                            <img src="" class="table-avatar communication-avatar">
                                        
                                            <a href=""><strong>First name and Last name</strong></a>
                                        
                                            <strong class="text-primary">messaeg name</strong>
                                            
                                            <span class="communication-contact">Contact</span></td>
                                        <td>sent at<br> 
                                            <span class="badge badge-success">Sent</span> 
                                            <span class="badge badge-danger">Failed</span> 
                                            <span class="badge badge-primary">SMS</span> 
                                            <span class="badge badge-secondary">Email</span> 
                                        </td>
                                        <td>
                                            Message
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm btn-icon "  modal="#read"><i class=" mdi mdi-email-outline"></i>  Read Message</button>
                                            <button class="btn btn-danger btn-sm send-to-server-click" data=" " url=" " loader="true"><i class="mdi mdi-delete"></i></button>
                                        </td>
                                    </tr>
                                
                                    <tr><th colspan="7"><p class="text-muted text-center">It's empty here.</p></th></tr>
                            
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive hidden" id="to-branches">
                            <table class="table table-striped mb-0 mw-1000" id="data-table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Receiver branches</th>
                                    <th>Status + Date</th>
                                    <th>Message</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody> 
                                    <tr>
                                        <th scope="row">1</th>
                                        <td> 
                                            <img src="" class="table-avatar communication-avatar"> 
                                            <a href=""><strong>First name and Last name</strong></a> 
                                            <strong class="text-primary">messaeg name</strong> 
                                            <span class="communication-contact">Contact</span></td>
                                        <td>sent at<br> 
                                            <span class="badge badge-success">Sent</span> 
                                            <span class="badge badge-danger">Failed</span> 
                                            <span class="badge badge-primary">SMS</span> 
                                            <span class="badge badge-secondary">Email</span> 
                                        </td>
                                        <td>
                                            Message
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm btn-icon "  modal="#read"><i class=" mdi mdi-email-outline"></i>  Read Message</button>
                                            <button class="btn btn-danger btn-sm send-to-server-click" data=" " url=" " loader="true"><i class="mdi mdi-delete"></i></button>
                                        </td>
                                    </tr>
                                
                                    <tr><th colspan="7"><p class="text-muted text-center">It's empty here.</p></th></tr>
                            
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive hidden" id="to-schools">
                            <table class="table table-striped mb-0 mw-1000" id="data-table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Receiver schools</th>
                                    <th>Status + Date</th>
                                    <th>Message</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody> 
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                                
                                            <img src="" class="table-avatar communication-avatar">
                                        
                                            <a href=""><strong>First name and Last name</strong></a>
                                        
                                            <strong class="text-primary">messaeg name</strong>
                                            
                                            <span class="communication-contact">Contact</span></td>
                                        <td>sent at<br> 
                                            <span class="badge badge-success">Sent</span> 
                                            <span class="badge badge-danger">Failed</span> 
                                            <span class="badge badge-primary">SMS</span> 
                                            <span class="badge badge-secondary">Email</span> 
                                        </td>
                                        <td>
                                            Message
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm btn-icon "  modal="#read"><i class=" mdi mdi-email-outline"></i>  Read Message</button>
                                            <button class="btn btn-danger btn-sm send-to-server-click" data=" " url=" " loader="true"><i class="mdi mdi-delete"></i></button>
                                        </td>
                                    </tr>
                                
                                    <tr><th colspan="7"><p class="text-muted text-center">It's empty here.</p></th></tr>
                            
                                </tbody>
                            </table>
                        </div>




                    </div>
                </div>
            </div> 
        </div>
    </div> 
    



    @include("admin/email/communication")  
    @include("admin/sms/communication")  
    @include("admin/read/communication")  
    @include('../layouts/includes/footer') 
    <script>
        $(document).ready(function() {
            $('#communication > li > a').on('click touchstart', function(e){
                e.preventDefault();

                var data = $(this).attr('rel');
                $('.active').removeClass('active'); 
                $(this).addClass('active');
               
                $('#communication-content > div.d-block').removeClass('d-block');
                $('#'+data).addClass('d-block');

            })
        });
    </script>
@endsection
