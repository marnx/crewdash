@extends('layouts.app')

@section('content')
    @if (auth()->check())
        @if (auth()->user()->isAdmin())
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Register</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                        <label for="role" class="col-md-4 control-label"> role </label>


                                        <div class="col-md-6">

                                            <select id="role" name="role" required autofocus>
                                                @foreach($data as $value)
                                                    <option value="name"> {{$value->name}} </option>
                                                @endforeach

                                            </select>


                                            @if ($errors->has('role'))

                                                <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>

                                    </span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="firstname" class="col-md-4 control-label">Name</label>


                                        <div class="col-md-6">
                                            <input id="firstname" type="text" class="form-control" name="firstname"
                                                   value="{{ old('firstname') }}" required autofocus>

                                            @if ($errors->has('firstname'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                                        <label for="surname" class="col-md-4 control-label">surname</label>


                                        <div class="col-md-6">
                                            <input id="surname" type="text" class="form-control" name="surname"
                                                   value="{{ old('surname') }}" required autofocus>

                                            @if ($errors->has('surname'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                            <label for="dob" class="col-md-4 control-label">date of birth</label>


                                            <div class="col-md-6">
                                                <div class="col-md-4">
                                                    <input id="day" type="text" class="form-control" name="day"
                                                           placeholder="Day"
                                                           value="{{ old('dob') }}" required autofocus>
                                                </div>
                                                <div class="col-md-4">
                                                    <input id="month" type="text" class="form-control" name="month"
                                                           placeholder="Month"
                                                           value="{{ old('dob') }}" required autofocus>
                                                </div>
                                                <div class="col-md-4">
                                                    <input id="year" type="text" class="form-control" name="year"
                                                           placeholder="Year"
                                                           value="{{ old('dob') }}" required autofocus>
                                                </div>
                                                @if ($errors->has('dob'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('vessel') ? ' has-error' : '' }}">
                                            <label for="vessel" class="col-md-4 control-label">vessel</label>


                                            <div class="col-md-6">
                                                <select id="vessel" name="vessel" required autofocus>
                                                    <option value="Prometheus">Prometheus</option>
                                                    <option value="Gretha">Gretha</option>
                                                </select>

                                                @if ($errors->has('vessel'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('vessel') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!--Added input for employeenumber-->
                                        <div class="form-group">
                                            <label for="employeenumber" class="col-md-4 control-label">Employee
                                                Number</label>

                                            <div class="col-md-6">
                                                <input id="employeenumber" type="int" class="form-control"
                                                       name="employeenumber"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email"
                                                       value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control"
                                                       name="password"
                                                       required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password-confirm" class="col-md-4 control-label">Confirm
                                                Password</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control"
                                                       name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Register
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p>
                You're not admin!
            </p>
        @endif
    @endif
@endsection
