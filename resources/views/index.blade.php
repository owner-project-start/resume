@extends('layouts.master')

@section('style')
{{--    <style>--}}
{{--        .navbar {--}}
{{--            position: relative;--}}
{{--            display: -ms-flexbox;--}}
{{--            display: flex;--}}
{{--            -ms-flex-wrap: wrap;--}}
{{--            flex-wrap: wrap;--}}
{{--            -ms-flex-align: center;--}}
{{--            align-items: center;--}}
{{--            -ms-flex-pack: justify;--}}
{{--            justify-content: space-between;--}}
{{--            padding: .5rem 0;--}}
{{--        }--}}
{{--    </style>--}}
@endsection

@section('title', 'Home')

@section('about')
    <div class="w-100">
        @if(isset($user))
            <h1 class="mb-0">{{ $user->last_name }}
                <span class="text-primary">{{ $user->first_name }}</span>
            </h1>
            <div class="subheading mb-5">#n {{ $user->home_number }}<sub>{{ $user->floor }}</sub>, khan {{ $user->khan }},
                songkat {{ $user->songkat }}
                , {{ $user->city }} · (+855) {{ $user->phone }} ·
                <a href="mailto:{{$user->email}}">{{ $user->email }}</a>
            </div>
            <p class="lead mb-5">{{ $user->description }}</p>
            <div class="social-icons">
                @foreach($user->socials as $social)
                    <a href="{{ $social->link }}">
                        <i class="{{ $social->icon }}"></i>
                    </a>
                @endforeach
            </div>
        @else
            <h1 class="mb-0">
                <span class="text-primary">No Record</span>
            </h1>
        @endif
    </div>
@endsection

@section('experience')
    @if(isset($user))
    <div class="w-100">
        <h2 class="mb-5">Experience</h2>
        @if(count($user->experiences) > 0)
            @foreach($user->experiences as $experience)
                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="resume-content">
                        <h3 class="mb-0">{{ $experience->position }}</h3>
                        <div class="subheading mb-3">{{ $experience->company }}</div>
                        <p>
                            {{ $experience->content }}
                        </p>
                    </div>
                    <div class="resume-date text-md-right">
                        <span class="text-primary text-capitalize">{{ $experience->start_date->isoformat('MMMM Y') }} - @if($experience->end_date === null)
                                present @else {{ $experience->end_date->isoformat('MMMM Y') }} @endif</span>
                    </div>
                </div>
            @endforeach
        @else
            <h1 class="mb-0">
                <span class="text-primary">Error</span>
            </h1>
        @endif
    </div>
    @endif
@endsection

@section('education')
    @if(isset($user))
    <div class="w-100">
        <h2 class="mb-5">Education</h2>
        @if(count($user->educations) > 0)
            @foreach($user->educations as $education)
                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="resume-content">
                        <h3 class="mb-0">{{ $education->study_at }}</h3>
                        <div class="subheading mb-3">{{ $education->level }}</div>
                        <div class="text-capitalize">{{ $education->content }}</div>
                    </div>
                    <div class="resume-date text-md-right">
                        <span class="text-primary">{{ $education->start_date }} - @if($education->end_date === null) N/A @else {{ $education->end_date }} @endif</span>
                    </div>
                </div>
            @endforeach
        @else
        @endif
    </div>
    @endif
@endsection

@section('skill')
    @if(isset($user))
    <div class="w-100">
        <h2 class="mb-5">Skills</h2>
        <div class="subheading mb-3">Programming Languages &amp; Tools</div>
        @if(count($user->skills) > 0)
            <ul class="fa-ul mb-0">
                @foreach($user->skills as $skill)
                    @if(!$skill->active)
                        <li>
                            <i class="fa-li fa fa-check"></i>
                            {{ $skill->name }}
                        </li>
                    @else
                        <li style="color: #bd5d38">
                            <i class="fa-li fa fa-check"></i>
                            {{ $skill->name }}
                        </li>
                    @endif
                @endforeach
            </ul>
        @else
            <h1 class="mb-0">
                <span class="text-primary">Error</span>
            </h1>
        @endif
    </div>
    @endif
@endsection

@section('interests')
    @if(isset($user))
    <div class="w-100">
        <h2 class="mb-5">Interests</h2>
        @if(count($user->interests) > 0)
            @foreach($user->interests as $interest)
                <p>{{ $interest->description }}</p>
            @endforeach
        @else
            <h1 class="mb-0">
                <span class="text-primary">Error</span>
            </h1>
        @endif
    </div>
    @endif
@endsection

@section('certificate')
    @if(isset($user))
    <div class="w-100">
        <h2 class="mb-5">Awards &amp; Certifications</h2>
        @if(count($user->certificates) > 0)
            <ul class="fa-ul mb-0">
                @foreach($user->certificates as $certificate)
                    <li class="text-capitalize">
                        <i class="fa-li fa fa-certificate text-warning"></i>
                        {{ $certificate->name }} -
                        <a href="http://www.moeys.gov.kh/en/" target="_blank" class="no-link">
                            {{ $certificate->from }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <h1 class="mb-0">
                <span class="text-primary">Error</span>
            </h1>
        @endif
    </div>
    @endif
@endsection
