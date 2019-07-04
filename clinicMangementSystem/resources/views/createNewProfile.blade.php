<!-- Start Header -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Profile</title>

    <!-- css File  -->
      <link   href="{{asset('css/bootstrap.min.css')}}"     rel="stylesheet">
      <link   href="{{asset('css/font-awesome.min.css')}}"  rel="stylesheet">
      <link   href="{{asset('css/dataTables.bootstrap.min.css')}}"  rel="stylesheet">
      <link   href="{{asset('css/fullcalendar.css')}}"  rel="stylesheet">
      <link   href="{{asset('css/responsive.dataTables.min.css')}}"  rel="stylesheet">
      <link   href="{{asset('css/dashReception.css')}}"             rel="stylesheet">
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

<!-- End Header -->



<!-- Start Content -->
    <!-- Start Setting -->
    <div class="container">
            @if (session()->has('successSendProfile'))
            <div class="alert alert-success">
                {{session()->get('successSendProfile')}}
            </div>
            @endif
            @if (session()->has('Existphone'))
            <div class="alert alert-danger">
                {{session()->get('Existphone')}}
            </div>
            @endif
        <div class="main-content">
            <h3 class="text-center"><span class="glyphicon glyphicon-user text-primary"></span> My Profile </h3>
            
            <!-- Show Error Add Patient -->
            @if(count($errors) > 0 )
            
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        <li >  {{ $error }}</li>
                    </div>
                    @endforeach
                </ul>
            
            @endif

            <form action="{{route('storeProfile')}}" method="POST">
                {{ csrf_field() }}
                <h4 class="text-primary">Personal Information</h4>
                <hr/>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>first Name</label>
                    <input type="text" name="firstName" placeholder="Like : Bilal" class="form-control" value="{{old('firstName')}}" />
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastName" placeholder="Like : Saidi" class="form-control" value="{{old('lastName')}}" />
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label>father Name</label>
                            <input type="text" name="fatherName" placeholder="Like : Saddek" class="form-control" value="{{old('fatherName')}}" />
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>birth Date</label>
                        <input type="date" name="birthDate"  class="form-control" value="{{old('birthDate')}}"/>
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label>Age </label>
                            <input type="number" name="age"  class="form-control" placeholder="like : 22" value="{{old('age')}}"/>
                        </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label style="margin-bottom:10px;display:block;">Gender</label>
                        <input type="radio" name="gender" id="gender-male" value="male" {{old('gender') == 'male' ? 'checked' : ''}} > 
                        <label for="gender-male">Male</label>
                        <input type="radio" name="gender" id="gebder-female" value="female" {{old('gender') == 'female' ? 'checked' : ''}}>
                        <label for="gender-female" >female </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Social Id </label>
                        <input type="text" name="socialId" placeholder="socialId"  class="form-control" value="{{old('socialId')}}"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Type Social Id </label>
                        <select name="idType" class="form-control">
                            <option value=""  >Select Type </option>
                            <option value="Passpoet"  {{old('idType') == 'Passpoet' ? 'selected' : ''}}>Passport</option>
                            <option value="Driver License"  {{old('idType') == 'Driver License' ? 'selected' : ''}} >Driver License</option>
                            <option value="National Id Card"  {{old('idType') == 'National Id Card' ? 'selected' : ''}} >National Id Card</option>
                        </select>
                    </div>
                </div>
                <div class="clearfix"></div>
                <h4 class="text-primary">Contact</h4>
                <hr />
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="like:  bilalBatna05@gmail.com" class="form-control" value="{{old('email')}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                            <label>facebookAcount</label>
                            <input type="text" name="facebookAcount" placeholder="like: https://www.facebook.com/bilal.saidi.311" class="form-control"  value="{{old('facebookAcount')}}"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                            <label>phone</label>
                            <input type="text" name="phone"  class="form-control" placeholder="like : 0668815130"  value="{{old('phone')}}"/>
                    </div>
                </div>
                <div class="clearfix"></div>

                <h4 class="text-primary">Location</h4>
                <hr/>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea rows="3" cols="4" name="adress" class="form-control" placeholder="Like : Djezzar , Batna ">{{old('adress')}}</textarea>
                    </div>
                </div>
                <div class="clearfix"></div>
                <h4 class="text-primary">Confirm </h4>
                <hr/>
                <button type="submit" class="btn btn-primary">Save Profile </button>
                
                
            </form>

        </div>
    </div>
<!-- End Content -->

<!-- Start Footer -->

  @include('pagesDashReception.includes.footer')


<!-- End Footer --> 