@extends('layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/shopeownerstyle.css') }}">
@endpush
@section('content')
@php
    $total_of_pages = 0;
    $total_to_pay = 0;
    foreach($files as $file){
         $total_of_pages += $file->num_of_pages;
         $total_to_pay += $file->total;
    }
@endphp

    <!-- Tab Section Start Mobaile-->
    @include('partials.shopOwnerTab')
    <!-- Tab Section End-->
    <!-- Tab Content Section Start-->
    <div class="container ContentContainer">

        <!-- History Detail Content Section Start-->
        <div id="myHistoryContent" class="container ContentContainer__History Content TabContent js-show">
            <div class="row ContentContainer__WalletRowOne">
                <div class="col-12 ContentContainer__WalletRowOneCol">
                    <div class="BoxOne">
                        <div class="itemone">
                            Total of pages :
                        </div>
                        <div class="itemtwo">
                            {{ $total_of_pages }}
                        </div>
                    </div>
                    <div class="BoxTwo">
                        <div class="itemone">
                            Total to pay :
                        </div>
                        <div class="itemtwo">
                            {{ $total_to_pay }}$
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ContentContainer__HistoryRowTwo">
                <div class="col-12 ContentContainer__HistoryRowTwoCol table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Date/ Time</th>
                                <th scope="col">User name</th>
                                <th scope="col">Doc name</th>
                                <th scope="col">No.of Pages</th>
                                <th scope="col">No. of copy</th>
                                <th scope="col">Recto/verso</th>
                                <th scope="col"><img style="width: 3rem;" src="{{ asset('images/color-wheel.png') }}" alt="">
                                </th>
                                <th scope="col"><i style="color: #000; font-size: 2rem;" class="bi bi-justify"></i></th>
                                <th scope="col">Price $</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($files as $file)
                            <tr>
                                <td scope="row" class="TableDatetd"> <span>{{ $file->created_at->format('H:i') }}/ {{ $file->created_at->format('d.m.Y') }}</span></td>
                                <td>
                                    <a href="{{ route('shopowner.userInfo', $file->user_id) }}" class="TableDownloadbutn"><span><u>{{ $file->user->name }}</u></span></a>
                                </td>
                                <td>{{ $file->original_name }}</td>
                                <td>{{ $file->num_of_pages }}</td>
                                <td>{{ $file->num_of_copies }}</td>
                                <td><input class="form-check-input TableInputs1" disabled {{ $file->recto_verso == 1 ? 'checked' : '' }} type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td><input {{ $file->color == 1 ? 'checked' : '' }} disabled class="form-check-input TableInputs1" type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td><input {{ $file->black_white == 1 ? 'checked' : '' }} disabled class="form-check-input TableInputs1" type="checkbox" value=""
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
        <!-- History Detail Content Section End-->
    </div>
    <!-- Tab Content Section End-->
    <!-- Popup Content Start-->
    <div class="form-popup" id="myForm">
        <form action="/action_page.php" class="form-container">
            <h1>Reminder User</h1>
            <p>Get You Document at</p>

            <label for="date"><b>Date</b></label>
            <input type="date" placeholder="Enter Email" name="email" required>
            <input type="time" placeholder="Enter Password" name="psw" required>

            <button type="submit" class="btn" onclick="closeForm()">Send</button>
        </form>
    </div>
    <!-- Popup Content End-->
@endsection
@push('script')
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>
@endpush
