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
            <!-- <a class="link">JDIH</a> -->
        </div>
        <form id="login-form" method="POST" action="{{ route('login') }}">
        @csrf

        <h4 class="login-title">PT. Indonesia Merdeka Belajar</h4>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
            <div class="form-group d-flex justify-content-between">
                <label class="ui-checkbox ui-checkbox-info">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="input-span"></span>Remember me</label>
                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Login</button>
            </div>
{{--  
            <div class="text-center">Not a member?
                <a class="color-blue" href="{{ route('register') }}">Create accaunt</a>
            </div> --}}
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
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
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