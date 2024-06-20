@extends('layout')

@section('title', 'Wazzafny')

@section('stylesheets')
<link rel="stylesheet" href="{{ url('css/signupStyle.css') }}">
@endsection

@section('navLinks')
<a href="{{ route('homePage') }}">back home</a>
@endsection


@section('content')
<section class="signup">
    <form action="{{ route('register.action') }}" method="POST">
        @csrf
        <h1 class="heading">Register</h1>
        @if(Session::get('fail'))
        <div class="danger">{{ Session::get('fail') }}</div>
        @endif
        @if($errors->any())
            @foreach($errors->all() as $err)
            <div class="danger">{{ $err }}</div>
            @endforeach
        @endif
        <div class="inputBox">
            <input type="text" name="name">
            <label for="name">name<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <input type="text" name="email">
            <label for="email">email<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <input type="password" name="password">
            <label for="password">password<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <input type="password" name="confirmpassword">
            <label for="confirmpassword">confirm password<span class="requiredF">*</span></label>
        </div>
        <p>Have an account? <a href="{{ route('login') }}" class="alignA">LogIn</a>.</p>
        <input type="submit" class="btn" value="Register">
    </form>
</section>
@endsection
