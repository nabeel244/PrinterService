@extends('layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/shopeownerstyle.css') }}">
@endpush
@section('content')
    <!-- Tab Section Start Mobaile-->
  @include('partials.shopOwnerTab')
    <!-- Tab Section End-->

        <!-- Tab Content Section-UserInformation Start-->
        <div class="container ContentContainer">
        <div id="myUserInfoContent" class="container ContentContainer__UserInfo Content TabContent js-show">
            <div class="row ContentContainer__UserInfoRowOne">
                @include('partials.sessionMessage')
                <div class="col-12 ContentContainer__UserInfoRowOneCol">
                    <h1>User</h1>
                </div>
            </div>
            <div class="row ContentContainer__UserInfoRowSecond">
                <div class="col-3 ContentContainer__UserInfoRowSecondcolone">
                    <img src="{{ asset('images/Icon awesome-band-aid.svg') }}" alt="">
                    <p>{{ $user->id }}</p>
                </div>
                <div class="col-4 ContentContainer__UserInfoRowSecondcoltwo">
                    <img src="{{ asset('images/Icon awesome-user-alt.svg') }}" alt="">
                    <p>{{ $user->name }}</p>
                </div>
                <div class="col-5 ContentContainer__UserInfoRowSecondcolfive">
                    <a onclick="openFormone()"><button class="btn ContentContainer__User__wallet-btn"><img
                                src="{{ asset('images/navwallet-button-icon.svg') }}" alt="">
                            <p>Wallet <span>{{ @$user->wallet->total }}</span></p>
                        </button></a>
                </div>
            </div>
            <div class="row ContentContainer__UserInfoRowTwo">
                <div class="col-12 ContentContainer__UserInfoRowTwoCol table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Date/ Time</th>
                                <th scope="col">Doc name</th>
                                <th scope="col">File</th>
                                <th scope="col">No. of Pages</th>
                                <th scope="col">No. of copy</th>
                                <th scope="col">Recto/verso</th>
                                <th scope="col"><img style="width: 3rem;" src="{{ asset('images/color-wheel.png') }}" alt="">
                                </th>
                                <th scope="col"><i style="color: #000; font-size: 2rem;" class="bi bi-justify"></i></th>
                                <th scope="col">Price $</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user->printFiles as $file)
                            <tr>
                                <td scope="row" class="TableDatetd"> <span>{{ $file->created_at->format('H:i') }}/ {{ $file->created_at->format('d.m.Y') }}</span></td>
                                <td>{{ $file->original_name }}</td>
                                <td>
                                    <a href="{{ asset('files/'.$file->name) }}" onclick="updateStatus({{ $file->id }})" class="TableDownloadbutn"><span><u>Download</u></span></a>
                                </td>

                                <td>{{ $file->num_of_pages }}</td>
                                <td>{{ $file->num_of_copies }}</td>
                                <td><input disabled {{ $file->recto_verso == 1 ? 'checked' : '' }} class="form-check-input TableInputs1" type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td><input disabled {{ $file->color == 1 ? 'checked' : '' }} class="form-check-input TableInputs1" type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td><input disabled {{ $file->black_white == 1 ? 'checked' : '' }} class="form-check-input TableInputs1" type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td >{{ $file->total }}</td>
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

        <!-- Tab Content Section-UserInformation End-->

    <!-- Tab Content Section End-->

    <!-- SecondPopup Content Start-->
    <div class="form-popupone" id="mysecondpopup">
        <form class="form-containerone">
            <h1>Add Money</h1>
            <p>Add or money for the user</p>
            <script>
                function openFormtwo(event) {
                    event.preventDefault();

                    document.getElementById("mythirdpopup").style.display = "block";
                }

                function closeFormtwo() {
                    document.getElementById("mythirdpopup").style.display = "none";
                }
            </script>
            <button type="submit" class="btn" onclick="openFormtwo(event)">User Present Money</button>
            <script>
                function openFormthree(event) {
                    event.preventDefault();

                    document.getElementById("myfourthpopup").style.display = "block";
                }

                function closeFormthree() {
                    document.getElementById("myfourthpopup").style.display = "none";
                }
            </script>
            <button type="submit" class="btn" onclick="openFormthree(event)">Add Money</button>
        </form>
    </div>
    <!-- SecondPopup Content End-->
    <!-- ThirdPopup Content Start-->
    <div class="form-popuptwo" id="mythirdpopup">
        <form class="form-containertwo" method="POST" action="{{ route('shopowner.submit.deductMoney') }}">
            @csrf
            <h1>Use Money</h1>
            <p>Use money present in Wallet</p>
            <label for="text"><b>Money</b></label>
            <input type="text" name="deduct_money" required>
            <input type="hidden" value="{{ $user->id }}" name="user_id">
            <button type="submit" class="btn">Save</button>
        </form>
    </div>
    <!-- ThirdPopup Content End-->
    <!-- FourthPopup Content Start-->
    <div class="form-popuptwo" id="myfourthpopup">
        <form class="form-containertwo" method="POST" action="{{ route('shopowner.submit.addMoney') }}">
            @csrf
            <h1>Add Money</h1>
            <p>Add money for the user</p>
            <label for="text"><b>Money</b></label>
            <input type="text" name="add_amount" required>
            <input type="hidden" value="{{ $user->id }}" name="user_id">
            {{-- <button type="submit" class="btn" onclick="closeFormthree()">Save</button> --}}
            <button type="submit" class="btn" >Save</button>
        </form>
    </div>
    <!-- FourthPopup Content End-->
        </div>
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
    <script>
        function openFormone() {
            document.getElementById("mysecondpopup").style.display = "block";
        }

        function closeFormone() {
            document.getElementById("mysecondpopup").style.display = "none";
        }
    </script>
    <script>
     function  updateStatus(id){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
});
    $.ajax({
        type: 'POST',
        url: "{{ route('shopowner.updateFileStatus') }}",
        data: {
            id:id,

        },
        success:function(response){

            },
            error: function(response) {
                console.log(response);
             }
    });
     }

    </script>
@endpush
