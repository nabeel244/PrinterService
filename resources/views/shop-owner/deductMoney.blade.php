@extends('layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/shopeownerstyle.css') }}">
@endpush
@section('content')
    <!-- Tab Section Start Mobaile-->
  @include('partials.shopOwnerTab')
  <div class="container ContentContainer">
        <!-- Tab Content Add-Money Start-->
<div id="addMoney" class="container ContentContainer__AddMoney Content TabContent js-show" >
    @include('partials.sessionMessage')
    <div class="row ContentContainer__AddMoneyRowOne">
        <div class="col-12 ContentContainer__AddMoneyRowOneCol">
          <form class="example" action="{{ route('shopowner.searchUser') }}" method="POST"  class="ContentContainer__AddMoneyRowOneColSearchForm">
            @csrf
            <input type="hidden" value="deductMoney" name="file">
            <input type="text" placeholder="Identifier code  |  User Name" name="name_code">
            <button type="submit"><i class="bi bi-search"></i>Search</button>
          </form>
        </div>
        </div>

    <div class="row ContentContainer__AddMoneyRowTwo">
      <div class="col-12 ContentContainer__AddMoneyRowTwoCol table-responsive">
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">Identifier code </th>
                  <th scope="col">User name</th>
                  <th scope="col">Total remaining Points</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)


                <tr>
                  <td>{{ $user->identifier }}</td>
                  <td>
                    <a style="cursor: pointer;" onclick="openFormtwo({{ $user->id }})"  class="TableDownloadbutn"><span><u>{{ $user->name }}</u></span></a>
                  </td>
                  <td>{{ @$user->wallet->total ? @$user->wallet->total : 0 }}</td>
                </tr>
                @endforeach

            </tbody>
          </table>
      </div>
    </div>
      </div>

      <!-- Tab Content Add-Money End-->
      <!-- ThirdPopup Content Start-->
<div class="form-popuptwo" id="mythirdpopup">
    <form class="form-containertwo" action="{{ route('shopowner.submit.deductMoney') }}" method="POST">
        @csrf
      <h1>Deduct Money</h1>
      <p>Deduct money for the user</p>
      <label for="text"><b>Money</b></label>
      <input type="hidden" name="user_id" id="user_id">

      <input type="text" placeholder="Aamount" name="deduct_money" required>
      <button type="submit" class="btn" onclick="closeFormtwo()">Save</button>
    </form>
  </div>
  <!-- ThirdPopup Content End-->
  </div>
  @endsection

  @push('script')
  <script>
    function openFormtwo(id) {
        document.getElementById('user_id').value = id;
      document.getElementById("mythirdpopup").style.display = "block";
    }

    function closeFormtwo() {
      document.getElementById("mythirdpopup").style.display = "none";
    }
    </script>
  @endpush
