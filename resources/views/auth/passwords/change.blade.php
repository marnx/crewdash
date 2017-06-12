@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Change Password</div>
                    <div class="panel-body">
                        <form action="/profile/{!! $auth->employeenumber !!}/change/password" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group{{ $errors->has('oldpassword') ? ' has-error' : '' }}">
                                <label for="oldpassword" class="col-md-4 control-label">old password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="oldpassword"
                                           value="{{ old('') }}" required autofocus>
                                    @if ($errors->has(''))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('newpassword') ? ' has-error' : '' }}">
                                <label for="newpassword" class="col-md-4 control-label">new password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="newpassword"
                                           value="{{ old('') }}" required autofocus>
                                    @if ($errors->has(''))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('confirmpassword') ? ' has-error' : '' }}">
                                <label for="confirmpassword" class="col-md-4 control-label">confirm password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="confirmpassword"
                                           value="{{ old('') }}" required autofocus>
                                    @if ($errors->has(''))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Change password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection