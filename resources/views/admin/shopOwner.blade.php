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
        <!-- Tab Content Shop-Owner Start-->
        <div id="myShopOwnerContent" class=" TabContent ContentContainer__OwnerApproval">
            <div class="row ContentContainer__OwnerApprovalRowOne">
                <div class="col-12 ContentContainer__OwnerApprovalRowOneCol">
                    <h1>Shop Owner</h1>
                </div>
            </div>
            <div class="row ContentContainer__OwnerApprovalRowTwo">
                <div class="col-12 ContentContainer__OwnerApprovalRowTwoCol table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Email</th>
                                <th scope="col">Location</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($shopOwners as $shop)
                                <tr>
                                    <td>{{ $shop->id }}</td>
                                    <td>
                                        <a href="{{ route('admin.shopOwner.detail', $shop->id) }}"
                                            class="TableDownloadbutn"><span><u>{{ $shop->name }}</u></span></a>
                                    </td>

                                    <td>{{ $shop->mobile_code . $shop->mobile }}</td>
                                    <td style="color: #666666; font-weight: 600;">{{ $shop->email }}</td>
                                    <td style="color: #666666; font-weight: 600;">{{ $shop->address }}</td>
                                    <td><a href="{{ route('admin.shopOwner.detail', $shop->id) }}"
                                            class="TableButton">Detail</a></td>
                                </tr>
                                @empty
                                <tr >
                                    <td colspan="9" class="text-center">No Shop Owner</td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Tab Content Shop-Owner End-->
    </div>
@endsection
