<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link  {{request()->routeIs('home')?'active':''}}" href="{{ route('home') }}">Home
                        <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{request()->routeIs('news.all')?'active':''}}" href="{{route('news.all')}}">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{request()->routeIs('news.categories')?'active':''}}"
                       href="{{ route('news.categories') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{request()->routeIs('admin.test1')?'active':''}}"
                       href="{{ route('admin.test1') }}">Test1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{request()->routeIs('admin.test2')?'active':''}}"
                       href="{{ route('admin.test2') }}">Test2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{request()->routeIs('admin.news.create')?'active':''}}"
                       href="{{ route('admin.news.create') }}">Add News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{request()->routeIs('admin.users')?'active':''}}"
                       href="{{route('admin.users')}}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{request()->routeIs('admin.parser')?'active':''}}"
                       href="{{route('admin.parser')}}">Parser</a>
                </li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item float-right">
                        <img src="{{Auth()->user()->avatar}}" alt="avatar">
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::check())
                                <a class="dropdown-item  {{request()->routeIs('updateProfile')?'active':''}}"
                                   href="{{ route('updateProfile') }}">Profile</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

            <!-- Search form -->
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>


