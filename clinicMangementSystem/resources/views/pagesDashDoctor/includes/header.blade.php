<header>
        <div class="container-fluid">
            <div class="col-md-6">
                <div class="logo">
                <h3> 
                    
                    <span class="glyphicon glyphicon-dashboard"></span>
                    <a href="{{route('dashDoctor')}}"> 
                    MMS  Medical Management System 
                    </a>
                </h3>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="option-tools">
                        <div class="info-profile col-md-3 pull-right">
                                        
                                    <h5 class="text-center">{{$setting->name}}  </h5>
                                    <a href="{{route('dashDocotor.setting')}}">Setting & profile  </a>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    logout
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <img src="uploads/Settings/{{$setting->srcProfileImage}}"  alt="profile">
                        </div>
                    </div>
            </div>
        </div>
</header>