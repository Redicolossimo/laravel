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

                    <h1>Users</h1>

                <div class="row">
                    @forelse($users as $user)
                        <div class="users-block" style="padding-top: 20px; width: 100%">
                            <a href="#">{{$user->name}}, {{$user->email}}, {{ ($user->is_admin)?"Admin":"" }}</a><br>
                            @if($user->is_admin)
                                <a href="{{ route('admin.toggleAdmin', $user) }}"><button type="button" class="btn btn-success">From admin</button></a>
                                @else
                                <a href="{{ route('admin.toggleAdmin', $user) }}"><button type="button" class="btn btn-success">To admin</button></a>
                            @endif
                            <a href="{{ route('admin.deleteUser', $user) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                        </div>
                        <hr>
                    @empty
                        <p>No users</p>
                    @endforelse
                </div>
                <div style="display: flex; justify-content: center; margin-top: 20px">
                    {{ $users->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
