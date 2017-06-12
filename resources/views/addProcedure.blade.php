@extends('layouts.app')

@section('content')
    @if (auth()->check())
        @if (auth()->user()->isAdmin())
            <div class="container">
                <!-- Hieronder staat de upload file systeem waar de procedure toegevoegd kan worden. -->
                <div class="addprocedurefield">
                    <form action="store" method="post" enctype="multipart/form-data">

                        <!-- De procedure heeft een Code die ingevoerd moet worden -->
                        <label for="name">Code</label>
                        <input type="text" placeholder="Enter code of procedure" name="code"
                               value="{{Request::old('code')}}"></br>
                        @if ($errors->has('code')) <p class="help-block">{{$errors->first('code')}}</p> @endif

                    <!-- De procedute heeft ook een naam die ingevoerd kan worden -->
                        <label for="name">Name</label>
                        <input type="text" placeholder="enter name of procedure" name="name"
                               value="{{Request::old('name')}}"></br>
                        @if ($errors->has('name')) <p class="help-block">{{$errors->first('name')}}</p> @endif

                        <label for="file"></label>
                        <input type="file" name="filename"></br>
                        @if ($errors->has('filename')) <p class="help-block">{{$errors->first('filename')}}</p> @endif

                    <!--
                    | De csrf_token is methode in programmeren.
                    | Het biedt eenvoudig bescherming tege Cross Site Request Vervalsingen.
                    | Dit type aanval vindt plaats wanneer  een kwaadaardige website een link,
                    | een vorm knop of een JavaScript die bedoeld is om wat actie op uw website uit te voeren,
                    | met behulp van de geloofsbrieven van een ingelogde gebruiker die de kwaadaardige site bezoekt in hun browser bevat.-->
                        <input type="hidden" name="_token" value="{{csrf_token()}}">


                        <!-- De procedute heeft ook een naam die ingevoerd kan worden -->
                        <label for="name">Name</label>
                        <input type="text" placeholder="enter name of certificate" name="certificate_name"
                               value="{{Request::old('name')}}"></br>
                        @if ($errors->has('name')) <p class="help-block">{{$errors->first('name')}}</p> @endif


                        <label for="file"></label>
                        <input type="file" name="certificate_filename"></br>
                        @if ($errors->has('filename')) <p class="help-block">{{$errors->first('filename')}}</p> @endif


                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <!-- Knop Addprocedure -->
                        <button type="submit" class="btn btn-primary">
                            Add Procedure
                        </button>
                    </form>
                </div>
            </div>
        @else
            <p>
                You're not admin!
            </p>
        @endif
    @endif
@endsection