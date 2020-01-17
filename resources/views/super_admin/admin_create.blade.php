@extends('layout.layout1')

@section('title','Add Admin')

@section('content')
    <br/><br/><br/>
    <center>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background-color: #e60000;
             border-style: groove";><i class='fas fa-user-alt' style='font-size:16px'></i>{{ __('Add Admin') }}</div>

                        <div class="card-body" style="border-style: groove">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br />
                            @endif

                            <form method="POST" action="{{route('super_admin.admins.store')}}" >
                                @csrf
                                <div class="form-group row">
                                    <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                                    <div class="col-md-6">
                                        <input id="fname" type="text" class="form-control" name="fname" placeholder="Anna">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

                                    <div class="col-md-6">
                                        <input id="lname" type="text" class="form-control" name="lname" placeholder="Albright">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="sname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                                    <div class="col-md-6">
                                        <input id="sname" type="text" class="form-control" name="sname" placeholder="King">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" placeholder="Anna.king@blood_donation.com">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phoneNo" class="col-md-4 col-form-label text-md-right">{{ __('PhoneNo') }}</label>

                                    <div class="col-md-6">
                                        <input id="phoneNo" type="text" class="form-control" name="phoneNo" placeholder="0711909342">

                                    </div>
                                </div>





                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" placeholder="*************">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="gender" name="gender">
                                            <option> Male </option>
                                            <option> Female </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="branch" class="col-md-4 col-form-label text-md-right">{{ __('Branch') }}</label>

                                    <div class="col-md-6">
                                        <input id="branch" type="number" class="form-control" name="branch_id" placeholder="Kenyatta">

                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-4 offset-md-4">
                                        <button type="submit" class="btn btn-primary" style="background-color: #e60000;
            border-color: #E7E7E7;">
                                            {{ __('Add') }}
                                        </button>
<a href="{{ route('super_admin.admins.index') }}"> <button type="button" class="btn btn-primary" style="background-color: #e60000;
            border-color: #E7E7E7;">
                                            {{ __('Back') }}
    </button> </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
@endsection

