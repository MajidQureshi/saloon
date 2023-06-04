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

        <main class="booking-1">
            <nav class="booking__nav">
                <ul class="booking__nav__list">
                    <a href=""> <li class="active__item">Service</li></a>
                    <a href=""> <li>Time & Place</li></a>
                    <a href=""> <li>Staff</li></a>
                    <a href=""> <li>Coupon</li></a>
                    <a href=""> <li>Payment</li></a>
                </ul>
            </nav>




            
            <div class="salon_select_services">
                <h4 class="salon__services__title">Select Services</h4>
                <div class="salon__services__container">

                @foreach($salon->categories as $cat)

                    <div class="salon__services__item">
                        <h5>Salon</h5>
                    </div>
                    @foreach ($cat->services as $service)
                    @php $sname = str_replace(" ","_", $service->name); @endphp
                    <div class="salon__services__box" id="{{$service->service_id}}-{{$service->price}}-{{$sname}}">
                        <img src="{{ asset('assests/single-salon/make-up.png') }}" alt="" />
                        <div class="salon__services__description">
                            <h6>{{$service->name}}</h6>
                            <span>@if ($salon->gender == "Both")
                                        <p class="pb-2 font-size-14 font-weight-medium">
                                            @if ($service->gender == "Male")
                                                <i class="la la-mars mr-1 listing-icon text-color-2"></i> {{__('layout.Male')}}
                                            @elseif ($service->gender == "Female")
                                                <i class="la la-venus mr-1 listing-icon text-color-2"></i> {{__('layout.Female')}}
                                            @else
                                                <i class="la la-venus-mars mr-1 listing-icon text-color-2"></i> {{__('layout.Unisex')}}
                                            @endif
                                        </p>
                                    @endif
                            </span>
                            <small>{{$service->time}} Min</small>
                        </div>
                        <span class="salon__services__price">{{$service->price}} {{$setting->currency_symbol}}</span>
                    </div>


                    @endforeach
                @endforeach

                </div>

                
            </div>
        </main>

        <div class="item__numbers hidden">
            <p>Service Selected</p>
            <button class="salon__services__booking_button__2">
                <a href="{{ url('salon/' .$salon->salon_id .'/'. Str::slug($salon->name)) .'/bookingsteptwo' }}" id="gostep2">Continue</a>
            </button>
            
        </div>
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
                        <li><a href="{{ url('/signup') }}" data-toggle="modal" data-target="#signUpModal">{{__('layout.Sign Up')}}</a></li>
                        <li><a href="{{ url('/login') }}" data-toggle="modal" data-target="#loginModal">{{__('layout.Log In')}}</a></li>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
$( document ).ready(function() {
    setTimeout(() => {
        let ser_dyn = JSON.parse(localStorage.getItem("service_storage"));
        
        // $.each(ser_dyn , function(index, val) { 
            // console.log(index, val)
        // });
        for(var i = 0; i < ser_dyn.length; i++) {
            $("#"+ser_dyn[i]).addClass('active-service-item')  
        }
        // $("#"+)
        // console.log(ser_dyn);
    }, 2000);
});
        </script>
    </body>
</html>
