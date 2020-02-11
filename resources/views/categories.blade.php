@extends('layouts.main')

@section('content')
    <section class="categories">
        <div class="jumbotron">
            <div class="container" style="min-height: 80vh; margin-bottom: -3vh">
            <h1>Categories</h1>
            <div class="row" style="justify-content:space-around; padding-top: 20px;" >
                @foreach($categories as $key => $category)
                    <h3><a href="/categories/{{ $key }}" style="color:mediumseagreen;">{{ $category }}</a></h3>
                @endforeach
            </div>
        </div>
        </div>
    </section>
@endsection
