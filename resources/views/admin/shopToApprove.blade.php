<!-- Tab Content OwnersApproval Start-->
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

    <div class="ContentContainer">

        <div id="myShopOwnersApprovalContent" class=" TabContent ContentContainer__OwnerApproval">
            <div class="row ContentContainer__OwnerApprovalRowOne">
                <div class="col-12 ContentContainer__OwnerApprovalRowOneCol">
                    @include('partials.sessionMessage')
                    <div class="alert alert-success fade-property d-none " id="success-message">
                    </div>
                    <h1>Shop Owner to Approve</h1>
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
                            @forelse ($shopOwners as $shopOwner)
                                <tr>
                                    <td>{{ $shopOwner->id }}</td>
                                    <td>
                                        <a href="#"
                                            class="TableDownloadbutn"><span><u>{{ $shopOwner->name }}</u></span></a>
                                    </td>

                                    <td>{{ $shopOwner->mobile_code . $shopOwner->mobile }}</td>
                                    <td style="color: #666666; font-weight: 600;">{{ $shopOwner->email }}</td>
                                    <td style="color: #666666; font-weight: 600;">{{ $shopOwner->address }}</td>
                                    <td>
                                        <form action="{{ route('admin.update.shop.status', $shopOwner->id) }}"
                                            method="POST">
                                            @csrf
                                            <select class="dropdown Tabledropdown" data-id="{{ $shopOwner->id }}"
                                                name="status" id="dropdownMenuButton1" style="height: 50px">

                                                <option value="approved"
                                                    {{ $shopOwner->status == 'approved' ? 'selected' : '' }}>Approved
                                                </option>
                                                <option value="disapproved"
                                                    {{ $shopOwner->status == 'disapproved' ? 'selected' : '' }}>
                                                    Disapproved</option>
                                                <option value="block"
                                                    {{ $shopOwner->status == 'blocked' ? 'selected' : '' }}>Block</option>
                                            </select>
                                        </form>
                                    </td>
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
    </div>

    <!-- Tab Content Section-OwnersApproval End-->
@endsection
@push('script')
    <script>
        var select = document.getElementById('dropdownMenuButton1');
        select.addEventListener('change', function() {
            this.form.submit();
        }, false);
    </script>
    {{-- <script>
    $(document).ready(function() {
       $.getScript('js/ajaxHeader.js')
        $('#dropdownMenuButton1').on('change',function(e){
            var status = $(this).val();

            var id = $(this).attr('data-id');

            $.ajax({
                        type: 'POST',
                        url: "{{ route('admin.update.shop.status') }}",
                        data:{status: status, id:id},
                        cache: false,
                        success: (data) => {
                            $('#success-message').removeClass('d-none').text(data.message);
                            // $(this).parents('tr').remove();

                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
        });
        setTimeout(function() {
                    $('.fade-property').fadeOut('slow');

                }, 5000);
    });

    </script> --}}
@endpush
