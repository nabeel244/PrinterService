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
        <!-- Tab Content Section-Upload Start-->
        <div id="myUploadContent" class="TabContent ContentContainer__Upload">
            <div class="alert alert-success fade-property d-none " id="success-message">
            </div>
            <div class="row ContentContainer__UploadRowOne">
                @include('partials.sessionMessage')
                <div class="col-12 ContentContainer__UploadRowOneCol">

                    <h1>Files</h1>
                    {{-- <input type="file" id="myFile" name="filename" value="Add File" class="bi bi-upload"> --}}
                    <form id="file-upload" action="{{ route('user.uploadFile') }}" method="POST" id="file-upload"
                        enctype="multipart/form-data">
                        @csrf
                        <a href="#" type="file" id="selectFile" name="filename"> <input type="file"
                                name="file" id="upload-file" /><i class="bi bi-upload"></i> Add File</a>
                    </form>
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
                                <th scope="col"><img style="width: 3rem;" src="{{ asset('images/color-wheel.png') }}"
                                        alt="">
                                </th>
                                <th scope="col"><i style="color: #000; font-size: 2rem;" class="bi bi-justify"></i></th>
                                {{-- <th scope="col">Price $</th> --}}
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (@$files as $file)
                                <tr>
                                    <td scope="row"><input class="form-check-input TableInputs1" type="checkbox"
                                            value="" id="{{ $file->id }}" data-id="{{ $file->id }}"
                                            name="multi_files"></td>
                                    <td>
                                        <a href="{{ asset('files/' . $file->name) }}"
                                            class="TableDownloadbutn"><span><u>{{ $file->original_name }}</u></span></a>
                                    </td>
                                    <td><a href="{{ route('view.pdf.file', $file->id) }}" target="_BLANK"><i
                                                style="color: #000;" class="bi bi-eye-fill"></i> </a></td>
                                    <td>{{ $file->num_of_pages }}</td>
                                    <td><input class="Uploadform-select" value="{{ $file->num_of_copies }}"
                                            aria-label="Default select example" data-id="{{ $file->id }}"
                                            data-value="num_of_copies" id="num_of_copies{{ $file->id }}"
                                            onchange="getValue('num_of_copies{{ $file->id }}')" type="number"
                                            min="1" placeholder="1">
                                    </td>
                                    <td><input class="form-check-input TableInputs1 recto_verco dynamic"
                                            {{ $file->recto_verso == 0 ? '' : 'checked' }}
                                            onchange="getValue('recto_verso{{ $file->id }}');"
                                            data-id="{{ $file->id }}" data-value="recto_verso"
                                            id="recto_verso{{ $file->id }}" type="checkbox"
                                            value="{{ $file->recto_verso }}"></td>

                                    <td><input class="form-check-input TableInputs1 color dynamic"
                                            {{ $file->color == 0 ? '' : 'checked' }} id="color{{ $file->id }}"
                                            data-id="{{ $file->id }}" onchange="getValue('color{{ $file->id }}');"
                                            data-value="color" type="checkbox" value="{{ $file->color }}"></td>

                                    <td><input class="form-check-input TableInputs1 white_black dynamic"
                                            {{ $file->black_white == 0 ? '' : 'checked' }}
                                            id="black_white{{ $file->id }}" data-id="{{ $file->id }}"
                                            onchange="getValue('black_white{{ $file->id }}');" data-value="black_white"
                                            type="checkbox" value="{{ $file->black_white }}">
                                    </td>
                                    {{-- <td>10</td> --}}
                                    <td><a href="#" onclick="getId({{ $file->id }})" id="{{ $file->id }}"><i
                                                style="color: #7C5CC4;" class="bi bi-x-lg"></i></a></td>
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
            <div class="row ContentContainer__UploadRowThree">
                <form action="{{ route('user.select.shop') }}" method="post" id="send-file">
                    @csrf
                    <input type="hidden" name="array_data" id="array_data">
                    <div class="col-12 ContentContainer__UploadRowThreeCol">
                        {{-- <a href="{{ route('user.select.shop') }}" id="submit">Continue to Choose Printing Shop</a> --}}
                        <button type="sumit" id="submit">Continue to Choose Printing Shop</button>
                        {{-- <a href="#" onclick="document.getElementById('send-file').submit();"  id="submit" >Continue to Choose Printing Shop</a> --}}
                    </div>
                </form>

            </div>
        </div>

        <!-- Tab Content Section-Upload End-->
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('input[type="file"]').change(function(e) {
                var name = document.getElementById("upload-file").files[0].name;

                var form_data = new FormData();
                var ext = name.split('.').pop().toLowerCase();

                if (jQuery.inArray(ext, ['pdf']) == -1) {
                    $('#success-message').removeClass('d-none').text(
                        'File should be Pdf');
                    return false;
                }
                // var oFReader = new FileReader();
                // oFReader.readAsDataURL(document.getElementById("upload-file").files[0]);
                // var f = document.getElementById("upload-file").files[0];
                // var fsize = f.size || f.fileSize;
                // if(fsize > 2000000)
                //     {
                //     alert("Image File Size is very big");
                //     }
                // var fileName = e.target.files[0].name;
                // alert('The file "' + filepath + '" has been selected.');
                form_data.append("file", document.getElementById('upload-file').files[0]);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('user.uploadFile') }}",
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    // beforeSend:function(){
                    //     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                    //     },
                    success: (data) => {
                        $('#noFileUpload').addClass('d-none');
                        var num_of_copies = data.file.num_of_copies == null ? 1 : data.file
                            .num_of_copies;
                        var num_pages = data.file.num_of_pages == null ? '' : data.file
                            .num_of_pages;
                        var recto_verso = data.file.recto_verso == 0 ? 0 : data.file
                            .recto_verso;
                        var color = data.file.color == 0 ? 0 : data.file.color;
                        var black_white = data.file.black_white == 0 ? 0 : data.file
                            .black_white;

                        $('#success-message').removeClass('d-none').text(
                            'File has been uploaded successfully');
                        var markup = "<tr>";
                        markup +=
                            "<td scope='row'><input class='form-check-input TableInputs1' type='checkbox'  id=" +
                            data.file.id + " data-id = " + data.file.id +
                            " name='multi_files'></td>";
                        markup += " <td> <a href='#'  class='TableDownloadbutn'><span><u>" +
                            data.file.original_name + "</u></span></a></td>";
                        markup +=
                            "<td><a href='#' target='_BLANK'><i style='color: #000;' class='bi bi-eye-fill'></i> </a></td>";
                        markup += " <td>" + num_pages + "</td>";
                        markup += "<td><input class='Uploadform-select' data-id=" + data.file
                            .id + " data-value='num_of_copies' id='num_of_copies" + data.file
                            .id + "' onchange=getValue('num_of_copies" + data.file.id +
                            "') value=" + num_of_copies +
                            "  aria-label='Default select example' type='number' min='1' placeholder='1'> </td>";
                        markup +=
                            "<td><input class='form-check-input TableInputs1 dynamic' data-value='recto_verso' data-id=" +
                            data.file.id + " id='recto_verso" + data.file.id +
                            "' onchange=getValue('recto_verso" + data.file.id +
                            "')  type='checkbox' value=" + recto_verso + " ></td>";
                        markup +=
                            "<td><input class='form-check-input TableInputs1 dynamic' data-value='color' data-id=" +
                            data.file.id + " id='color" + data.file.id +
                            "' onchange=getValue('color" + data.file.id +
                            "')  type='checkbox' value=" + color + " ></td>";
                        markup +=
                            "<td><input class='form-check-input TableInputs1 dynamic' data-value='black_white' data-id=" +
                            data.file.id + " id='black_white" + data.file.id +
                            "' onchange=getValue('black_white" + data.file.id +
                            "')   type='checkbox' value=" + black_white + "  ></td>";
                        markup += "<td><a href='#' onclick='getId( " + data.file.id + ")' id=" +
                            data.file.id +
                            "><i style='color: #7C5CC4;' class='bi bi-x-lg'></i></a></td>";
                        markup += "</tr>";
                        $("table tbody").append(markup);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });

            });
            setTimeout(function() {
                $('.fade-property').fadeOut('slow');

            }, 5000);

            $("#submit").click(function() {
                var arr = [];
                $.each($("input[name='multi_files']:checked"), function() {
                    arr.push($(this).attr('data-id'));
                });
                if (arr == '') {
                    $('#success-message').removeClass('d-none').text('Please Select File For Send');
                    return false;
                }
                $('#array_data').val(arr);
            });


        });

        function getValue(id) {
            var data = document.getElementById(`${id}`);
            var value = data.getAttribute('data-value');
            var sid = data.getAttribute('data-id');

            if (value == 'num_of_copies') {
                var data_value = 'num_of_copies';
            } else if (value == 'recto_verso') {
                var data_value = 'recto_verso';
            } else if (value == 'color') {
                $(`#black_white${sid}`).prop('checked', false);
                var data_value = 'color';
            } else if (value = 'black_white') {
                $(`#color${sid}`).prop('checked', false);
                var data_value = 'black_white';
            }
            var update_value = data.value;
            var id = data.getAttribute('data-id');
            var num_of_copies_value = data.value;
            $.ajax({
                type: 'POST',
                url: "{{ route('user.updateFile') }}",
                data: {
                    id: id,
                    data_value: data_value,
                    update_value: update_value
                },


                success: (data) => {},
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function getId(id) {

            var url = "{{ route('user.deleteFile', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                type: 'POST',
                url: url,
                data: id,

                success: (data) => {
                    $(`#${id}`).parents('tr').remove();
                    $('#success-message').removeClass('d-none').text('File Deleted successfully')

                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    </script>
@endpush
