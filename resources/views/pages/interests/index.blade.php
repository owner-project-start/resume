@extends('layouts.appTable')

@section('title', 'Interest')

@section('header', 'Interests')

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
                    @include('pages.interests.form')
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
                url: '{{ route('interests.getList') }}',
                success: function (data) {
                    let html = '';
                    let results = data.data;
                    $.each(results, function (index, interest) {
                        html += (
                            "<tr>" +
                            "<td>" + interest.description.substring(0, 60) + "...." + "</td>" +
                            "<td>" + interest.created_at + "</td>" +
                            "<td>" + interest.updated_at + "</td>" +
                            "<td class='action' style='display: inline-flex'>" +
                            "<button class='btn btn-sm btn-warning' data-toggle='modal' data-target='#Modal' onclick='action(this.value," + interest.id + ")' value='edit'>Edit</button>&nbsp;" +
                            "<button class='btn btn-sm btn-danger' onclick='destroy(" + interest.id + ")'>Delete</button>" +
                            "</td>" +
                            "</tr>"
                        )
                    });

                    $(".listData").html(html)
                }
            })
        }

        function action(action, id) {
            $('#interestId').val(null);
            $('#description').val(null);
            if (action === 'edit' && id != null) {
                $('#ModalLabel').html('Edit Interest');
                $('.submit').html('Update');
                $.ajax({
                    type: 'POST',
                    url: '{{ route('interests.getById') }}',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    success: function (response) {
                        if (response.code === 200) {
                            $('#interestId').val(response.data.id);
                            $('#description').val(response.data.description);
                        }
                    }
                })
            } else {
                $('#ModalLabel').html('Add New Interest');
                $('.submit').html('Add New');
            }
        }

        function destroy(id) {
            $.ajax({
                type: "POST",
                url: "{{ route('interests.delete') }}",
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
                url: "{{ route('interests.store') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: $('#interestId').val(),
                    description: $('#description').val(),
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
