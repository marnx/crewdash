@extends('layouts.app')

@section('content')
    <?php
    function currentPage($uri = '/')
    {
        return strstr(request()->path(), $uri);
    }
    ?>
    <div class="container">
    <div class="row">
        <div class="col-md-4">
            <div>
                <div class="profile">
                    <img class="profile-img" src="http://budhubz.com/wp-content/themes/budhubs/images/noavatar.png">
                    <h4>{{ $auth->firstname }} {{ $auth->surname }}</h4>
                </div>
                <div class="account-menu noselect">
                    <ul>
                        <a href="/profile/{!! $auth->employeenumber !!}"><li {{ (currentPage('profile')) ? 'class=active': '' }}><span class="glyphicon glyphicon-user"></span>My profile</li></a>
                        <a href="/profile/{!! $auth->employeenumber !!}/change"><li {{ (currentPage('change')) ? 'class=active': '' }}><span class="glyphicon glyphicon-lock"></span>Change password</li></a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <table style="text-align: left;">
                        <th><h3>{{ $user->firstname . " " . $user->surname}}'s profile</h3><br/></th>
                        <tr>
                            <td>Employee number</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;padding: 3px;">{{ $user->employeenumber }}</td>
                        </tr>
                        <tr>
                            <td>First name</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;padding: 3px;">{{ $user->firstname }}</td>
                        </tr>
                        <tr>
                            <td>Surname</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;padding: 3px;">{{ $user->surname }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 3px;">Email</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;padding: 3px;">{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;padding: 3px;">{{ Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->age }}</td>
                        </tr>
                        <tr>
                            <td>Vessel</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;padding: 3px;">{{ $user->vessel }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
