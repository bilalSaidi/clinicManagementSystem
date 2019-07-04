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
              <li><a href="{{route('dashDoctor')}}"><i class="fa fa-tachometer text-primary fa-fw" aria-hidden="true"></i> Dashboard</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle info-admin" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {{$setting->name}}
                        <img src="http://127.0.0.1:8000/uploads/Settings/{{$setting->srcProfileImage}}"  alt="profile" class="avatarDoctor">
                        
                        
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="{{route('dashDocotor.setting')}}"><i class="fa fa-wrench fa-fw text-primary" aria-hidden="true"></i> Setting    </a></li>
                      <li><a href="{{route('editProfiles')}}"><i class="fa fa-user fa-fw text-primary" aria-hidden="true"></i> profile</a></li> 
    
                      <li role="separator" class="divider"></li>
                      <li>
                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                              <span class="glyphicon glyphicon-log-out text-danger"></span> Logout
                          </a>
          
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                    </li>
                    </ul>
                  </li>
                
                
              </ul>
         
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    
    <!-- End Nav -->