@extends('layout')

@section('title', 'Post Job')

@section('stylesheets')
<link rel="stylesheet" href="{{ url('css/signupStyle.css') }}">
@endsection

@section('navLinks')
<a href="{{ route('companyDashboard') }}">back home page</a>
<a href="#" class="sign-in">Post Job</a>
@endsection


@section('content')
<section class="signup">
    <form action="{{ route('postJob.action') }}" method="POST">
        @csrf
        <h1 class="heading">Post Job</h1>
        @if(Session::get('fail'))
        <div class="danger">{{ Session::get('fail') }}</div>
        @endif
        @if($errors->any())
            @foreach($errors->all() as $err)
            <div class="danger">{{ $err }}</div>
            @endforeach
        @endif
        <div class="inputBox">
            <input type="text" name="jobTitle" value="{{ old('jobTitle') }}">
            <label for="jobTitle">Job Title<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <input type="text" name="jobLocation" value="{{ old('jobLocation') }}">
            <label for="jobLocation">Job Location<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <textarea name="jobDescription" cols="100" rows="4"></textarea>
            <label for="jobDescription">Job Description<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <textarea name="jobRequirements" cols="100" rows="4"></textarea>
            <label for="jobRequirements">Job Requirements<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <input type="text" name="jobCategory" value="{{ old('jobCategory') }}">
            <label for="jobCategory">Job Category<span class="requiredF">*</span></label>
        </div>
        <div class="inputBox">
            <input type="date" name="deadline" value="{{ old('deadline') }}">
            <label for="deadline">Deadline<span class="requiredF">*</span></label>
        </div>
        <input type="submit" class="btn" value="Post">
    </form>
</section>
@endsection
