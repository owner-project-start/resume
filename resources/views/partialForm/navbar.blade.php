<ul class="navbar-nav mr-auto">
    <li class="nav-item '@if(Request::is('profile')) active @endif'">
        <a class="nav-link" href="{{ route('profile') }}">
            <div>
                <span class="sub-header">
                    <b>Profile</b>
                </span>
            </div>
        </a>
    </li>
    <li class="nav-item '@if(Request::is('experiences')) active @endif'">
        <a class="nav-link" href="{{ route('experiences') }}">
            <div>
                <span class="sub-header">
                    Experiences
                </span>
            </div>
        </a>
    </li>
    <li class="nav-item '@if(Request::is('educations')) active @endif'">
        <a class="nav-link" href="{{ route('educations') }}">
            <div>
                <span class="sub-header">
                    Education
                </span>
            </div>
        </a>
    </li>
    <li class="nav-item '@if(Request::is('skills')) active @endif'">
        <a class="nav-link" href="{{ route('skills') }}">
            <div>
                <span class="sub-header">
                    Skills
                </span>
            </div>
        </a>
    </li>
    <li class="nav-item '@if(Request::is('interests')) active @endif'">
        <a class="nav-link" href="{{ route('interests') }}">
            <div>
                <span class="sub-header">
                    Interests
                </span>
            </div>
        </a>
    </li>
    <li class="nav-item '@if(Request::is('certificaties')) active @endif'">
        <a class="nav-link" href="{{ route('certificaties') }}">
            <div>
                <span class="sub-header">
                    Awards & Certificate
                </span>
            </div>
        </a>
    </li>
    <li class="nav-item '@if(Request::is('socials')) active @endif'">
        <a class="nav-link" href="{{ route('socials') }}">
            <div>
                <span class="sub-header">
                    Social
                </span>
            </div>
        </a>
    </li>
</ul>
