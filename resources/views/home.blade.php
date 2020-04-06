@extends('layouts.app')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container" style="min-height: 80vh; margin-bottom: -3vh; margin-top:3vh; padding-top: 50px;">


            <h1 class="display-3">This is information/home page</h1>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!
            <p><span style="color:mediumseagreen">This is some information about this project.</span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus architecto, dignissimos ea fugit harum inventore necessitatibus quam ut velit. </p>
            <div style="height:400px">
                <img style="width:100%" src="{{ asset('img/welcome.png') }}" alt="pic">
            </div>
            <p><a class="btn btn btn-lg btn-outline-success my-2 my-sm-0" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>
@endsection
