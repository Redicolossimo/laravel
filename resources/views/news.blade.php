@extends('layouts.main')

@section('content')
    <div class="jumbotron">
    <div class="container" style="min-height: 80vh; margin-bottom: -3vh">
        <!-- Example row of columns -->
        @if(isset($category))
            <h1>{{ $category }}</h1>
        @else
            <h1>News</h1>
        @endif
        <div class="row">
                @foreach($news as $key => $body)
                    <div class="news-block col-sm-12 col-md-6 col-lg-4 col-xl-3" style="padding-top: 20px">
                            <a style="text-decoration: #2fa360; text-underline-color:mediumseagreen" href="/news/{{ $key }}">
                                <div>
                                    <img src="{{ $body['newsImg'] }}" alt="news_img">
                                </div>
                                <div style="padding:20px 0 0 50px; color:mediumseagreen;">
                                    <p >{{ $body['heading'] }}</p>
                                </div>
                            </a>
                    </div>
                @endforeach
        </div>
    </div> <!-- /container -->
    </div>
@endsection
