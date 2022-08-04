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

        <!-- User Detail Content Section Start-->
        <div class="Content TabContent ContentContainer__UserDetails js-show">
            <div class="row ContentContainer__UserDetailsRowOne">
                <div class="col-12 ContentContainer__UserDetailsRowOneCol">
                    @include('partials.sessionMessage')
                    <h1>Shop Owner Detail</h1>
                </div>
            </div>
            <div class="row ContentContainer__ShopOwnerDetailsRowSecond">
                <div class="col-6 col-md-3 col-lg-1 ContentContainer__ShopOwnerDetailsRowSecondcolone">
                    <img src="{{ asset('images/Icon awesome-band-aid.svg') }}" alt="">
                    <p>{{ $shopOwner->id }}</p>
                </div>
                <div class="col-6 col-md-4 col-lg-2 ContentContainer__ShopOwnerDetailsRowSecondcoltwo">
                    <img src="{{ asset('images/Icon awesome-user-alt.svg') }}" alt="">
                    <p>{{ $shopOwner->name }}</p>
                </div>
                <div class="col-5 col-md-5 col-lg-2 ContentContainer__ShopOwnerDetailsRowSecondcolthree">
                    <img src="{{ asset('images/Icon map-volume-control-telephone.svg') }}" alt="">
                    <p>{{ $shopOwner->mobile_code . $shopOwner->mobile }}</p>
                </div>
                <div class="col-7 col-md-12 col-lg-3 ContentContainer__ShopOwnerDetailsRowSecondcolfour">
                    <img src="{{ asset('images/Icon zocial-email.svg') }}" alt="">
                    <p>{{ $shopOwner->email }}</p>
                </div>
                <div class="col-lg-4 ContentContainer__ShopOwnerDetailsRowSecondcolLeftPart">
                    <div class="row ContentContainer__ShopOwnerDetailsRowSecondcolLeftPartRow">
                        <div
                            class="col-4 col-md-4 col-lg-5 ContentContainer__ShopOwnerDetailsRowSecondcolLeftPartRowColOne">
                            <a href="#"><button
                                {{-- <a href="{{ route('admin.received.money' , $shopOwner->id) }}"><button --}}
                                    class="btn navigation-bar__wallet-btn"><img
                                        src="{{ asset('images/navwallet-button-icon.svg') }}" alt="">
                                    <p>Wallet <span>{{ @$shopOwner->wallet->total }}</span></p>
                                </button></a>
                        </div>
                        <div class=" col-6 col-md-5 col-lg-5 ContentContainer__ShopOwnerDetailsRowSecondcolfive">
                            <form action="{{ route('admin.update.shop.status', $shopOwner->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="blocked">
                                <button type="submit" style="width: 100px !important"
                                    class="ContentContainer__ShopOwnerDetailsRowSecondcolfiveButton">Block</button>
                            </form>
                            <a href="{{ route('paid.money', $shopOwner->id) }}"
                                class="ContentContainer__ShopOwnerDetailsRowSecondcolfiveButton ContentContainer__ShopOwnerDetailsRowSecondcolfiveButton--two">Total
                                Payed</a>
                        </div>
                        <div class="col-2 col-md-3 col-lg-2 ContentContainer__ShopOwnerDetailsRowSecondcolseven">
                            <i style="cursor: pointer" class="bi bi-filetype-xlsx" id="btnExporttoExcel"></i>

                        </div>

                    </div>
                </div>

            </div>
            <div class="row ContentContainer__UserDetailsRowTwo">
                <div class="col-12 ContentContainer__UserDetailsRowTwoCol table-responsive">
                    <table class="table" id="tblShopOwner">
                        <thead>
                            <tr>
                                <th scope="col">Date/ Time</th>
                                <th scope="col">Doc name</th>
                                <th scope="col">File</th>
                                <th scope="col">Shop location</th>
                                <th scope="col">Shop owner name</th>
                                <th scope="col">No. of Pages</th>
                                <th scope="col">No. of Copy</th>
                                <th scope="col">Recto/Verso</th>
                                {{-- <th scope="col"><img style="width: 3rem;" src="../images/color-wheel.png" alt=""></th> --}}
                                <th scope="col">Color</th>
                                <th scope="col">White/Black</th>
                                {{-- <th scope="col"><i style="color: #000; font-size: 2rem;" class="bi bi-justify"></i></th> --}}
                                <th scope="col">Price $</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($files as $file)
                                <tr>
                                    <td scope="row" class="TableDatetd"> <span>{{ $file->created_at->format('H:i') }}/
                                            {{ $file->created_at->format('d.m.Y') }}</span></td>
                                    <td>{{ $file->original_name }}</td>
                                    <td>
                                        <a href="{{ asset('files/' . $file->name) }}"
                                            class="TableDownloadbutn"><span><u>Download</u></span></a>
                                    </td>
                                    <td style="color: #666666; font-weight: 600;">{{ $shopOwner->address }}</td>
                                    <td>
                                        {{ $shopOwner->name }}
                                    </td>
                                    <td>{{ $file->num_of_pages }}</td>
                                    <td>{{ $file->num_of_copies }}
                                    </td>
                                    <td>
                                        {{ $file->recto_verso == 1 ? 'Yes' : 'No' }}
                                        {{-- <input class="form-check-input TableInputs1" disabled {{ $file->recto_verso == 1 ? 'checked' : '' }}  type="checkbox" value="" id="flexCheckDefault"> --}}
                                    </td>
                                    <td>
                                        {{ $file->color == 1 ? 'Yes' : 'No' }}
                                        {{-- <input class="form-check-input TableInputs1" disabled {{ $file->color == 1 ? 'checked' : '' }} type="checkbox" value="" id="flexCheckDefault"></td> --}}
                                    <td>
                                        {{ $file->black_white == 1 ? 'Yes' : 'No' }}

                                        {{-- <input class="form-check-input TableInputs1" disabled {{ $file->black_white == 1 ?'checked' : '' }} type="checkbox" value="" id="flexCheckDefault"></td> --}}
                                    <td>{{ $file->total }}</td>
                                </tr>
                                @empty
                                <tr >
                                    <td colspan="11" class="text-center">No Document</td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- User Detail Content Section End-->
    </div>
    <!-- Tab Content Section End-->
@endsection
@push('script')
    <script src="{{ asset('js/table2excel.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $("#btnExporttoExcel").click(function() {
                $("#tblShopOwner").table2excel({
                    filename: "Shop_Owner_Detail.xls"
                });
            });
        });
    </script>
@endpush
