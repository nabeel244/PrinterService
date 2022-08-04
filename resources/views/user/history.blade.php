@extends('layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush
@section('content')
    <!-- Tab Section Start Mobaile-->
    <div class="container TabContainer">
        @include('partials.userTabs')
              </div>

    <!-- Tab Section End-->
    <!-- Tab Content Section Start-->
    <div class="container ContentContainer">

        <!-- History Detail Content Section Start-->
        <div class="Content TabContent js-show ContentContainer__History">
            <div class="row ContentContainer__HistoryRowOne">
                <div class="col-12 ContentContainer__HistoryRowOneCol">
                    <h1>History</h1>
                </div>
            </div>
            <div class="row ContentContainer__HistoryRowTwo">
                <div class="col-12 ContentContainer__HistoryRowTwoCol table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Date/Time</th>
                                <th scope="col">Doc name</th>
                                <th scope="col">No. of pages</th>
                                <th scope="col">No. of Copy</th>
                                <th scope="col">Recto/verso</th>
                                <th scope="col"><img style="width: 3rem;" src="{{ asset('images/color-wheel.png') }}" alt=""></th>
                                <th scope="col"><i style="color: #000; font-size: 2rem;" class="bi bi-justify"></i></th>
                                <th scope="col">Price $</th>
                              </tr>
                        </thead>
                        <tbody>
                            @forelse ($files as $file)
                            <tr>
                                <td scope="row" class="TableDatetd"> <span>{{ $file->created_at->format('H:i') }}/ {{ $file->created_at->format('d.m.Y') }}</span></td>

                                <td>{{ $file->original_name }}</td>
                                <td>{{ $file->num_of_pages }}</td>
                                <td>{{ $file->num_of_copies }}</td>
                                <td><input disabled class="form-check-input TableInputs1" {{ $file->recto_verso == 1 ? 'checked' : '' }} type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td><input disabled {{ $file->color == 1 ? 'checked' : '' }} class="form-check-input TableInputs1" type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td><input disabled {{ $file->black_white == 1 ? 'checked' : '' }} class="form-check-input TableInputs1" type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td>{{ $file->total }}</td>
                            </tr>
                            @empty
                            <tr id="noFileUpload">
                                <td colspan="9" class="text-center">No Document</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Tab Content Section End-->
@endsection
