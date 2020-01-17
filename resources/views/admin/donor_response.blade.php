@extends('layout.layout')

@section('title','Donor response')

@section('vertical_navbar')
    <!-- A vertical navbar -->
    <nav class="navbar bg-light">

        <!-- Links -->
        <ul class="navbar-nav" style="height:490px;">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/users/home') }}" style="color:black;margin-left:10px;">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.donors.index') }}"  style="color:black;margin-left:10px;">Donors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color:#e60000;margin-left:10px;">Response</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.donations.index') }}" style="color:black;margin-left:10px;">Donation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.requests.index') }}"   style="color:black;margin-left:10px;">Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/users/profile') }}" style="color:black;margin-left:10px;">Profile</a>
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
