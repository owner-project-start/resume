@extends('layouts.app')

@section('header', 'Experiences')

@section('content')
    <table class="table table-borderless">
        <thead>
        <tr>
            <th scope="col">Company</th>
            <th scope="col">Position</th>
            <th scope="col">Content</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
        </tr>
        </thead>
        <tbody class="listData">
        {{ config('app.url') }}
        </tbody>
    </table>
    <script>
        function getList() {
            const name = '{{ env('NAME') }}';
            $.ajax({
                type: 'GET',
                url: name + '/getList',
                success: function (data) {
                    let html = '';
                    let result = data.data
                    result.forEach((experience) => {
                        html += (
                            "<tr>" +
                            "<td>" + experience.company + "</td>" +
                            "<td>" + experience.position + "</td>" +
                            "<td>" + experience.content.substring(0, 20) + "</td>" +
                            "<td>" + experience.start_date.format() + "</td>" +
                            "<td>" + experience.end_date + "</td>" +
                            "</tr>"
                        )
                    })
                    $(".listData").html(html)
                    console.log(result)
                }
            })
        }

        $(function () {
            getList()
        })
    </script>
@endsection
