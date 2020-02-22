@extends('layouts.admin')


@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container" style="min-height: 80vh; margin-bottom: -3vh; margin-top: 3vh">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Heading</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="News Title">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category select</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        @forelse($categories as $item)
                            <option>{{ $item['category'] }}</option>
                        @empty
                            <h2 style="padding: 20px; margin-left: 50px">No category</h2>
                        @endforelse
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Text of article</label>
                    <textarea class="form-control" rows="3" id="exampleFormControlTextarea1"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Image for the article to upload</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Is it for private sector?
                    </label>
                </div>
                <div style="padding-top: 20px">
                    <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Send" id="input">
                </div>
            </form>
        </div>
    </div>
@endsection
