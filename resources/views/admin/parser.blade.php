@extends('layouts.admin')

@section('title')
    @parent Admin
@endsection

@section('content')
    <div class="jumbotron">
        <div class="container" style="min-height: 80vh; margin-bottom: -3vh; margin-top: 3vh">
            <h1 style="padding: 20px">Welcome to Admin-page!</h1>
            <div>
                @if($category)
{{--                    @dump($category)--}}
                    <h1>{{ $category }}</h1>
                @else
                    <h1>News</h1>
                @endif
{{--                @dump($parser->news)--}}
            </div>
            <a href="{{ route('admin.parserNews') }}" style="text-decoration: none">
                <button type="button" class="btn btn-success">Get Parsed News</button>
            </a>
            <div class="row">
                @forelse($parser as $item)
                    <div class="news-block col-sm-12 col-md-6" style="padding-top: 20px; padding-bottom: 100px;">
                        <a style="text-decoration: #2fa360; text-underline-color:mediumseagreen"
                           href="{{ route('news.one', $item) }}">
                            <div style="width: 150px; height: 150px;">
                                <img style="width: 100%" src="{{ $item->newsImg  ?? asset('http://placehold.it/150')}}"
                                     alt="news_img">
                            </div>
                            <div style="padding:20px 0 0 0; color:mediumseagreen; height:100px">
                                <h3>{{ $item->heading }}</h3>
                                <div style="height: 50px; width:100%; overflow: hidden;"><p>{{ $item->description }}</p></div>
                            </div>
                        </a>

                    </div>
                @empty
                    <p>No News</p>
                @endforelse
            </div>
            <div style="display: flex; justify-content: center; margin-top: 20px">
                {{ $parser->links() }}
            </div>
        </div>
    </div>
@endsection
