<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#000000">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="/css/loginStyle.css">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Campus Abassador - login portal</title>
    </head>
    <body>
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="/images/img-login.svg" alt="">
                </div>

                <div class="login__forms" style="height:400px;">
                    <form action="/login" method="POST" class="login__registre" id="login-in">
                        @csrf
                        <h1 class="login__title">Sign In</h1>

                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" placeholder="Email" name="email" class="login__input">
                        </div>

                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" placeholder="Password" name="password" class="login__input">
                        </div>

                        <a href="#" class="login__forgot">Forgot password?</a>

                        <button style="width:100%;" class="login__button">Sign In</button>

                        <div>
                            <span class="login__account">Don't have an Account ?</span>
                            <a href="/signup" class="login__signin" id="sign-up">Sign Up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--===== MAIN JS =====-->

    </body>

    <style>
        input{
            width:100%!important;
        }
    </style>
</html>
