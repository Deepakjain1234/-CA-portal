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

                <div class="login__forms">
                    <form method="POST" action="/register" class="login__registre" id="login-in">
                        @csrf
                    <h1 class="login__title">Create Account</h1>
                        <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                            <input type="text" placeholder="Name" name="name" class="login__input">
                        </div>
                        <div class="login__box">
                            <i class='bx bx-at login__icon'></i>
                            <input type="text" placeholder="Email" name="email" class="login__input">
                        </div>

                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" placeholder="Password" name="password" class="login__input">
                        </div>
                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" placeholder="Confirm " name="password_confirmation" class="login__input">
                        </div>
                        <div class="login__box">
                        <i class='bx bxs-institution login__icon' ></i>
                            <input type="text" placeholder="Institution" name="instituteName" class="login__input">
                        </div>
                        <div class="login__box">
                        <i class='bx bxs-phone login__icon' ></i>
                            <input type="text" placeholder="Contact" name="mobile" class="login__input">
                        </div>

                        <button style="width:100%;" class="login__button">Sign Up</button>

                        <div>
                            <span class="login__account">Already have an Account ?</span>
                            <a href="/login_portal" class="login__signup" id="sign-in">Sign In</a>
                        </div>
                    </form>


            </div>
        </div>

        <!--===== MAIN JS =====-->
        <script>
        /*===== LOGIN SHOW and HIDDEN =====*/
const signUp = document.getElementById('sign-up'),
    signIn = document.getElementById('sign-in'),
    loginIn = document.getElementById('login-in'),
    loginUp = document.getElementById('login-up')


signUp.addEventListener('click', ()=>{
    // Remove classes first if they exist
    loginIn.classList.remove('block')
    loginUp.classList.remove('none')

    // Add classes
    loginIn.classList.toggle('none')
    loginUp.classList.toggle('block')
})

signIn.addEventListener('click', ()=>{
    // Remove classes first if they exist
    loginIn.classList.remove('none')
    loginUp.classList.remove('block')

    // Add classes
    loginIn.classList.toggle('block')
    loginUp.classList.toggle('none')
})


    </script>


<style>
    input{
        width:100%!important;
    }
</style>
    </body>
</html>
