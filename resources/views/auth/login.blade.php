<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

    * {
        box-sizing: border-box;
    }

    ::placeholder {
        color: #03080e;
        opacity: 1;
    }

    .loginsection {
        padding: 0;
        margin: 0;
        background-color: #ffff;
        height: 65vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Poppins', sans-serif;
        position: relative;
        isolation: isolate;
        /* ✅ Fix Safari stacking/z-index bug */
    }

    /* ---------- Background Circles ---------- */
    .circles {
        width: 400px;
        height: 400px;
        margin: auto;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 0;
        pointer-events: none;
        /* ✅ Never block clicks */
    }

    /* .circle1 {
        width: 300px;
        height: 300px;
        background: linear-gradient(45deg, #7effe5, #019678);
        border-radius: 50%;
        position: absolute;
        top: -100px;
        right: -155px;
        z-index: 0;
        pointer-events: none;
    }

    .circle2 {
        width: 200px;
        height: 200px;
        background: linear-gradient(45deg, #23f8cd, #5bc1ac);
        border-radius: 50%;
        position: absolute;
        bottom: -90px;
        left: -70px;
        z-index: 0;
        pointer-events: none;
    } */

    /* ---------- Login Form Card ---------- */
    .login_form {
        display: flex;
        flex-direction: column;
        color: #03080e;
        padding: 40px 26px;
        width: 400px;
        background-color: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 10px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.18);
        position: relative;
        z-index: 10;
        /* stays above circles */
    }

    .login_form h1 {
        font-size: 25px;
        margin-top: 0;
        margin-bottom: 8px;
    }

    .login_form p {
        margin-top: 0;
        margin-bottom: 26px;
    }

    .login_form input {
        background: transparent;
        color: #000000;
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 6px;
        padding: 14px 16px;
        margin-bottom: 30px;
    }

    .login_form input:focus {
        outline: none;
        border-color: #03080e;
    }

    .login_form button {
        background: #002C4D;
        color: #ffffff;
        border: none;
        border-radius: 6px;
        padding: 14px 16px;
        margin-top: 10px;
        font-size: 16px;
        font-weight: bold;
    }

    /* ---------- Home Button ---------- */
    .home-button {
        position: absolute;
        top: 20px;
        left: 20px;
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(10px);
        padding: 8px;
        border-radius: 50%;
        transition: all 0.3s ease;
        z-index: 20;
    }

    .home-button:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .home-button svg {
        display: block;
        stroke: #333;
    }

    /* ---------- Tablet View ---------- */
    @media (max-width: 768px) {
        .loginsection {
            height: auto;
            padding: 80px 20px;
        }

        .login_form {
            width: 100%;
            max-width: 350px;
            padding: 30px 20px;
        }

        /* .circle1 {
            width: 220px;
            height: 220px;
            top: -90px;
            right: -90px;
        }

        .circle2 {
            width: 150px;
            height: 150px;
            bottom: -70px;
            left: -50px;
        } */
    }

    /* ---------- Mobile Small ---------- */
    @media (max-width: 480px) {
        .login_form h1 {
            font-size: 20px;
        }

        .login_form p {
            font-size: 12px;
        }

        .login_form input,
        .login_form button {
            padding: 12px;
            font-size: 13px;
        }

        .home-button {
            font-size: 12px;
            padding: 6px 10px;
        }

        /* .circle1 {
            width: 180px;
            height: 180px;
        }

        .circle2 {
            width: 120px;
            height: 120px;
        } */
    }
</style>


@extends('layouts.web')

@section('title', 'Login | Clear Men Guinness World Records')

@section('content')

    <section class="loginsection">
        {{-- <div class="circles">
            <div class="circle1"></div>
            <div class="circle2"></div>
        </div> --}}

        <form action="{{ route('login') }}" method="POST" class="login_form">
            @csrf

            <h1>Login Here</h1>
            <p>Access the Guinness World Record Clear Men Attempts List</p>

            <input type="email" name="email" placeholder="Email address" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Password" required>

            <button class="nav-link custom-btn custom-border-btn btn" type="submit">Login</button>
        </form>
    </section>

    {{-- SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if ($errors->any())
            // Collect all validation errors into a single string
            let errorMessages = "";
            @foreach ($errors->all() as $error)
                errorMessages += "{{ $error }}\n";
            @endforeach

            Swal.fire({
                icon: 'error',
                title: 'Invalid Email or Password',
                text: errorMessages,
                confirmButtonColor: '#0cf8c9'
            });
        @endif

        @if (session('login_error'))
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: '{{ session('login_error') }}',
                confirmButtonColor: '#0cf8c9'
            });
        @endif

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false,
                position: 'top-end',
                toast: true
            });
        @endif
    </script>

@endsection