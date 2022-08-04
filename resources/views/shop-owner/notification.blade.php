@extends('layouts.master')
@push('style')
<link rel="stylesheet" href="{{ asset('css/shopeownerstyle.css') }}">

@endpush
@section('content')


    <div class="container ContentContainer">
    <div class="container ContentContainer__Notification">
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



@endsection
