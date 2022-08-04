@extends('layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/adminstyle.css') }}">
@endpush
@section('content')

    <!-- Received_Money Detail Content Section Start-->
    <div class="container ContentContainer__MoneyDetail">
        <div class="row ContentContainer__MoneyDetailRowOne">
            <div class="col-12 ContentContainer__MoneyDetailRowOneCol">
                {{-- <a href="{{ route('admin.shopOwner.detail') }}"><i class="bi bi-arrow-left-short"></i><span>Back</span></a> --}}
                <h1>Total payed to different users :</h1>
            </div>
        </div>
        <div class="row ContentContainer__MoneyDetailRowTwo">
            <div class="col-12 ContentContainer__MoneyDetailRowTwoCol">
                <h1>User name</h1>
                <h2>Money Payed</h2>
            </div>
        </div>
        @foreach ($totalPaids as $paid)


        <div class="row ContentContainer__MoneyDetailRowThree">
            <div class="col-8 col-md-4 ContentContainer__MoneyDetailRowThreeLeftPart">
                <h1>{{ @$paid->user->name }}</h1>
            </div>
            <div class="col-2 col-md-1 ContentContainer__MoneyDetailRowThreeRightPart">
                <h1>{{ @$paid->total . '$' }}</h1>
            </div>
        </div>
        @endforeach

    </div>
    <!-- Received_Money Detail Content Section End-->
@endsection
