<!DOCTYPE html>
<html lang="en">
    <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Login</title>
            
                <!-- css File  -->
                  <link   href="css/bootstrap.min.css"     rel="stylesheet">
                  <link   href="css/font-awesome.min.css"  rel="stylesheet">
                  <link   href="css/login.css"             rel="stylesheet">
                <!-- fonts  -->
                <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
            
                <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                <!--[if lt IE 9]>
                  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->
    </head>
    <body>
            
        <div class="container-login">
                
            <div class="warpper-login">
                <h3 class="form-title text-center">ACCOUNT LOGIN </h3>
                <form class="form-horizontal loginForm" method="POST" action="{{ route('login.custom') }}">
                    {{ csrf_field() }}
                    <!-- Start Show Flash Message When Failed Login -->
                    @if (session()->has('errorLogin'))
                    <div class="alert alert-danger col-md-12">
                        {{session()->get('errorLogin')}}
                    </div>
                    @endif
                    <!-- End Show Flash Message When Failed Login -->    
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class=" control-label">E-Mail Address</label>
                        
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        
                    </div>
                
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class=" control-label">Password</label>
                
                        
                            <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        
                    </div>
                
                    <div class="form-group">
                        
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        
                    </div>
                
                    <div class="form-group">
                        
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        
                    </div>
                </form>
            </div>
                    
        </div>      
           
    </body>
</html>
