@extends('layout.layout')

@section('title','Branch Admin')

@section('vertical_navbar')
    <!-- Links -->
    <!-- A vertical navbar -->
    <nav class="navbar bg-light">
        <ul class="navbar-nav" style="height:490px;">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/users/home') }}"  style="color:black;margin-left:10px;" >Home</a>
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
                <a class="nav-link" href="{{ route('admin.requests.index')}}" style="color:black;margin-left:10px;"> Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/users/profile') }}" style="color:black;margin-left:10px;">Profile</a>
            </li>
            @hasrole('Super admin')
            <li class="nav-item">
                <a class="nav-link" href="#" style="color:#e60000;margin-left:10px;">Branch admin</a>
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
    <a href="{{ route('super_admin.admins.create') }}">
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
            @foreach($admins as $admin)
                <tr>
                    <td> @php echo $no++ ;  @endphp</td>
                    <td>{{ $admin->fname }}</td>
                    <td>{{$admin->lname}}</td>
                    <td>{{$admin->sname}}</td>
                    <td> <a href="{{ route('super_admin.admins.show', $admin->id) }}">
                            <button type="button" class="btn btn-outline-info"> Profile </button></a>
                        </td>
                    <td> <a href="{{ route('super_admin.admins.edit', $admin->id) }}">
                            <button type="button" class="btn btn-outline-warning"> Edit </button> </a></td>
                    <td>
                        <form action="{{ route('super_admin.admins.destroy', $admin->id) }}" method="POST" class="float-left">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-outline-danger"> Delete</button></form> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    {{ $admins->links() }}
    @endsection

