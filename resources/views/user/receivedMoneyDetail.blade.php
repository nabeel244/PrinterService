@extends('layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush
@section('content')
    <!-- Tab Section Start Mobaile-->
    <div class="container TabContainer">
        @if (!auth()->user()->hasRole('admin'))
        @include('partials.userTabs')
        @endif

    </div>
    <!-- Tab Section End-->
    <!-- Tab Content Section Start-->
    <div class="container ContentContainer">

        <!-- Received_Money Detail Content Section Start-->
        <div class="Content TabContent js-show ContentContainer__MoneyDetail">
            <div class="row ContentContainer__MoneyDetailRowOne">
                <div class="col-12 ContentContainer__MoneyDetailRowOneCol">
                    <a href="{{ route('home') }}"><i class="bi bi-arrow-left-short"></i><span>Back</span></a>
                    <h1>Received money by different shop owners</h1>
                </div>
            </div>
            <div class="row ContentContainer__MoneyDetailRowTwo">
                <div class="col-12 ContentContainer__MoneyDetailRowTwoCol table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Shop Owner</th>
                                <th scope="col">Printing shop address </th>
                                <th scope="col">Time/Date</th>
                                <th scope="col">Money recieved</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($receivedAmounts as $amount)
                            @php
                            $shop = \App\Models\User::find($amount->shop_id);

                        @endphp
                                <tr>
                                    <td scope="row">{{ $shop->name }}</td>
                                    <td>
                                        <p class="TableAddress"><img src="{{ asset('images/Location-img.svg') }}"
                                                alt=""><span>{{ $shop->address }}</span></p>
                                    </td>
                                    <td>{{ $amount->created_at->format('H:i') }} / {{ $amount->created_at->format('d.m.Y') }}
                                    </td>
                                    <td>{{ $amount->add_money . '$' }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
    <!-- Tab Content Section End-->
@endsection
