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
        <!-- leaflet  -->

        <link
            rel="stylesheet"
            href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
            integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
            crossorigin=""
        />
        <script
            defer
            src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
            integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
            crossorigin=""
        ></script>

        <!-- My javascript file -->

        <script defer src="{{ asset('js/index.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('styles/styles.css') }}" />
        <style>
            /* Create two equal columns that floats next to each other */
            .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 300px; /* Should be removed. Only for demonstration */
            }

            /* Clear floats after the columns */
            .row:after {
            content: "";
            display: table;
            clear: both;
            }

            /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 600px) {
                .column {
                    width: 100%;
                }
            }
        </style>

        <title>Meetendo</title>
    </head>
    <body>
        <header class="single__salon__header">
            <nav class="nav container">
                <div class="hidden overlay"></div>
                <div class="nav__logo">
                    <img
                        src="{{ asset('assests/shared/logo.webp') }}"
                        alt="Meetendo logo"
                        class="nav__logo__img"
                    />
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
                <img
                    class="nav__menu"
                    src="{{ asset('assests/single-salon/menu.svg') }}"
                    alt=""
                />
                <div class="hidden mobile-menu">
                    <ul>
                        <a href="../html/index.html">
                            <li class="mobile-menu--item">Home</li></a
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
        </header>

        <!-- <div class="row">
            <div class="column">
                <h2>Column 1</h2>
                <p>Some text..</p>
            </div>
            <div class="column" style="background-color:#bbb;">
                <h2>Column 2</h2>
                <p>Some text..</p>
            </div>
            <div class="column" style="background-color:#aaa;">
                <h2>Column 3</h2>
                <p>Some text..</p>
            </div>
            <div class="column" style="background-color:#aaa;">
                <h2>Column 4</h2>
                <p>Some text..</p>
            </div>
        </div> -->

        <section class="individual__salon__section">
            <div class="salon__details">
                <h5 class="salon__details-title">Salons</h5>
                <h4 class="salon__details-subtitle">{{$salon->name}}</h4>
                <p class="salon__details-paragraph">
                {{$salon->desc}}
                </p>
                @php $rating = $salon->rate; @endphp
                <div class="salon__details-reviews">
                    <span>
                        <div class="star-rating-wrap d-flex align-items-center">
                                <div class="star-rating text-color-5 font-size-18">
                                    @foreach(range(1,5) as $i)
                                            @if($rating >0)
                                                @if($rating >0.5)
                                                    
                                                @endif
                                            @else 
                                                
                                            @endif
                                            @php $rating--; @endphp
                                        </span>
                                    @endforeach
                                </div>
                                <p class="font-size-14 pl-2 font-weight-medium">{{$salon->rateCount}}</p>
                        </div>
                    </span>
                    <span>{{$salon->rateCount}} {{__('reviews')}}</span>
                </div>
                <span class="salon__details-both">
                {{__('Give service at :')}}
                                @if ($salon->give_service == "Home")
                                    {{__('layout.Home')}}
                                @elseif ($salon->give_service == "Salon")
                                    {{__('layout.Salon')}}
                                @else
                                    {{__('layout.Both')}}
                                @endif
                </span>
                <span class="salon__details-gender"
                    >@if ($salon->gender == "Male")
                                <i class="la la-mars mr-1 listing-icon text-color-2"></i> {{__('layout.Male')}}
                            @elseif ($salon->gender == "Female")
                                <i class="la la-venus mr-1 listing-icon text-color-2"></i> {{__('layout.Female')}}
                            @else
                                <i class="la la-venus-mars mr-1 listing-icon text-color-2"></i> {{__('layout.Unisex')}}
                            @endif</span
                >
                <span class="salon__details-location"
                    >{{$salon->city}}, {{$salon->state}}, {{$salon->country}}</span
                >

                

                <a href="{{ url('salon/' .$salon->salon_id .'/'. Str::slug($salon->name)) .'/booking' }}" class="salon__details-button">Book Now</a>
            </div>

            <div class="salon__services">
                <h4 class="salon__services__title">Services</h4>
                <div class="salon__services__container">
                    
                    @foreach($salon->categories as $cat)
                    <div class="salon__services__item">
                    
                        <h5>{{$cat->name}}</h5>
                    
                    </div>
                    @foreach ($cat->services as $service)
                    @php $sname = str_replace(" ","_", $service->name); @endphp
                    <div class="salon__services__box ser" id="{{$service->service_id}}-{{$service->price}}-{{$sname}}">
                    <img src="{{ $service->imagePath .'/'. $service->image }}" alt="{{$service->name}}">
                        <div class="salon__services__description">
                            <h6>{{$service->name}}</h6>
                            @if ($salon->gender == "Both")
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
                            <!-- <span>Unisex : Give service at Both</span> -->
                            <small>{{$service->time}} {{__('layout.Min')}}</small>
                            <a href="../html/booking-1.html">Book Now</a>
                        </div>
                        <span class="salon__services__price">{{$service->price}} {{$setting->currency_symbol}}</span>
                    </div>
                    @endforeach
                    @endforeach
                    
                </div>

               
            </div>

            <div class="salon__time" style="margin-top: -{{$gap * 3.7}}em !important;">
                <h4 class="salon__time__title">Opening Time</h4>
                <ul class="salon__time__list">
                <li class="d-flex justify-content-between">{{__('layout.Monday')}}
                                <span class="{{implode(" : ",$times[0]) == 'Close' ? 'text-color-2' : ''}}">{{implode(" : ",$times[0])}}</span>
                            </li>
                            <li class="d-flex justify-content-between">{{__('layout.Tuesday')}} <span class="{{implode(" : ",$times[1]) == 'Close' ? 'text-color-2' : ''}}">{{implode(" : ",$times[1])}}</span></li>
                            <li class="d-flex justify-content-between">{{__('layout.Wednesday')}} <span class="{{implode(" : ",$times[2]) == 'Close' ? 'text-color-2' : ''}}">{{implode(" : ",$times[2])}}</span></li>
                            <li class="d-flex justify-content-between">{{__('layout.Thursday')}} <span class="{{implode(" : ",$times[3]) == 'Close' ? 'text-color-2' : ''}}">{{implode(" : ",$times[3])}}</span></li>
                            <li class="d-flex justify-content-between">{{__('layout.Friday')}} <span class="{{implode(" : ",$times[4]) == 'Close' ? 'text-color-2' : ''}}">{{implode(" : ",$times[4])}}</span></li>
                            <li class="d-flex justify-content-between">{{__('layout.Saturday')}} <span class="{{implode(" : ",$times[5]) == 'Close' ? 'text-color-2' : ''}}">{{implode(" : ",$times[5])}}</span></li>
                            <li class="d-flex justify-content-between">{{__('layout.Sunday')}} <span class="{{implode(" : ",$times[6]) == 'Close' ? 'text-color-2' : ''}}">{{implode(" : ",$times[6])}}</span></li>
                    <!-- <li><span>Monday</span> 8:00 AM - 8:00 PM</li>
                    <li><span>Tuesday</span> 8:00 AM - 8:00 PM</li>
                    <li><span>Wednesday</span> 8:00 AM - 8:00 PM</li>
                    <li><span>Thursday</span> 8:00 AM - 8:00 PM</li>
                    <li><span>Friday</span> 8:00 AM - 8:00 PM</li>
                    <li><span>Saturday</span> 8:00 AM - 8:00 PM</li>
                    <li><span>Sunday</span> 8:00 AM - 8:00 PM</li> -->
                </ul>
            </div>

            <div class="salon__location" style="margin-top: -{{$gap * 6}}em !important;">
                <h4 class="salon__location__title">Location & Contact</h4>
                <div id="map"></div>
                <span class="salon__location__number">{{$salon->ownerDetails->code}}{{$salon->ownerDetails->phone}}</span>
                <span class="salon__location__map-pin"
                    >{{$salon->address}}, {{$salon->city}}-{{$salon->zipcode}}, {{$salon->state}}, {{$salon->country}}</span
                >
            </div>

            <div class="salon__owner" style="margin-top: -{{$gap * 8}}em !important;">
                <h4 class="salon__owner_title">Salon Owner</h4>
                <div class="salon__owner_title__box">
                <img src=" {{url($salon->ownerDetails->imagePath .'/'.$salon->ownerDetails->image)}} " alt="author-img">
                    <h4 class="salon__owner__title">{{$salon->ownerDetails->name}}</h4>
                </div>

                <span class="salon__owner__number">{{$salon->ownerDetails->code}}{{$salon->ownerDetails->phone}}</span>
                <span class="salon__owner__email">{{$salon->ownerDetails->email}}</span>
                <span class="salon__owner__map-pin"
                    >{{$salon->address}}, {{$salon->city}}-{{$salon->zipcode}}, {{$salon->state}}, {{$salon->country}}</span
                >
            </div>

            @if($salon->review->total() > 0)
            <div class="salon__review">
                <h4 class="salon__review_title">Reviews</h4>
                <a href="">Download Our App to See Reviews</a>

                
                @foreach($salon->reviews as $review)
                <div class="salon__review__box">
                    <div class="salon__review__box__image__container">
                        <img
                            src="../assests/single-salon/Ellipse 1.png"
                            alt="profile-photo"
                        />
                        <div class="salon__review__box__title">
                            <h5>Ahmed Hammem</h5>
                            <small>16/10/2022</small>
                        </div>
                    </div>
                    <div class="salon__review__box__stars">
                        <span>3</span>
                        <img
                            src="../assests/single-salon/green-star.svg"
                            alt="star"
                        />
                        <img
                            src="../assests/single-salon/green-star.svg"
                            alt="star"
                        />
                        <img
                            src="../assests/single-salon/green-star.svg"
                            alt="star"
                        />
                    </div>
                    <p>
                        Welcome to our salon! We are proud to offer you
                        top-notch service that will leave you feeling confident
                        and looking your best. Our experienced stylists and
                        experts use the latest techniques and products to give
                        you beautiful results while keeping your hair healthy.
                        In addition, we offer a variety of other treatments,
                        including coloring, perms, relaxers, facial waxing, and
                        much more. You can count on us for an enjoyable
                        experience that will nourish both your hair and
                        self-confidence. Thank you for choosing us!
                    </p>
                </div>
                @endforeach
                
                
            </div>
            @endif
        </section>






        <section class="carousel__section">
            <h3>Register Saloon:</h3>
            <div class="carousel__section__carousel">
                <div class="carousel__track-container swiper">
                    <ul class="carousel__track swiper-wrapper">

                    @foreach ($salons as $salon)
                    <li class="carousel__slide swiper-slide">
                        <img src="{{asset('html-assests/shared/carousel-img.png')}}" alt=" carousel-slide" />
                        <span class="carousel__slide-subtitle">{{$salon->desc}}</span>
                        <div class="carousel__slide-rating">
                            <h6 class="carousel__slide-title">
                            <a href="{{ url('salon/'.$salon['salon_id']. '/'. Str::slug($salon['name'])) }}">{{ $salon->name }}</a>
                            </h6>
                            <span class="carousel__slide-star">3
                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.02994 0.573876C8.29837 -0.0715002 9.21258 -0.0715002 9.48101 0.573876L11.3743 5.12602L16.2888 5.52C16.9855 5.57586 17.268 6.44536 16.7372 6.90012L12.9929 10.1075L14.1368 14.9031C14.299 15.583 13.5594 16.1204 12.9629 15.756L8.75548 13.1861L4.54805 15.756C3.95155 16.1204 3.21191 15.583 3.37409 14.9031L4.51802 10.1075L0.773757 6.90012C0.242913 6.44536 0.525426 5.57586 1.22217 5.52L6.13659 5.12602L8.02994 0.573876ZM10.2861 5.57867C10.4558 5.98679 10.8396 6.26563 11.2802 6.30096L15.2529 6.61943L12.2262 9.21228C11.8905 9.49981 11.7438 9.95102 11.8464 10.3809L12.7711 14.2577L9.3699 12.1802C8.99271 11.9498 8.51824 11.9498 8.14105 12.1802L4.73981 14.2577L5.66456 10.3809C5.76712 9.95102 5.62052 9.49981 5.28483 9.21228L2.258 6.61943L6.23078 6.30096C6.67137 6.26563 7.05517 5.98679 7.22488 5.57867L8.75548 1.89875L10.2861 5.57867Z"
                                        fill="#cccccc" />
                                </svg>
                            </span>
                        </div>
                        <p class="carousel__slide-text">
                            {{$salon->city}}, {{$salon->country}} 
                        </p>
                    </li>
                @endforeach

                        <li class="carousel__slide swiper-slide">
                            <img
                                src="../assests/shared/carousel-img.webp"
                                alt="carousel-slide"
                            />
                            <span class="carousel__slide-subtitle">Salons</span>
                            <div class="carousel__slide-rating">
                                <h6 class="carousel__slide-title">
                                    Mashe Saloon
                                </h6>
                                <span class="carousel__slide-star"
                                    >3
                                    <svg
                                        width="18"
                                        height="16"
                                        viewBox="0 0 18 16"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M8.02994 0.573876C8.29837 -0.0715002 9.21258 -0.0715002 9.48101 0.573876L11.3743 5.12602L16.2888 5.52C16.9855 5.57586 17.268 6.44536 16.7372 6.90012L12.9929 10.1075L14.1368 14.9031C14.299 15.583 13.5594 16.1204 12.9629 15.756L8.75548 13.1861L4.54805 15.756C3.95155 16.1204 3.21191 15.583 3.37409 14.9031L4.51802 10.1075L0.773757 6.90012C0.242913 6.44536 0.525426 5.57586 1.22217 5.52L6.13659 5.12602L8.02994 0.573876ZM10.2861 5.57867C10.4558 5.98679 10.8396 6.26563 11.2802 6.30096L15.2529 6.61943L12.2262 9.21228C11.8905 9.49981 11.7438 9.95102 11.8464 10.3809L12.7711 14.2577L9.3699 12.1802C8.99271 11.9498 8.51824 11.9498 8.14105 12.1802L4.73981 14.2577L5.66456 10.3809C5.76712 9.95102 5.62052 9.49981 5.28483 9.21228L2.258 6.61943L6.23078 6.30096C6.67137 6.26563 7.05517 5.98679 7.22488 5.57867L8.75548 1.89875L10.2861 5.57867Z"
                                            fill="#cccccc"
                                        />
                                    </svg>
                                </span>
                            </div>
                            <p class="carousel__slide-text">
                                Speciality in hair body nails facial operations.
                            </p>
                        </li>
                        <li class="carousel__slide swiper-slide">
                            <img
                                src="../assests/shared/carousel-img.webp"
                                alt="carousel-slide"
                            />
                            <span class="carousel__slide-subtitle">Salons</span>
                            <div class="carousel__slide-rating">
                                <h6 class="carousel__slide-title">
                                    Mashe Saloon
                                </h6>
                                <span class="carousel__slide-star"
                                    >3<svg
                                        width="18"
                                        height="16"
                                        viewBox="0 0 18 16"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M8.02994 0.573876C8.29837 -0.0715002 9.21258 -0.0715002 9.48101 0.573876L11.3743 5.12602L16.2888 5.52C16.9855 5.57586 17.268 6.44536 16.7372 6.90012L12.9929 10.1075L14.1368 14.9031C14.299 15.583 13.5594 16.1204 12.9629 15.756L8.75548 13.1861L4.54805 15.756C3.95155 16.1204 3.21191 15.583 3.37409 14.9031L4.51802 10.1075L0.773757 6.90012C0.242913 6.44536 0.525426 5.57586 1.22217 5.52L6.13659 5.12602L8.02994 0.573876ZM10.2861 5.57867C10.4558 5.98679 10.8396 6.26563 11.2802 6.30096L15.2529 6.61943L12.2262 9.21228C11.8905 9.49981 11.7438 9.95102 11.8464 10.3809L12.7711 14.2577L9.3699 12.1802C8.99271 11.9498 8.51824 11.9498 8.14105 12.1802L4.73981 14.2577L5.66456 10.3809C5.76712 9.95102 5.62052 9.49981 5.28483 9.21228L2.258 6.61943L6.23078 6.30096C6.67137 6.26563 7.05517 5.98679 7.22488 5.57867L8.75548 1.89875L10.2861 5.57867Z"
                                            fill="#cccccc"
                                        />
                                    </svg>
                                </span>
                            </div>
                            <p class="carousel__slide-text">
                                Speciality in hair body nails facial operations.
                            </p>
                        </li>
                        <li class="carousel__slide swiper-slide">
                            <img
                                src="../assests/shared/carousel-img.webp"
                                alt="carousel-slide"
                            />
                            <span class="carousel__slide-subtitle">Salons</span>
                            <div class="carousel__slide-rating">
                                <h6 class="carousel__slide-title">
                                    Mashe Saloon
                                </h6>
                                <span class="carousel__slide-star"
                                    >3<svg
                                        width="18"
                                        height="16"
                                        viewBox="0 0 18 16"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M8.02994 0.573876C8.29837 -0.0715002 9.21258 -0.0715002 9.48101 0.573876L11.3743 5.12602L16.2888 5.52C16.9855 5.57586 17.268 6.44536 16.7372 6.90012L12.9929 10.1075L14.1368 14.9031C14.299 15.583 13.5594 16.1204 12.9629 15.756L8.75548 13.1861L4.54805 15.756C3.95155 16.1204 3.21191 15.583 3.37409 14.9031L4.51802 10.1075L0.773757 6.90012C0.242913 6.44536 0.525426 5.57586 1.22217 5.52L6.13659 5.12602L8.02994 0.573876ZM10.2861 5.57867C10.4558 5.98679 10.8396 6.26563 11.2802 6.30096L15.2529 6.61943L12.2262 9.21228C11.8905 9.49981 11.7438 9.95102 11.8464 10.3809L12.7711 14.2577L9.3699 12.1802C8.99271 11.9498 8.51824 11.9498 8.14105 12.1802L4.73981 14.2577L5.66456 10.3809C5.76712 9.95102 5.62052 9.49981 5.28483 9.21228L2.258 6.61943L6.23078 6.30096C6.67137 6.26563 7.05517 5.98679 7.22488 5.57867L8.75548 1.89875L10.2861 5.57867Z"
                                            fill="#cccccc"
                                        />
                                    </svg>
                                </span>
                            </div>
                            <p class="carousel__slide-text">
                                Speciality in hair body nails facial operations.
                            </p>
                        </li>
                        <li class="carousel__slide swiper-slide">
                            <img
                                src="../assests/shared/carousel-img.webp"
                                alt="carousel-slide"
                            />
                            <span class="carousel__slide-subtitle">Salons</span>
                            <div class="carousel__slide-rating">
                                <h6 class="carousel__slide-title">
                                    Mashe Saloon
                                </h6>
                                <span class="carousel__slide-star"
                                    >3<svg
                                        width="18"
                                        height="16"
                                        viewBox="0 0 18 16"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M8.02994 0.573876C8.29837 -0.0715002 9.21258 -0.0715002 9.48101 0.573876L11.3743 5.12602L16.2888 5.52C16.9855 5.57586 17.268 6.44536 16.7372 6.90012L12.9929 10.1075L14.1368 14.9031C14.299 15.583 13.5594 16.1204 12.9629 15.756L8.75548 13.1861L4.54805 15.756C3.95155 16.1204 3.21191 15.583 3.37409 14.9031L4.51802 10.1075L0.773757 6.90012C0.242913 6.44536 0.525426 5.57586 1.22217 5.52L6.13659 5.12602L8.02994 0.573876ZM10.2861 5.57867C10.4558 5.98679 10.8396 6.26563 11.2802 6.30096L15.2529 6.61943L12.2262 9.21228C11.8905 9.49981 11.7438 9.95102 11.8464 10.3809L12.7711 14.2577L9.3699 12.1802C8.99271 11.9498 8.51824 11.9498 8.14105 12.1802L4.73981 14.2577L5.66456 10.3809C5.76712 9.95102 5.62052 9.49981 5.28483 9.21228L2.258 6.61943L6.23078 6.30096C6.67137 6.26563 7.05517 5.98679 7.22488 5.57867L8.75548 1.89875L10.2861 5.57867Z"
                                            fill="#cccccc"
                                        />
                                    </svg>
                                </span>
                            </div>
                            <p class="carousel__slide-text">
                                Speciality in hair body nails facial operations.
                            </p>
                        </li>
                        <li class="carousel__slide swiper-slide">
                            <img
                                src="../assests/shared/carousel-img.webp"
                                alt="carousel-slide"
                            />
                            <span class="carousel__slide-subtitle">Salons</span>
                            <div class="carousel__slide-rating">
                                <h6 class="carousel__slide-title">
                                    Mashe Saloon
                                </h6>
                                <span class="carousel__slide-star"
                                    >3<svg
                                        width="18"
                                        height="16"
                                        viewBox="0 0 18 16"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M8.02994 0.573876C8.29837 -0.0715002 9.21258 -0.0715002 9.48101 0.573876L11.3743 5.12602L16.2888 5.52C16.9855 5.57586 17.268 6.44536 16.7372 6.90012L12.9929 10.1075L14.1368 14.9031C14.299 15.583 13.5594 16.1204 12.9629 15.756L8.75548 13.1861L4.54805 15.756C3.95155 16.1204 3.21191 15.583 3.37409 14.9031L4.51802 10.1075L0.773757 6.90012C0.242913 6.44536 0.525426 5.57586 1.22217 5.52L6.13659 5.12602L8.02994 0.573876ZM10.2861 5.57867C10.4558 5.98679 10.8396 6.26563 11.2802 6.30096L15.2529 6.61943L12.2262 9.21228C11.8905 9.49981 11.7438 9.95102 11.8464 10.3809L12.7711 14.2577L9.3699 12.1802C8.99271 11.9498 8.51824 11.9498 8.14105 12.1802L4.73981 14.2577L5.66456 10.3809C5.76712 9.95102 5.62052 9.49981 5.28483 9.21228L2.258 6.61943L6.23078 6.30096C6.67137 6.26563 7.05517 5.98679 7.22488 5.57867L8.75548 1.89875L10.2861 5.57867Z"
                                            fill="#cccccc"
                                        />
                                    </svg>
                                </span>
                            </div>
                            <p class="carousel__slide-text">
                                Speciality in hair body nails facial operations.
                            </p>
                        </li>
                    </ul>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div class="carousel__section__button-container">
                    <a href="{{ url('/all-salons') }}"
                        ><button class="carousel__section__button">
                            See More
                            <span></span>
                        </button>
                    </a>
                </div>
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
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
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
