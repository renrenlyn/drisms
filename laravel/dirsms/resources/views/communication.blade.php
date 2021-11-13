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


        <!-- page content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-body p-0">

                        <ul class="nav nav-tabs">
                          <li><a href=""    class="active" >To Users</a></li>
                          <li><a href="?view=branches")  class="active">To Branches</a></li>
                           
                          <li><a href="?view=schools")  class="active" >To Schools</a></li>
                          
                        </ul>
                            <div class="table-responsive">
                            <table class="table table-striped mb-0 mw-1000" id="data-table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Receiver</th>
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
                                            <button class="btn btn-primary btn-sm btn-icon fetch-display-click" data=" " url=" " holder=".message-holder" modal="#read" loader="true"><i class=" mdi mdi-email-outline"></i>  Read Message</button>
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
            $('#data-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5'
                ]
            });
        });
    </script>
@endsection
