
<!-- Send SMS-->
<div class="modal right fade" id="sendsms" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"><i class="mdi mdi-close-circle-outline"></i></span></button>
                <h4 class="modal-title" id="myModalLabel2">Send SMS</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('School@sendsms') }}" class="simcy-form" data-parsley-validate=""  loader="true" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Message</label> 
                                <textarea class="form-control" placeholder="Message" name="message" rows="6" required=""></textarea>
                                <input name="csrf-token" type="hidden" value="{{ csrf_token() }}">
                                <input name="schoolid" type="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">Send SMS</button>
                            </div>
                        </div>
                    </div> 
                </form>
            </div>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- end SMS-->