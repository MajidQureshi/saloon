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
        <header class="single__salon__header" style="height: 15rem; background:none;">
        <nav class="nav container">
    <div class="nav__logo">
        <img src="{{asset('html-assests/shared/logo.png')}}" alt="Meetendo logo" class="nav__logo__img" />
        <h2 class="nav__logo__title" style="color:#362574">Meetendo</h2>
    </div>
    <ul class="nav__list">
        <a href="{{ url('/') }}">
            <li class="nav__list__item" style="color:#362574">Home</li>
        </a>
        <a href="{{ url('/pricing') }}">
            <li class="nav__list__item" style="color:#362574">Pricing</li>
        </a>
        <a href="{{ url('/support') }}">
            <li class="nav__list__item" style="color:#362574">Support</li>
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
    <!-- <a class="nav__login__link" style="color:#362574" href="{{ url('/login') }}">Log in</a> -->
    <div class="dropdown">
        <a class="nav__login__link">Log in</a>
            <div class="dropdown-content">
                <a href="{{ url('/login') }}">Individual Login</a>
                <a href="{{ url('/owner/login') }}">Business Login</a>
            </div>
    </div>
    @endif
        
        <button class="nav__login__button">
            <a href="{{url('/pricing')}}">Subscribe Now</a>
        </button>
    </div>
    <img class="nav__menu" src="{{asset('html-assests/shared/menu.svg')}}" alt="" />
</nav>

            
        </header>
        @php
                                $stripe_key = 'pk_test_51N0q2GGe3Ltd3BwxNB9601Cd1GT09pUYny0aLW4mR6lR2fiRw2q6XMHVv9pCK07TfLewTjVcakHgdOd9LhbFZzaF00Kv6GfVMf';
                            @endphp


                            <section class="subscription__checkout">
                            <div class="subscription__checkout-description">
                <h2
                    class="subscription__checkout-title subscription__checkout-title--gold"
                >
                    Monthly Gold
                </h2>
                <p class="subscription__checkout-text">
                    Get 3 Months For FREE with this Pack, plus all these
                    features
                </p>
                <ul class="subscription__checkout-list">
                    <li>Silver Feature</li>
                    <li>Online Booking</li>
                    <li>Online booking Payment</li>
                    <li>Shop booking SMS Notification</li>
                    <li>Online booking system</li>
                    <li>Unlimited employee definition</li>
                    <li>Unlimited Client Definition</li>
                    <li>Unlimited Services Definition</li>
                    <li>Shop Reports Access</li>
                    <li>Mobile appointment booking integration</li>
                    <li>Client invoices</li>
                    <li>5% AED online booking transaction</li>
                    <li>3000 AED Setup fee</li>
                </ul>
                <span class="subscription__checkout-old_price"> 799 AED</span>
                <span class="subscription__checkout-new_price">399 AED</span>
            </div>

            <div class="subscription__checkout-payment">
                <h3 class="subscription__checkout-title">Payment</h3>
                <form class="subscription__checkout-form" action="{{ url('/aftersubscribepayment') }}"  method="post" id="payment-form">
                @csrf
                    <div class="subscription__checkout-coupon__box">
                        <label></label>
                        <input
                            class="input__coupon"
                            type="text"
                            placeholder="Enter The Coupon"
                        />
                        <a href=""> Apply</a>
                    </div>

                    <div class="form-group">
                                    <div class="card-header" style="margin-bottom:4rem">
                                        <!-- Card info -->
                                        <label for="card-element" style="font-size:14px">
                                            Enter your stripe card information
                                        </label>
                                    </div>
                                    <div class="card-body">
                                        <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                        </div>
                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                        <input type="hidden" name="plan" value="" />
                                    </div>
                                </div>
                                <div class="card-footer">
                                <button
                                id="card-button"
                                class="btn btn-dark"
                                type="submit"
                                data-secret="{{ $intent }}" style="font-size: 16px;margin-top:4rem;background-color: #2da159;border-radius: 2.4rem;padding-inline: 48%;padding-block: 1.3rem;border: 0;color: #fff;cursor: pointer;font-weight: 400;"> Pay </button>
                                </div>
                </form>
                <button class="subscription__checkout-continue__button">
                    Continue
                </button>
            </div>
        </section>




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

        <script src="https://js.stripe.com/v3/"></script>
        <script>
 
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
    
        const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
    
        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.
    
        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
    
        // Handle form submission.
        var form = document.getElementById('payment-form');
    
        form.addEventListener('submit', function(event) {
            event.preventDefault();
    
        stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    //billing_details: { name: cardHolderName.value }
                }
            })
            .then(function(result) {
                console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    console.log(result);
                    form.submit();
                }
            });
        });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>    
// $( document ).ready(function() {
//     setTimeout(() => {
//         let ser_dyn = JSON.parse(localStorage.getItem("service_storage"));
        
//         let spanhtml = "";
//         let total_amt = 0;
//         for(var i = 0; i < ser_dyn.length; i++) {
//             let chunk = ser_dyn[i].split('-');
//             total_amt = total_amt+parseInt(chunk[1]);
//             spanhtml += "<span>"+chunk[2].replace("_", " ")+"<small>"+chunk[1]+"</small></span>"
//             // $("#"+ser_dyn[i]).addClass('active-service-item')  
//         }
//         spanhtml += "<span>Total<small>"+total_amt+"</small></span>";
//         console.log(spanhtml);
//         $("#summary").html(spanhtml);
//         // $("#payment_amt").text("Pay "+total_amt);
//         // $("#"+)
//         // console.log(ser_dyn);
//         $("#date__text").text(localStorage.getItem("datetext"));
//         $("#time__text").text(localStorage.getItem("timetext"));
//         $("#place__text").text(localStorage.getItem("placetext"));
//         $("#staff__text").text("selected");
//     }, 2000);
// });
        </script>
    </body>
</html>
