@extends('layout')

@section('title', 'Wazzafny')

@section('stylesheets')
<link rel="stylesheet" href="{{ url('css/companyDashboard.css') }}">
@endsection

@section('navLinks')
<a href="{{ route('companyDashboard') }}">back home page</a>
<a href="{{ route('postJob') }}" class="sign-in">Post Job</a>
@endsection


@section('content')
<section class="company">
    <div class="pcontainer">
        <div class="pcard">
            <h1>{{ $jobDetails->jobTitle }}</h1>
            <h3><span>Category Name: </span>{{ $jobDetails->categoryName }}</h3>
            <h3><span>Number of applicants: </span>{{ $applicantsCount }}</h3>
            <h3><span>Location: </span>{{ $jobDetails->jobLocation }}</h3>
            <h3><span>Deadline: </span>{{ $jobDetails->deadline }}</h3>
            <h3><span>Job Description: </span></h3>
            <h3>{{ $jobDetails->jobDescription }}</h3>
            <h3><span>Job Requirments: </span></h3>
            <h3>{{ $jobDetails->jobRequirements }}</h3>
        </div>
    </div>
    <div class="">
    @if($applicantsCount > 0)
    <h1 class="heading">Applications for this job</h1>
    <div class="pcontainer">
        <div class="tcard">
        @foreach($applicants as $applicant)
            <h1>Application {{ $loop->iteration }}</h1>
            <h3><span>Name: </span>{{ $applicant->applicantName }}</h3>
            <h3><span>Email: </span>{{ $applicant->email }}</h3>
            <h3><span>Phone Number: </span>{{ $applicant->phoneNumber }}</h3>
            <h3><span>Faculty: </span>{{ $applicant->faculty }}</h3>
            <h3><span>Graduation Year: </span>{{ $applicant->graduationYear }}</h3>
            <h3><span>Experience: </span></h3>
            <h3>{{ $applicant->experience }}</h3>
            <h3><span>Cover Letter: </span></h3>
            <h3>{{ $applicant->coverLetter }}</h3>
        @endforeach
        </div>
    </div>
    @else
    <h1 class="heading">sorry! there is no applications for this job</h1>
    @endif
    </div>
</section>
@endsection
