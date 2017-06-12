<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-Learning OOS</title>
    <link rel="shortcut icon" href="http://oos.vergetest.nl/fav.ico">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
        body {
            background-color: #C7C7C7;
        }
        .panel > .panel-heading {
            background-color: #454545;
            color: white;
        }

        .panel {
            border-color: #454545;
        }
        .input-group > .input-group-addon {
            background-color: #007BE0;
            color: white;
        }
        .footer {
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 2rem;
            background-color: #007BE0;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div style="text-align: center;padding-top: 100px;color: #6B6B6B;font-family: 'Times New Roman';">
                <h1>E-learning website</h1>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Login information</h4></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <!--Login with employeenumber as primary option, but mail is also possible-->
                        <div class="form-group{{ $errors->has('employeenumber') ? ' has-error' : '' }}">
                            <label for="employeenumber" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                                    <input id="employeenumber" type="text" class="form-control" name="employeenumber"
                                           value="{{ old('employeenumber') }}" placeholder="Username" required
                                           autofocus>

                                    @if ($errors->has('employeenumber'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('employeenumber') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"></label>

                            <div class="col-md-4">
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon glyphicon glyphicon-lock"></span>
                                    <input id="password" type="password" class="form-control" name="password"
                                           placeholder="Password"
                                           required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                       <strong>{{ $errors->first('password') }}</strong>
                   </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Password?
                                </a>
                                <!-- <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer"></div>
</body>