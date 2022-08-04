@extends('layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/adminstyle.css') }}">
@endpush
@section('content')
    <!-- Tab Section Start Mobaile-->
    <div class="TabContainer__TabNav">
        <div class="TabContainer__MobileTabNav">
            <h1>Menu</h1><i onclick="showMenu()" class="bi bi-list"></i>
        </div>
        @include('partials.adminSidebar')
    </div>
    <!-- Tab Section End-->
    <!-- Tab Content Section Start-->
    <div class="ContentContainer">
        <div id="myHomeContent" class=" TabContent ContentContainer__Home">
            <div class="row ContentContainer__HomeRowOne">
                <div class="col-12 ContentContainer__HomeRowOneCol">
                    <h1>Welcome</h1>
                </div>
            </div>
            <div class="row ContentContainer__HomeRowTwo">
                <div class="col-md-5 col-lg-5 ContentContainer__HomeRowTwo-LeftPart">
                    <img src="{{ asset('images/home-tab-content-img.svg') }}" alt="">
                </div>
                <div class="col-md-7 col-lg-7 ContentContainer__HomeRowTwo-RightPart">
                    <h1>Content</h1>
                    <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the
                        visual form of a document or a typeface without relying on meaningful content.</p>
                    <img src="{{ asset('images/home-tab-content-img-right.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Tab Content Section End-->
@endsection

