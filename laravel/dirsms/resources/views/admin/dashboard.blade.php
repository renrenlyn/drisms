
    <div class="page-header">
        <a href="" class="btn btn-success btn-icon pull-right"><i class="mdi mdi-calendar-text"></i> Scheduling </a>
        <h3>Dashboard</h3>
    </div>
        <!-- stats -->
        <div class="row">

            <!-- stat 1 -->
            <div class="col-md-4">
                <div class="card widget">
                    <div class="widget-icon widget-primary">
                        <i class="mdi mdi-account-convert"></i>
                    </div>
                    <div class="widget-title">
                        <h2>{{ $cstudent  }}</h2>
                        <p>Total Students</p>
                    </div>
                    <div class="widget-trend">
                        <p class="text-primary">
                            <i class="mdi mdi-menu-up"></i> 
                            growth student 
                        </p>
                    </div>
                </div>
            </div>

            <!-- stat 1 -->
            <div class="col-md-4">
                <div class="card widget">
                    <div class="widget-icon widget-warning">
                        <i class="mdi mdi-account-multiple-outline"></i>
                    </div>
                    <div class="widget-title">
                        <h2> {{ $cinstructor }} </h2>
                        <p >Total Instructors</strong></p>
                    </div>
                    <div class="widget-trend">
                        <p class="text-warning">
                            <i class="mdi mdi-menu-up"></i> 
                            growth income 
                        </p>
                    </div>
                </div>
            </div> 
            <!-- stat 1 -->
            <div class="col-md-4">
                <div class="card widget">
                    <div class="widget-icon widget-success">
                        <i class="mdi mdi-calendar-clock"></i>
                    </div>
                    <div class="widget-title">
                        <h2>0</h2>
                        <p>Class Attendance</p>
                    </div>
                    <div class="widget-trend">
                        <p class="text-success"><i class="mdi mdi-menu-up"></i> growth attendance</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- students growth -->
        <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                                <h5>Students Growth</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-6 growth-left">
                                    <div class="growth-heading">
                                        <h2>{{ $cnew_student }}</h2>
                                        <p>New Students (Last 30 Days)</p>
                                    </div>
                                    <div class="growth-pointers">
                                        <div class="growth-icon success">
                                            <i class="mdi mdi-menu-up"></i>
                                        </div>
                                        <div class="growth-message">
                                            <p>You have <strong class="text-success">100% Growth</strong> in comparison to the previous month.</p>
                                        </div>
                                    </div>
                                    <div class="growth-pointers">
                                        <div class="growth-icon warning">
                                            <i class="mdi mdi-menu-right"></i>
                                        </div>
                                        <div class="growth-message">
                                            <p>Payments perfomance has had a <strong class="text-warning">100% perfomance</strong> in comparison to the previous month.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="student-growth-chart mt-15"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        

        <!-- page content -->
        <div class="row">

            <!-- course sales -->
            <div class="col-md-6">
                <div class="card">
                        <div class="card-header">
                                <h5>Course Available</h5>
                        </div>
                        <div class="card-body p-0 comparison-widget">
                            <!-- <p>Different course sales comparison.</p> -->
                              <!-- Canvas for Chart.js -->
                              <canvas id="canvas" class="mt-40" height="200"></canvas>
                              
                              <!-- Custom tooltip canvas -->
                              <canvas id="tooltip-canvas" width="150" height="100"></canvas>
                              
                              <!-- Reload button -->
                              <div class="chart-icon"><i class="mdi mdi-chart-bubble"></i></div>

                              <p class="schedule-map text-center mb-40">Comparison of all course available in <strong>( &#8369; )</strong></p>
                        </div>

                </div>
            </div>

            <!-- Activity -->
            <div class="col-md-6">
                <div class="card">
                        <div class="card-header">
                                <h5>Recent Activities</h5>
                        </div>
                        <div class="card-body p-0">
                            
                                <div class="notifications-widget">
 
                                    <!-- single notification -->
                                            
                                    @forelse($notifications as $notification)
                                        <div class="single-notification"> 
                                            @if ( $notification->type == "message" )
                                                <div class="notification-icon bg-purple">
                                                    <i class=" mdi mdi-message-text-outline"></i>
                                                </div>
                                            @elseif ( $notification->type == "delete" )
                                                <div class="notification-icon bg-danger"> 
                                                    <i class=" mdi mdi-delete"></i> 
                                                </div>
                                            @elseif ( $notification->type == "calendar" )
                                                <div class="notification-icon bg-secondary"> 
                                                    <i class=" mdi mdi-calendar"></i> 
                                                </div>
                                            @elseif ( $notification->type == "newaccount" )
                                                <div class="notification-icon bg-warning"> 
                                                    <i class="mdi mdi-account-plus"></i>  
                                                </div>
                                            @elseif ( $notification->type == "payment" )
                                                <div class="notification-icon bg-success"> 
                                                    <i class="mdi mdi-credit-card"></i> 
                                                </div>
                                            @endif 
                                                <div class="notification-message">
                                                    <div class="notification-date">{{ date('F j, Y h:ia', strtotime($notification->created_at)) }}</div>
                                                    {!! $notification->message !!} 
                                                </div> 
                                        </div>
                                    @empty 
                                        @include("admin/empty/empty") 
                                    @endforelse


                                    
                                    <p class="text-center view-all-last"><a href=""><strong>View All</strong></a></p>
                                   
                                </div>
                        </div>

                </div>
            </div>
        </div>