@extends('layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush
@section('content')
    <!-- CreateAccount Content Section Start-->
    <div class="container ContentContainer">
        <div class="row ContentContainer__CreateAccountRowOne">
            <div class="col-md-5 col-lg-4  ContentContainer__CreateAccountRowOne-LeftPart">

                <h1>My Account</h1>

            </div>
            <!-- <div class="col-md-5 col-lg-4  ContentContainer__CreateAccountRowOne-RightPart">
              <h2>Check Total Money Added from shop Owners :</h2>
              <a href="../user/receivedmoney_detail.html">Open</a>
              </div> -->
        </div>
        <div class="row  ContentContainer__CreateAccountRowTwo">
            @include('partials.sessionMessage')
            <form id="updateAccount" action="{{ route('user.updateAccount', $user->id) }}" method="POST">
                @csrf
                <input type="text" id="latitude" name="latitude" value="{{ $user->latitude }}"
                    class="form-control d-none">
                <input type="text" name="longitude" value="{{ $user->longitude }}" id="longitude"
                    class="form-control d-none">

                <div class="col-md-9 col-lg-5 ContentContainer__CreateAccountRowTwo-LeftPart">
                    <div class="row ContentContainer__CreateAccountRowTwo-LeftPartRows">
                        <label for="inputText" class="col-md-4 col-lg-3 col-form-label">Identifier:</label>
                        <div class="col-md-7 col-lg-8 ContentContainer__CreateAccountRowTwo-LeftPartinputs">
                            <input type="text" name="identifier" value="{{ $user->identifier }}" class="form-control"
                                id="inputText" placeholder="00124">
                        </div>
                        <div class="col-1">
                        </div>
                    </div>
                    <div class="row ContentContainer__CreateAccountRowTwo-LeftPartRows">
                        <label for="inputText" class="col-md-4 col-lg-3 col-form-label">Name:</label>
                        <div class="col-md-7 col-lg-8 ContentContainer__CreateAccountRowTwo-LeftPartinputs">
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                id="inputText">

                        </div>


                        <div class="col-1">
                        </div>
                    </div>
                    <div class="row ContentContainer__CreateAccountRowTwo-LeftPartRows">
                        <label for="inputText" class="col-md-4 col-lg-3 col-form-label">Surname:</label>
                        <div class="col-md-7 col-lg-8 ContentContainer__CreateAccountRowTwo-LeftPartinputs">
                            <input type="text" name="surname" value="{{ $user->surname }}" class="form-control"
                                id="surname">
                        </div>
                        <div class="col-1"><a href="#"><i class="bi bi-pencil-square CreateAccount__Edit-icon"
                                    onclick="focusFunction('surname')"></i></a>
                        </div>
                    </div>
                    <div class="row ContentContainer__CreateAccountRowTwo-LeftPartRows">
                        <label for="inputText" class="col-md-4 col-lg-3 col-form-label">Address:</label>
                        <div class="col-md-7 col-lg-8 ContentContainer__CreateAccountRowTwo-LeftPartinputs">
                            <input type="text" name="address" value="{{ $user->address }}" class="form-control"
                                id="autocomplete">
                        </div>
                        <div class="col-1"><a href="#"><i class="bi bi-pencil-square CreateAccount__Edit-icon"
                                    onclick="focusFunction('autocomplete')"></i></a>
                        </div>
                    </div>
                    <div class="row ContentContainer__CreateAccountRowTwo-LeftPartRows">
                        <label for="inputNumber" class="col-md-4 col-lg-3 col-form-label">Tel:</label>
                        <div class="col-md-7 col-lg-8 ContentContainer__CreateAccountRowTwo-LeftPartinputs">
                            <input type="number" name="mobile" value="{{ $user->mobile }}" class="form-control"
                                id="mobile">
                        </div>
                        <div class="col-1"><a href="#"><i class="bi bi-pencil-square CreateAccount__Edit-icon"
                                    onclick="focusFunction('mobile')"></i></a>
                        </div>
                    </div>
                    <div class="row ContentContainer__CreateAccountRowTwo-LeftPartRows">
                        <label for="inputNumber" class="col-md-4 col-lg-3 col-form-label">Whatsaap:</label>
                        <div class="col-md-7 col-lg-8 ContentContainer__CreateAccountRowTwo-LeftPartinputs">
                            <input type="text" name="whatsapp_number" value="{{ $user->whatsapp_number }}"
                                class="form-control" id="whatsapp">
                        </div>
                        <div class="col-1"><a href="#"><i class="bi bi-pencil-square CreateAccount__Edit-icon"
                                    onclick="focusFunction('whatsapp')"></i></a>
                        </div>
                    </div>
                    <div class="row ContentContainer__CreateAccountRowTwo-LeftPartRows">
                        <label for="inputEmail" class="col-md-4 col-lg-3 col-form-label">Email:</label>
                        <div class="col-md-7 col-lg-8 ContentContainer__CreateAccountRowTwo-LeftPartinputs">
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                id="email">
                        </div>
                        <div class="col-1"><i style="cursor: pointer"
                                class="bi bi-pencil-square CreateAccount__Edit-icon" onclick="focusFunction('email')"></i>
                        </div>
                    </div>
                    {{-- <div class="row ContentContainer__CreateAccountRowTwo-LeftPartRows">
              <label for="inputPassword" class="col-md-4 col-lg-3 col-form-label">Mote de passe:</label>   //passowrd
              <div class="col-md-7 col-lg-8 ContentContainer__CreateAccountRowTwo-LeftPartinputs">
                <input type="password" class="form-control" id="inputPassword">
              </div>
              <div class="col-1">
              </div>
            </div> --}}
                    <div class="row ContentContainer__CreateAccountRowTwo-LeftPartRows">
                        <label class="col-md-4 col-lg-3"></label>
                        <div class="col-md-7 col-lg-8 ContentContainer__CreateAccountRowTwo-LeftPartbuttonone">
                            <a href="#" onclick="document.getElementById('updateAccount').submit()">Saved</a>
                        </div>
                        <div class="col-1">
                        </div>
                    </div>
                    <div class="row ContentContainer__CreateAccountRowTwo-LeftPartRows">
                        <label class="col-md-4 col-lg-3"></label>
                        <div class="col-md-7 col-lg-8 ContentContainer__CreateAccountRowTwo-LeftPartbuttontwo">
                            <a href="{{ route('logout') }}"><i class="bi bi-box-arrow-left"></i>Logout</a>
                        </div>
                        <div class="col-1">
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-md-3 col-lg-7 ContentContainer__CreateAccountRowTwo-RightPart">

            </div>
        </div>
    </div>
    <!-- CreateAccount Content Section End-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places"></script>

    <script type="text/javascript" src="{{ asset('js/autoFillAddress.js') }}"></script>
    <script>
        function focusFunction(id) {
            document.getElementById(id).focus();
        }
    </script>
@endsection
