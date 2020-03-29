@extends('layouts.app')

@section('title')
    @parent {{ $news->heading }}
@endsection

@section('menu')
    @include('menus.main')
@endsection

@section('content')
    @if (!$news->isPrivate)
        <section class="news-body">
            <div class="jumbotron">
                <div class="container" style="min-height: 80vh; margin-bottom: -3vh; margin-top: 3vh">
                    <h1>{{ $news->heading }}</h1>
                    <div>
                        <img src="{{ $news->newsImg == '' ? asset('http://placehold.it/1000x300') : $news->newsImg}}" alt="news_img" style="padding-top: 40px; width: 100%">
                    </div>
                    <p style="width:100%; padding-top: 40px">
                        <hr> {!! $news->description !!} <hr>
                    </p>
                </div>
            </div>
        </section>
    @else
        <br><br><br><h3>Private territory</h3>
    @endif
@endsection
