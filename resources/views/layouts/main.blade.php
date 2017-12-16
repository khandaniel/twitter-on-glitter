<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Glitter">
    <meta charset="UTF-8">
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1"
    >
    <link rel="stylesheet" href="/css/style.css"/>
    <title>Posts!</title>
</head>
<body>
<div class="header">
    <div class="logo"><a href="/">glitter</a></div>
    @if (Route::has('login'))
        <div class="menu">
            @auth
                @guest
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                    @else
                        <a href="/home">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        @endguest
                        @else
                            <a href="{{ route ('login') }}">Login</a>
                            <a href="{{ route('register') }}"> Register</a>
                            @endauth
        </div>
    @endif

</div>
@auth
    @include('single.publish')
@endauth
<div class="content wrapper">

    @yield('post')

</div>
</body>
</html>