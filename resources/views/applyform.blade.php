@extends('layout')

@section('title', 'Wazzafny')

@section('stylesheets')
<link rel="stylesheet" href="{{ url('css/signupStyle.css') }}">
@endsection

<!-- @section('navLinks')
<a href="{{ route('homePage') }}">back home</a>
@endsection -->


@section('content')
<section class="signup">
    <form action="{{ route('apply.action',$id) }}" method="POST">
        @csrf
        {{-- <h1 class="heading">JOB NAME</h1> --}}
        <h1 class="heading">{{$name}}</h1>
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
            <input type="text" name="name">
            <label for="name">name<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <input type="text" name="email">
            <label for="email">email<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <input type="text" name="phone">
            <label for="phone">phone<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <input type="text" name="faculty">
            <label for="faculty">faculty<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <input type="text" name="grad">
            <label for="grad">Graduation Year<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <input type="number" name="experience">
            <label for="experience">Years of experience<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <input type="text" name="coverletter">
            <label for="coverletter">Cover Letter<span class="requiredF">*</span></label>
        </div>
        <input  type="submit" class="btn" value="Apply">
    </form>
</section>
@endsection
