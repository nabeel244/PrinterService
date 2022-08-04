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
        <!-- Tab Content Users Start-->
        <div id="myUsersContent" class=" TabContent ContentContainer__Users">
            <div class="row ContentContainer__UsersRowOne">
                <div class="col-12 ContentContainer__UsersRowOneCol">
                    <h1>Users</h1>
                </div>
            </div>
            <div class="row ContentContainer__UsersRowTwo">
                <div class="col-12 ContentContainer__UsersRowTwoCol table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">User name</th>
                                <th scope="col">User contact</th>
                                <th scope="col">User email</th>
                                <th scope="col">Detail</th>

                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <a href="{{ route('admin.user.detail', $user->id) }}"
                                            class="TableDownloadbutn"><span><u>{{ $user->name }}</u></span></a>
                                    </td>

                                    <td>{{ $user->mobile_code }} {{ $user->mobile }}</td>
                                    <td style="color:#666666; font-weight:600">{{ $user->email }}</td>
                                    <td><a href="{{ route('admin.user.detail', $user->id) }}" class="TableButton">User
                                            Detail</a></td>
                                </tr>
                                @empty
                                <tr >
                                    <td colspan="9" class="text-center">No User</td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- Tab Content Users End-->
    </div>
@endsection
