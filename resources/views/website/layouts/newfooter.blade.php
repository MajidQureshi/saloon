<?php $setting = \App\AdminSetting::find(1) ?>

<section class="join__section" id="subscribenow">
    <h2 class="join__section-title">
        You have a Business and want to join Meetendo ?
    </h2>

    <form class="join__section-form" method="post" action="{{ url('/subscribenow') }}">
        <label class="join__section-label"></label>
        @csrf <!-- {{ csrf_field() }} -->
        <input class="join__section-input" type="text" name="email" id="email" placeholder="Enter Your Email" />
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