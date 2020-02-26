@extends('layouts.main')

@section('title')
    {{ $category }}
@endsection

@section('content')
    <div class="jumbotron">
        <div class="container" style="min-height: 80vh; margin-bottom: -3vh; margin-top: 3vh">
            <div class="row" style="justify-content:space-around; padding-top: 20px;">
                @forelse($categories as $item)
                    <div>
                        <h2><a
                                href="{{ route('news.categoryId', $item->name) }}"
                                style="color:mediumseagreen;"
                            >
                                {{ $item->category }}
                            </a></h2>
                    </div>
                @empty
                    <h2 style="padding: 20px; margin-left: 50px">No category</h2>
                @endforelse
            </div>
            <h1 style="font-size: 4rem">News in category: {{ $category }}</h1>
            @forelse($news as $item)
                <br>
                <div>
                    <h2>{{ $item->heading }}</h2>
                    @if (!$item->isPrivate)
                        <a href="{{ route('news.one', $item->id) }}" style="color:mediumseagreen">Details...</a>
                    @endif
                </div>
                <hr>
            @empty
                <h2 style="padding: 20px; margin-left: 50px">No news</h2>
            @endforelse
        </div>
    </div>
@endsection
