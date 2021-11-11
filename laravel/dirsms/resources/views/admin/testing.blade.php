@if (\Session::has('image'))
        <div class="alert alert-danger">
            {!! \Session::get('image') !!} 
        </div>
    @endif 

<form method="POST" action="{{ route('course') }}" enctype="multipart/form-data">
                            @csrf
                            <p>Create a new course.</p>
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                                <label>Cover Image</label>

<!-- 
                                <input type="file" name="image_course"  placeholder="Course Cover Image" crop-width="400" crop-height="190" accept="image/*" required="">  -->
                                <input type="file" name="image" class="croppie" placeholder="Course Cover Image" crop-width="400" crop-height="190" accept="image/*" required="">
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                                <label>Course Name</label>
                                <input type="text" value="BSBM" name="name" class="form-control" placeholder="Course Name" required="">
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                                <label>Price ( currency )</label>
                                <input type="number" value="22" name="price" class="form-control" placeholder="Price" required="">
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-6">
                                <label>Duration</label>
                                <input type="number" value="22" name="duration" class="form-control" placeholder="Duration" required="">
                            </div>
                            <div class="col-md-6">
                                <label>Period</label>
                                <select name="period" class="form-control" required="">
                                    <option value="Days">Days</option>
                                    <option value="Weeks">Weeks</option>
                                    <option value="Months">Months</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                                <label>No. of Practical Classes</label>
                                <input type="number" value="22" name="practical_classes" class="form-control" placeholder="No. of Practical Classes" value="0">
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                                <label>No. of Theory Classes</label>
                                <input type="number" value="22" name="theory_classes" class="form-control" placeholder="No. of Theory Classes" value="0">
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                                <label for="email">Instructors</label>
                                <select class="form-control select2" name="instructors[]" multiple="">
                                
                                    <option value="1" selected>Course instructor</option>
                                
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="email">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="Available">Available</option>
                                        <option value="Unavailable">Unavailable</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                                <input class="btn btn-primary btn-block" type="submit" value="Create Course ss"> 
                            </div>
                            </div>
                        </div>
                    </form>