@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(Auth::user()->isNot($user))
                    <p>{{ Auth::user()->username }}</p>
                    @if(Auth::user()->isFollowing($user))
                        <a class="btn btn-danger" href="{{ route('user.unfollow', $user) }}">UnFollow</a>
                    @else
                        <a class="btn btn-success" href="{{ route('user.follow', $user) }}">Follow</a>
                    @endif
                @else
                    <h2>Followers</h2>
                    <table class="table">
                        <tbody>
                        @foreach($followers_that_i_dont_follow as $username)
                            <tr>
                                <th scope="row"><h4>{{ $username }}</h4></th>
                                <td><a href="{{ url('/users/' . $username . '/follow') }}" class="btn btn-success">Follow</a></td>
                            </tr>
                        @endforeach
                        @foreach($followers_that_i_follow as $username)
                            <tr>
                                <th scope="row"><h4>{{ $username }}</h4></th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <h2>Following</h2>
                    <table class="table">
                        <tbody>
                            @foreach($following as $username)
                                <tr>
                                    <th scope="row"><h4>{{ $username }}</h4></th>
                                    <td><a href="{{ url('/users/' . $username . '/unfollow') }}" class="btn btn-danger">Unfollow</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection