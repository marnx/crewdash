@extends('layouts.app')
@section('content')

    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Options</th>
            </tr>
            </thead>
            <!--
            | In de $foreach instructie geven we daarin een $procedures aan.
            | Dat is een lijst van variabelen en die willen we als apart doorheen lopen.
            | Het wilt zeggen dat we elke procedure behandelen in de lijst.  -->
            <tbody>
            @foreach($procedures as $procedure)
                <tr>
                    <td>{{$procedure->code}}</td>
                    <td>{{$procedure->name}}</td>
                    <td>
                        <a title="Download" href="upload_procedures/{{$procedure->name_file}}"><i class="glyphicon glyphicon-download-alt"></i></a>
                        <a title="Start test" href="#"><i class="glyphicon glyphicon-education"></i></a>
                        <a title="Comment" href="#"><i class="glyphicon glyphicon-comment"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
