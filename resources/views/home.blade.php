@extends('layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        #upload-file {
            opacity: 0;
            position: absolute;
            /* z-index: -1; */
        }

        #submit {
            background-color: var(--purpal);
            border: transparent;
            color: var(--white);
            padding: 0.5rem 1.5rem 0.5rem 1.5rem;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 500;
            border-radius: 0.5rem;
        }
    </style>
@endpush
@section('content')
    <div class="container TabContainer">

     @include('partials.userTabs')
    </div>
    <div class="container ContentContainer">

        <div id="myHomeContent" class="Content TabContent ContentContainer__Home js-show">
            <div class="row ContentContainer__HomeRowOne">
                @include('partials.sessionMessage')
                <div class="col-12 ContentContainer__HomeRowOneCol">
                    <h1>Welcome</h1>
                </div>
            </div>
            <div class="row ContentContainer__HomeRowTwo">
                <div class="col-md-5 col-lg-3 ContentContainer__HomeRowTwo-LeftPart">
                    <img src="{{ asset('images/home-tab-content-img.svg') }}" alt="">
                </div>
                <div class="col-md-7 col-lg-7 ContentContainer__HomeRowTwo-RightPart">
                    <h1>Content</h1>
                    <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the
                        visual form of a document or a typeface without relying on meaningful content.</p>
                    <img src="{{ asset('images/home-tab-content-img-right.svg') }}" alt="">
                </div>
            </div>
        </div>
        <!-- Tab Content Section-Home End-->

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
                                <th scope="col"><img style="width: 3rem;"
                                        src="{{ asset('images/color-wheel.png') }}" alt=""></th>
                                <th scope="col"><i style="color: #000; font-size: 2rem;" class="bi bi-justify"></i>
                                </th>
                                <th scope="col">Price $</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row"><input class="form-check-input TableInputs1" type="checkbox"
                                        value="" id="flexCheckDefault" checked></td>
                                <td>
                                    <a href="#" class="TableDownloadbutn"><span><u>Document name</u></span></a>
                                </td>
                                <td><i style="color: #000;" class="bi bi-eye-fill"></i></td>
                                <td>10</td>
                                <td><input class="Uploadform-select" aria-label="Default select example" type="number"
                                        placeholder="1">
                                </td>
                                <td><input class="form-check-input TableInputs1" type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td><input class="form-check-input TableInputs1" type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td><input class="form-check-input TableInputs1" type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td>10</td>
                                <td>In progress</td>
                            </tr>
                            <tr>
                                <td scope="row"><input class="form-check-input TableInputs1" type="checkbox"
                                        value="" id="flexCheckDefault"></td>
                                <td>
                                    <a href="#" class="TableDownloadbutn"><span><u>Document name</u></span></a>
                                </td>
                                <td><i style="color: #000;" class="bi bi-eye-fill"></i></td>
                                <td>10</td>
                                <td><input class="Uploadform-select" aria-label="Default select example" type="number"
                                        placeholder="1">
                                </td>
                                <td><input class="form-check-input TableInputs1" type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td><input class="form-check-input TableInputs1" type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td><input class="form-check-input TableInputs1" type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td>10</td>
                                <td>In progress</td>
                            </tr>
                            <tr>
                                <td scope="row"><input class="form-check-input TableInputs1" type="checkbox"
                                        value="" id="flexCheckDefault"></td>
                                <td>
                                    <a href="#" class="TableDownloadbutn"><span><u>Document name</u></span></a>
                                </td>
                                <td><i style="color: #000;" class="bi bi-eye-fill"></i></td>
                                <td>10</td>
                                <td><input class="Uploadform-select" aria-label="Default select example" type="number"
                                        placeholder="1">
                                </td>
                                <td><input class="form-check-input TableInputs1" type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td><input class="form-check-input TableInputs1" type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td><input class="form-check-input TableInputs1" type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                                <td>10</td>
                                <td>Printed</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection
