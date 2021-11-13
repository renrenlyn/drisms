
<!-- Send Email-->
<div class="modal right fade" id="sendemail{{$school->id}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"><i class="mdi mdi-close-circle-outline"></i></span></button>
                <h4 class="modal-title" id="myModalLabel2">Send Email</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('school.email') }}" method="post">

                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Subject</label> 
                                <input class="form-control" name="subject_m" placeholder="Subject" type="text" required="">
                                <input class="form-control" name="school_email" type="hidden" value="{{$school->email}}">
                                <input class="form-control" name="school_name" type="hidden" value="{{$school->name}}"> 
                           
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Message</label> 
                                <textarea class="form-control" name="message" placeholder="Message" rows="6" required=""></textarea>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">Send Email</button>
                            </div>
                        </div>
                    </div> 
                </form>
            </div>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div>
<!-- end Send Email-->
