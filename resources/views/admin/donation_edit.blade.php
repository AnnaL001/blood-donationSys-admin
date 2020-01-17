@extends('layout.layout1')

@section('title','Edit donation')

@section('content')
    <br/><br/><br/>
    <center>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background-color: #e60000;
             border-style: groove";><i class='fas fa-paper-plane' style='font-size:16px'></i>{{ __('Edit donation') }}</div>

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

                            <form method="POST" action="{{ route('admin.donations.update', $donations->record_id) }}" >
                              {{method_field('PUT')}}
                                @csrf
                                <div class="form-group row">
                                    <label for="blood_quantityInPints" class="col-md-4 col-form-label text-md-right">{{ __('Blood quantity in pints') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="blood_quantityInPints" name="blood_quantityInPints">
                                            <option> 1 </option>
                                            <option> 2 </option>
                                            <option> 3 </option>
                                            <option> 4 </option>
                                        </select>


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="branch" class="col-md-4 col-form-label text-md-right">{{ __('Branch') }}</label>

                                    <div class="col-md-6">
                                        <input id="branch" type="number" class="form-control" name="branch" value="{{ $donations->branch_id }}">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="verification" class="col-md-4 col-form-label text-md-right">{{ __('Verification') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="verification" name="verification">
                                            <option> Yes </option>
                                            <option> No </option>
                                        </select>


                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-4 offset-md-4">
                                        <button type="submit" class="btn btn-primary" style="background-color: #e60000;
            border-color: #E7E7E7;">
                                            {{ __('Edit') }}
                                        </button>
                                        <a href="{{ route('admin.donations.index') }}">
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
