@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ $user->username }}</h3>

                @if(Auth::user()->isNot($user))
                    @if(Auth::user()->isFollowing($user))
                        UnFollow
                    @else
                        Follow
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection