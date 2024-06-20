@extends('layout')

@section('title', 'Admin Dashboard')

@section('stylesheets')
<link rel="stylesheet" href="{{ url('css/adminDashboardStyle.css') }}">
<script>
    function handleClick() {
        document.getElementById('list').style.display = "block";
    };
</script>
@endsection

@section('content')
<section class="container">
    <div class ="heading">
        <h1>DashBoard</h1>
    </div>
    <div class= "stats">
        <h2 class = "totalCompanies">Number of registered companies: </h2>
        <h2 class = "totalCompanies" id = "no_of_companies">{{ $count }}</h2>
        <button id="viewBTN" class = "buttons" onclick="handleClick()">View All Companies</button>
        <a href="{{ route('addCompanyForm') }}" class="buttons">Add New Company</a>
    </div>

    <div class = "stats" id = "list">
        @if (count($companies) > 0)
        <table class="content-table">
            <thead>
                <tr>
                    <th> Name</th>
                    <th> Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                <tr>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td><a href="{{ route('removeCompany.action' , $company->userID) }}" class="buttons">Remove</a></td>
                </tr> 
                @endforeach
            </tbody>
        </table>
        @else
            <h2>No companies registered</h2>
        @endif
    </div>
</section>
@endsection