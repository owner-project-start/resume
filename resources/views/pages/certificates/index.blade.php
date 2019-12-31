@extends('layouts.appTable')

@section('title', 'Certificate')

@section('header', 'Certificaties')

@section('header-actions')
    <button class="btn btn-sm btn-primary" data-toggle='modal' data-target='#Modal' value="create"
            onclick="action(this.value, null)">Add More
    </button>
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
            <tr>
                <th scope="col">Interesting</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody class="listData">
            </tbody>
        </table>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title c-title" id="ModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('pages.certificates.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
                    <button type="button" class="submit btn btn-primary" onclick="submit()"></button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function getList() {
            $.ajax({
                type: 'GET',
                url: '{{ route('certificaties.getList') }}',
                success: function (data) {
                    let html = '';
                    let results = data.data;
                    $.each(results, function (index, certificate) {
                        html += (
                            "<tr>" +
                            "<td>" + certificate.name + "</td>" +
                            "<td>" + certificate.from + "</td>" +
                            "<td><a href='" + certificate.link + "' target='_blank'>" + certificate.link + "</a></td>" +
                            "<td class='action' style='display: inline-flex'>" +
                            "<button class='btn btn-sm btn-outline-warning' data-toggle='modal' data-target='#Modal' onclick='action(this.value," + certificate.id + ")' value='edit'><i class='far fa-edit'></i></button>&nbsp;" +
                            "<button class='btn btn-sm btn-outline-danger' onclick='destroy(" + certificate.id + ")'><i class='far fa-trash-alt'></i></button>" +
                            "</td>" +
                            "</tr>"
                        )
                    });

                    $(".listData").html(html)
                }
            })
        }

        function action(action, id) {
            $('#certificateId').val(null);
            $('#name').val(null);
            $('#from').val(null);
            $('#link').val(null);
            if (action === 'edit' && id != null) {
                $('#ModalLabel').html('Edit Skill');
                $('.submit').html('Update');
                $.ajax({
                    type: 'POST',
                    url: '{{ route('certificaties.getById') }}',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    success: function (response) {
                        if (response.code === 200) {
                            $('#certificateId').val(response.data.id);
                            $('#name').val(response.data.name);
                            $('#from').val(response.data.from);
                            $('#link').val(response.data.link);
                        }
                    }
                })
            } else {
                $('#ModalLabel').html('Add New Skill');
                $('.submit').html('Add New');
            }
        }

        function destroy(id) {
            $.ajax({
                type: "POST",
                url: "{{ route('certificaties.delete') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: (response) => {
                    if (response.code === 204){
                        toastr.success(response.message);
                        getList()
                    } else {
                        toastr.warning(response.message)
                    }
                }
            })
        }

        function submit() {
            $.ajax({
                type: "POST",
                url: "{{ route('certificaties.store') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: $('#certificateId').val(),
                    name: $('#name').val(),
                    from: $('#from').val(),
                    link: $('#link').val(),
                },
                success: (response) => {
                    if (response.code === 202) {
                        toastr.success(response.message);
                        $('#Modal').modal('hide');
                        getList()
                    } else if (response.code === 201) {
                        toastr.success(response.message);
                        $('#Modal').modal('hide');
                        getList()
                    } else {
                        toastr.warning(response.message);
                    }
                }
            })
        }

        $(function () {
            getList()
        })
    </script>
@endsection
