@extends('layouts.admin')


@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container" style="min-height: 80vh; margin-bottom: -3vh; margin-top: 3vh">
            <form enctype="multipart/form-data"
                  action="@if (!$news->id){{ route('admin.addNews') }} @else {{ route('admin.saveNews', $news) }}@endif"
                  method="post">
                @csrf
                <div class="form-group">
                    <label for="newsTitle">Heading</label>
                    @if ($errors->has('heading'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('heading') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <input name="heading" type="text" class="form-control" id="newsTitle" placeholder="News Title"
                           value="{{ old('heading') ?? $news->heading ?? ""}}">
                </div>

                <div class="form-group">
                    <label for="catSelect">Category select</label>
                    @if ($errors->has('category_id'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('category_id') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <select name="category_id" class="form-control" id="catSelect">
                        @forelse($categories as $category)
                            <option @if ($news->category_id == $category->id) selected
                                    @endif value="{{ $category->id}}">
                                {{ $category->category}}
                            </option>
                        @empty
                            <h2 style="padding: 20px; margin-left: 50px">No category</h2>
                        @endforelse
                    </select>
                </div>

                <div class="form-group">
                    <label for="newsText">Text of article</label>
                    @if ($errors->has('description'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('description') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <textarea name="description" class="form-control" rows="3"
                              id="newsText">{{ old('description') ?? $news->description ?? "" }}</textarea>
                </div>

                <div class="form-group">
                    <label for="newsImage">Image for the article to upload</label>
                    @if ($errors->has('newsImg'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('newsImg') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <input name="newsImg" type="file" class="form-control-file " id="newsImage">
                </div>

                <div class="form-check">
                    <input @if (old('isPrivate') == 1 || $news->isPrivate == 1) checked @endif name="isPrivate"
                           class="form-check-input" type="checkbox" value="1" id="newsPrivate">
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
