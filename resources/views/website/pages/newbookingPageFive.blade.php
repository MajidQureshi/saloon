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
    <!-- <a class="nav__login__link" href="{{ url('/login') }}">Log in</a> -->
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
                            <img src="{{asset('assests/single-salon/cash.svg')}}" alt="cash"/>
                            <span> Pay When You Arrive</span>
                        </div>


                    <form role="form" action="{{ url('salon/' .$salon->salon_id .'/'. Str::slug($salon->name)) .'/bookingbooked' }}"  method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="sk_test_51NG07sFI5wQ7qLlM3s0knlhvA3mDhAM9Obxq3CtqqTVpNkNggFbJ1w0F5gK0dFztvsTQ465HdjKY0D4gpANSMCrz00NXtJvnuV" id="payment-form">
                        @csrf
    
                        <div class="booking__payment__credit">
                            <div class="booking__payment__credit__header">
                                <img src="{{asset('assests/single-salon/credit.svg')}}" alt="cash">
                                <span> Credit Card</span>
                            </div>
                            <input type="hidden" name="amount" value="" id="payment_amount">
                            <input type="hidden" name="payment_desc" value="{{ $payment_desc }}" id="payment_desc">

                            <div class="booking__payment__inputs">
                                <div class="booking__payment__inputs__box">
                                    <label class="payment__name__label"></label>
                                    <input id="name__input" type="text" placeholder="Name" name="account_name">
                                </div>

                                <div class="booking__payment__inputs__box">
                                    <label class="payment__card__label"></label>
                                    <input id="card__input" type="text" placeholder="Card Number" maxlength="16" class="card-number" name="card_number" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                                </div>
                                <div class="booking__payment__month__box">
                                    <div class="booking__payment__inputs__box">
                                        <label class="payment__month__label"></label>
                                        <input id="month__input" type="text" placeholder="MM" maxlength="2" class="card-expiry-month" name="card_expiry_month" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                                    </div>
                                    <div class="booking__payment__inputs__box">
                                        <label class="payment__month__label"></label>
                                        <input id="month__input" type="text" placeholder="YYYY" maxlength="4" class="card-expiry-year" name="card_expiry_year" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                                    </div>
                                    <div class="booking__payment__inputs__box">
                                        <label class="payment__cvc__label"></label>
                                        <input id="CVC__input" type="text" placeholder="CVC" maxlength="3" class="card-cvc" name="card_cvc" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                                    </div>
                                </div>
                                <button class="" type="submit" id="payment_button" style="background-color: hsl(123, 40%, 42%);border-radius: 2.4rem;padding-inline: 5rem;padding-block: 1.3rem;border: 0;color: #fff;cursor: pointer;font-weight: 400;margin-top: 2rem;">Pay</button>
                            </div>
                        </div>
                    </form>


                        
                        
                        <div class="booking__payment__links">
                            <button id="payment__button1">Back</button>
                            
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
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
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
        console.log(spanhtml);
        $("#summary").html(spanhtml);
        $("#payment_amount").val(total_amt);
        $("#payment_button").text("Pay "+total_amt);
        // $("#payment_desc").val();
        // $("#"+)
        // console.log(ser_dyn);
        $("#date__text").text(localStorage.getItem("datetext"));
        $("#time__text").text(localStorage.getItem("timetext"));
        $("#place__text").text(localStorage.getItem("placetext"));
        $("#staff__text").text("selected");
    }, 2000);
});

$(function() {
  
  /*------------------------------------------
  --------------------------------------------
  Stripe Payment Code
  --------------------------------------------
  --------------------------------------------*/
  
  var $form = $(".require-validation");
   
  $('form.require-validation').bind('submit', function(e) {
      var $form = $(".require-validation"),
      inputSelector = ['input[type=email]', 'input[type=password]',
                       'input[type=text]', 'input[type=file]',
                       'textarea'].join(', '),
      $inputs = $form.find('.required').find(inputSelector),
      $errorMessage = $form.find('div.error'),
      valid = true;
      $errorMessage.addClass('hide');
  
      $('.has-error').removeClass('has-error');
      $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
          $input.parent().addClass('has-error');
          $errorMessage.removeClass('hide');
          e.preventDefault();
        }
      });
   
      if (!$form.data('cc-on-file')) {
        e.preventDefault();
        Stripe.setPublishableKey('pk_test_51NG07sFI5wQ7qLlMr5VzTtMQRRblHoV4mxkg0aRj7xXE8ME5100qt3HOoKOCQMvx2tS35164PgDqlO35CvBTQ6uc00VvGzgcri');
        Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
      }
  
  });
    
  /*------------------------------------------
  --------------------------------------------
  Stripe Response Handler
  --------------------------------------------
  --------------------------------------------*/
  function stripeResponseHandler(status, response) {
      if (response.error) {
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
          var token = response['id'];
               
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
      }
  }
   
});
        </script>
    </body>
</html>
