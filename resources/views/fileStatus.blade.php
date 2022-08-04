@extends('layouts.master')
@push('style')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush
@section('content')
     <!-- Tab Section Start Mobaile-->
<div class="container TabContainer">
    <div class="TabContainer__TabNav">
    <div id="mynavItems" class="TabContainer__TabNav--mobile">
    <a onclick="showTabContent(event, 'myHomeContent');" class="Tab" href="#"><i class="bi bi-house-door-fill"></i>  Home</a>
    <a onclick="showTabContent(event, 'myUploadContent');" class="Tab" href="#"><i class="bi bi-upload"></i>  Upload</a>
    <a onclick="showTabContent(event, 'myFileStatus');" class="Tab active" href="#"><i class="bi bi-play-fill"></i>File Status</a>
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
      <div id="myUploadContent" class="Content TabContent ContentContainer__UploadPage">
        <div class="row ContentContainer__UploadPageRowOne">
        <div class="col-12 ContentContainer__UploadPageRowOneCol">
        <h1>Upload File</h1>
        </div>
        </div>
        <div class="row ContentContainer__UploadPageRowTwo">
          <div class="col-12 ContentContainer__UploadPageRowTwoCol">
            <div class="box ContentContainer__UploadPageBox">
          <a href="../user/Upload.html" type="button"><i class="bi bi-upload"></i>
            <span>Upload File</span></a>
            </div>
          </div>
        </div>
          </div>

  <!-- Tab Content Section-Upload End-->
  <!-- Tab Content Section-File Status Start-->
  <div id="myFileStatus" class="Content TabContent ContentContainer__FileStatus js-show">
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
                    {{-- <th scope="col"></th> --}}
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
                    @foreach ($files as $file)
                    <tr>
                        {{-- <td scope="row"><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault" checked></td> --}}
                        <td>
                          <a href="{{ asset('files/'.$file->name) }}" class="TableDownloadbutn"><span><u>{{ $file->original_name }}</u></span></a>
                        </td>
                        <td><i style="color: #000;" class="bi bi-eye-fill"></i></td>
                        <td>{{ $file->num_of_pages }}</td>
                        <td><input class="Uploadform-select" aria-label="Default select example" disabled {{ $file->num_of_copies }} type="number" placeholder="1">
                        </td>
                        <td><input class="form-check-input TableInputs1" disabled {{ $file->recto_verso == 1 ? 'checked' : '' }} type="checkbox" value="" id="flexCheckDefault"></td>
                        <td><input class="form-check-input TableInputs1" disabled {{ $file->color == 1 ? 'checked' : '' }} type="checkbox" value="" id="flexCheckDefault"></td>
                        <td><input class="form-check-input TableInputs1" disabled {{ $file->black_white == 1 ?'checked' : '' }} type="checkbox" value="" id="flexCheckDefault"></td>
                        <td>{{ $file->total }}</td>
                        <td> {{ $file->is_downloaded == 0 ? 'In progress' : 'Printed' }}</td>
                      </tr>
                    @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </div>
  <!-- Tab Content Section-File Status End-->
         </div>
  <!-- Tab Content Section End-->
@endsection
@push('script')

@endpush
