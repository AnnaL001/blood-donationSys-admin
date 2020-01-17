@extends('layout.layout')

@section('title','Blood request')

@section('vertical_navbar')
    <!-- A vertical navbar -->
    <nav class="navbar bg-light">

        <!-- Links -->
        <ul class="navbar-nav" style="height:490px;">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/users/home') }}" style="color:black;margin-left:10px;">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.donors.index') }}" style="color:black;margin-left:10px;">Donors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/donor_response') }}" style="color:black;margin-left:10px;">Response</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route ('admin.donations.index') }}" style="color:black;margin-left:10px;">Donation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color:#e60000;margin-left:10px;">Requests</a>
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
@section('content')
    <br/>
    <a href="{{ route('admin.requests.create') }}">
        <button type="button" class="btn btn-outline-primary"> Add </button></a> <br/><br/>
    @foreach($requests as $request)
    <div class="card bg-light text-dark">
        <div class="card-body">
            <p> {{ $request->request_text }}</p>

            <div class="form-group row">
                <div class="column side" style="width: 25%;margin-left: 60px;">
                    <button type="button" class="btn btn-outline-info">
                        {{ __('Response') }}
                    </button>
                </div>
                <div class="column middle" style="width: 15%">
                    <a href="{{ route('admin.requests.edit', $request->request_id) }}">
                    <button type="button" class="btn btn-outline-warning">
                        {{ __('Edit') }}
                    </button>
                    </a>
                </div>

                    <form action="{{ route('admin.requests.destroy', $request->request_id) }}" method="POST" class="float-left">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-outline-danger" >
                            {{ __('Delete') }}
                        </button>
                    </form>


                </div>
            </div>

        </div>

        <br/>

    @endforeach
    {{ $requests->links() }}
    @endsection

