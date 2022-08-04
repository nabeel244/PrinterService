@extends('layouts.master')
@push('style')
<link rel="stylesheet" href="{{ asset('css/shopeownerstyle.css') }}">

@endpush
@section('content')
    <!-- Tab Section Start Mobaile-->

    @include('partials.shopOwnerTab')

    <!-- Tab Section End-->
    <!-- Tab Content Section Start-->
    <div class="container ContentContainer">

        <!-- History Detail Content Section Start-->
        <div class="Content TabContent js-show ContentContainer__History">
            <div class="row ContentContainer__HistoryRowOne">
                @include('partials.sessionMessage')
                <div class="col-12 ContentContainer__HistoryRowOneCol">
                    <h1>History</h1>
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
                                <th scope="col"><img style="width: 3rem;" src="{{ asset('images/color-wheel.png') }}"
                                        alt=""></th>
                                <th scope="col"><i style="color: #000; font-size: 2rem;" class="bi bi-justify"></i></th>
                                <th scope="col">Price $</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($files as $file)
                                <tr>

                                    <td scope="row" class="TableDatetd"> <span>{{ $file->created_at->format('H:i') }}/
                                            {{ $file->created_at->format('d.m.Y') }}</span></td>
                                    <td>
                                        <a href="{{ route('shopowner.userInfo', $file->user_id) }}"
                                            class="TableDownloadbutn"><span><u>{{ $file->user->name }}</u></span></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('view.pdf.file', $file->file_id) }}"
                                            class="TableDownloadbutn"><span><u> {{ $file->original_name }}</u></span></a>

                                    </td>
                                    <td>{{ $file->num_of_pages }}</td>
                                    <td>{{ $file->num_of_copies }}</td>
                                    <td><input class="form-check-input TableInputs1" disabled
                                            {{ $file->recto_verso == 1 ? 'checked' : '' }} type="checkbox" value=""
                                            id="flexCheckDefault"></td>
                                    <td><input {{ $file->color == 1 ? 'checked' : '' }} disabled
                                            class="form-check-input TableInputs1" type="checkbox" value=""
                                            id="flexCheckDefault"></td>
                                    <td><input {{ $file->black_white == 1 ? 'checked' : '' }} disabled
                                            class="form-check-input TableInputs1" type="checkbox" value=""
                                            id="flexCheckDefault"></td>
                                    <td>{{ $file->total }}</td>
                                    <td><button type="button" class="TableButtonValidate"
                                            onclick="openForm('{{ $file->user_id }}','{{ $file->original_name }}')">Reminder
                                            User</button></td>
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
    <!-- Popup Content Start-->
    <div class="form-popup" id="myForm">
        <form action="{{ route('shopowner.remind.user') }}" method="POST" class="form-container">
            @csrf
            <h1>Reminder User</h1>
            <p>Get You Document at</p>

            <label for="date"><b>Date</b></label>
            <input type="hidden" name="user_id" id="remind_user_id">
            <input type="hidden" name="file_name" id="remind_file_name">
            <input type="date" name="date" required>
            <input type="time" name="time" name="psw" required>

            <button type="submit" class="btn" onclick="closeForm()">Send</button>
        </form>
    </div>
    <!-- Popup Content End-->
    <!-- Tab Content Section End-->
@endsection
@push('script')
    <script>
        function openForm(id, filename) {

            document.getElementById('remind_user_id').value = id;
            document.getElementById('remind_file_name').value = filename;
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>

@endpush
