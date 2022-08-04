@extends('layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style type="text/css">
        #map {
          height: 400px;
        }
    </style>
@endpush
@section('content')
    <!-- Tab Section Start Mobaile-->
    <div class="container TabContainer">
       @include('partials.userTabs')
    </div>


    {{-- @include('partials.tabs') --}}
    <div class="container ContentContainer">


        <div id="myLocateContent" class="Content TabContent js-show ContentContainer__Locate">
            <div class="row ContentContainer__LocateRowOne">
                <div class="col-12 ContentContainer__LocateRowOneCol">
                    <a href="#">Choose the printer ?</a>
                </div>
            </div>
            <div class="row ContentContainer__LocateRowTwo">
                <div class="col-12 ContentContainer__LocateRowTwoCol table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Name</th>
                                <th scope="col">Address </th>
                                <th scope="">Total $</th>
                                <th scope="col">Distance</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shops as $shop)

                                <tr>
                                    <td scope="row"><input class="form-check-input TableInputs1 toggleSendCheckbox"
                                            onchange="getShop({{ $shop->user_id }})" data-id="{{ $shop->user_id }}"
                                            onclick="toggleSend(event)" type="checkbox" value="" id="flexCheckDefault"
                                            {{ $loop->first ? 'checked' : '' }}></td>
                                    <td>
                                        <p class="TablePara">{{ $shop->name }}</p>
                                    </td>
                                    <td>
                                        <p class="TableAddress">
                                           <a href="https://maps.google.com/?q={{ $shop->latitude }},{{ $shop->longitude }}" target="blank"> <img src="{{ asset('images/Location-img.svg') }}"
                                                alt=""></a>
                                                <span>{{ $shop->address }}</span></p>
                                    </td>

                                    @php
                                        $total = 0;
                                        // $file_ids = [];
                                    @endphp
                                    @foreach ($files as $file)
                                        @php
                                            $rate = ($file->color * $shop->color + $file->black_white * $shop->black_white);
                                            $total += ($rate == 0 ? 1 : $rate) * $file->num_of_copies * $file->num_of_pages;
                                        @endphp
                                    @endforeach

                                    <td id="total{{ $shop->user_id }}">{{ $total }}</td>
                                    <td>{{ round($shop->distance, 2) }} {{ $shop->distance <= 1 ? 'm' : 'km' }}</td>
                                    <td>
                                        <button onclick="openFormtwo()"
                                            class="sendIcon @if ($loop->first) @else
                                 hide-container @endif"
                                            type="button" id="sendButton"><i
                                                class="bi bi-send"></i><span>Send</span></button>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                        <script>
                            const toggleSend = (e) => {

                                const toggleSendCheckboxes = document.querySelectorAll('.toggleSendCheckbox');
                                // remove all the checked

                                toggleSendCheckboxes.forEach((toggleSendCheckbox) => {
                                    toggleSendCheckbox.checked = false;
                                    toggleSendCheckbox.closest('tr').querySelector('.sendIcon').classList.add('hide-container');
                                })
                                // checked the current target
                                e.currentTarget.checked = true
                                e.currentTarget.closest('tr').querySelector('.sendIcon').classList.remove('hide-container')
                            }
                        </script>
                    </table>
                </div>
            </div>
            <div class="row ContentContainer__LocateRowThree">
                <div class="col-12 ContentContainer__LocateRowThreeCol">
                    <a href="{{ route('user.upload') }}">Back to Configure</a>
                </div>
            </div>
        </div>


    </div>
    <!-- Tab Content Section End-->
    <!-- ThirdPopup Content Start-->
    <div class="form-popuptwo" id="mythirdpopup">
        <form class="form-containertwo" action="{{ route('user.sendFile') }}" method="POST">
            @csrf
            <input type="hidden" id="shop_id" name="shop_id">
            <input type="hidden" id="total_price" name="total">
            <input type="hidden" id="file_ids" name="file_id[]">
            <h1>Are You sure you want to send?</h1>
            <div class="Popupbuttons">
                <button class="btn btn--two" type="submit" onclick="closeFormtwo()">Yes</button>
                {{-- <a href="{{ route('user.file.status') }}" type="submit" class="btn" onclick="closeFormtwo()">Yes</a> --}}
                <a href="#" class="btn btn--two" onclick="closeFormtwo()">No</a>
                {{-- <button class="btn btn--two" onclick="closeFormtwo()">No</button> --}}
            </div>
        </form>
    </div>
    </div>
    <!-- ThirdPopup Content End-->
@endsection
@push('script')
    <script>
        function openFormtwo() {
            document.getElementById("mythirdpopup").style.display = "block";
        }

        function closeFormtwo() {
            document.getElementById("mythirdpopup").style.display = "none";
        }
        $(document).ready(function() {
            $('.ContentContainer__Home').removeClass('js-show');
        });
        var files = @json($files);
        fileIds = [];
        files.forEach(item => fileIds.push(item.id));

        function getShop(id) {

            var total = $(`#total${id}`).text();
            var shop_id = id;
            $('#total_price').val(total);
            $('#shop_id').val(shop_id);

        }
        $(document).ready(function() {
            var shop_id = $("input[type='checkbox']").attr('data-id');
            var total = $(`#total${shop_id}`).text();
            $('#file_ids').val(fileIds);
            $('#shop_id').val(shop_id);
            $('#total_price').val(total);
        });
    </script>

@endpush
