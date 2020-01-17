@extends('layout.layout')

@section('title','Admin profile')

@section('vertical_navbar')
    <!-- A vertical navbar -->
    <nav class="navbar bg-light">

        <!-- Links -->
        <ul class="navbar-nav" style="height:490px;">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/users/home')}}" style="color:black;margin-left:10px;">Home</a>
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
                <a class="nav-link" href="#" style="color:#e60000;margin-left:10px;">Profile</a>
            </li>
            @hasrole('Super admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route ('super_admin.admins.index') }}" style="color:black;margin-left:10px;">Branch admin</a>
            </li>
            @endhasrole
            @hasrole('Super admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('super_admin.branches.index') }}" style="color:black;margin-left:10px;"> Hospital branch </a>
            </li>
            @endhasrole
        </ul>

    </nav>
@endsection
@section('content')
    <br/>
    <div class="jumbotron" style="height: 300px;">
        <div class ="row">
            <div class="column side" style="width: 30%">
                <div id="vertical_navbar">
                    <i class="fas fa-user-circle" style="font-size:150px;color: #e60000;"></i>
                </div>
            </div>
            <div class="column middle" style=" width: 70%">
                <div id="content">
                    <h6 style="margin-left:15px;"> First name :  {{  $profiles->fname }}</h6>
                    <h6 style="margin-left: 15px;"> Last name : {{  $profiles->lname }}</h6>
                    <h6 style="margin-left: 15px;"> Surname : {{  $profiles->sname }}</h6>
                    <h6 style="margin-left: 15px;"> Email  : {{  $profiles->email }}</h6>
                    <h6 style="margin-left: 15px;"> Phone No : {{  $profiles->phoneNo }}</h6>
                    <h6 style="margin-left: 15px;"> Gender : {{ $profiles->gender }}</h6>
                    <h6 style="margin-left: 15px;"> Branch : </h6>
                    <a href="{{ route('super_admin.admins.index') }}">
                        <button type="button" class="btn btn-primary" style="background-color: #e60000;
            border-color: #E7E7E7;margin-left: 15px;">
                            {{ __('Back') }}
                        </button>
                    </a>


                </div>
            </div>
        </div>
    </div>

    </div>
    </div>

@endsection
