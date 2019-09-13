@extends('layouts.master')

@section('about')
    <div class="w-100">
        <h1 class="mb-0">{{ $user->last_name }}
            <span class="text-primary">{{ $user->first_name }}</span>
        </h1>
        <div class="subheading mb-5">#n {{ $user->home_number }}, khan {{ $user->khan }}, songkat {{ $user->songkat }}
            , {{ $user->city }} · (855) {{ $user->phone }} ·
            <a href="mailto:name@email.com">{{ $user->email }}</a>
        </div>
        <p class="lead mb-5">{{ $user->description }}</p>
        <div class="social-icons">
            @foreach($user->socials as $social)
                <a href="{{ $social->link }}">
                    <i class="{{ $social->icon }}"></i>
                </a>
            @endforeach
        </div>
    </div>
@endsection
