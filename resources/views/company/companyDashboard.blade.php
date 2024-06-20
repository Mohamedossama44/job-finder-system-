@extends('layout')

@section('title', 'Wazzafny')

@section('stylesheets')
<link rel="stylesheet" href="{{ url('css/companyDashboard.css') }}">
@endsection

@section('navLinks')
<a href="{{ route('postJob') }}" class="sign-in">Post Job</a>
@endsection


@section('content')
<section class="company">
    <div class="cbox-container">
        <div class="cbox">
            <div class="cimage">
                <img src="{{ url('images/company.png') }}" alt="companyProfile">
            </div>
            <div class="cContent">
                <div class="cicons">
                    <i class="fas fa-user"></i>
                    <br>
                    <i class="fas fa-envelope"></i>
                    <i class="fa fa-bullhorn"></i>
                </div>
                <div class="cinfo">
                    <h1 class="ctitle">{{ $companyName }}</h1>
                    <span class="cpost">Company</span>
                    <h2>{{ $companyEmail }}</h2>
                    <h2>Posted Jobs = {{ $postsCount }}</h2>
                </div>
            </div>
        </div>
    </div>
    @if($postsCount > 0)
    <h1 class="heading">Posted Jobs</h1>
    <div class="pcontainer">
    @foreach($posts as $post)
    <div class="pcard">
        <h1>{{$post->jobTitle}}</h1>
        <h3><span>Category Name: </span>{{$post->categoryName}}</h3>
        <h3><span>Number of applicants: </span>{{$post->countApp}}</h3>
        <h3><span>Location: </span>{{$post->jobLocation}}</h3>
        <h3><span>Deadline: </span>{{$post->deadline}}</h3>
        <h3><span>Job Description: </span></h3>
        <h3>{{$post->jobDescription}}</h3>
        <h3><span>Job Requirments: </span></h3>
        <h3>{{$post->jobRequirements}}</h3>
        <a href="{{ route('applicants', $post->jobID) }}"  class="btn">view applications</a>
        <br>
        <form action="{{ route('deleteJob', $post->jobID) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn" value="Delete Job">
        </form>
    </div>
    @endforeach
    </div>
    @else
    <h1 class="heading">no jobs posted <a href="{{ route('postJob') }}" class="btn">post job</a></h1>
    @endif
</section>
@endsection
