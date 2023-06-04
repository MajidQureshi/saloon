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

        <main class="booking-2 booking-5">
            <div class="hidden overlay__booking"></div>
            <div class=""></div>
            <nav class="booking__nav">
                <ul class="booking__nav__list">
                    <li class="active__item" id="gostepone">Service</li>
                    <li class="active__item" id="gosteptwo">Time & Place</li>
                    <li class="active__item" id="gostepthree">Staff</li>
                    <li class="active__item" id="gostepfour">Coupon</li>
                    <li class="active__item" id="gostepfive">Payment</li>
                </ul>

                <div class="booking__main__content--2">
                    <div class="booking__payment">
                        <h4>Select Payment Method</h4>
                        <div class="pay__later">
                            <img
                                src="../assests/single-salon/cash.svg"
                                alt="cash"
                            />
                            <span> Pay When You Arrive</span>
                        </div>
                        <div class="booking__payment__credit">
                            <div class="booking__payment__credit__header">
                                <img
                                    src="../assests/single-salon/credit.svg"
                                    alt="cash"
                                />
                                <span> Credit Card</span>
                            </div>

                            <div class="booking__payment__inputs">
                                <div class="booking__payment__inputs__box">
                                    <label class="payment__name__label"></label>
                                    <input
                                        id="name__input"
                                        type="text"
                                        placeholder="Name"
                                    />
                                </div>

                                <div class="booking__payment__inputs__box">
                                    <label class="payment__card__label"></label>
                                    <input
                                        id="card__input"
                                        type="text"
                                        placeholder="Card Number "
                                    />
                                </div>
                                <div class="booking__payment__month__box">
                                    <div class="booking__payment__inputs__box">
                                        <label
                                            class="payment__month__label"
                                        ></label>
                                        <input
                                            id="month__input"
                                            type="text"
                                            placeholder="MM/YY"
                                        />
                                    </div>
                                    <div class="booking__payment__inputs__box">
                                        <label
                                            class="payment__cvc__label"
                                        ></label>
                                        <input
                                            id="CVC__input"
                                            type="text"
                                            placeholder="CVC"
                                        />
                                    </div>
                                </div>

                                <fieldset class="wizard-fieldset">
                            <div class="block-card mb-4">
                                <div class="block-card-header">
                                    <h3 class="widget-title"> {{__('layout.Select Payment Method')}} </h3>
                                    <div class="stroke-shape"></div>
                                </div>
                                <div class="block-card-body">
                                    <div class="payment-option-wrap">
                                        <div class="payment-tab is-active">
                                            <div class="payment-tab-toggle">
                                                <input checked id="cash" name="payment_type" type="radio" value="LOCAL">
                                                <label for="cash"> {{__('layout.Cash')}} </label>
                                            </div>
                                            <div class="payment-tab-content">
                                                <p> {{__('layout.Make your payment in cash at place of service held')}}.</p>
                                            </div>
                                        </div>
                                        @php
                                            $stripe = \App\PaymentSetting::first()->stripe;
                                        @endphp
                                        @if ($stripe)
                                            <div class="payment-tab">
                                                <div class="payment-tab-toggle">
                                                    <input id="stripe" name="payment_type" type="radio" value="STRIPE">
                                                    <label for="stripe"> {{__('layout.Stripe')}} </label>
                                                </div>
                                                <div class="payment-tab-content">
                                                    <p>{{__('layout.In order to complete your transaction, we will transfer you over to Stripes secure servers')}}.</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    @if ($stripe)
                                        <input type="hidden" value="{{$setting->stripe_public_key}}" name="stripePublicKey" id="stripePublicKey">
                                    @endif
                                    <input type="hidden" value="0" name="payment">
                                    <input type="hidden" value="0" name="discount">
                                    <a href="javascript:;" class="form-wizard-previous-btn theme-btn gradient-btn border-0 shadow-none float-left">{{__('layout.Previous')}}</a>
                                    <div class="stripe-form display-none"></div>
                                    <button type="button" id="cod_submit" onclick="booking()" class="form-wizard-submit theme-btn gradient-btn border-0 shadow-none float-right">{{__('layout.Submit')}}</button>
                                </div>
                            </div>
                        </fieldset>
                                <button class="booking__payment__button" id="payment_amt">
                                    Pay 300$
                                </button>
                            </div>
                        </div>
                        <div class="booking__payment__links">
                            <button id="payment__button">Continue</button>
                            <a href="../html/booking-4.html">Back</a>
                        </div>
                    </div>

                    <div class="booking__summary">
                        <h4>Booking Summary</h4>
                        <ul class="booking__summary__list">
                            <li>Date<span id="date__text">-</span></li>
                            <li>Time<span id="time__text">-</span></li>
                            <li>Place<span id="place__text">-</span></li>
                            <li>Staff<span id="staff__text">-</span></li>
                        </ul>
                        <div class="booking__summary__prices" id="summary">
                            <!-- <span>Make-Up<small>300$</small></span> -->
                            <!-- <span>Total<small>300$</small></span> -->
                        </div>
                    </div>
                </div>
            </nav>
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
        
        let spanhtml = "";
        let total_amt = 0;
        for(var i = 0; i < ser_dyn.length; i++) {
            let chunk = ser_dyn[i].split('-');
            total_amt = total_amt+parseInt(chunk[1]);
            spanhtml += "<span>"+chunk[2].replace("_", " ")+"<small>"+chunk[1]+"</small></span>"
            // $("#"+ser_dyn[i]).addClass('active-service-item')  
        }
        spanhtml += "<span>Total<small>"+total_amt+"</small></span>";
        $("#summary").html(spanhtml);
        $("#payment_amt").text("Pay "+total_amt);
        // $("#"+)
        // console.log(ser_dyn);
    }, 2000);
});
        </script>
    </body>
</html>
