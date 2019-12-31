@extends('layouts.app')

@section('title', 'Profile')

@section('header', 'Profile')

@section('header-actions')
    @if(isset($user->avatar))
        <img src="{{$user->avatar}}"
             class="gambar img-responsive img-thumbnail rounded-circle"
             id="item-img-output" alt="avatar" width="50">
    @else
        <img src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png"
             class="gambar img-responsive img-thumbnail rounded-circle"
             id="item-img" alt="avatar" width="50">
    @endif
    <button type="button" id="changeImage" class="btn btn-sm btn-outline-success">
        <i class="fas fa-image"></i>
    </button>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 d-flex align-items-center">
            <input type="file" class="item-img file center-block" id="image" name="file_photo" style="display:none;"/>
        </div>
        <div class="col-md-12">
            <form>
                @include('pages.profiles.form')
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-block btn-outline-primary" onclick="update()">Update Profile</button>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('index') }}" class="btn btn-block btn-outline-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="upload-demo" class="center-block"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-default" data-dismiss="modal">Close</button>
                    <button type="button" id="cropImageBtn" class="btn btn-sm btn-outline-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var $uploadCrop,
            tempFilename,
            rawImg,
            imageId;

        $("#changeImage").on('click', function (e) {
            $('.item-img').trigger('click');
        });

        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.upload-demo').addClass('ready');
                    $('#cropImagePop').modal('show');
                    rawImg = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                swal("Sorry - you're browser doesn't support the FileReader API");
            }
        }

        $uploadCrop = $('#upload-demo').croppie({
            viewport: {
                width: 200,
                height: 200,
            },
            enforceBoundary: false,
            enableExif: true
        });
        $('#cropImagePop').on('shown.bs.modal', function () {
            // alert('Shown pop');
            $uploadCrop.croppie('bind', {
                url: rawImg
            }).then(function () {
                console.log('jQuery bind complete');
            });
        });

        $('.item-img').on('change', function () {
            imageId = $(this).data('id');
            tempFilename = $(this).val();
            $('#cancelCropBtn').data('id', imageId);
            readFile(this);
        });
        $('#cropImageBtn').on('click', function (ev) {
            $uploadCrop.croppie('result', {
                type: 'base64',
                format: 'jpeg',
                size: {width: 200, height: 200}
            }).then(function (resp) {
                $('#item-img-output').attr('src', resp);
                $('#item-img').attr('src', resp);
                $('.nav-avatar').attr('src', resp);
                $('#cropImagePop').modal('hide');
                $.ajax({
                    type: 'PUT',
                    url: "{{ route('avatar.update', $user->id) }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        avatar: resp
                    },
                    success: (response) => {
                        if (response.code === 202) {
                            toastr.success(response.message);
                        }
                    }
                })
            });
        });

        // End upload preview image
        function update()
        {
            $.ajax({
                type: "PUT",
                url: "{{ route('profile.update', $user->id) }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    first_name: $('#first_name').val(),
                    last_name: $('#last_name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    home_number: $('#home_number').val(),
                    floor: $('#floor').val(),
                    street: $('#street').val(),
                    khan: $('#khan').val(),
                    songkat: $('#songkat').val(),
                    city: $('#city').val(),
                    description: $('#description').val(),
                    status: $('#status').prop('checked'),
                },
                success: function (response) {
                    if (response.code === 202)
                    {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                }
            })
        }
    </script>
@endsection
