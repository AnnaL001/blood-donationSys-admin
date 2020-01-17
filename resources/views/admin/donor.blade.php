@extends('layout.layout')

@section('title','Donor list')

@section('vertical_navbar')
    <!-- A vertical navbar -->
    <nav class="navbar bg-light">

        <!-- Links -->
        <ul class="navbar-nav" style="height:490px;">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/users/home') }}" style="color:black;margin-left:10px;">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color:#e60000;margin-left:10px;">Donors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/donor_response') }}" style="color:black;margin-left:10px;">Response</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.donations.index') }}" style="color:black;margin-left:10px;">Donation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.requests.index') }}" style="color:black;margin-left:10px;">Requests</a>
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
    <a href="{{ route('admin.donors.create') }}">
        <button type="button" class="btn btn-outline-primary"> Add </button></a><br/><br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col"> No </th>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col"> Surname </th>
            <th scope ="col"> Action </th>
            <th scope="col"> Action </th>
            <th scope="col"> Action </th>

        </tr>
        </thead>
        <tbody>
        @php $no =1;   @endphp
        @foreach($donors as $donor)
            <tr>
                <td> @php echo $no++ ;  @endphp</td>
                <td>{{ $donor->first_name }}</td>
                <td>{{$donor->last_name}}</td>
                <td>{{$donor->surname}}</td>
                <td><a href="{{ route('admin.donors.show', $donor->donor_id) }}">
                        <button type="button" class="btn btn-outline-info"> Profile </button></a>
                </td>
                <td>
                    <a href="{{ route('admin.donors.edit', $donor->donor_id) }}">
                        <button type="button" class="btn btn-outline-warning"> Edit </button>
                </a>
                </td>
                <td>
                    <form action="{{ route('admin.donors.destroy', $donor->donor_id) }}" method="POST" class="float-left">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-outline-danger"> Delete </button></form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection


