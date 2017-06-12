@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in as an administrator!
                  </br></br>
                    <a href="{{ url('/admin/procedures') }}">
                      <button class="btn btn-primary">
                        Procedures
                      </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
