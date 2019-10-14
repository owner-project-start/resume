@extends('layouts.app')

@section('header', 'Add New Experience')

@section('content')
    <form>
        @include('pages.experiences.form')

        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-block btn-primary" onclick="create()">Add New</button>
            </div>
            <div class="col-md-6">
                <a href="{{ route('experiences') }}" class="btn btn-block btn-danger">Cancel</a>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        function create() {
            alert('create')
        }
    </script>
@endsection
