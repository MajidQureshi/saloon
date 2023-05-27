<header class="salon__header">
            <img
                src="../assests/salon/salon-left.svg"
                class="salon__header--left"
                alt="salon-left"
            />
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
                @if (Auth::check())
    
    <div class="dropdown">
        <button class="dropbtn">{{Auth::user()->name}}</button>
        <div class="dropdown-content">
            <a href="{{ url('/profile') }}">Profile</a>
            <a href="{{ url('/appointments') }}">Booking</a>
            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Logout</a>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
    
    @else
    <a class="nav__login__link" href="{{ url('/login') }}">Log in</a>
    @endif
                    <button class="nav__login__button">
                        <a href="{{url('/pricing')}}">Subscribe Now</a>
                    </button>
                </div>
                <img
                    class="nav__menu"
                    src="../assests/shared/menu.svg"
                    alt=""
                />
                <div class="hidden mobile-menu">
                    <ul>
                        <a href="../html/index.html">
                            <li class="mobile-menu--item">Home2</li></a
                        >
                        <a href="">
                            <li class="mobile-menu--item">Pricing</li></a
                        >
                        <a href="">
                            <li class="mobile-menu--item">Support</li></a
                        >
                    </ul>
                    <div class="mobile-menu__login">
                        <a class="nav__login__link" href="">Log in</a>
                        <button class="nav__login__button">
                            <a href="../html/subscription.html"
                                >Subscribe Now</a
                            >
                        </button>
                    </div>
                </div>
            </nav>

            <div class="form__container--salon">
                <h1 class="form__container--salon__title">
                    All Available Saloons
                </h1>
                <form class="header--home__form header--salon__form" method="post" action="{{ url('/all-salons') }}">
                    <div class="form__container">
                        <div class="form__input__container">
                            <label class="form__input__search__label"></label>
                            <input id="look_for" value="" name="look_for" class="header--home__input" placeholder="What are you looking for ?" type="text" />
                        </div>
                        <div class="form__input__container">
                            <label class="form__input__pin__label"></label>
                            <input id="search_address" value="" name="location" class="header--home__input" placeholder="Where to look ?" type="text" />
                        </div>
                        <div class="form__input__container form__input__container--open">
                            <input class="header--home__input" placeholder="Open Now" type="text" />
                        </div>
                        @csrf <!-- {{ csrf_field() }} -->
                        <input class="header--home__input header--home__input--submit header--salon__input--submit" type="submit" value="Search"/>
                        
                    </div>
                </form>
            </div>
            <img
                src="../assests/salon/salon-right.svg"
                class="salon__header--right"
                alt="meetendo logo"
            />
        </header>