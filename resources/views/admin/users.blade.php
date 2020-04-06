@extends('layouts.admin')

@section('title')
    @parent Admin
@endsection

@section('content')
    <div class="jumbotron">
        <div class="container" style="min-height: 80vh; margin-bottom: -3vh; margin-top: 3vh; padding-top: 50px;">
            <h1
                style="padding: 20px"
            >
                Welcome to Admin-page!</h1>
            <div>
                <!-- Example row of columns -->

                <h1>Users</h1>

                <div class="row">
                    @forelse($users as $user)
                        <div id="user{{ $user->id }}" class="users-block" style="padding-top: 20px; width: 100%">
                            <a href="#">{{$user->name}}, {{$user->email}}, {{ ($user->is_admin)?"Admin":"" }}</a><br>
                            @if($user->is_admin)
                                    <button id="admButton{{ $user->id }}" type="button" class="btn btn-success admin" data-id="{{ $user->id }}">From admin</button>
                            @else
                                    <button id="admButton{{ $user->id }}" type="button" class="btn btn-success admin" data-id="{{ $user->id }}">To admin</button>
                            @endif
{{--                            <a href="{{ route('admin.deleteUser', $user) }}">--}}
{{--                                <button type="button" class="btn btn-danger">Delete</button>--}}
{{--                            </a>--}}
{{--                            <a>--}}
{{--                                <button class="btn btn-success admin" data-id="{{ $user->id }}"></button>--}}
{{--                            </a>--}}
                                <button class="btn btn-danger delete" data-id="{{ $user->id }}">Delete</button>
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
{{--    <script>--}}
{{--        let delButtons = document.querySelectorAll('.delete');--}}
{{--        let admButtons = document.querySelectorAll('.admin');--}}
{{--        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');--}}


{{--        delButtons.forEach((elem) => {--}}
{{--            elem.addEventListener('click', () => {--}}
{{--                console.log('sending....');--}}
{{--                let id = elem.getAttribute('data-id');--}}
{{--                (async () => {--}}
{{--                    const response = await fetch(`/api/user/${id}`, {--}}
{{--                        headers: {--}}
{{--                            'X-CSRF-TOKEN': token,--}}
{{--                            'Content-type': 'application/json'--}}
{{--                        },--}}
{{--                        method: 'delete',--}}
{{--                        body: JSON.stringify({--}}
{{--                            id--}}
{{--                        })--}}
{{--                    });--}}
{{--                    const answer = await response.json();--}}
{{--                    document.getElementById(`user${answer.id}`).remove();--}}
{{--                    document.getElementById(`alert`).innerHTML = `--}}
{{--                    <div class="container">--}}
{{--                        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--                            ${answer.message}--}}
{{--                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    `;--}}
{{--                    console.log(answer);--}}
{{--                })();--}}
{{--            })--}}
{{--        });--}}

{{--        admButtons.forEach((elem) => {--}}
{{--            elem.addEventListener('click', () => {--}}
{{--                console.log('sending....');--}}
{{--                let id = elem.getAttribute('data-id');--}}
{{--                (async () => {--}}
{{--                    const response = await fetch(`/api/user/${id}`, {--}}
{{--                        headers: {--}}
{{--                            'X-CSRF-TOKEN': token,--}}
{{--                            'Content-type': 'application/json'--}}
{{--                        },--}}
{{--                        method: 'patch',--}}
{{--                        body: JSON.stringify({--}}
{{--                            id--}}
{{--                        })--}}
{{--                    });--}}
{{--                    const answer = await response.json();--}}
{{--                    console.log(answer.id);--}}
{{--                    console.log(answer.is_admin);--}}
{{--                    if(answer.is_admin){--}}
{{--                        document.getElementById(`admButton${answer.id}`).innerText = 'From admin' ;--}}
{{--                    } else{--}}
{{--                        document.getElementById(`admButton${answer.id}`).innerText = 'To admin';--}}
{{--                    }--}}
{{--                    document.getElementById(`alert`).innerHTML = `--}}
{{--                    <div class="container">--}}
{{--                        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--                            ${answer.message}--}}
{{--                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    `;--}}

{{--                })();--}}
{{--            })--}}
{{--        });--}}
{{--    </script>--}}
@endsection
