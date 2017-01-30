@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(Auth::user()->isNot($user))
                    <h1>{{ $user->username }}</h1>
                    @if(Auth::user()->isFollowing($user))
                        <a class="btn btn-danger" href="{{ route('user.unfollow', $user) }}">UnFollow</a>
                    @else
                        <a class="btn btn-success" href="{{ route('user.follow', $user) }}">Follow</a>
                    @endif
                    <h2>Followers</h2>
                    <table class="table">
                        <tbody>
                        @foreach($followers_that_i_dont_follow as $username)
                            <tr>
                                <th scope="row">
                                    <a href="{{ url('/users/' . $username) }}" class="btn-link">
                                        <strong>{{ $username }}</strong>
                                    </a>
                                </th>
                                <td><a href="{{ url('/users/' . $username . '/follow') }}" class="btn btn-success">Follow</a></td>
                            </tr>
                        @endforeach
                        @foreach($followers_that_i_follow as $username)
                            <tr>
                                <th scope="row">
                                    <a href="{{ url('/users/' . $username) }}" class="btn-link">
                                        <strong>{{ $username }}</strong>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <h2>Following</h2>
                    <table class="table">
                        <tbody>
                        @foreach($followings_that_i_dont_follow as $username)
                            <tr>
                                <th scope="row">
                                    <a href="{{ url('/users/' . $username) }}" class="btn-link">
                                        <strong>{{ $username }}</strong>
                                    </a>
                                </th>
                                <td><a href="{{ url('/users/' . $username . '/follow') }}" class="btn btn-success">Follow</a></td>
                            </tr>
                        @endforeach
                        @foreach($followings_that_i_follow as $username)
                            <tr>
                                <th scope="row">
                                    <a href="{{ url('/users/' . $username) }}" class="btn-link">
                                        <strong>{{ $username }}</strong>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2>Followers</h2>
                    <table class="table">
                        <tbody>
                        @foreach($followers_that_i_dont_follow as $username)
                            <tr>
                                <th scope="row">
                                    <a href="{{ url('/users/' . $username) }}" class="btn-link">
                                        <strong>{{ $username }}</strong>
                                    </a>
                                </th>
                                <td><a href="{{ url('/users/' . $username . '/follow') }}" class="btn btn-success">Follow</a></td>
                            </tr>
                        @endforeach
                        @foreach($followers_that_i_follow as $username)
                            <tr>
                                <th scope="row">
                                    <a href="{{ url('/users/' . $username) }}" class="btn-link">
                                        <strong>{{ $username }}</strong>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <h2>Following</h2>
                    <table class="table">
                        <tbody>
                            @foreach($following as $username)
                                <tr>
                                    <th scope="row">
                                        <a href="{{ url('/users/' . $username) }}" class="btn-link">
                                            <strong>{{ $username }}</strong>
                                        </a>
                                    </th>
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