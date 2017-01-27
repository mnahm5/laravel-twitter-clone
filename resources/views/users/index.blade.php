@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ $user->username }}</h3>

                @if(Auth::user()->isNot($user))
                    @if(Auth::user()->isFollowing($user))
                        <a class="btn btn-danger" href="{{ route('user.unfollow', $user) }}">UnFollow</a>
                    @else
                        <a class="btn btn-success" href="{{ route('user.follow', $user) }}">Follow</a>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection