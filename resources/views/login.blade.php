@extends('layouts.empty')

@section('title')
    Login
@endsection

@section('content')
    <section
        class="login"
        style="
            margin:15% auto;
            width:600px;
            height:400px;
            ">
        <div class="jumbotron" style="height:100%; width:100% ">
            <div class="container" style="min-height: 80vh; margin-bottom: -3vh; margin-top: 3vh">
                <div class="row">
                    <h1 class="col-lg-8" style="margin-top:50px">Let's sign in now</h1>
                    <form action="#" method="post" class="col-lg-4" style="margin-top:30px">
                        <label>
                            <input type="email" class="form-control mr-sm-2" name="email" id="email"
                                   placeholder="Email">
                        </label>
                        <label>
                            <input type="password" class="form-control mr-sm-2" name="password" id="password"
                                   placeholder="Password">
                        </label>
                        <br>
                        <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Login" id="login">
                    </form>
                    <br>
                    <div style="padding-left: 70px; padding-top: 40px; padding-bottom: 20px">

                        <a href="{{route('home')}}" style="color: mediumseagreen">Go
                            back to homepage
                            without log in</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('/js/login.js') }}"></script>
@endsection
