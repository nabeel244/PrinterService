@extends('layouts.master')
@push('style')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush
@section('content')
     <!-- Tab Section Start Mobaile-->
     <div class="container TabContainer">
        <div class="TabContainer__TabNav">
        <div id="mynavItems" class="TabContainer__TabNav--mobile">
        <a onclick="showTabContent(event, 'myHomeContent');" class="Tab active" href="#"><i class="bi bi-house-door-fill"></i>  Home</a>
        <a onclick="showTabContent(event, 'myUploadContent');" class="Tab" href="#"><i class="bi bi-upload"></i>  Upload</a>
        <a onclick="showTabContent(event, 'myFileStatus');" class="Tab" href="#"><i class="bi bi-play-fill"></i>File Status</a>
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
          <!-- Tab Content Section-Upload Start-->
          <div id="myUploadContent" class="Content TabContent ContentContainer__Upload">
          <div class="row ContentContainer__UploadRowOne">
          <div class="col-12 ContentContainer__UploadRowOneCol">
          <h1>Files</h1>
          <a href="../user/Upload.html" type="file" id="myFile" name="filename"><i class="bi bi-upload"></i>Add File</a>

          </div>
          </div>
          <div class="row ContentContainer__UploadRowTwo">
            <div class="col-12 ContentContainer__UploadRowTwoCol table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Document</th>
                    <th scope="col">View</th>
                    <th scope="col">No. of pages</th>
                    <th scope="col">No. of Copies</th>
                    <th scope="col">Recto/verso</th>
                    <th scope="col"><img style="width: 3rem;" src="../images/color-wheel.png" alt=""></th>
                    <th scope="col"><i style="color: #000; font-size: 2rem;" class="bi bi-justify"></i></th>
                    <th scope="col">Price $</th>
                    <th scope="col">Delete</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row"><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault" checked></td>
                    <td>
                      <a href="#" class="TableDownloadbutn"><span><u>Document name</u></span></a>
                    </td>
                    <td><i style="color: #000;" class="bi bi-eye-fill"></i></td>
                    <td>10</td>
                    <td><input class="Uploadform-select" aria-label="Default select example" type="number" placeholder="1">
                    </td>
                    <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td>10</td>
                    <td><a href=""><i style="color: #7C5CC4;" class="bi bi-x-lg"></i></a></td>
                  </tr>
                  <tr>
                    <td scope="row"><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td>
                      <a href="#" class="TableDownloadbutn"><span><u>Document name</u></span></a>
                    </td>
                    <td><i style="color: #000;" class="bi bi-eye-fill"></i></td>
                    <td>10</td>
                    <td><input class="Uploadform-select" aria-label="Default select example" type="number" placeholder="1">
                    </td>
                    <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td>10</td>
                    <td><a href=""><i style="color: #7C5CC4;" class="bi bi-x-lg"></i></a></td>
                  </tr>
                  <tr>
                    <td scope="row"><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td>
                      <a href="#" class="TableDownloadbutn"><span><u>Document name</u></span></a>
                    </td>
                    <td><i style="color: #000;" class="bi bi-eye-fill"></i></td>
                    <td>10</td>
                    <td><input class="Uploadform-select" aria-label="Default select example" type="number" placeholder="1">
                    </td>
                    <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td>10</td>
                    <td><a href=""><i style="color: #7C5CC4;" class="bi bi-x-lg"></i></a></td>
                  </tr>
                  <tr>
                    <td scope="row"><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td>
                      <a href="#" class="TableDownloadbutn"><span><u>Document name</u></span></a>
                    </td>
                    <td><i style="color: #000;" class="bi bi-eye-fill"></i></td>
                    <td>10</td>
                    <td><input class="Uploadform-select" aria-label="Default select example" type="number" placeholder="1">
                    </td>
                    <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td>10</td>
                    <td><a href=""><i style="color: #7C5CC4;" class="bi bi-x-lg"></i></a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row ContentContainer__UploadRowThree">
            <div class="col-12 ContentContainer__UploadRowThreeCol">
            <a href="">Continue to Choose Printing Shop</a>
            </div>
          </div>
            </div>
             <!-- Tab Content Section-Upload End-->
                <!-- Tab Content Section-File Status Start-->
        <div id="myFileStatus" class="Content TabContent ContentContainer__FileStatus">
          <div class="row ContentContainer__FileStatusRowOne">
            <div class="col-12 ContentContainer__FileStatusRowOneCol">
                <h1>File Status</h1>
                </div>
              </div>
              <div class="row ContentContainer__FileStatusRowTwo">
            <div class="col-12 ContentContainer__FileStatusRowTwoCol table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">Document</th>
                        <th scope="col">View</th>
                        <th scope="col">No. of pages</th>
                        <th scope="col">No. of Copies</th>
                        <th scope="col">Recto/verso</th>
                        <th scope="col"><img style="width: 3rem;" src="../images/color-wheel.png" alt=""></th>
                        <th scope="col"><i style="color: #000; font-size: 2rem;" class="bi bi-justify"></i></th>
                        <th scope="col">Price $</th>
                        <th scope="col">Status</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row"><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault" checked></td>
                        <td>
                          <a href="#" class="TableDownloadbutn"><span><u>Document name</u></span></a>
                        </td>
                        <td><i style="color: #000;" class="bi bi-eye-fill"></i></td>
                        <td>10</td>
                        <td><input class="Uploadform-select" aria-label="Default select example" type="number" placeholder="1">
                        </td>
                        <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                        <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                        <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                        <td>10</td>
                        <td>In progress</td>
                      </tr>
                      <tr>
                        <td scope="row"><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                        <td>
                          <a href="#" class="TableDownloadbutn"><span><u>Document name</u></span></a>
                        </td>
                        <td><i style="color: #000;" class="bi bi-eye-fill"></i></td>
                        <td>10</td>
                        <td><input class="Uploadform-select" aria-label="Default select example" type="number" placeholder="1">
                        </td>
                        <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                        <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                        <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                        <td>10</td>
                        <td>In progress</td>
                      </tr>
                      <tr>
                        <td scope="row"><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                        <td>
                          <a href="#" class="TableDownloadbutn"><span><u>Document name</u></span></a>
                        </td>
                        <td><i style="color: #000;" class="bi bi-eye-fill"></i></td>
                        <td>10</td>
                        <td><input class="Uploadform-select" aria-label="Default select example" type="number" placeholder="1">
                        </td>
                        <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                        <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                        <td><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault"></td>
                        <td>10</td>
                        <td>Printed</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
      <!-- Tab Content Section-File Status End-->
      <!-- Received_Money Detail Content Section Start-->
            <div class="Content TabContent js-show ContentContainer__MoneyDetail">
              <div class="row ContentContainer__MoneyDetailRowOne">
              <div class="col-12 ContentContainer__MoneyDetailRowOneCol">
                <a href="{{ route('home') }}"><i class="bi bi-arrow-left-short"></i><span>Back</span></a>
              <h1>Received money by different shop owners</h1>
              </div>
              </div>
              <div class="row ContentContainer__MoneyDetailRowTwo">
                <div class="col-12 ContentContainer__MoneyDetailRowTwoCol table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Shop Owner</th>
                        <th scope="col">Printing shop address </th>
                        <th scope="col">Time/Date</th>
                        <th scope="col">Money recieved</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row">Printing shop 1</td>
                        <td><p class="TableAddress"><img src="../images/Location-img.svg" alt=""><span>Near Rescue 1122, Akbar plaza sialkot</span></p></td>
                        <td>14h:30/ 16/06/2022
                        </td>
                        <td>100</td>
                      </tr>
                      <tr>
                        <td scope="row">Printing shop 1</td>
                        <td><p class="TableAddress"><img src="../images/Location-img.svg" alt=""><span>Near Rescue 1122, Akbar plaza sialkot</span></p></td>
                        <td>14h:30/ 16/06/2022
                        </td>
                        <td>100</td>
                      </tr>
                      <tr>
                        <td scope="row">Printing shop 1</td>
                        <td><p class="TableAddress"><img src="../images/Location-img.svg" alt=""><span>Near Rescue 1122, Akbar plaza sialkot</span></p></td>
                        <td>14h:30/ 16/06/2022
                        </td>
                        <td>100</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
                <!-- <div class="row ContentContainer__LocateRowThree">
      <div class="col-12 ContentContainer__LocateRowThreeCol">
       <a href="">Back to Configure</a>
      </div>
                </div> -->
            </div>
            <!-- Tab Content Section-Locate End-->
       <!-- Tab Content Section-Send Start-->
       <!-- <div id="mySendContent" class="Content TabContent ContentContainer__Send">
        <div class="row ContentContainer__SendRowOne">
          <div class="col-md-8 col-lg-6 ContentContainer__SendRowOneCol">
              <h1>Are You sure you want to send?</h1>
             <div class="ContentContainer__SendRowOneCol-buttons">
               <button class="ContentContainer__SendRowOneCol-btn1" type="button">Yes</button>
               <button class="ContentContainer__SendRowOneCol-btn1 ContentContainer__SendRowOneCol-btn1--btn2" type="button">No</button>
             </div>
              </div>
            </div>
       </div> -->
      <!-- Tab Content Section-Send End-->
      <!-- Tab Content Section-Validate Satrt-->
      <!-- <div id="myValidateContent" class="Content TabContent ContentContainer__Validate">
        <div class="row ContentContainer__ValidateRowOne">
          <div class="col-12 ContentContainer__ValidateRowOneCol">
          <h1>Validate</h1>
          </div>
        </div>
        <div class="row ContentContainer__ValidateRowTwo">
          <div class="col-12 ContentContainer__ValidateRowTwoCol table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Document</th>
                  <th scope="col">Location</th>
                  <th scope="col">No. of copies </th>
                  <th scope="col">No. of pages </th>
                  <th scope="col">B & W</th>
                  <th scope="col">Price</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row"><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault" checked></td>
                  <td>
                    <a href="#" class="TableDownloadbutn"><span><u>Document name</u><i class="bi bi-download downloadicon downloadicon--validate"></i></span></a>
                  </td>
                  <td><p class="TableAddress" style="color: #707070;"><img src="../images/Location-img.svg" alt=""><span>Near Rescue 1122, Akbar plaza sialkot</span></p></td>
                  <td>01</td>
                  <td>10</td>
                  <td><i class="bi bi-check Checkicon"></i></td>
                  <td>100</td>
                  <td><button type="button" class="TableButtonValidate">Validated</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div> -->
      <!-- Tab Content Section-Validate End-->
             </div>
            <!-- Tab Content Section End-->
@endsection
