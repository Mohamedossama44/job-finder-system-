<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!--font awesome cdn link--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!--css file-->
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    @yield('stylesheets')

</head>
<body>
    <!--header section-->
    <header>
    <a href="{{ route('homePage') }}" class="logo"><span>Wazzafny</span></a>


        <input type="checkbox" id="menu-bar">
        <label for="menu-bar" class="fas fa-bars"></label>

        <nav class="navbar">
            @yield('navLinks')
            @if(session('LoggedUser'))
            <a href="{{ route('logout') }}" class="sign-in">Logout</a>
            @else
            <a href="{{ route('login') }}" class="sign-in">LogIn</a>
            <a href="{{ route('register') }}" class="sign-in">Register</a>
            @endif
        </nav>
    </header>

    <!--content sections-->
    @yield('content')
</body>
</html>
