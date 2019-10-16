@extends('layouts.appTable')

@section('title', 'Experience')

@section('header', 'Experiences')

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
                <th scope="col">Company</th>
                <th scope="col">Position</th>
                <th scope="col">Content</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
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
                    @include('pages.experiences.form')
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
                url: '{{ route('experiences.getList') }}',
                success: function (data) {
                    let html = '';
                    let endDate = '';
                    let results = data.data;
                    $.each(results, function (index, experience) {
                        if (experience.end_date === null) {
                            endDate = 'N/A';
                        } else {
                            endDate = new Date(experience.end_date).toLocaleDateString()
                        }
                        html += (
                            "<tr>" +
                            "<td>" + experience.company + "</td>" +
                            "<td>" + experience.position + "</td>" +
                            "<td>" + experience.content.substring(0, 20) + "...." + "</td>" +
                            "<td>" + new Date(experience.start_date).toLocaleDateString() + "</td>" +
                            "<td>" + endDate + "</td>" +
                            "<td class='action' style='display: inline-flex'>" +
                            "<button class='btn btn-sm btn-warning' data-toggle='modal' data-target='#Modal' onclick='action(this.value," + experience.id + ")' value='edit'>Edit</button>&nbsp;" +
                            "<button class='btn btn-sm btn-danger' onclick='destroy(" + experience.id + ")'>Delete</button>" +
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
                $('#ModalLabel').html('Edit Experience');
                $('.submit').html('Update');
                $.ajax({
                    type: 'POST',
                    url: '{{ route('experiences.getById') }}',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    success: function (response) {
                        if (response.code === 200) {
                            $('#experienceId').val(response.data.id);
                            $('#company').val(response.data.company);
                            $('#position').val(response.data.position);
                            $('#content').val(response.data.content);
                            $('#start_date').val(response.data.startDate);
                            $('#end_date').val(response.data.endDate);
                        }
                    }
                })
            } else {
                $('#ModalLabel').html('Add New Experience');
                $('.submit').html('Add New');
            }
        }

        function destroy(id) {
            $.ajax({
                type: "POST",
                url: "{{ route('experiences.delete') }}",
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
                url: "{{ route('experiences.store') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: $('#experienceId').val(),
                    company: $('#company').val(),
                    position: $('#position').val(),
                    content: $('#content').val(),
                    start_date: $('#start_date').val(),
                    end_date: $('#end_date').val()
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
