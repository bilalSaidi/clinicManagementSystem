
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dentist Clinic </title>

    <!-- css File  -->
      <link   href="css/bootstrap.min.css"     rel="stylesheet">
      <link   href="css/font-awesome.min.css"  rel="stylesheet">
      <link   href="css/style.css"             rel="stylesheet">
    <!-- fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Start Navbar -->
    <div class="nav">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('index')}}">dentist clinic</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="#" class="thisPage" data-scroll="doctor">doctor</a></li>
              <li><a href="#" class="thisPage" data-scroll="services">services</a></li>
              <li><a href="#" class="thisPage" data-scroll="info">location</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </div>
    <!-- End Navbar -->
    
    <!-- Start Home -->
    <div class="home">
      <div class="home-cover">
        <button data-scroll="appointment" class="takeDate">Take A Date <br><i class="fa fa-calendar fa-2x"></i></button>
        
        <div class="OpeningHour col-md-12">
            
            <h3><i class="fa fa-clock-o"></i> Opening clinic</h3>
            <div class="timeTable">
              <ul class="list-unstyled">
               
                <h4>Days : </h4>
                <li>{{$setting->startday}}-{{$setting->endday}}</li>
                <h4>Hours :</h4>
                <li>
                  <span class="time">{{$setting->StartMorningHour}} Am To {{$setting->EndMorningHour}} Am </span>
                </li>
                <li>
                  <span class="time">{{$setting->StartEveningHour}} Am To {{$setting->EndEveningHour}} Am </span>
                </li>
              </ul>
            </div>
        </div>
        <!-- Start Show Message Error When User Take Appointment And Dont Have profile -->
          @if (session()->has('NoProfile'))
                   <div class="alert alert-danger" style="margin-top:43px;">
                      {{session()->get('NoProfile')}}
                   </div>            
          @endif
        <!-- End Show Message Error When User Take Appointment And Dont Have profile -->
        <!-- Start Show Message Error When User Already In Waiting List -->
        @if (session()->has('ExistinWaitingList'))
                   <div class="alert alert-danger" style="margin-top:43px;">
                      {{session()->get('ExistinWaitingList')}}
                   </div>            
        @endif
        <!-- End Show Message Error When User Already In Waiting List -->
        @if (session()->has('successAppointement'))
                   <div class="alert alert-success" style="margin-top:43px;">
                      {{session()->get('successAppointement')}}
                   </div>            
          @endif
                
      </div>
      
      
      
    </div>
    
    <!-- End Home -->

    <!-- Start Doctor -->
    <div class="doctor" id="doctor">
      <div class="container">
        <div class="col-md-6">
          <img src="uploads/Settings/{{$setting->srcProfileImage}}">
        </div>
        <div class="col-md-6">
          <h2>{{$setting->name}}</h2>
          <p class="Experinces">{{$setting->Experinces}}</p>
          <ul class="moreInfo list-unstyled">
            <li>
              <div class="title">contact</div>
              <div class="desc">{{$setting->Phone}}</div>
            </li>
            <li>
              <div class="title">More Information </div>
              <div class="desc ">{{$setting->MoreInformation}}</div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- End Doctor -->
    <!-- Start Services -->
    <div class="services" id="services">
      <div class="container">
        <div class="row">
          <h3 class="text-center"> Our Services </h3>
          <!-- Item 01 -->
          <div class="col-md-3 col-sm-4 col-xs-6">
            <div class="ServiceItem">
              <img class="img-responsive" src="uploads/Settings/{{$setting->srcService1}}">
              <p>{{$setting->titleService1}}</p>
            </div>
          </div>
          <!-- Item 02 -->
          <div class="col-md-3 col-sm-4 col-xs-6">
            <div class="ServiceItem">
                <img class="img-responsive" src="uploads/Settings/{{$setting->srcService2}}">
                <p>{{$setting->titleService2}}</p>
            </div>
          </div>
          <!-- Item 03 -->
          <div class="col-md-3 col-sm-4 col-xs-6">
            <div class="ServiceItem">
                <img class="img-responsive" src="uploads/Settings/{{$setting->srcService3}}">
                <p>{{$setting->titleService3}}</p>
            </div>
          </div>
          <!-- Item 04 -->
          <div class="col-md-3 col-sm-4 col-xs-6">
            <div class="ServiceItem">
                <img class="img-responsive" src="uploads/Settings/{{$setting->srcService4}}">
                <p>{{$setting->titleService4}}</p>
            </div>
          </div>
          <!-- Item 05 -->
          <div class="col-md-3 col-sm-4 col-xs-6">
            <div class="ServiceItem">
                <img class="img-responsive" src="uploads/Settings/{{$setting->srcService5}}">
                <p>{{$setting->titleService5}}</p>
            </div>
          </div>
          <!-- Item 06 -->
          <div class="col-md-3 col-sm-4 col-xs-6">
            <div class="ServiceItem">
                <img class="img-responsive" src="uploads/Settings/{{$setting->srcService6}}">
                <p>{{$setting->titleService6}}</p>
            </div>
          </div>
          <!-- Item 07 -->
          <div class="col-md-3 col-sm-4 col-xs-6">
            <div class="ServiceItem">
                <img class="img-responsive" src="uploads/Settings/{{$setting->srcService7}}">
                <p>{{$setting->titleService7}}</p>
            </div>
          </div>
          <!-- Item 08 -->
          <div class="col-md-3 col-sm-4 col-xs-6">
            <div class="ServiceItem">
                <img class="img-responsive" src="uploads/Settings/{{$setting->srcService8}}">
                <p>{{$setting->titleService8}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Services -->
    <!-- start APPOINTMENT -->
    <div class="appointment" id="appointment">
      <div class="container">
        <div class="col-md-6 col-sm-10">
          <form action="{{route('waitingList.create')}}" method="POST">
            {{ csrf_field() }}
            <h3>Make An Appointment </h3>
            <div class="col-md-6">
              <label for="exampleInputEmail1">FIRST NAME * </label>
              <input type="text" name="firstName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>
            <div class="col-md-6">
              <label for="exampleInputEmail1"> LAST NAME * </label>
              <input type="text" name="LastName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>
            <div class="col-md-12">
              <label for="exampleInputPassword1">Phone NUMBER * </label>
              <input type="txt" name="Phone" class="form-control" id="exampleInputPassword1" placeholder="Number">
            </div>
            
            
            <p class="MoreInfomration">
              <span class="remarque">remarque : </span><br>
              <ul>
                <li> {{$setting->note1}}</li>
                <li>{{$setting->note2}}</li>
              <li> {{$setting->note3}}</li>
              </ul>
            </p>
            <button type="submit" class="btn ">confirm</button>
            <p>New Patient ? <a href="{{route('newProfile')}}">Create New Profile </a></p>
          </form>
        </div>
        <div class="col-md-6  hidden-sm hidden-xs ">
          <img src="image/img-1.png">
        </div>
      </div>
    </div>
    <!-- End  APPOINTMENT -->
    <!-- Start location -->
    <div class="location" id="info">
      <div class="container">
        <div class="col-md-12 col-sm-12">
              <div class="map-location">
                <div class="iframe-container">
                    
                    
                    <img class="img-responsive" src="uploads/Settings/{{$setting->location}}" width="100%">
                    
                </div>
              </div>
        </div>
      </div>
    </div>
    <!-- End  location -->

    <!-- Start Footer -->
    <div class="footer">
            <div class="container">
                <div class="col-md-8">
                  <div class="description-location">
                                <h3>Contact Info </h3>
                                <ul class="list-unstyled">
                                  <li>
                                     <i class="fa fa-map-marker" aria-hidden="true"></i>
                                     {{$setting->Adress}}
                                 </li>
                                  <li>
                                     <i class="fa fa-phone" aria-hidden="true"></i>{{$setting->Phone}}
                                   </li>
                                  <li>
                                     <i class="fa fa-fax" aria-hidden="true"></i>{{$setting->Fax}}
                                   </li>
                                  <li>
                                     <i class="fa fa-envelope-o" aria-hidden="true"></i>{{$setting->Email}}
                                   </li>
                                </ul>
                  </div>
                </div>
                    
                    
                </div>
                <!-- Admin Login -->
                <div class=" col-md-2 pull-right admin-login">
                    @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a  href="
                             {{
                                Auth::id() == 1  ? route('dashDoctor') : route('dashReception') 
                              }}
                             "> Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">Admin Login -></a>
                            <!-- <a href="{{ route('register') }}">Register</a> -->
                        @endauth
                    </div>
                    @endif
                </div>
                <div class="clearfix"></div>
                <p class="text-center" id="myText">Design and programing by
                        <span ><i class="fa fa-heart"></i></span> Bilal Saidi  &copy; <script>document.write(new Date().getFullYear());</script>
                </p>
            </div>
    </div>
    <!-- End Footer -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugin.js"></script>

  </body>
</html>

