@extends('layouts.main')

@section('title')
    @parent {{ $news['heading'] }}
@endsection

@section('menu')
    @include('menus.main')
@endsection

@section('content')
    @if (!$news['isPrivate'])
        <section class="news-body">
            <div class="jumbotron">
                <div class="container" style="min-height: 80vh; margin-bottom: -3vh; margin-top: 3vh">
                    <h1>{{ $news['heading'] }}</h1>
                    <div>
                        <img src="{{ $news['newsImg'] }}" alt="news_img" style="width:30%; padding-top: 40px">
                    </div>
                    <p style="width:100%; padding-top: 40px">
                        {{ $news['description'] }} <br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aut, beatae cupiditate eveniet,
                        facilis hic ipsa iure optio perferendis placeat quia sapiente ut voluptatibus! Deleniti eos
                        labore
                        porro reprehenderit sequi! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad
                        blanditiis
                        et ex expedita harum mollitia nisi optio praesentium sapiente. Cumque eaque est hic ipsum iure
                        quae
                        quaerat, unde vel voluptate. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem
                        consectetur consequuntur cum doloremque eum incidunt laudantium molestias nisi! Corporis cum
                        distinctio inventore ipsa ipsam minus nulla pariatur quas reiciendis veniam! Lorem ipsum dolor
                        sit
                        amet, consectetur adipisicing elit. Accusantium animi asperiores, debitis deserunt distinctio ex
                        excepturi explicabo itaque, natus nobis non pariatur quae quam quas quia, repellat repellendus
                        sequi
                        voluptatibus?
                    </p>
                </div>
            </div>
        </section>
    @else
        <br><br><br><h3>Private territory</h3>
    @endif
@endsection
