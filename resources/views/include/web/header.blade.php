<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<nav class="navbar navbar-expand-lg bg-light shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="assets/images/logo.png" class="logo img-fluid" alt="ClearmenGWR">
            <span style="color:#002C4D !important;">
                Clear Men Guinness World Record
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
                            <a class="nav-link" href="{{ '/user-dashboard' }}">Participants List</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="logout-btn" type="submit">Logout</button>
                        </form>
                    </li>
                @endauth

                <!-- 🔥 Social Icons (Right Side) -->
                {{-- <li class="d-flex justify-content-end align-items-center ms-3 social-icons">
                    <a href="https://facebook.com" target="_blank" class="me-3">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="me-3">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://tiktok.com" target="_blank">
                        <i class="fab fa-tiktok"></i>
                    </a>
                </li> --}}

            </ul>
        </div>
    </div>
</nav>


{{-- <style>
    .nav-custom-btn {
        font-weight: 500;
        color: #065daf !important;
    }

    .navbar-brand span {
        white-space: nowrap;
    }

    .social-icons i {
        font-size: 16px;
        color: #002C4D;
        transition: 0.3s ease;
    }

    .social-icons i:hover {
        transform: scale(1.2);
        color: #065daf;
    }

    @media (max-width: 992px) {
        .navbar-brand span {
            font-size: 14px;
        }

        .navbar-brand small {
            font-size: 11px !important;
        }

        .navbar-nav {
            text-align: center;
            padding-top: 15px;
        }

        .navbar-nav .nav-item {
            margin-bottom: 10px;
        }
    }

    @media (max-width: 576px) {
        .navbar-brand img {
            width: 40%;
            max-width: 40px;
            padding-top: 8%;
        }

        .navbar-brand span {
            font-size: 13px;
            line-height: 1.1;
        }

        .navbar-brand small {
            font-size: 10px !important;
        }

        .navbar-nav .nav-link {
            font-size: 14px;
        }

        .navbar-nav .btn {
            font-size: 14px !important;
            padding: 8px 14px;
        }

        .navbar-toggler {
            padding: 6px 8px;
        }
    }
</style> --}}