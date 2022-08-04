@extends('layouts.master')
@push('style')
<link rel="stylesheet" href="{{ asset('css/shopeownerstyle.css') }}">

@endpush
@section('content')
      <!-- Tab Section Start Mobaile-->
      <div class="container TabContainer">
        <div class="TabContainer__TabNav">
          <div class="TabContainer__MobileTabNav">
            <h1>Menue</h1><i onclick="showMenu()" class="bi bi-list"></i>
          </div>

          <div id="mynavItems" class="TabContainer__TabNav--mobile js-hide">
            <a onclick="showTabContent(event, 'myHomeContent');showMenu()" class="Tab" href="#"><i class="bi bi-house-door-fill"></i>  Home</a>
           <a onclick="showTabContent(event, 'myDocumentContent');showMenu()" class="Tab active" href="#"><i class="bi bi-download"></i>Documents</a>
          </div>
        </div>
    </div>
    <!-- Tab Section End-->
    <!-- Tab Content Section Start-->
    <div class="container ContentContainer">
      <!-- Tab Content Section-Home Start-->
    <div id="myHomeContent" class="Content TabContent ContentContainer__Home" >
    <div class="row ContentContainer__HomeRowOne">
      <div class="col-12 ContentContainer__HomeRowOneCol">
      <h1>Welcome</h1>
      </div>
    </div>
    <div class="row ContentContainer__HomeRowTwo">
      <div class="col-md-5 col-lg-3 ContentContainer__HomeRowTwo-LeftPart">
       <img src="../images/home-tab-content-img.svg" alt="">
      </div>
      <div class="col-md-7 col-lg-7 ContentContainer__HomeRowTwo-RightPart">
    <h1>Content</h1>
    <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</p>
    <img src="../images/home-tab-content-img-right.svg" alt="">
      </div>
    </div>
  </div>
  <!-- Tab Content Section-Home End-->
  <!-- Tab Content Section-Documents Start-->
  <div id="myDocumentContent" class="container ContentContainer__Documents Content TabContent" >
    <div class="row ContentContainer__DocumentsRowOne">
    <div class="col-12 ContentContainer__DocumentsRowOneCol">
    <h1>Documents</h1>
    </div>
    </div>
    <div class="row ContentContainer__DocumentsRowTwo">
      <div class="col-12 ContentContainer__DocumentsRowTwoCol table-responsive">
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">Date/ Time</th>
                  <th scope="col">User name</th>
                  <th scope="col">Total of Pages</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row" class="TableDatetd"> <span>5:31/ 5-7-2022</span></td>
                  <td>
                    <a href="{{ route('shopeowner.userInfo') }}" class="TableDownloadbutn"><span><u>Adam Johns</u></span></a>
                  </td>
                  <td>17</td>
                </tr>
                <tr>
                  <td scope="row" class="TableDatetd"> <span>5:31/ 5-7-2022</span></td>
                  <td>
                    <a href="{{ route('shopeowner.userInfo') }}" class="TableDownloadbutn"><span><u>Adam Johns</u></span></a>
                  </td>
                  <td>17</td>
                  </tr>
                  <tr>
                    <td scope="row" class="TableDatetd"> <span>5:31/ 5-7-2022</span></td>
                    <td>
                      <a href="{{ route('shopeowner.userInfo') }}" class="TableDownloadbutn"><span><u>Adam Johns</u></span></a>
                    </td>
                    <td>17</td>
                  </tr>
            </tbody>
          </table>
      </div>
    </div>
      </div>
  <!-- Tab Content Section-Documents End-->
<!-- History Detail Content Section Start-->
<div id="myHistoryContent" class="container ContentContainer__History Content TabContent js-show">
<div class="row ContentContainer__WalletRowOne">
<div class="col-12 ContentContainer__WalletRowOneCol">
<div class="BoxOne">
<div class="itemone">
Total of pages :
</div>
<div class="itemtwo">
  17
</div>
</div>
<div class="BoxTwo">
  <div class="itemone">
 Total to pay :
  </div>
  <div class="itemtwo">
     2$
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
              <th scope="col"><img style="width: 3rem;" src="../images/color-wheel.png" alt=""></th>
              <th scope="col"><i style="color: #000; font-size: 2rem;" class="bi bi-justify"></i></th>
              <th scope="col">Price $</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row" class="TableDatetd"> <span>5:31/ 5-7-2022</span></td>
              <td>
                <a href="{{ route('shopeowner.userInfo') }}" class="TableDownloadbutn"><span><u>Adam Johns</u></span></a>
              </td>
              <td>Document 1</td>
              <td>10</td>
              <td><select class="Uploadform-select" aria-label="Default select example">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select></td>
              <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
              <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
              <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
              <td>10</td>
            </tr>
            <tr>
              <td scope="row" class="TableDatetd"> <span>5:31/ 5-7-2022</span></td>
              <td>
                <a href="{{ route('shopeowner.userInfo') }}" class="TableDownloadbutn"><span><u>Adam Johns</u></span></a>
              </td>
              <td>Document 1</td>
              <td>10</td>
              <td><select class="Uploadform-select" aria-label="Default select example">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select></td>
              <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
              <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
              <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
              <td>10</td>
            </tr>
            <tr>
              <td scope="row" class="TableDatetd"> <span>5:31/ 5-7-2022</span></td>
              <td>
                <a href="{{ route('shopeowner.userInfo') }}" class="TableDownloadbutn"><span><u>Adam Johns</u></span></a>
              </td>
              <td>Document 1</td>
              <td>10</td>
              <td><select class="Uploadform-select" aria-label="Default select example">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select></td>
              <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
              <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
              <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
              <td>10</td>
            </tr>
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
