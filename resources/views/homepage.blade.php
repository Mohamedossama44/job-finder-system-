@extends('layout')

@section('title', 'Wazzafny')

@section('stylesheets')
<link rel="stylesheet" href="{{ url('css/homeStyle.css') }}">
@endsection

@section('navLinks')
<a href="#home">home</a>
<a href="#features">features</a>
<a href="#about">about</a>
@endsection


@section('content')
<!--home section-->
<section class="home" id="home">
    <div class="content">
        <h3>Your dream position <span>awaits!</span></h3>
        <p>Say hello to wazzafny, the world's leading career advancement platform.</p>
        <a href="{{ route('login') }}" class="btn">search</a>
    </div>
    <div class="image">
        <img src="{{ url('images/home.png') }}" alt="home page image">
    </div>
</section>
<!--features section-->
<section class="features" id="features">

    <h1 class="heading">Our features</h1>
    <div class="box-container">
        <div class="box">
            <img src="{{ url('images/feature1.png') }}" alt="feature1">
            <h3>Easy apply</h3>
        </div>
        <div class="box">
            <img src="{{ url('images/feature3.png') }}" alt="feature3">
            <h3>Diversity</h3>
        </div>

    </div>
</section>
<!--about section-->
<section class="about" id="about">
    <h1 class="heading">about us</h1>
    <div class="column">
        <div class="content">
            <h4>Welcome to wazzafny, your go-to destination for job seekers and employers alike. Our platform is
                designed to simplify the job search process and streamline recruitment efforts for companies of all
                sizes.</h4>
            <br>
            <br>
            <h5>Employers can leverage CareerHub to connect with top talent efficiently. From posting job listings to
                accessing our extensive candidate pool, we provide the tools needed for seamless recruitment. Our
                platform also offers features such as applicant tracking and resume screening to simplify the hiring
                process.</h5>
            <br>
            <br>
            <h6>Contact us today at 555-123-4567 to learn more about how CareerHub can benefit you.<br>Find us at: 123
                Career Avenue Cityville
                <br>State ZIP Code: 12345
                <br>Join CareerHub now and let's shape your future together.
            </h6>
            <!-- Social media icons -->
            <div class="social-icons">
                <a href="https://www.facebook.com/" target="_blank"><img src="/images/facebook.png"
                        alt="Facebook"></a><span>FACEBOOK</span>
                <a href="https://www.google.com/intl/ar/gmail/about/" target="_blank"><img src="/images/download.png"
                        alt="Gmail"></a><span>Gmail</span>
                <a href="https://www.linkedin.com/feed/" target="_blank"><img src="/images/linkedin.png"
                        alt="LinkedIn"></a><span>LinkedIn</span>
                <a href="https://twitter.com/?lang=ar" target="_blank"><img src="/images/twitter.png"
                        alt="Twitter"></a><span>Twitter</span>
            </div>
        </div>
    </div>
</section>
@endsection