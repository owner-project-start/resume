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
    <li class="nav-item '@if(Request::is('education')) active @endif'">
        <a class="nav-link" href="{{ route('education') }}">
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
    <li class="nav-item '@if(Request::is('interest')) active @endif'">
        <a class="nav-link" href="{{ route('interest') }}">
            <div>
                <span class="sub-header">
                    Interests
                </span>
            </div>
        </a>
    </li>
    <li class="nav-item '@if(Request::is('certificate')) active @endif'">
        <a class="nav-link" href="{{ route('certificate') }}">
            <div>
                <span class="sub-header">
                    Awards & Certificate
                </span>
            </div>
        </a>
    </li>
    <li class="nav-item '@if(Request::is('social')) active @endif'">
        <a class="nav-link" href="{{ route('social') }}">
            <div>
                <span class="sub-header">
                    Social
                </span>
            </div>
        </a>
    </li>
</ul>
