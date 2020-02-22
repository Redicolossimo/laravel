@extends('layouts.main')

@section('title')
    {{ $category }}
@endsection

@section('content')
    <div class="jumbotron">
        <div class="container" style="min-height: 80vh; margin-bottom: -3vh; margin-top: 3vh">
            <h2>News in category: {{ $category }}</h2>
            @forelse($news as $item)
                <br>
                <div>
                    <h2>{{ $item['heading'] }}</h2>
                    @if (!$item['isPrivate'])
                        <a href="{{ route('news.one', $item['id']) }}" style="color:mediumseagreen">Details...</a>
                    @endif
                </div>
                <hr>
            @empty
                <h2 style="padding: 20px; margin-left: 50px">No news</h2>
            @endforelse
        </div>
    </div>
@endsection
