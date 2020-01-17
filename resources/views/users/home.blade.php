@extends('layout.layout')

@section('title','Home')

@section('vertical_navbar')
    <!-- A vertical navbar -->
    <nav class="navbar bg-light">

        <!-- Links -->
        <ul class="navbar-nav" style="height:490px;">
            <li class="nav-item">
                <a class="nav-link" href="#" style="color:#e60000;margin-left:10px;">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.donors.index') }}" style="color:black;margin-left:10px;">Donors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/donor_response') }}" style="color:black;margin-left:10px;"> Response</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.donations.index') }}" style="color:black;margin-left:10px;">Donation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.requests.index') }}" style="color:black;margin-left:10px;"> Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.profiles.index') }}" style="color:black;margin-left:10px;">Profile</a>
            </li>
            @hasrole('Super admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route ('super_admin.admins.index') }}" style="color:black;margin-left:10px;">Branch admin</a>
            </li>
            @endhasrole
            @hasrole('Super admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route ('super_admin.branches.index') }}" style="color:black;margin-left:10px;">Hospital branch</a>
            </li>
            @endhasrole
        </ul>

    </nav>
@endsection
@section('content')
    <br/><br/>
    <div class="jumbotron">
       <h3> Welcome, {{ Auth::user()->fname }}
       @if(Auth::user()->gender == "Male")
            <i class="fas fa-male"></i>
           @endif
           <i class="fas fa-female" style="color: #e60000"></i>
       </h3>
        <p> The aim of the system is to enable for ease of finding voluntary non-remunerated blood donors in
            the case of emergencies to ensure adequate
            supply of safe blood.
        </p>
    </div>
    @endsection
