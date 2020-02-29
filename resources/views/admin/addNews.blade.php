@extends('layouts.admin')


@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container" style="min-height: 80vh; margin-bottom: -3vh; margin-top: 3vh">
            <form enctype="multipart/form-data" action="@if (!$news->id){{ route('admin.addNews') }} @else {{ route('admin.saveNews', $news) }}@endif" method="post">
                @csrf
                <div class="form-group">
                    <label for="newsTitle">Heading</label>
                    <input name="heading" type="text" class="form-control" id="newsTitle" placeholder="News Title" value="{{ $news->heading ?? old('heading') }}">
                </div>

                <div class="form-group">
                    <label for="catSelect">Category select</label>
                    <select name="category" class="form-control" id="catSelect">
                        @forelse($categories as $item)
                            <option @if ($item->id == old('category')) selected @endif value="{{ $item->id}}">{{ $item->category }}</option>
                        @empty
                            <h2 style="padding: 20px; margin-left: 50px">No category</h2>
                        @endforelse
                    </select>
                </div>

                <div class="form-group">
                    <label for="newsText">Text of article</label>
                    <textarea name="description" class="form-control" rows="3" id="newsText">{{ $news->description ?? old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="newsImage">Image for the article to upload</label>
                    <input name="newsImg" type="file" class="form-control-file" id="newsImage">
                </div>

                <div class="form-check">
                    <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked @endif name="isPrivate" class="form-check-input" type="checkbox" value="1" id="newsPrivate">
                    <label class="form-check-label" for="newsPrivate">
                        Is it for private sector?
                    </label>
                </div>
                <div style="padding-top: 20px">
                    <button type="submit" class="btn btn-outline-success my-2 my-sm-0" id="addNews">
                        @if ($news->id) Edit @else Add @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
