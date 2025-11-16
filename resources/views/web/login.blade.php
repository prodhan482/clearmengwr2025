    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

        * {
            box-sizing: border-box;
        }

        ::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #03080e;
            opacity: 1;
            /* Firefox */
        }

        .loginsection {
            padding: 0;
            margin: 0;
            background-color: #ffff;
            /*background: url('./bg3.jpg') no-repeat 49% 76%;*/
            /*background-size: cover;*/
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: poppins;
            position: relative;
        }

        .circles {
            width: 400px;
            height: 400px;
            margin: auto;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }


        .circle1 {
            width: 300px;
            height: 300px;
            background: linear-gradient(45deg, #ff0099, #7a0ed6);
            border-radius: 50%;
            position: absolute;
            top: -100px;
            right: -155px;
        }

        .circle2 {
            width: 200px;
            height: 200px;
            background: linear-gradient(45deg, #ff237b, #f64838);
            border-radius: 50%;
            position: absolute;
            bottom: -90px;
            left: -70px;
        }

        .login_form {
            display: flex;
            flex-direction: column;
            color: #03080e;
            padding: 40px 26px;
            width: 300px;
            /*height: 300px;*/
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.18);
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
            color: #fff;
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
            background: linear-gradient(45deg, #ff0d45, #ff01eb);
            color: #03080e;
            border: none;
            border-radius: 6px;
            padding: 14px 16px;
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
        }

        /*.login_form button:focus {
    outline: none;
    box-shadow: 0 0 15px #ff0d45;
}*/



        .home-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            padding: 8px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .home-button:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .home-button svg {
            display: block;
            stroke: #333;
        }
    </style>

    @extends('layouts.web.layouts')

    @section('title', 'Home | Clear Men Guinness World Records')

    @section('content')


        <section class="loginsection">
           
            </div>

            <div class="circles">
                <div class="circle1"></div>
                <div class="circle2"></div>
            </div>

            <form action="#" class="login_form">
                <h1>Welcome back!</h1>
                <p>Login to your account.</p>
                <input type="email" placeholder="Email address">
                <input type="password" placeholder="Password">
                <button type="submit">Login</button>
            </form>

        </section>

    @endsection
