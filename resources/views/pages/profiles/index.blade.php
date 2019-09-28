@extends('layouts.app')

@section('header', 'Profile')

@section('content')
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
    {{ Request::url() }}
@endsection
