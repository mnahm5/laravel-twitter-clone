@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>{{ Auth::user()->username }}</p>

                @if(Auth::user()->isNot($user))
                    @if(Auth::user()->isFollowing($user))
                        <a class="btn btn-danger" href="{{ route('user.unfollow', $user) }}">UnFollow</a>
                    @else
                        <a class="btn btn-success" href="{{ route('user.follow', $user) }}">Follow</a>
                    @endif
                @else
                    <h4>Followers</h4>
                    @foreach(Auth::user()->following()->pluck('username') as $username)
                        {{ $username }}
                    @endforeach
                    <h4>Following</h4>
                    @foreach(Auth::user()->followers()->pluck('username') as $username)
                        {{ $username }}
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection