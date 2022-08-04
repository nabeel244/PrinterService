@extends('layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/shopeownerstyle.css') }}">
@endpush
@section('content')
    <!-- Tab Content Section Start-->
    <div class="container MyAccountContainer">

        <div class="row MyAccountContainer__RowUper">
            <div class="col-md-7 MyAccountContainer__LeftPart">
                <div class="row MyAccountContainer__LeftPartRow">
                    @include('partials.sessionMessage')
                    <div class="col-12 MyAccountContainer__LeftPartRowCol">
                        <h1>My Account</h1>
                    </div>
                    <div class="col-12 MyAccountContainer__LeftPartRowCol">
                        <h2>Name :</h2>
                        <p class="text-capitalize">{{ $user->name }}</p>
                    </div>
                    <div class="col-12 MyAccountContainer__LeftPartRowCol">
                        <h2>Address</h2>
                        <p>{{ $user->address }}</p>
                    </div>
                    <div class="col-12 MyAccountContainer__LeftPartRowCol">
                        <h2>Tele :</h2>
                        <p>{{ $user->mobile_code . $user->mobile }}</p>
                    </div>
                    <div class="col-12 MyAccountContainer__LeftPartRowCol">
                        <h2>Whatsapp :</h2>
                        <p>{{ $user->whatsapp_number }}</p>
                    </div>
                    <div class="col-12 MyAccountContainer__LeftPartRowCol">
                        <h2>Email :</h2>
                        <p>{{ $user->email }}</p>
                    </div>
                    {{-- <div class="col-12 MyAccountContainer__LeftPartRowCol">
                 <h2>Mote de passe :</h2>
                 <p>Mote de passe </p>
               </div> --}}
                </div>
            </div>
            <div class="col-md-5 MyAccountContainer__RightPart">
                <p>Our Rates :</p>
                <form action="{{ route('shopowner.addRate') }}" method="POST">
                    @csrf
                    <div class="box MyAccountContainer__RightPartBox1">
                        <div class="MyAccountContainer__RightPartBox1para">
                            <p>Black & White</p>
                        </div>
                        <div class="MyAccountContainer__RightPartBox1InputSec">
                            <input id=demoInput type=number value="{{ @$user->rate->black_white }}" min=0 max=100
                                name="black_white" placeholder="00">
                            <div class="MyAccountContainer__RightPartBox1Buttons">
                                <a href="#" onclick="increment()"><i class="bi bi-caret-up-fill"></i></a>
                                <a href="#" onclick="decrement()" class="MyAccountContainer__RightPartBox1Button1"> <i
                                        class="bi bi-caret-down-fill"></i></a>

                                {{-- <button onclick="increment()"><i class="bi bi-caret-up-fill"></i></button> --}}
                                {{-- <button class="MyAccountContainer__RightPartBox1Button1" onclick="decrement()"><i class="bi bi-caret-down-fill"></i></button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="box MyAccountContainer__RightPartBox1">
                        <div class="MyAccountContainer__RightPartBox1para">
                            <p>Color</p>
                        </div>
                        <div class="MyAccountContainer__RightPartBox1InputSec">
                            <input id=demoInputone type=number value="{{ @$user->rate->color }}" name="color" min=0
                                max=100 placeholder="00">
                            <div class="MyAccountContainer__RightPartBox1Buttons">
                                <a href="#" onclick="incrementone()"><i class="bi bi-caret-up-fill"></i></a>
                                <a href="#" onclick="decrementone()"
                                    class="MyAccountContainer__RightPartBox1Button1"><i
                                        class="bi bi-caret-down-fill"></i></a>
                                {{-- <button onclick="incrementone()"><i class="bi bi-caret-up-fill"></i></button> --}}
                                {{-- <button class="MyAccountContainer__RightPartBox1Button1" onclick="decrementone()"><i class="bi bi-caret-down-fill"></i></button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="MyAccountContainer__RightPartRowTwo">
                        <div class="col-12 MyAccountContainer__RightPartRowTwoCol">
                            <button type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>


    </div>
    <!-- Tab Content Section End-->
@endsection
@push('script')
    <script>
        function increment() {
            document.getElementById('demoInput').stepUp();
        }

        function decrement() {
            document.getElementById('demoInput').stepDown();
        }
    </script>
    <script>
        function incrementone() {
            document.getElementById('demoInputone').stepUp();
        }

        function decrementone() {
            document.getElementById('demoInputone').stepDown();
        }
    </script>
@endpush
