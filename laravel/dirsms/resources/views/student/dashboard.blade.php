
    <style> 
        #theoretical>a:hover, #theoretical>a{
            color:#38c172;
            text-decoration: none;
        }
        
        #practical>a:hover, #practical>a{
            color: #e3342f;
            text-decoration: none;
        }
         
  </style>
<div class="page-header">
    <a href="{{ route('student.scheduling') }}" class="btn btn-success btn-icon pull-right">
        <i class="mdi mdi-calendar-text"></i> 
        Scheduling 
    </a>
    <h3>Dashboard</h3>
</div>  

<div class="row"> 
    <!-- stat 1 -->
    <div class="col-md-3">
        <div class="card widget" id="theoretical">
            <a href="{{ route('schedule.theoretical')}}" > 
                <div class="widget-icon widget-success">
                    <i class="mdi mdi-blur-radial"></i>
                </div>
                <div class="widget-title">
                    <h2>Theoretical</h2>
                    <p>School Schedule</p>
                </div>  
            </a>
        </div>
    </div>
    <!-- stat 2 -->
    <div class="col-md-3">
        <div class="card widget" id="practical"> 
            <a href="{{ route('schedule.practical')}}" > 
                <div class="widget-icon widget-danger">
                    <i class="mdi mdi-car-connected"></i>
                </div>
                <div class="widget-title">
                    <h2>Practical</h2>
                    <p>Fleet Schedule</p>
                </div> 
            </a>
        </div>
    </div> 
</div>
 