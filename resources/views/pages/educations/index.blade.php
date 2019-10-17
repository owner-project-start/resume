@extends('layouts.appTable')

@section('title', 'Educations')

@section('header', 'Educations')

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
                <th scope="col">Study At</th>
                <th scope="col">Degree</th>
                <th scope="col">Description</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
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
                    @include('pages.educations.form')
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
                url: '{{ route('educations.getList') }}',
                success: function (data) {
                    let html = '';
                    let endDate = '';
                    let results = data.data;
                    $.each(results, function (index, education) {
                        if (education.to === null) {
                            endDate = 'N/A';
                        } else {
                            endDate = new Date(education.to).toLocaleDateString()
                        }
                        html += (
                            "<tr>" +
                            "<td>" + education.study_at + "</td>" +
                            "<td>" + education.degree + "</td>" +
                            "<td>" + education.description.substring(0, 20) + "...." + "</td>" +
                            "<td>" + new Date(education.from).toLocaleDateString() + "</td>" +
                            "<td>" + endDate + "</td>" +
                            "<td class='action' style='display: inline-flex'>" +
                            "<button class='btn btn-sm btn-warning' data-toggle='modal' data-target='#Modal' onclick='action(this.value," + education.id + ")' value='edit'>Edit</button>&nbsp;" +
                            "<button class='btn btn-sm btn-danger' onclick='destroy(" + education.id + ")'>Delete</button>" +
                            "</td>" +
                            "</tr>"
                        )
                    });

                    $(".listData").html(html)
                }
            })
        }

        function action(action, id) {
            $('#experienceId').val(null);
            $('#company').val(null);
            $('#position').val(null);
            $('#content').val(null);
            $('#start_date').val(null);
            $('#end_date').val(null);
            if (action === 'edit' && id != null) {
                $('#ModalLabel').html('Edit Education');
                $('.submit').html('Update');
                $.ajax({
                    type: 'POST',
                    url: '{{ route('educations.getById') }}',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    success: function (response) {
                        if (response.code === 200) {
                            $('#educationId').val(response.data.id);
                            $('#study_at').val(response.data.study_at);
                            $('#degree').val(response.data.degree);
                            $('#description').val(response.data.description);
                            $('#from').val(response.data.from);
                            $('#to').val(response.data.to);
                        }
                    }
                })
            } else {
                $('#ModalLabel').html('Add New Education');
                $('.submit').html('Add New');
            }
        }

        function destroy(id) {
            $.ajax({
                type: "POST",
                url: "{{ route('educations.delete') }}",
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
                url: "{{ route('educations.store') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: $('#educationId').val(),
                    study_at: $('#study_at').val(),
                    degree: $('#degree').val(),
                    description: $('#description').val(),
                    from: $('#from').val(),
                    to: $('#to').val()
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
