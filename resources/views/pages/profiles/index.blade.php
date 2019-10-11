@extends('layouts.app')

@section('header', 'Profile')

@section('header-actions')
    <img src="https://user.gadjian.com/static/images/personnel_boy.png"
         class="gambar img-responsive img-thumbnail rounded-circle"
         id="item-img-output" width="50">
    <button type="button" id="changeImage" class="btn btn-sm btn-success">Change Image</button>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 d-flex align-items-center">
            <input type="file" class="item-img file center-block" id="image" name="file_photo" style="display:none;"/>
        </div>
        <div class="col-md-12">
            <form method="POST" action="{{ route('profile.update', $user->id) }}">
                @csrf
                @include('pages.profiles.form')
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-block btn-primary">Update Profile</button>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('index') }}" class="btn btn-block btn-danger">Cancel</a>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Start upload preview image
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
                console.log(resp)
                $('#item-img-output').attr('src', resp);
                $('#cropImagePop').modal('hide');
            });
        });
        // End upload preview image
    </script>
@endsection
