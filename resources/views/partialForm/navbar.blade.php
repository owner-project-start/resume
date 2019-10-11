<ul class="navbar-nav mr-auto">
    <li class="nav-item '@if(Request::is('profile')) active @endif'">
        <a class="nav-link" href="{{ route('profile') }}">Profile</a>
    </li>
    <li class="nav-item '@if(Request::is('experiences')) active @endif'">
        <a class="nav-link" href="{{ route('experiences') }}">Experiences</a>
    </li>
    <li class="nav-item '@if(Request::is('education')) active @endif'">
        <a class="nav-link" href="{{ route('education') }}">Education</a>
    </li>
    <li class="nav-item '@if(Request::is('skill')) active @endif'">
        <a class="nav-link" href="{{ route('skill') }}">Skills</a>
    </li>
    <li class="nav-item '@if(Request::is('interest')) active @endif'">
        <a class="nav-link" href="{{ route('interest') }}">Interests</a>
    </li>
    <li class="nav-item '@if(Request::is('certificate')) active @endif'">
        <a class="nav-link" href="{{ route('certificate') }}">Awards & Certificate</a>
    </li>
    <li class="nav-item '@if(Request::is('social')) active @endif'">
        <a class="nav-link" href="{{ route('social') }}">Social</a>
    </li>
</ul>
