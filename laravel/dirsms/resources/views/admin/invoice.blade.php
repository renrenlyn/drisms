@extends('layouts.header') 
@section('content')     
        <!-- Admin home page --> 
        <!-- sidebar --> 

    @include("layouts/includes/sidebar")   
    @include("admin/modal/invoice")  

 
  
    <!-- main content -->
    <div class="main-content">
        <div class="page-header">
            <h3>Invoices</h3>
        </div>


        <!-- page content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                        <div class="card-body p-0">
                            <div class="table-responsive longer">
                                <table class="table table-striped mb-0 mw-1000" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student</th>
                                        <th>Ref</th>
                                        <th>Amount</th>
                                        <th>Paid</th>
                                        <th>Balance</th>
                                        <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody> 
                                        <tr>
                                            <th scope="row"> </th>
                                            <td class="p-8">
                                             
                                                <img src="" class="table-avatar communication-avatar">
                                           
                                                <a href=""><strong>First and Llst name </strong></a>
                                                <span class="communication-contact">envoice email</span>
                                            </td>
                                            <td>#Reference</td>
                                            <td>Amoumt </td>
                                            <td>Amount paid</td>
                                            <td>amount - amount paid</td>
                                            <td>Created at</td>
                                            <td class="text-center">
                                                <a class="btn btn-primary btn-sm btn-icon" target="_blank" href=""><i class="mdi mdi-eye"></i> Preview</a>
                                                <div class="dropdown inline-block">
                                                        <button class="btn btn-default btn-sm btn-icofn dropdown-toggle" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                            <li role="presentation"><a role="menuitem" href=""  input="invoice" modal="#addpayment" class="pass-data" value="" > <i class="mdi mdi-credit-card-plus"></i> Add Payment</a></li>
                                                            <li role="presentation"><a role="menuitem" href="" class="fetch-display-click" data="" url="" holder=".update-holder" modal="#update"> <i class="mdi mdi-credit-card"></i> Payments</a></li>
                                                            <li role="presentation"><a role="menuitem" href=""> <i class="mdi mdi-cloud-download"></i> Download</a></li>
                                                            <li role="presentation"><a role="menuitem" href="" class="fetch-display-click" data="" url="" holder=".update-holder" modal="#update"> <i class="mdi mdi-pencil"></i> Edit</a></li>
                                                            <li role="presentation"><a role="menuitem" href="" data="" url="" warning-title="Are you sure?" warning-message="This invoice and it's payments will be deleted." warning-button="Delete" class="send-to-server-click"> <i class="mdi mdi-delete"></i> Delete</a></li>
                                                        </ul>
                                                </div>
                                                
                                            </td>
                                        </tr> 
                                    <tr><th class="text-center" colspan="8">It's empty here!</th></tr>
                                 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div> 
        </div>
    </div>



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
@endsection