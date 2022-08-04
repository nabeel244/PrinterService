@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container LoginContainer ">
                    <div class="row mt-5">

                        <div class="col-12 text-center px-0">
                            <h1 class="LoginContainer__Heading">Reset Password</h1>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 text-center">
                            <img class="Login_img" src="{{ asset('images/image-removebg-preview.svg') }}" alt="">
                        </div>
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row text-center">
                            <div class="col-md-6 offset-md-3 mt-2">
                                <input id="email" type="email"
                                    class="form-control LoginContainer__Input1 @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Enter Your Email" required
                                    autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row mb-0 mt-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" style="background-color: #7c5cc4 !important;"
                                    class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection
