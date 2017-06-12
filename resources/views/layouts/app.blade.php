<?php
function current_page($uri = '/')
{
    return strstr(request()->path(), $uri);
}
?>

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
    <link href="/css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
        body {
            background-color: #DEDEDE;
        }

        #banner-img {
            padding: 10px 0 10px 0;
        }

        .navbar {
            background-color: #ffffff;
        }

        .panel {
            border-color: #454545;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top" style="position: relative;">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                @if (auth()->check())
                <a class="navbar-brand" href="/profile/{!! $auth->employeenumber !!}">
                </a>
                @else

                @endif
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <a href="/profile/@if (auth()->check()) {!! $auth->employeenumber !!} @else @endif">
                        <img id="banner-img"
                             src="/img/ooslogo.jpg">
                    </a>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right" style="bottom: 10px;right: 301px;position: absolute">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <!-- <li><a href="{{ url('/') }}">Login</a></li> -->
                        <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
                    @else
                    <!--######                          <li class="dropdown">                                                                                                     ######-->
                        <!--######                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">                       ######-->
                    <!-- {{ Auth::user()->name }} <span class="caret"></span>
                        </a> -->

                        <!--===============================================================================Toegevoegd voor presentatie===============================================================================-->
                        <table>
                            <tr style="text-align: right">
                                <td>
                                </td>
                                <td style="padding: 0 0 10px 0;">
                                    <a href="#"><img
                                                src="/img/br.png"></a>
                                    <a href="#"><img
                                                src="/img/gb.png"></a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0 10px 0 0;">
                                    <button class="btn btn-primary" href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
                                        Logout
                                    </button>
                                </td>
                                <td>
                                    <form action="{{ url('/search') }}" method="GET">
                                        <div class="input-group">
                                            <span type="submit" class="input-group-addon glyphicon glyphicon-search"></span>
                                            <input class="form-control"  name="keyword">
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </table>
                        <!--===============================================================================Toegevoegd voor presentatie===============================================================================-->

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div id="menubar" class="noselect">
        <ul>
            @if (auth()->check())
                <a href="/profile/{!! $auth->employeenumber !!}"><li {{ (current_page('profile')) ? 'class=active': '' }}>Profile</li></a>
            <a href="{{ url('/procedures') }}"><li {{ (current_page('procedures')) ? 'class=active': '' }}>Procedures</li></a>
            <a href="{{ url('/certificates') }}"><li {{ (current_page('certificates')) ? 'class=active': '' }}>Certificates</li></a>
                @if (auth()->user()->isAdmin())
                    <a href="{{ url('/admin/add') }}"><li {{ (current_page('/admin')) ? 'class=active': '' }}>Upload</li></a>
                    <a href="{{ url('/register') }}"><li {{ (current_page('/register')) ? 'class=active': '' }}>Register</li></a>
                @else

                @endif
            @else
                <a href="{{ url('/') }}"><li>Login</li></a>
            @endif
        </ul>
    </div>

    @yield('content')
</div>
<div class="footer"></div>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
