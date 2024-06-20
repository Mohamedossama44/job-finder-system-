@extends('layout')

@section('title', "Job's Feed")

{{-- styling --}}
{{-- @section('stylesheets')
<link rel="stylesheet" href="{{ url('css/feed.css') }}">

<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />sp24sw-final-project-g8/job_finder/resources/views/jobsfeed.blade.php
@endsection

@section('navLinks')
<a href="{{ route('homePage') }}">back home</a>
@endsection --}}
@section('stylesheets')
<link rel="stylesheet" href="{{ url('css/signupStyle.css') }}">
@endsection


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- google font icons --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
      <link rel="stylesheet" href="{{ url('css/feed.css') }}">
    <title>Job's Feed</title>
</head>
<body>
    {{-- Main body starts --}}
    <div class="body_main">
        {{-- sidebar starts --}}
        <div class="sidebar">
            <div class="sidebar_top">
                <img src="{{ url('images/home.png') }}" alt="">
                <i class="material-icons sidebar_topAvatar"> account_circle </i>
                <h2>{{$name}}</h2>
                <h4>{{$email}}</h4>
            </div>
            <div class="sidebar_stats">
                {{-- <div class="sidebar_stat">
                    <p>Who Viewed You</p>
                    <p class="sidebar_statNumber">
                        2543
                    </p>
                </div>
                <div class="sidebar_stat">
                    <p>Views on post</p>
                    <p class="sidebar_statNumber">
                        2850
                    </p>
                </div> --}}
            </div>
            <div class="sidebar_bottom">
                <p>Available</p>
                <div class="sidebar_recentItem">
                    <span class="sidebar_hash">#</span>
                    <p>reactjs</p>
                </div>
                <div class="sidebar_recentItem">
                    <span class="sidebar_hash">#</span>
                    <p>Programming</p>
                </div>
                <div class="sidebar_recentItem">
                    <span class="sidebar_hash">#</span>
                    <p>SoftwareEngineering</p>
                </div>
                <div class="sidebar_recentItem">
                    <span class="sidebar_hash">#</span>
                    <p>design</p>
                </div>
                <div class="sidebar_recentItem">
                    <span class="sidebar_hash">#</span>
                    <p>developer</p>
                </div>
            </div>
        </div>
        {{-- sidebar ends --}}
        {{-- Feed Starts --}}
        <div class="feed">

            {{-- Posts section --}}
            @foreach ($posts as $post)
            <form action="GET" action= "/applyform">
            <div class="post">
                <div class="post_header">
                    <i class="material-icons sidebar_topAvatar"> account_circle </i>
                    <div class="post_info">
                        <h2>{{$post->name}}</h2>
                        <p name="jobName">{{$post->categoryName}}</p>
                    </div>
                </div>
                <div class="post_body">
                        <h2 style="color: white">Job Title:</h2>
                        <h3><p>{{$post->jobTitle}}</p></h3>
                </div>
                <div class="post_body">
                        <h2 style="color: white">Location:</h2>
                        <h3><p>{{$post->jobLocation}}</p></h3>
                </div>
                <div class="post_body">
                    <h2 style="color: white">Job Description:</h2>
                        <h3><p>{{$post->jobDescription}}</p></h3>
                </div>
                <div class="post_body">
                    <h2 style="color: white">Job Requirements:</h2>
                        <h3><p>{{$post->jobRequirements}}</p></h3>
                </div>
                <div class="post_body">
                    <h2 style="color: white">Deadline:</h2>
                        <h3><p>{{$post->deadline}}</p></h3>
                </div>
                <div class="feed_inputOptions">
                    <div class="inputOption">
                        <a href="{{ route('form',$post->jobID) }}" class="btn">Apply</a>
                    </div>

                </div>
            </form>
            </div>
            @endforeach
            {{-- Posts section ends --}}
        </div>
        {{-- Feed Ends --}}


        {{-- Widgets Starts --}}
        <div class="widgets">
            <div class="widgets_header">
                <h2>Most in-demand jobs</h2>
                <i class="material-icons"> info </i>
            </div>
            <div class="widgets_article">
                <div class="widgets_articleLeft">
                    <i class="material-icons"> fiber_manual_record </i>
                </div>
                <div class="widgets_articleRight">
                    <h4>Artificial intelligence specialist</h4>
                    <p>Average annual salary: $144,000</p>
                </div>
            </div>
            <div class="widgets_article">
                <div class="widgets_articleLeft">
                    <i class="material-icons"> fiber_manual_record </i>
                </div>
                <div class="widgets_articleRight">
                    <h4>Data science specialist</h4>
                    <p>Average annual salary: $105,000 </p>
                </div>
            </div>
            <div class="widgets_article">
                <div class="widgets_articleLeft">
                    <i class="material-icons"> fiber_manual_record </i>
                </div>
                <div class="widgets_articleRight">
                    <h4>UX designer</h4>
                    <p>Average annual salary: $98,000</p>
                </div>
            </div>
            <div class="widgets_article">
                <div class="widgets_articleLeft">
                    <i class="material-icons"> fiber_manual_record </i>
                </div>
                <div class="widgets_articleRight">
                    <h4>Nurse</h4>
                    <p>Average annual salary: $89,000</p>
                </div>
            </div>
            <div class="widgets_article">
                <div class="widgets_articleLeft">
                    <i class="material-icons"> fiber_manual_record </i>
                </div>
                <div class="widgets_articleRight">
                    <h4>Healthcare supporting staff</h4>
                    <p>Average annual salary: $87,400</p>
                </div>
            </div>
            <div class="widgets_article">
                <div class="widgets_articleLeft">
                    <i class="material-icons"> fiber_manual_record </i>
                </div>
                <div class="widgets_articleRight">
                    <h4>Specialised engineer</h4>
                    <p>Average annual salary: $86,000</p>
                </div>
            </div>
        </div>
        {{-- Widgets Ends --}}
    </div>
    {{-- Main body ends --}}
</body>
</html>
