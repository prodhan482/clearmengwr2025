<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">



<style>
    .navbar-brand span {
        color: #002C4D !important;
        font-weight: 600;
        font-size: 20px;
        /* default */
    }

    @media (max-width: 768px) {
        .navbar-brand span {
            font-size: 14px;
            /* smaller text for mobile */
            display: block;
            text-align: center;
        }
    }
</style>



<nav class="navbar navbar-expand-lg bg-light shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="assets/images/logo.png" class="logo img-fluid" alt="ClearmenGWR">
            <span>
                Clear Men Guinness World Records
            </span>

            <p style="color: #002C4D; font-size: 4px; margin: 5px 0 0 0;">
                <b>PEOPLE IN AN ONLINE VIDEO CHAIN<br> PASSING A FOOTBALL (SOCCER BALL)</b>
            </p>
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                @guest
                    <li class="nav-item">
                        @if(Request::is('/'))
                            <a class="nav-link click-scroll" href="{{ '/' }}">Home</a>
                        @else
                            <a class="nav-link" href="{{'/'}}">Home</a>
                        @endif
                    </li>

                    <li class="nav-item">
                        @if(Request::is('/'))
                            <a class="nav-link click-scroll" href="#section_4">Register</a>
                        @else
                            <a class="nav-link" href="{{'/#section_4'}}">Register</a>
                        @endif
                    </li>

                    <li class="nav-item ms-3">
                        <a class="nav-link custom-btn custom-border-btn btn" href="{{ '/login' }}">Login</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <span class="nav-link">{{ Auth::user()->name }}</span>
                    </li>
                    @if(!Request::is('user-dashboard'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ '/user-dashboard' }}">Dashboard</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="logout-btn" type="submit">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>