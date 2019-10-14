<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('partialForm.css')
    <style>
        tr {
            white-space: nowrap;
        }
    </style>
</head>
<body>
<div id="app">
    @include('partialForm.nav')
    <main class="py-4">
        <div class="container">
            <div class="card">
                <div class="card-header d-flex">
                    <div class="animated bounceInDown fast w-100">
                        <div class="h-100 d-flex align-items-center">
                            <div>
                                <span class="c-title"><b>@yield('header')</b></span>
                            </div>
                            <div class="ml-auto">
                                @yield('header-actions')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
</div>
@include('partialForm.script')
@yield('script')
</body>
</html>
