@extends('layout.layout1')

@section('title','Edit Donor')

@section('content')
    <br/><br/><br/>
    <center>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background-color: #e60000;
             border-style: groove";><i class='fas fa-user-alt' style='font-size:16px'></i>{{ __('Edit Donor') }}</div>

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

                            <form method="POST" action="{{route('admin.donors.update', $donors->donor_id) }}" >
                                @csrf
                                {{method_field('PUT')}}
                                <div class="form-group row">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                                    <div class="col-md-6">
                                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{$donors->first_name}}">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

                                    <div class="col-md-6">
                                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $donors->last_name }}">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                                    <div class="col-md-6">
                                        <input id="surname" type="text" class="form-control" name="surname" value="{{ $donors->surname }}">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $donors->email }}">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" value="{{ $donors->password }}">

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="phoneNo" class="col-md-4 col-form-label text-md-right">{{ __('PhoneNo') }}</label>

                                    <div class="col-md-6">
                                        <input id="phoneNo" type="text" class="form-control" name="phoneNo" value="{{ $donors->phoneNo }}">

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
                                    <label for="blood_type" class="col-md-4 col-form-label text-md-right">{{ __('Blood type') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="blood_type" name="blood_type">
                                            <option> A+ </option>
                                            <option> A- </option>
                                            <option> B+ </option>
                                            <option> B- </option>
                                            <option> AB+ </option>
                                            <option> AB- </option>
                                            <option> O+ </option>
                                            <option> O- </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-4 offset-md-4">
                                        <button type="submit" class="btn btn-primary" style="background-color: #e60000;
            border-color: #E7E7E7;">
                                            {{ __('Edit') }}
                                        </button>
                                        <a href="{{ route('admin.donors.index') }}">
                                            <button type="button" class="btn btn-primary" style="background-color: #e60000;
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

