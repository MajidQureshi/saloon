<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
            name="description"
            content="The Best Booking System For Salons & Spas. 
            Sign Up Free. Grow Your Salon And Save Time "
        />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

        <link
            rel="preload"
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap"
            as="style"
            onload="this.onload=null;this.rel='stylesheet'"
        />
        <noscript>
            <link
                href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap"
                rel="stylesheet"
            />
        </noscript>

        <!-- Swiper css -->

        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
        />

        <!-- Swiper js -->

        <!-- My javascript file -->

        <script defer src="../js/index.js"></script>
        <link rel="stylesheet" href="../styles/styles.css" />
        <title>Meetendo</title>
    </head>
    <body>
        <nav class="nav container">
            <div class="hidden overlay"></div>
            <div class="nav__logo">
                <img
                    src="../assests/shared/logo.webp"
                    alt="Meetendo logo"
                    class="nav__logo__img"
                />
                <h2 class="nav__logo__title">Meetendo</h2>
            </div>
            <ul class="nav__list">
                <a href="{{ url('/') }}">
                    <li class="nav__list__item">Home</li></a
                >
                <a href="{{ url('/pricing') }}"> <li class="nav__list__item">Pricing</li></a>
                <a href="{{ url('/support') }}"> <li class="nav__list__item">Support</li></a>
            </ul>

            <div class="nav__login">
                <!-- <a class="nav__login__link" href="{{ url('/login') }}">Log in</a> -->
                <div class="dropdown">
                        <a class="nav__login__link">Log in</a>
                            <div class="dropdown-content">
                                <a href="{{ url('/login') }}">Individual Login</a>
                                <a href="{{ url('/owner/login') }}">Business Login</a>
                            </div>
                    </div>
                <button class="nav__login__button">
                    <a href="{{url('/pricing')}}">Subscribe Now</a>
                </button>
            </div>
            <img class="nav__menu" src="../assests/shared/menu.svg" alt="" />
            <div class="hidden mobile-menu">
                <ul>
                    <a href="../html/index.html">
                        <li class="mobile-menu--item">Home</li></a
                    >
                    <a href=""> <li class="mobile-menu--item">Pricing</li></a>
                    <a href=""> <li class="mobile-menu--item">Support</li></a>
                </ul>
                <div class="mobile-menu__login">
                    <!-- <a class="nav__login__link" href="">Log in</a> -->
                    <div class="dropdown">
                        <a class="nav__login__link">Log in</a>
                            <div class="dropdown-content">
                                <a href="{{ url('/login') }}">Individual Login</a>
                                <a href="{{ url('/owner/login') }}">Business Login</a>
                            </div>
                    </div>
                    <button class="nav__login__button">
                        <a href="{{url('/pricing')}}">Subscribe Now</a>
                    </button>
                </div>
            </div>
        </nav>
        <header class="header--home" style="top: -1rem;position: absolute;z-index: -5;background-image: linear-gradient( to left top, #837dd3 0%, rgba(131, 125, 211, 0) 100% );clip-path: polygon(0% 0%, 100% 20%, 100% 100%, 0% 100%);width: 100%;height: 71rem;">
            <div class="appointment__content">
                
                <form class="appointment__form" style="background-color: hsl(var(--color-very-light-purple), 20);padding-block: 2.4rem;width: 47rem;border-radius: 3.2rem;padding-left: 25px;padding-right: 25px;" action="">
                    <h2 class="join__section-title" style="text-align: left;font-size: 22px;color: #000;">
                        Hey, Welcome Back !
                    </h2>
                    
                        @if($errors->any())
                            {{ implode('', $errors->all(':message')) }}
                        @endif
                    <div class="appointment__form__box">
                        <label class="appointment__form__label--email" for=""></label>
                        <input class="appointment__form__input" type="text" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="appointment__form__box">
                        <label class="appointment__form__label--pin" for=""></label>
                        <input class="appointment__form__input" type="password" name="password" id="password" placeholder="Password">
                    </div>
                    
                    <div class="form__buttons">
                        <button class="form__buttons__search">Login</button>
                        <a href="{{ url('/forgetpassword') }}">
                            <span style="padding-left:30px; font-size:18px;">Forget Password ?</span>
                        </a>    
                    </div>

                    <div>
                        <span style="font-size:14px;">You dont have account, <a class="nav__login__link" href="{{ url('/signup') }}">Create new Account Now</a></span><br />
                        <span style="font-size:14px;"><a class="nav__login__link" href="{{ url('/signupbusiness') }}">Create new Meetendo Business Now</a></span>
                    </div>
                </form>
            </div>

            <div class="image__logincontainer"></div>
        </header>



        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    </body>
</html>
