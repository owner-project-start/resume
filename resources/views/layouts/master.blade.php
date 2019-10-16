<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title' , config('app.name', 'Laravel')) | {{config('app.name', 'Laravel')}}</title>
    @include('partials.css')
    @yield('style')
</head>

<body id="page-top">
{{-- Nav --}}
@include('partials.nav')
<div class="container-fluid p-0">
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
        @yield('about')
    </section>
    @if(isset($user))
    <hr class="m-0">
    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience">
        @yield('experience')
    </section>
    <hr class="m-0">
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="education">
        @yield('education')
    </section>
    <hr class="m-0">
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="skills">
       @yield('skill')
    </section>
    <hr class="m-0">
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="interests">
        @yield('interests')
    </section>
    <hr class="m-0">
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="awards">
        @yield('certificate')
    </section>
    @endif
</div>
@include('partials.script')
</body>
</html>
