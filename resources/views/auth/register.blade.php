<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Lapor IMB</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ asset ('vendors/bootstrap/dist/css/bootstrap.min.css') }} " rel="stylesheet" />
    <link href="{{ asset ('vendors/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet" />
    <link href="{{ asset ('vendors/themify-icons/css/themify-icons.css') }} " rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset ('css/main.css') }}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="{{ asset ('css/pages/auth-light.css') }}" rel="stylesheet" />
</head>

<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
        {{-- <img style="width:20%" src="{{ asset ('img/brebes.png')}}" alt=""> --}}
        </div>
        <form id="register-form" action="{{ route('register') }}" method="post">
        @csrf
            <h4 class="login-title">PT. Indonesia Merdeka Belajar</h4>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                    <input id="name" placeholder="username" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif  
                     </div>
                </div>
            </div>
            <div class="form-group">
            <input id="email" type="email" placeholder="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif   
            </div>
            <div class="form-group">
            <input id="password" type="password" placeholder="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif    
            </div>
            <div class="form-group">
                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>    
            </div>
            <div class="form-group text-left">
                <label class="ui-checkbox ui-checkbox-info">
                    <input type="checkbox" name="agree">
                    <span class="input-span"></span>I agree the terms and policy</label>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Sign up</button>
            </div>
     
            <div class="text-center">Already a member?
                <a class="color-blue" href="{{ route('login') }}">Login here</a>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <!-- <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div> -->
    <!-- END PAGA BACKDROPS-->
     <!-- CORE PLUGINS -->
     <script src="{{ asset ('vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset ('vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset ('vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="{{ asset ('vendors/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset ('js/app.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#register-form').validate({
                errorClass: "help-block",
                rules: {
                    first_name: {
                        required: true,
                        minlength: 2
                    },
                    last_name: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        confirmed: true
                    },
                    password_confirmation: {
                        equalTo: password
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>