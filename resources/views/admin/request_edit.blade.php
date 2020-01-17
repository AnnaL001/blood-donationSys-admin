@extends('layout.layout1')

@section('title','Edit Request')

@section('content')
    <br/><br/><br/>
    <center>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background-color: #e60000;
             border-style: groove";><i class='fas fa-paper-plane' style='font-size:16px'></i>{{ __('Edit Request') }}</div>

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

                            <form method="POST" action="{{ route('admin.requests.update',$requests->request_id) }}" >
                                {{ method_field('PUT') }}
                                @csrf
                                <div class="form-group row">
                                    <label for="request_text" class="col-md-4 col-form-label text-md-right">{{ __('Request') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="request_text" class="form-control" name="request_text">
                                            {{ $requests->request_text}}
                                        </textarea>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="blood_type" class="col-md-4 col-form-label text-md-right">{{ __('Blood type') }}</label>

                                    <div class="col-md-6">
                                        <select id="blood_type" class="form-control" name="blood_type">
                                            <option> A+ </option>
                                            <option> A- </option>
                                            <option> B+ </option>
                                            <option> B- </option>
                                            <option> AB+ </option>
                                            <option> AB- </option>
                                            <option> O+ </option>
                                            <option> O- </option>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="branch" class="col-md-4 col-form-label text-md-right">{{ __('Branch') }}</label>

                                    <div class="col-md-6">
                                        <input id="branch" type="number" class="form-control" name="branch" value="{{ $requests->branch_id  }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-4 offset-md-4">
                                        <button type="submit" class="btn btn-primary" style="background-color: #e60000;
            border-color: #E7E7E7;">
                                            {{ __('Send') }}
                                        </button>
                                        <a href="{{ route('admin.requests.index') }}">
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

