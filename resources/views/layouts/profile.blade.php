<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    
    <style type="text/css">
        li{
            padding:20px; 
        }
        a:link{
            text-decoration:none;
            display: inline-block;

        }
        li:hover{
            text-decoration:none;
            background-color: #e7ebef
        }
        body{
            background-color: #e7ebef;
            
        }
        .no-bottom {
            bottom: 0;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div id="app">
        @include('inc.navbar')

        <div class="jumbotron no-bottom"></div>
        

       <nav class="navbar navbar-default">
          <div class="container">
            <img src="/uploads/images/{{$user->image}}" style="width:150px;height:150px;border-radius:50%;margin-right:55px;">
            
            <div class="navbar-header col-md-2">
                
                <a href="{{ url('/' . $user->id) }}">
                    <h4><strong>{{ $user->name}}</strong></h4>
                </a>
                <a href="{{ url('/' . $user->id) }}">
                    <small>&#64;{{ $user->name}}</small>
                </a>
            </div>
            

            <div class="col-md-5">
                <ul class="nav">
                    <li class="{{ !Route::currentRouteNamed('profile') ?: 'active' }}">
                        <a href="{{ url('/' . $user->id) }}" class="text-center">
                            <div class="text-uppercase">Tweets</div>
                        <div>{{$tweets->count()}}</div>
                        </a>
                    </li>
                    @if ($is_edit_profile)
                        <li class= "{{ !Route::currentRouteNamed('following') ?: 'active' }}">
                            <a href="{{ url('/' . $user->id . '/following') }}" class="text-center">
                                <div class="text-uppercase">Following</div>
                                <div>{{ $following_count }}</div>
                            </a>
                        </li>
                    @endif
                    <li class="{{ !Route::currentRouteNamed('followers') ?: 'active' }}">
                        <a href="{{ url('/' . $user->id . '/followers') }}" class="text-center">
                            <div class="text-uppercase">Followers</div>
                            <div>{{ $followers_count }}</div>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-2">
                    @if (Auth::check())
                    @if ($is_edit_profile)
                    <a href="#" class="navbar-btn navbar-right">
                        <button type="button" class="btn btn-default">Edit Profile</button>
                    </a>
                    @elseif ($is_following)
                    <a href="{{ url('/follows/' . $user->id) }}" class="navbar-btn navbar-right">
                        <button type="button" class="btn btn-default">Follow</button>
                    </a>
                    @else
                    <a href="{{ url('/unfollows/' . $user->id) }}" class="navbar-btn navbar-right">
                        <button type="button" class="btn btn-default">Unfollow</button>
                    </a>
                    @endif
                @endif
                </div>
          </div>
        </nav>
        <div class="container">
        <form action="/profile" enctype="multipart/form-data" method="POST">
            <label>Update Profile Image</label>
            <input type="file"  name="image">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" style="float:right" class="btn btn-sm btn-primary">
        </form>

        <br>

        @yield('content')
    </div>

    <!-- Scripts -->
    
