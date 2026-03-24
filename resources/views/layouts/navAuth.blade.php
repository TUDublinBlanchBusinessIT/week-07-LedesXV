<ul class="navbar-nav text-white">
    @if(Auth::guest())
        <li class="nav-item">
            <a class="nav-link" href="#register">Register</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#login">Login</a>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="#logoff">Logoff</a>
        </li>
    @endif      
</ul>