@extends('layout.layout')

@section('title','Donation')

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
                <a class="nav-link" href="#" style="color:#e60000;margin-left:10px;">Donation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.requests.index')}}" style="color:black;margin-left:10px;">Requests</a>
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
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col"> No </th>
            <th scope="col"> Blood quantity</th>
            <th scope="col"> Branch </th>
            <th scope="col"> Donor </th>
            <th scope ="col"> Date </th>
            <th scope="col">Verification</th>
            <th scope="col"> Action </th>
        </tr>
        </thead>
        <tbody>
        @php $no =1;   @endphp
        @foreach($donations as $donation)
            <tr>
                <td> @php echo $no++ ;  @endphp</td>
                <td>{{ $donation->blood_quantityInPints }} pint(s)</td>
                <td>{{$donation -> branch_id }}</td>
                <td>{{$donation -> donor_id }}</td>
                <td>{{ $donation -> created_at }}</td>
                 <td>{{ $donation -> verification }}</td>
                <td>
                    <a href="{{ route('admin.donations.edit', $donation->record_id) }}">
                        <button type="button" class="btn btn-outline-warning"> Edit </button>
                </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $donations -> links()}}
@endsection
