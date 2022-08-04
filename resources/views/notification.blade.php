@extends('layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush
@section('content')
    <div class="container ContentContainer__Notification">
        <div class="row ContentContainer__NotificationRowOne">
            <div class="col-12 ContentContainer__NotificationRowOneCol">
                <h1><u>Notifi</u>cations</h1><i class="bi bi-bell-fill"></i>
            </div>
        </div>
        <div class="row ContentContainer__NotificationRowTwo">
            <div class="col-md-10 col-lg-8 ContentContainer__NotificationRowTwoCol">
                <div class="row ContentContainer__NotificationRowTwoCol-row">
                    <div class="col-2 ContentContainer__NotificationRowTwoCol-rowleftpart">
                        <img src="../images/Notification_Profile.svg" alt="">
                    </div>
                    <div class="col-8 ContentContainer__NotificationRowTwoCol-rowcenterpart">
                        <h1>You added user 1</h1>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dol.</p>
                        <span>10 min ago</span>
                    </div>
                    <div class="col-2 ContentContainer__NotificationRowTwoCol-rowrightpart">
                        <img src="../images/NotificationImg1.svg" alt="">
                    </div>
                </div>
                <div class="row ContentContainer__NotificationRowTwoCol-row">
                    <div class="col-2 ContentContainer__NotificationRowTwoCol-rowleftpart">
                        <img src="../images/Notification_Profile.svg" alt="">
                    </div>
                    <div class="col-8 ContentContainer__NotificationRowTwoCol-rowcenterpart">
                        <h1>New task added for user 1</h1>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
                        <span>10 min ago</span>
                    </div>
                    <div class="col-2 ContentContainer__NotificationRowTwoCol-rowrightpart">
                        <img src="../images/NotificationImg2.svg" alt="">
                    </div>
                </div>
                <div
                    class="row ContentContainer__NotificationRowTwoCol-row ContentContainer__NotificationRowTwoCol-row--three">
                    <div class="col-2 ContentContainer__NotificationRowTwoCol-rowleftpart">
                        <img src="../images/Notification_Profile.svg" alt="">
                    </div>
                    <div class="col-8 ContentContainer__NotificationRowTwoCol-rowcenterpart">
                        <h1>Task Completed by user 1</h1>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem. amet consectetur</p>
                        <span>10 min ago</span>
                    </div>
                    <div class="col-2 ContentContainer__NotificationRowTwoCol-rowrightpart">
                        <img src="../images/NotificationImg3.svg" alt="">
                    </div>
                </div>
                <div
                    class="row ContentContainer__NotificationRowTwoCol-row ContentContainer__NotificationRowTwoCol-row--three">
                    <div class="col-2 ContentContainer__NotificationRowTwoCol-rowleftpart">
                        <img src="../images/Notification_Profile.svg" alt="">
                    </div>
                    <div class="col-8 ContentContainer__NotificationRowTwoCol-rowcenterpart">
                        <h1>Congratulations</h1>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dol.</p>
                        <span>10 min ago</span>
                    </div>
                    <div class="col-2 ContentContainer__NotificationRowTwoCol-rowrightpart">
                        <img src="../images/NotificationImg4.svg" alt="">
                    </div>
                </div>
                <div
                    class="row ContentContainer__NotificationRowTwoCol-row ContentContainer__NotificationRowTwoCol-row--three">
                    <div class="col-2 ContentContainer__NotificationRowTwoCol-rowleftpart">
                        <img src="../images/Notification_Profile.svg" alt="">
                    </div>
                    <div class="col-8 ContentContainer__NotificationRowTwoCol-rowcenterpart">
                        <h1>User 1 rejected task 1</h1>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
                        <span>10 min ago</span>
                    </div>
                    <div class="col-2 ContentContainer__NotificationRowTwoCol-rowrightpart">
                        <img src="../images/NotificationImg5.svg" alt="">
                    </div>
                </div>
                <div
                    class="row ContentContainer__NotificationRowTwoCol-row ContentContainer__NotificationRowTwoCol-row--three">
                    <div class="col-2 ContentContainer__NotificationRowTwoCol-rowleftpart">
                        <img src="../images/Notification_Profile.svg" alt="">
                    </div>
                    <div class="col-8 ContentContainer__NotificationRowTwoCol-rowcenterpart">
                        <h1>Task Completed by user 1</h1>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
                        <span>10 min ago</span>
                    </div>
                    <div class="col-2 ContentContainer__NotificationRowTwoCol-rowrightpart">
                        <img src="../images/NotificationImg5.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
