
<!-- modals -->
<div class="modal right fade" id="create{{$user->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close-circle-outline"></i></span></button>
                    <h4 class="modal-title">Add {{ $user->fname}}</h4>
                </div>

                <div class="modal-body">
                    <form class="simcy-form" data-parsley-validate="" action="{{ url('Instructor@create') }}" method="POST" loader="true">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            
                          </div>
                        </div>
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" name="fname" required>
                        <input type="hidden" value="{{csrf_token()}}" name="csrf-token">
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name" name="lname" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label>Email Address</label>
                            <input type="text" class="form-control" placeholder="Email Address" name="email" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" placeholder="Phone Number" name="phone" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="email">Gender</label>
                            <select class="form-control" name="gender" required>
                                <option>Male</option>
                                <option>Female</option>
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

