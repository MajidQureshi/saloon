<?php $setting = \App\AdminSetting::find(1); ?>


<!-- ================================
            START HEADER AREA
================================= -->
<header class="header-area">
   
    <div class="header-top-bar py-2 padding-right-30px padding-left-30px border-top border-top-color">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 d-flex align-items-center header-top-info font-size-14">
                    <p class="mr-3 pr-3 border-right border-right-color">
                        <span class="mr-1 text-white font-weight-semi-bold">{{__('layout.Email')}}:</span>
                        <a href="mailto:{{$setting->email}}" class="font-weight-medium"> {{$setting->email}} </a>
                    </p>
                    <p>
                        <span class="mr-1 text-white font-weight-semi-bold">{{__('layout.Phone')}}:</span>
                        <a href="tel:{{$setting->phone}}" class="font-weight-medium"> {{$setting->phone}} </a>
                    </p>
                </div>
                <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-end header-top-info">
                    
                    @if(App::getLocale() == 'ar')
                        <div class="mr-2">
                            <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                <img src="/website/assets/img/uk-flag.png" width="45">
                            </a>
                        </div>
                    @else
                        <div class="mr-2">
                            <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                                <img src="/website/assets/img/uae-flag.png" width="45">
                            </a>
                        </div>
                    @endif
                    @if (Auth::check())
                        <div class="dashboard-topbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle after-none" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="user-thumb user-thumb-sm position-relative">
                                            <img src="{{Auth::user()->imagePath}}{{Auth::user()->image}}" alt="author-image">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <span class="ml-2 small font-weight-medium d-none d-lg-inline"> {{Auth::user()->name}} </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right py-2" aria-labelledby="userDropdown">
                                        <a class="dropdown-item text-color font-size-15" href="{{ url('/profile') }}">
                                            <i class="la la-user mr-2 text-gray font-size-18"></i>
                                            {{__('layout.Profile')}}
                                        </a>
                                        <a class="dropdown-item text-color font-size-15" href="{{ url('/appointments') }}">
                                            <i class="la la-shopping-bag mr-2 text-gray font-size-18"></i>
                                            {{__('layout.Bookings')}}
                                        </a>
                                        <a class="dropdown-item text-color font-size-15" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                            <i class="la la-power-off mr-2 text-gray font-size-18"></i>
                                            {{__('layout.Logout')}}
                                        </a>
                                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    @else
                        <p class="login-and-signup-wrap">
                            <a href="#" data-toggle="modal" data-target="#loginModal">
                                <span class="mr-1 la la-sign-in"></span>{{__('layout.Log In')}}
                            </a>
                            <span class="or-text px-2">or</span>
                            <a href="#" data-toggle="modal" data-target="#signUpModal">
                                <span class="mr-1 la la-user-plus"></span>{{__('layout.Sign Up')}}
                            </a>
                        </p>
                    @endif
                   
                </div>
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-top-bar -->
    <div class="header-menu-wrapper padding-right-30px padding-left-30px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-full-width">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <img src="{{asset('storage/images/app/'.$setting->white_logo)}}" alt="logo" width="50">
                            </a>
                            <div class="d-flex align-items-center">
                                {{-- <a href="add-listing.html" class="btn-gray add-listing-btn-show font-size-24 mr-2 flex-shrink-0" data-toggle="tooltip" data-placement="left" title="Add Listing">
                                    <i class="la la-plus"></i>
                                </a> --}}
                                <div class="menu-toggle">
                                    <span class="menu__bar"></span>
                                    <span class="menu__bar"></span>
                                    <span class="menu__bar"></span>
                                </div><!-- end menu-toggle -->
                            </div>
                        </div><!-- end logo -->
                       
                        <div class="main-menu-content ml-auto">
                            <nav class="main-menu">
                                <ul>
                                    <li>
                                        <a href="{{url('/')}}" class="{{ request()->is('/')  ? 'active' : ''}}"> {{__('layout.Home')}} </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/ts-all-salons')}}" class="{{ request()->is('/')  ? 'active' : ''}}"> Test Salon </a>
                                    </li>
                                    <li>
                                        <a href="#"  class="{{ request()->is('all-categories')  ? 'active' : ''}}"> {{__('layout.Categories')}} <span class="la la-angle-down"></span></a>
                                        <?php $categories = \App\Category::where('status',1)->get(['cat_id','name']); ?>
                                        <ul class="dropdown-menu-item">
                                            @foreach ($categories as $item)
                                                <li><a href="{{url('/all-salons?category='.$item->cat_id)}}"> {{$item->name}} </a></li>
                                            @endforeach
                                            <li><a href="{{ url('/all-categories') }}"> {{__('layout.All Categories')}} </a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{url('/all-salons')}}" class="{{ request()->is('all-salons*')  ? 'active' : ''}}"> {{__('layout.Salons')}} </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        {{-- <div class="nav-right-content">
                            <a href="#" class="theme-btn gradient-btn shadow-none add-listing-btn-hide">
                                </i> {{__('Book Now')}}
                            </a>
                        </div> --}}
                    </div><!-- end menu-full-width -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-wrapper -->
</header>
<!-- ================================
         END HEADER AREA
================================= -->