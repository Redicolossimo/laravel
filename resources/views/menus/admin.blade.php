<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{ route('home') }}">NewSSite</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link  {{request()->routeIs('home')?'active':''}}" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{request()->routeIs('news.all')?'active':''}}" href="{{route('news.all')}}">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{request()->routeIs('news.categories')?'active':''}}" href="{{ route('news.categories') }}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{request()->routeIs('login')?'active':''}}" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{request()->routeIs('admin.test1')?'active':''}}" href="{{ route('admin.test1') }}">Test1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{request()->routeIs('admin.test2')?'active':''}}" href="{{ route('admin.test2') }}">Test2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{request()->routeIs('admin.addNews')?'active':''}}" href="{{ route('admin.addNews') }}">Add News</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

