@extends('website.layouts.newmaster')
@section('website_content')
{{-- @include('website.layouts.hero') --}}
<?php $setting = \App\AdminSetting::find(1) ?>


<header class="header--home">
    <h1 class="header--home__title">
        Make Booking Easier with Our Online Appointment System!
    </h1>
    <form class="header--home__form" method="POST" action="{{ url('/all-salons') }}">
        <div class="form__container">
            <div class="form__input__container">
                <label class="form__input__search__label"></label>
                <input class="header--home__input" id="look_for" value="" name="look_for" placeholder="What are you looking for ?" type="text" />
            </div>
            <div class="form__input__container">
                <label class="form__input__pin__label"></label>
                <input class="header--home__input" id="search_address" value="" name="location" placeholder="Where to look ?" type="text" />
            </div>
            @csrf <!-- {{ csrf_field() }} -->
            <input class="header--home__input header--home__input--submit" type="submit" value="Search" />
        </div>
    </form>

    <div class="image__container"></div>
</header>
<div class="header-background"></div>
<section class="cards__section">
    <div class="cards__section__intro">
        <div class="cards__section__intro--box">
            <figure class="cards__section__figure">
                <blockquote class="figure__quote">
                    “If you can't measure it, you can't manage it.”
                </blockquote>
            </figure>
            <p>
                With meetendo appointment system you can measure your
                work , performance and revenue to make the right
                decision to increase your profit.
            </p>

            <button class="cards__section__button">
                Join Meetendo Now
            </button>
        </div>
        <img class="cards__section__img" src="{{asset('html-assests/shared/Save-time.png')}}" alt=" Save-time" />

    </div>
    <div class="cards__section__content">
        <h3 class="cards__section__content__title">With Meetendo</h3>
        <div class="cards__section-cards">
            <div class="cards__section-card">
                <img src="{{asset('html-assests/shared/Share-location.png')}}" alt="" />
                <h4>Wherever You Are</h4>
                <p>
                    We got Services from all the country for you to
                    discover.
                </p>
            </div>
            <div class=" cards__section-card">
                <img src="{{asset('html-assests/shared/Schedule.png')}}" alt="" />
                <h4>Make Appoitement Rapidly</h4>
                <p>
                    Book your next appointment in a snap with our
                    user-friendly website.
                </p>
            </div>
            <div class=" cards__section-card">
                <img src="{{asset('html-assests/shared/Rating.png')}}" alt="" />
                <h4>View Other Rate & Opinion</h4>
                <p>
                    Looking for an honest opinion? Check out reviews
                    from other people.
                </p>
            </div>
        </div>
        <a href=""><button class=" cards__section__big__button">
                Join Meetendo Now
                <span></span></button></a>
    </div>
</section>
<section class="appointment">
    <img class="appointment__image" src="{{asset('html-assests/shared/appointment-img.png')}}" alt="" />
    <div class=" appointment__content">
        <p class="appointment__content__text">
            Using Mentendo to make appointment is incredibly easy and
            convenient.
        </p>
        <form class="appointment__form" method="POST" action="{{ url('/all-salons') }}">
            <div class="appointment__form__box">
                <label class="appointment__form__label--search" for=""></label>
                <input class="appointment__form__input" type="text" id="look_for" value="" name="look_for" placeholder="What are you looking for ?" />
            </div>
            <div class="appointment__form__box">
                <label class="appointment__form__label--pin" for=""></label>

                <input class="appointment__form__input" type="text" id="search_address" value="" name="location" placeholder="Where to look ?" />
            </div>
            <div class="appointment__form__box"> 
            <div class="demo">
  
    <div class="spacer">
    <label class="appointment__form__label--pin" for=""></label>
<select class="select_demo select">
<option><span style="margin-left:30px;">Select Category</span></option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->cat_id }}">{{ $category->name }}</option>
                    @endforeach
</select>
    </div>
</div>    
            
                <!-- <select name="category" id="category" style="width: 90%;height: 50px;font-size: 14px;border: 1px;border-radius: 30px;">
                    <option><span style="margin-left:30px;">Select Category</span></option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->cat_id }}">{{ $category->name }}</option>
                    @endforeach
                    
                    
                </select> -->
                @csrf <!-- {{ csrf_field() }} -->
            </div>
            <!-- <div class="appointment__form__box">
                <label class="appointment__form__label--category" for=""></label>
                <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                <input class="appointment__form__input" type="text" placeholder="Category" />
            </div> -->
            <div class="form__buttons">
                <button class="form__buttons__search" id="search-btn">Search</button>
                <a href="{{ url('/pricing') }}" class="form__buttons__subscribe">
                    Subscribe Now
                </a>
            </div>
        </form>
    </div>
</section>

<!-- Carousel -->
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



                <!-- <li class="carousel__slide swiper-slide">
                    <img src="{{asset('html-assests/shared/carousel-img.png')}}" alt=" carousel-slide" />
                    <span class="carousel__slide-subtitle">Salons</span>
                    <div class="carousel__slide-rating">
                        <h6 class="carousel__slide-title">
                            Mashe Saloon
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
                        Speciality in hair body nails facial operations.
                    </p>
                </li>
                <li class="carousel__slide swiper-slide">
                    <img src="{{asset('html-assests/shared/carousel-img.png')}}" alt=" carousel-slide" />
                    <span class="carousel__slide-subtitle">Salons</span>
                    <div class="carousel__slide-rating">
                        <h6 class="carousel__slide-title">
                            Mashe Saloon
                        </h6>
                        <span class="carousel__slide-star">3<svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.02994 0.573876C8.29837 -0.0715002 9.21258 -0.0715002 9.48101 0.573876L11.3743 5.12602L16.2888 5.52C16.9855 5.57586 17.268 6.44536 16.7372 6.90012L12.9929 10.1075L14.1368 14.9031C14.299 15.583 13.5594 16.1204 12.9629 15.756L8.75548 13.1861L4.54805 15.756C3.95155 16.1204 3.21191 15.583 3.37409 14.9031L4.51802 10.1075L0.773757 6.90012C0.242913 6.44536 0.525426 5.57586 1.22217 5.52L6.13659 5.12602L8.02994 0.573876ZM10.2861 5.57867C10.4558 5.98679 10.8396 6.26563 11.2802 6.30096L15.2529 6.61943L12.2262 9.21228C11.8905 9.49981 11.7438 9.95102 11.8464 10.3809L12.7711 14.2577L9.3699 12.1802C8.99271 11.9498 8.51824 11.9498 8.14105 12.1802L4.73981 14.2577L5.66456 10.3809C5.76712 9.95102 5.62052 9.49981 5.28483 9.21228L2.258 6.61943L6.23078 6.30096C6.67137 6.26563 7.05517 5.98679 7.22488 5.57867L8.75548 1.89875L10.2861 5.57867Z"
                                    fill="#cccccc" />
                            </svg>
                        </span>
                    </div>
                    <p class="carousel__slide-text">
                        Speciality in hair body nails facial operations.
                    </p>
                </li>
                <li class="carousel__slide swiper-slide">
                    <img src="{{asset('html-assests/shared/carousel-img.png')}}" alt=" carousel-slide" />
                    <span class="carousel__slide-subtitle">Salons</span>
                    <div class="carousel__slide-rating">
                        <h6 class="carousel__slide-title">
                            Mashe Saloon
                        </h6>
                        <span class="carousel__slide-star">3<svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.02994 0.573876C8.29837 -0.0715002 9.21258 -0.0715002 9.48101 0.573876L11.3743 5.12602L16.2888 5.52C16.9855 5.57586 17.268 6.44536 16.7372 6.90012L12.9929 10.1075L14.1368 14.9031C14.299 15.583 13.5594 16.1204 12.9629 15.756L8.75548 13.1861L4.54805 15.756C3.95155 16.1204 3.21191 15.583 3.37409 14.9031L4.51802 10.1075L0.773757 6.90012C0.242913 6.44536 0.525426 5.57586 1.22217 5.52L6.13659 5.12602L8.02994 0.573876ZM10.2861 5.57867C10.4558 5.98679 10.8396 6.26563 11.2802 6.30096L15.2529 6.61943L12.2262 9.21228C11.8905 9.49981 11.7438 9.95102 11.8464 10.3809L12.7711 14.2577L9.3699 12.1802C8.99271 11.9498 8.51824 11.9498 8.14105 12.1802L4.73981 14.2577L5.66456 10.3809C5.76712 9.95102 5.62052 9.49981 5.28483 9.21228L2.258 6.61943L6.23078 6.30096C6.67137 6.26563 7.05517 5.98679 7.22488 5.57867L8.75548 1.89875L10.2861 5.57867Z"
                                    fill="#cccccc" />
                            </svg>
                        </span>
                    </div>
                    <p class="carousel__slide-text">
                        Speciality in hair body nails facial operations.
                    </p>
                </li>
                <li class="carousel__slide swiper-slide">
                    <img src="{{asset('html-assests/shared/carousel-img.png')}}" alt=" carousel-slide" />
                    <span class="carousel__slide-subtitle">Salons</span>
                    <div class="carousel__slide-rating">
                        <h6 class="carousel__slide-title">
                            Mashe Saloon
                        </h6>
                        <span class="carousel__slide-star">3<svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.02994 0.573876C8.29837 -0.0715002 9.21258 -0.0715002 9.48101 0.573876L11.3743 5.12602L16.2888 5.52C16.9855 5.57586 17.268 6.44536 16.7372 6.90012L12.9929 10.1075L14.1368 14.9031C14.299 15.583 13.5594 16.1204 12.9629 15.756L8.75548 13.1861L4.54805 15.756C3.95155 16.1204 3.21191 15.583 3.37409 14.9031L4.51802 10.1075L0.773757 6.90012C0.242913 6.44536 0.525426 5.57586 1.22217 5.52L6.13659 5.12602L8.02994 0.573876ZM10.2861 5.57867C10.4558 5.98679 10.8396 6.26563 11.2802 6.30096L15.2529 6.61943L12.2262 9.21228C11.8905 9.49981 11.7438 9.95102 11.8464 10.3809L12.7711 14.2577L9.3699 12.1802C8.99271 11.9498 8.51824 11.9498 8.14105 12.1802L4.73981 14.2577L5.66456 10.3809C5.76712 9.95102 5.62052 9.49981 5.28483 9.21228L2.258 6.61943L6.23078 6.30096C6.67137 6.26563 7.05517 5.98679 7.22488 5.57867L8.75548 1.89875L10.2861 5.57867Z"
                                    fill="#cccccc" />
                            </svg>
                        </span>
                    </div>
                    <p class="carousel__slide-text">
                        Speciality in hair body nails facial operations.
                    </p>
                </li>
                <li class="carousel__slide swiper-slide">
                    <img src="{{asset('html-assests/shared/carousel-img.png')}}" alt=" carousel-slide" />
                    <span class="carousel__slide-subtitle">Salons</span>
                    <div class="carousel__slide-rating">
                        <h6 class="carousel__slide-title">
                            Mashe Saloon
                        </h6>
                        <span class="carousel__slide-star">3<svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.02994 0.573876C8.29837 -0.0715002 9.21258 -0.0715002 9.48101 0.573876L11.3743 5.12602L16.2888 5.52C16.9855 5.57586 17.268 6.44536 16.7372 6.90012L12.9929 10.1075L14.1368 14.9031C14.299 15.583 13.5594 16.1204 12.9629 15.756L8.75548 13.1861L4.54805 15.756C3.95155 16.1204 3.21191 15.583 3.37409 14.9031L4.51802 10.1075L0.773757 6.90012C0.242913 6.44536 0.525426 5.57586 1.22217 5.52L6.13659 5.12602L8.02994 0.573876ZM10.2861 5.57867C10.4558 5.98679 10.8396 6.26563 11.2802 6.30096L15.2529 6.61943L12.2262 9.21228C11.8905 9.49981 11.7438 9.95102 11.8464 10.3809L12.7711 14.2577L9.3699 12.1802C8.99271 11.9498 8.51824 11.9498 8.14105 12.1802L4.73981 14.2577L5.66456 10.3809C5.76712 9.95102 5.62052 9.49981 5.28483 9.21228L2.258 6.61943L6.23078 6.30096C6.67137 6.26563 7.05517 5.98679 7.22488 5.57867L8.75548 1.89875L10.2861 5.57867Z"
                                    fill="#cccccc" />
                            </svg>
                        </span>
                    </div>
                    <p class="carousel__slide-text">
                        Speciality in hair body nails facial operations.
                    </p>
                </li> -->
            </ul>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div class="carousel__section__button-container">
            <a href="{{ url('/all-salons') }}"><button class="carousel__section__button">
                    See More
                    <span></span>
                </button>
            </a>
        </div>
    </div>
</section>

<section class="sales__section">
    <div class="sales__section__content">
        <h2 class="sales__section__content-title">
            Increase your Sales in Meetendo For Free!
        </h2>
        <ul class="sales__section__content-list">
            <li>Revenue Statistics.</li>
            <li>Customer Care.</li>
            <li>Fast Booking.</li>
            <li>Team Management.</li>
            <li>Business Reports.</li>
        </ul>
        <p class="sales__section__content-text">
            Our promotion is money back guarantee with 3 months free for
            the first 5 customers.
        </p>
        <div class="sales__section__content-buttons sales__section__content-buttons--tablet">
            <a href="{{ url('/pricing') }}"><button>Subscribe Now</button></a>
            <a href="">Check our Plans</a>
        </div>
    </div>
    <img class="sales__section-img" src="{{asset('html-assests/shared/sales.png')}}" alt=" sales-rising" />

    <div class="sales__section__content-buttons sales__section__content-buttons--mobile">
        <button>Subscribe Now</button>
        <a href="">Check our Plans</a>
    </div>
</section>

<!-- <section class="join__section" id="subscribenow">
    <h2 class="join__section-title">
        You have a Business and want to join Meetendo ?
    </h2>

    <form class="join__section-form" action="">
        <label class="join__section-label"></label>

        <input class="join__section-input" type="text" placeholder="Enter Your Email" />
        <input class="join__section-button" type="submit" />
    </form>
    <div class="join__section-overlay"></div>
</section> -->
<!-- <footer class="footer">
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
        <div class="footer__page">
            <span class="footer__list-title">Product</span>
            <ul>
                <li>Overview</li>
                <li>Features</li>
                <li>Solutions</li>
                <li>Tutorials</li>
                <li>Pricing</li>
                <li>Releases</li>
            </ul>
        </div>
        <div class="footer__page">
            <span class="footer__list-title">Company</span>
            <ul>
                <li>About us</li>
                <li>Careers</li>
                <li>Press</li>
                <li>News</li>
                <li>Media kit</li>
                <li>Contact</li>
            </ul>
        </div>
        <div class="footer__page">
            <span class="footer__list-title">Resources</span>
            <ul>
                <li>Blog</li>
                <li>Newsletter</li>
                <li>Events</li>
                <li>Help centre</li>
                <li>Tutorials</li>
                <li>Support</li>
            </ul>
        </div>
        <div class="footer__page">
            <span class="footer__list-title">Use cases</span>
            <ul>
                <li>Startups</li>
                <li>Enterprise</li>
                <li>Government</li>
                <li>SaaS</li>
                <li>Marketplaces</li>
                <li>Ecommerce</li>
            </ul>
        </div>
        <div class="footer__page">
            <span class="footer__list-title">Social</span>
            <ul>
                <li>Twitter</li>
                <li>LinkedIn</li>
                <li>Facebook</li>
                <li>GitHub</li>
                <li>AngelList</li>
                <li>Dribbble</li>
            </ul>
        </div>
        <div class="footer__page">
            <span class="footer__list-title">Legal</span>
            <ul>
                <li>Terms</li>
                <li>Privacy</li>
                <li>Cookies</li>
                <li>Licenses</li>
                <li>Settings</li>
                <li>Contact</li>
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
</footer> -->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<?php $mapkey = \App\AdminSetting::find(1)->mapkey; ?>
<script src="https://maps.googleapis.com/maps/api/js?key={{$mapkey}}&libraries=places&callback=initAutocomplete" defer>
</script>

@endsection