@extends('layout')

@section('title', 'Wazzafny')

@section('stylesheets')
<link rel="stylesheet" href="{{ url('css/signupStyle.css') }}">
@endsection

@section('navLinks')
<a href="{{ route('homePage') }}"> home</a>
@endsection


@section('content')
<section class="signup">
    <form action="{{ route('login.action') }}" method="POST">
        @csrf
        <h1 class="heading">Login</h1>
        @if(Session::get('fail'))
        <div class="danger">{{ Session::get('fail') }}</div>
        @endif
        @if(session('success'))
        <div class="success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            @foreach($errors->all() as $err)
                <div class="danger">{{ $err }}</div>
            @endforeach
        @endif
        <div class="inputBox">
            <input type="text" name="email">
            <label for="email">email</label>
        </div>
        <div class="inputBox">
            <input type="password" name="password">
            <label for="password">password</label>
        </div>
        <p>Don't have an account? <a href="{{ route('register') }}" class="alignA">register</a>.</p>
        <input type="submit" class="btn" value="Login">
    </form>
</section>
@endsection
