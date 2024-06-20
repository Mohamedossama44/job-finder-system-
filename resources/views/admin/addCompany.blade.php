@extends('layout')

@section('title', 'Add New Company')

@section('stylesheets')
<link rel="stylesheet" href="{{ url('css/signupStyle.css') }}">
@endsection

@section('navLinks')
<a href="{{ route('adminRoute') }}">Back</a>
@endsection


@section('content')
<section class="signup">
    <form action="{{ route('addCompany.action') }}" method="POST">
        <h1 class="heading">Add Company</h1>
        @csrf
        @if($errors->any())
            @foreach($errors->all() as $err)
            <div class="danger">{{ $err }}</div>
            @endforeach
        @endif
        <div class="inputBox">
            <input type="text" name="name">
            <label for="name">Company Name<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <input type="text" name="email">
            <label for="email">Company Email<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <input type="password" name="password">
            <label for="password">Password<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <input type="password" name="confirmpassword">
            <label for="confirmpassword">Confirm Password<span class="requiredF">*</span></label>
        </div>
        <input type="submit" class="btn" value="Add">
    </form>
</section>
@endsection