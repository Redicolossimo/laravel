@extends('layouts.admin')

@section('title')
    @parent Admin
@endsection

@section('content')
    <div class="jumbotron">
        <div class="container" style="min-height: 80vh; margin-bottom: -3vh; margin-top: 3vh">
            <h1
                style="padding: 20px"
            >
                Welcome to Admin-page!</h1>
            <div>
                <!-- Example row of columns -->
                @if(isset($category))
                    <h1>{{ $category }}</h1>
                @else
                    <h1>News</h1>
                @endif
                <div class="row">
                    @forelse($news as $item)
                        <div class="news-block col-sm-12 col-md-6 col-lg-4 col-xl-3" style="padding-top: 20px">
                            <a style="text-decoration: #2fa360; text-underline-color:mediumseagreen"
                               href="{{ route('news.one', $item) }}">
                                <div style="width: 150px; height: 150px; ">
                                    <img style="width: 100%" src="{{ $item->newsImg  ?? asset('http://placehold.it/150')}}"
                                         alt="news_img">
                                </div>
                                <div style="padding:20px 0 0 25px; color:mediumseagreen;">
                                    <p>{{ $item->heading }}</p>
                                </div>
                            </a>
                            <a href="{{ route('admin.updateNews', $item) }}"><button type="button" class="btn btn-success">Edit</button></a>
                            <a href="{{ route('admin.deleteNews', $item) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                        </div>
                    @empty
                        <p>No News</p>
                    @endforelse
                </div>
                <div style="display: flex; justify-content: center; margin-top: 20px">
                    {{ $news->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection

