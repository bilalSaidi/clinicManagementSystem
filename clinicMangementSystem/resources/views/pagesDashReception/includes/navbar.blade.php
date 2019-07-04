<!-- Start Nav -->

<nav class="navbar navbar-default">

        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('index')}}">
                <i class="fa fa-stethoscope" aria-hidden="true"></i>  Medical Clinic
            </a>
          </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="{{route('waitingList')}}"><span class="glyphicon glyphicon-time text-primary"></span> Waiting List </a></li>
              <li><a href="{{route('patients')}}"><span class="glyphicon glyphicon-user text-primary"></span> Patient</a></li>
              <li><a href="{{route('ClinicAppointment')}}"><span class="glyphicon glyphicon-calendar text-primary"></span> Clinic Appointment</a>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <span class="glyphicon glyphicon-log-out"></span> Logout
                    </a>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
              </li>
              
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    
    <!-- End Nav -->