
<!-- modals -->
<div class="modal right fade" id="updateStaff{{$user->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close-circle-outline"></i></span></button>
                    <h4 class="modal-title">{{$user->fname}} {{$user->lname}} Staff</h4>
                </div>

                <div class="modal-body">
                    <form action="#" method="POST"  >
           
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="email">Branch</label>
                            <select class="form-control" name="branch" required>
                                <option value="">Select Branch *</option> 
                                <option value="branch id">Branch Name</option> 
                            </select>
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="email">Permission</label>
                            <select class="form-control" name="permissions" required>
                                <option value="read_write_delete">Read, Write & Delete</option>
                                <option value="read_write">Read & Write</option>
                                <option value="read_only">Read Only</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <button class="btn btn-primary btn-block">Create Account</button>
                          </div>
                        </div>
                      </div>
                    </form>
                </div>

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->

