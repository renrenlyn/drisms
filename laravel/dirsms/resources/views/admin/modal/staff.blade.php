
<!-- modals -->
<div class="modal right fade" id="updateStaff{{$user->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="mdi mdi-close-circle-outline"></i></span></button>
                    <h4 class="modal-title">Permission for {{ $user->fname }} {{$user->lname}} Staff </h4>
                </div>

                <div class="modal-body">
                    <form action="{{ route('staff.update', $user->id)}}" method="POST"  > 
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="email">Scheduling</label>
                            <select class="form-control" name="p_schedule" required>
                                <option value="read_only">Read Only</option>
                                <option value="read_write">Read & Write</option> 
                                <option value="read_write_delete">Read, Write & Delete</option> 
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="email">Students</label>
                            <select class="form-control" name="p_student" required>
                                <option value="read_only">Read Only</option>
                                <option value="read_write">Read & Write</option> 
                                <option value="read_write_delete">Read, Write & Delete</option> 
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="email">Instructor</label>
                            <select class="form-control" name="p_instructor" required>
                                <option value="read_only">Read Only</option>
                                <option value="read_write">Read & Write</option> 
                                <option value="read_write_delete">Read, Write & Delete</option> 
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="email">Fleet</label>
                            <select class="form-control" name="p_fleet" required>
                                <option value="read_only">Read Only</option>
                                <option value="read_write">Read & Write</option> 
                                <option value="read_write_delete">Read, Write & Delete</option> 
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="email">Branch</label>
                            <select class="form-control" name="p_branch" required>
                                <option value="read_only">Read Only</option>
                                <option value="read_write">Read & Write</option> 
                                <option value="read_write_delete">Read, Write & Delete</option> 
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="email">Invoice</label>
                            <select class="form-control" name="p_invoice" required>
                                <option value="read_only">Read Only</option>
                                <option value="read_write">Read & Write</option> 
                                <option value="read_write_delete">Read, Write & Delete</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="email">Courses</label>
                            <select class="form-control" name="p_course" required>
                                <option value="read_only">Read Only</option>
                                <option value="read_write">Read & Write</option> 
                                <option value="read_write_delete">Read, Write & Delete</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="email">School</label>
                            <select class="form-control" name="p_school" required>
                                <option value="read_only">Read Only</option>
                                <option value="read_write">Read & Write</option>
                                <option value="read_write_delete">Read, Write & Delete</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <button class="btn btn-primary btn-block">Update</button>
                          </div>
                        </div>
                      </div>
                    </form>
                </div>

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->

