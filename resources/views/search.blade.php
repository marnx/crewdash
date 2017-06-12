@extends('layouts.app')
@section('content')

    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Employee Number <a
                            @if(app('request')->input('employeenumber') == 'desc')
                            class="glyphicon glyphicon-chevron-up"
                            href="{{ route('search.index',['keyword' => request('keyword'), 'employeenumber' => 'asc']) }}"
                            @else
                            class="glyphicon glyphicon-chevron-down"
                            href="{{ route('search.index',['keyword' => request('keyword'), 'employeenumber' => 'desc']) }}"
                            @endif
                            style="text-decoration: none;color: black;"></a></th>
                <th>Name <a
                            @if(app('request')->input('name') == 'desc')
                            class="glyphicon glyphicon-chevron-up"
                            href="{{ route('search.index',['keyword' => request('keyword'), 'surname' => 'asc']) }}"
                            @else
                            class="glyphicon glyphicon-chevron-down"
                            href="{{ route('search.index',['keyword' => request('keyword'), 'surname' => 'desc']) }}"
                            @endif
                            style="text-decoration: none;color: black;"></a>
                </th>
                <th>E-mail <a
                            @if(app('request')->input('email') == 'desc')
                            class="glyphicon glyphicon-chevron-up"
                            href="{{ route('search.index',['keyword' => request('keyword'), 'email' => 'asc']) }}"
                            @else
                            class="glyphicon glyphicon-chevron-down"
                            href="{{ route('search.index',['keyword' => request('keyword'), 'email' => 'desc']) }}"
                            @endif
                            style="text-decoration: none;color: black;"></a></th>
                <th>Age <a
                            @if(app('request')->input('age') == 'desc')
                            class="glyphicon glyphicon-chevron-up"
                            href="{{ route('search.index',['keyword' => request('keyword'), 'age' => 'asc']) }}"
                            @else
                            class="glyphicon glyphicon-chevron-down"
                            href="{{ route('search.index',['keyword' => request('keyword'), 'age' => 'desc']) }}"
                            @endif
                            style="text-decoration: none;color: black;"></a></th>
                <th>Vessel <a
                            @if(app('request')->input('vessel') == 'desc')
                            class="glyphicon glyphicon-chevron-up"
                            href="{{ route('search.index',['keyword' => request('keyword'), 'vessel' => 'asc']) }}"
                            @else
                            class="glyphicon glyphicon-chevron-down"
                            href="{{ route('search.index',['keyword' => request('keyword'), 'vessel' => 'desc']) }}"
                            @endif
                            style="text-decoration: none;color: black;"></a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td><a href="/profile/{!! $user->employeenumber !!}">{{ $user->employeenumber }}</a></td>
                    <td><a href="/profile/{!! $user->employeenumber !!}">{{ $user->firstname }} {{ $user->surname }}</a></td>
                    <td><a href="mailto:{!! $user->email !!}">{{ $user->email }}</a></td>
                    <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->age }}</td>
                    <td>{{ $user->vessel }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>


@endsection
