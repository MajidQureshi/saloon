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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script defer src="{{ asset('js/index.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('styles/styles.css') }}" />
        <title>Meetendo</title>
    </head>
    <body>
        <header class="single__salon__header">
        <nav class="nav container">
    <div class="nav__logo">
        <img src="{{asset('html-assests/shared/logo.png')}}" alt="Meetendo logo" class="nav__logo__img" />
        <h2 class="nav__logo__title">Meetendo</h2>
    </div>
    <ul class="nav__list">
        <a href="{{ url('/') }}">
            <li class="nav__list__item">Home</li>
        </a>
        <a href="{{ url('/pricing') }}">
            <li class="nav__list__item">Pricing</li>
        </a>
        <a href="{{ url('/support') }}">
            <li class="nav__list__item">Support</li>
        </a>
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
    <img class="nav__menu" src="{{asset('html-assests/shared/menu.svg')}}" alt="" />
</nav>

            <div class="salon__details__booking">
                <h5 class="salon__details-title">Salons</h5>
                <h4 class="salon__details-subtitle">{{$salon->name}}</h4>

                <div class="salon__details-reviews">
                    <span>{{$salon->rateCount}}</span>
                    <span>{{__('reviews')}}</span>
                </div>

                <span class="salon__details-location"
                    >{{$salon->city}}, {{$salon->state}}, {{$salon->country}}</span
                >
            </div>
        </header>





        <main class="booking-2">
            <nav class="booking__nav">
                <ul class="booking__nav__list">
                    <li class="active__item" id="gostepone">Service</li>
                    <li class="active__item" id="gosteptwo">Time & Place</li>
                    <li>Staff</li>
                    <li>Coupon</li>
                    <li>Payment</li>
                </ul>
            </nav>
            <div class="booking__main__content--2">
                <div class="booking__time">
                    <h4>Select Time & Place</h4>
                    <form id="time__form">
                        <div class="booking__time__date">
                            <label for=""></label>
                            <input
                                id="date"
                                type="date"
                                placeholder="Select Date"
                            />
                        </div>
                        <div class="booking__time__clock">
                            <label for=""></label>

                            <input
                                id="clock"
                                type="text"
                                placeholder="Select Time Slot"
                            />
                        </div>
                        <div class="booking__time__location">
                            <label for=""></label>

                            <input
                                id="location"
                                type="text"
                                placeholder="Where ?"
                            />
                        </div>
                        <div class="booking__time__links">
                            <button id="time__button">Continue</button>
                            <a href="../html/booking-1.html">Back</a>
                        </div>
                    </form>
                </div>
                <div class="booking__summary">
                    <h4>Booking Summary</h4>
                    <ul>
                        <li>Date<span></span>-</li>
                        <li>Time<span></span>-</li>
                        <li>Place<span></span>-</li>
                        <li>Staff<span></span>-</li>
                    </ul>
                    <div class="booking__summary__prices">
                        <span>Make-Up<small>300$</small></span>
                        <span>Total<small>300$</small></span>
                    </div>
                </div>
            </div>
        </main>


        <section class="join__section">
            <h2 class="join__section-title">
                You have a Business and want to join Meetendo ?
            </h2>

            <form class="join__section-form" action="">
                <label class="join__section-label"></label>

                <input
                    class="join__section-input"
                    type="text"
                    placeholder="Enter Your Email"
                />
                <input class="join__section-button" type="submit" />
            </form>
            <div class="join__section-overlay"></div>
        </section>

        <!-- ================================
            START FOOTER AREA
        ================================= -->
        <footer class="footer">
            <header class="footer__header">
                <h3 class="footer__header-title">Download our App now !</h3>
                <div class="footer__header-store">
                    <a href="">
                        <img src="{{asset('html-assests/shared/app-store.png')}}" alt=" app-store" />
                    </a>
                    <a href="">
                        <img src="{{asset('html-assests/shared/google-play.png')}}" alt=" google-play" />
                    </a>
                </div>
            </header>

            <div class="footer__pages">
                <div class="footer__page col-lg-3 ">
                    <span class="footer__list-title">Product</span>
                    <ul>
                        <span style="font-size: 14px;">Morbi convallis bibendum urna ut viverra.</span>
                        <span style="font-size: 14px;">Maecenas quis consequat libero,</span>
                        <span style="font-size: 14px;"> a feugiat eros culpa officia deserunt mollit</span>
                    </ul>    
                </div>
                <div class="footer__page col-lg-3 ">
                    <span class="footer__list-title">Quick Links</span>
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#signUpModal">{{__('layout.Sign Up')}}</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#loginModal">{{__('layout.Log In')}}</a></li>
                    </ul>
                </div>
                <div class="footer__page col-lg-3 ">
                    <span class="footer__list-title">Categories</span>
                    <?php $categories = \App\Category::where('status',1)->take(6)->get(['cat_id','name']); ?>
                    <ul>
                        @foreach ($categories as $item)
                            <li><a href="{{url('/all-salons?category='.$item->cat_id)}}"> {{$item->name}} </a></li>
                        @endforeach
                        <li><a href="{{ url('/all-categories') }}"> {{__('All Categories')}} </a></li>
                    </ul>
                </div>
                <div class="footer__page col-lg-3 ">
                    <span class="footer__list-title">Contact with Us</span>
                    <ul>
                        <li><span class="d-block text-white mb-1"><i class="la la-map mr-1 text-color-2"></i>{{__('layout.Address')}}:</span> {{$setting->address}} </li>
                        <li><span class="d-block text-white mb-1"><i class="la la-phone mr-1 text-color-2"></i>{{__('layout.Phone')}}:</span><a href="tel:{{$setting->phone}}"> {{$setting->phone}} </a></li>
                        <li><span class="d-block text-white mb-1"><i class="la la-envelope mr-1 text-color-2"></i>{{__('layout.Email')}}:</span><a href="mailto:{{$setting->email}}"> {{$setting->email}} </a></li>
                    </ul>
                </div>
                
            </div>
            <div class="footer__end">
                <div class="footer__end-logo">
                    <img class="footer__end-logo__img" src="{{asset('html-assests/shared/logo.png')}}" alt=" logo" />
                    <span class="footer__end-logo">Meetendo</span>
                </div>
                <h4 class="copyright">© 2023 All rights reserved.</h4>
            </div>
        </footer>
        <!-- ================================
            START FOOTER AREA
        ================================= -->
    </body>
</html>
