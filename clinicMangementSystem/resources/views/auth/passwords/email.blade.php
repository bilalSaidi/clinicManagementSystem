<!DOCTYPE html>
<html lang="en">
    <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Login</title>
            
                <!-- css File  -->
                  <link   href="{{ URL::asset('css/bootstrap.min.css') }}"     rel="stylesheet">
                  <link   href="{{ URL::asset('css/font-awesome.min.css') }}"  rel="stylesheet">
                  <link   href="{{ URL::asset('css/login.css') }}"             rel="stylesheet">
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
    
            <div class="col-md-8 col-md-offset-2 wrapper-form">
                    
                        <h3 class="text-center">Reset Password</h3>
            
                        
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
            
                            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}
            
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
            
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Send Password Reset Link
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                
            
            
           
    </body>
</html>

