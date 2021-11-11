
    <!-- Add Payment -->
    <div class="modal right fade" id="addpayment" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close-circle-outline"></i></span></button>
                        <h4 class="modal-title" id="myModalLabel2">Add Payment</h4>
                    </div>

                    <div class="modal-body">
                        <form class="simcy-form" data-parsley-validate="" method="POST" action="" loader="true">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Amount (Currency)</label>
                                        <input type="number" class="form-control" placeholder="Amount" name="amount" required>
                                       
                                        <input type="hidden" name="invoice">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Date</label>
                                        <input type="text" class="form-control datepicker" placeholder="Date" name="payday" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="email">Method of payment</label>
                                        <select class="form-control" name="method" required>
                                            <option value="">Select Payment Method</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Mpesa">Mpesa</option>
                                            <option value="Paypal">Paypal</option>
                                            <option value="Card">Card</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-block" type="submit">Add Payment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div><!-- modal-content -->
            </div><!-- modal-dialog -->
        </div>
    <!-- end Add payment -->

    <!-- update -->
    <div class="modal right fade" id="update" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"><i class="mdi mdi-close-circle-outline"></i></span></button>
                    <h4 class="modal-title" id="myModalLabel2">Invoice Info</h4>
                </div>
                <div class="update-holder"></div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div>
    <!-- end update -->
