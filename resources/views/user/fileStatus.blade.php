@extends('layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush
@section('content')
    <!-- Tab Section Start Mobaile-->
    <div class="container TabContainer">
        @include('partials.userTabs')
    </div>
    <!-- Tab Section End-->
    <!-- Tab Content Section Start-->
    <div class="container ContentContainer">

        <!-- Tab Content Section-File Status Start-->
        <div id="myFileStatus" class="Content TabContent ContentContainer__FileStatus js-show">
            <div class="row ContentContainer__FileStatusRowOne">
                <div class="col-12 ContentContainer__FileStatusRowOneCol">
                    @include('partials.sessionMessage')
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
                                <th scope="col"><img style="width: 3rem;" src="{{ asset('images/color-wheel.png') }}" alt="">
                                </th>
                                <th scope="col"><i style="color: #000; font-size: 2rem;" class="bi bi-justify"></i></th>
                                <th scope="col">Price $</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($files as $file)
                                <tr>
                                    {{-- <td scope="row"><input class="form-check-input TableInputs1" type="checkbox" value="" id="flexCheckDefault" checked></td> --}}
                                    <td>
                                        <a href="{{ asset('files/' . $file->name) }}"
                                            class="TableDownloadbutn"><span><u>{{ $file->original_name }}</u></span></a>
                                    </td>
                                    <td><i style="color: #000;" class="bi bi-eye-fill"></i></td>
                                    <td>{{ $file->num_of_pages }}</td>
                                    <td><input class="Uploadform-select" aria-label="Default select example" disabled
                                           value={{ $file->num_of_copies }} type="number" placeholder="1">
                                    </td>
                                    <td><input class="form-check-input TableInputs1" disabled
                                            {{ $file->recto_verso == 1 ? 'checked' : '' }} type="checkbox" value=""
                                            id="flexCheckDefault"></td>
                                    <td><input class="form-check-input TableInputs1" disabled
                                            {{ $file->color == 1 ? 'checked' : '' }} type="checkbox" value=""
                                            id="flexCheckDefault"></td>
                                    <td><input class="form-check-input TableInputs1" disabled
                                            {{ $file->black_white == 1 ? 'checked' : '' }} type="checkbox" value=""
                                            id="flexCheckDefault"></td>
                                    <td>{{ $file->total }}</td>
                                    <td> {{ $file->is_downloaded == 0 ? 'In progress' : 'Printed' }}</td>
                                </tr>
                                @empty
                            <tr id="noFileUpload">
                                <td colspan="9" class="text-center">No File Uploaded</td>
                            </tr>
                            @endforelse


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
