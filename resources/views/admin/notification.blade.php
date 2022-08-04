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
    <!-- Notifications Content Section Start-->
    <div class="ContentContainer">
        <div class="Content TabContent ContentContainer__UserDetails ContentContainer__Notification js-show">
            <div class="row ContentContainer__NotificationRowOne">
                <div class="col-12 ContentContainer__NotificationRowOneCol">
                    <h1><u>Notifi</u>cations</h1><i class="bi bi-bell-fill"></i>
                </div>
            </div>
            <div class="row ContentContainer__NotificationRowTwo">
                <div class="col-md-10 col-lg-8 ContentContainer__NotificationRowTwoCol">

                    @forelse ($notifications as $notification)
                        <div class="row ContentContainer__NotificationRowTwoCol-row">
                            <div class="col-2 ContentContainer__NotificationRowTwoCol-rowleftpart">
                                <img src="{{ asset('images/Notification_Profile.svg') }}" alt="">
                            </div>
                            <div class="col-8 ContentContainer__NotificationRowTwoCol-rowcenterpart">
                                <h1>{{ $notification['data']['message'] }}</h1>
                                <span>{{ now()->diffInMinutes($notification['created_at']) }} Minutes Ago</span>
                            </div>
                        </div>
                    @empty
                        <div class="row ContentContainer__NotificationRowTwoCol-row">
                            No Notification
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
    <!-- Notifications Content Section End-->
@endsection
