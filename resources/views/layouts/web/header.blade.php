<nav class="navbar navbar-expand-lg bg-light shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="assets/images/logo.png" class="logo img-fluid" alt="ClearmenGWR">
            <span>
                Clear Men Guinness World Record
                <small style="justify-content: center;">OFFICIAL ATTEMPT</small>
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                @guest
                    <!-- Show Home/Register/Login if not logged in -->
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="{{ '/' }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_4">Register</a>
                    </li>

                    <li class="nav-item ms-3">
                        <a class="nav-link custom-btn custom-border-btn btn" href="{{ '/login' }}">Login</a>
                    </li>
                @endguest

                @auth
                    <!-- Show username and logout if logged in -->
                    <li class="nav-item">
                        <span class="nav-link">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item ms-3">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="nav-link custom-btn custom-border-btn btn-danger" type="submit" style="border:none;">Logout</button>
                        </form>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>






<style>
    .navbar-brand span {
        white-space: nowrap;
    }

    @media (max-width: 992px) {

        /* Tablet */
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

        /* Mobile */
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
</style>