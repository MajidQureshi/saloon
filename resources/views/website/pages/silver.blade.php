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
        <a class="nav__login__link" style="color:#362574">Log in</a>
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

                            <section class="subscription__checkout">
            <div class="subscription__checkout-description">
                <h2
                    class="subscription__checkout-title subscription__checkout-title--silver"
                >
                    Free Silver
                </h2>
                <p
                    class="subscription__checkout-text subscription__checkout-text--silver"
                >
                    Start for free with our free Silver Pack to get these
                    features
                </p>
                <ul class="subscription__checkout-list">
                    <li>Mobile application advertisement</li>
                    <li>show your current available services</li>
                    <li>
                        show your current available artist based on his / her
                        specialty
                    </li>
                    <li>see your customer reviews</li>
                    <li>see your location on the Smartcita map</li>
                    <li>Book a ride to your location Using uber easily</li>
                    <li>Shop Photos on the mobile application</li>
                    <li>Your phone number will appear in the app</li>
                    <li>No Setup fees</li>
                </ul>
                <span class="subscription__checkout-new_price">00 AED</span>
            </div>

            <div class="subscription__checkout-payment">
                <h3 class="subscription__checkout-title">Payment</h3>
                

                    <form role="form" action="{{ url('/aftersubscribepayment') }}"  method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="sk_test_51NG07sFI5wQ7qLlM3s0knlhvA3mDhAM9Obxq3CtqqTVpNkNggFbJ1w0F5gK0dFztvsTQ465HdjKY0D4gpANSMCrz00NXtJvnuV" id="payment-form">
                        @csrf
    
                        <div class="booking__payment__credit">
                            <div class="booking__payment__credit__header">
                                <img src="../assests/single-salon/credit.svg" alt="cash">
                                <span> Credit Card</span>
                            </div>
                            <input type="hidden" name="amount" value="0" id="payment_amount">
                            <input type="hidden" name="payment_desc" value="Silver Package" id="payment_desc">

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
                                <button class="" type="submit" id="payment_button" style="background-color: hsl(123, 40%, 42%);border-radius: 2.4rem;padding-inline: 5rem;padding-block: 1.3rem;border: 0;color: #fff;cursor: pointer;font-weight: 400;margin-top: 2rem;">Free</button>
                            </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
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
