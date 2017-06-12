@extends('layouts.app')
@section('content')

<div class="container">
   <table class="table table-hover">
     <thead>
        <tr>
           <th>Code</th>
           <th>Name</th>
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
       </tr>
        @endforeach
   </tbody>
 </table>

 <a href="{{ url('/admin/add') }}">
    <button class="btn btn-primary">
      Add Procedure
    </button>
 </a>




@endsection
