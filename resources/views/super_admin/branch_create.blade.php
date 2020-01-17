@extends('layout.layout1')

@section('title','Add Branch')

@section('content')
    <br/><br/><br/>
    <center>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background-color: #e60000;
             border-style: groove";><i class='fas fa-hospital' style='font-size:16px'></i>{{ __('Add Branch') }}</div>

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

                            <form method="POST" action="{{ route('super_admin.branches.store') }}" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-group row">
                                    <label for="branch_name" class="col-md-4 col-form-label text-md-right">{{ __('Branch name') }}</label>

                                    <div class="col-md-6">
                                        <input id="branch_name" type="text" class="form-control" name="branch_name" placeholder="Kenyatta Hospital">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="branch_type" class="col-md-4 col-form-label text-md-right">{{ __('Branch type') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="branch_type" name="branch_type" >
                                            <option > Public </option>
                                            <option> Private </option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="branch_location" class="col-md-4 col-form-label text-md-right">{{ __('Branch location') }}</label>

                                    <div class="col-md-6">
                                        <input id="branch_location" type="text" class="form-control" name="branch_location" placeholder="Upperhill, Nairobi KE">

                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-4 offset-md-4">
                                        <button type="submit" class="btn btn-primary" style="background-color: #e60000;
            border-color: #E7E7E7;">
                                            {{ __('Add') }}
                                        </button>
                                        <a href="{{ route('super_admin.branches.index') }}"> <button type="button" class="btn btn-primary" style="background-color: #e60000;
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

