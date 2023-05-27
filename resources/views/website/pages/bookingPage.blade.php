@extends('website.layouts.master')
@section('website_content')
@include('website.layouts.breadcrumb', [
    'title' => __('Booking'),
    'headerData' => __('Salon'),
    'url' => 'all-salons',
    'headerData2' => $salon->name,
    'url2' => 'salon/'.$salon->salon_id .'/'. Str::slug($salon->name)
])


<!-- ================================
    START BOOKING AREA
================================= -->

<section class="booking-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="form-wizard">
                    <div class="form-wizard-header">
                        <ul class="list-unstyled form-wizard-steps clearfix">
                            <li class="active"><span>1</span></li>
                            <li><span>2</span></li>
                            <li><span>3</span></li>
                            <li><span>4</span></li>
                            <li><span>5</span></li>
                        </ul>
                    </div>
                    
                    <form action="{{url('/booking')}}" method="POST" class="form-box" id="thisform">
                        @csrf
                        <input type="hidden" value="{{$salon->salon_id}}" class="salon_id" name="salon_id">
                        <input type="hidden" value="{{ Str::slug($salon->name) }}" class="salon_name" name="salon_name">
                        <fieldset class="wizard-fieldset show">
                            <div class="block-card mb-4">
                                <div class="block-card-header">
                                    <h3 class="widget-title"> {{__('layout.Select Services')}} </h3>
                                    <div class="stroke-shape"></div>
                                </div>
                                <div class="cat-tabs row mt-4">
                                    <div class="section-tab section-tab-layout-2 mb-4 col-lg-4">
                                        <ul class="nav nav-tabs cat-nav" id="myTab" role="tablist">
                                            @foreach($salon->categories as $cat)
                                                <li class="nav-item">
                                                    <a class="nav-link {{$loop->iteration == 1 ? 'active':''}}"  data-toggle="tab" href="#{{$cat->name}}" role="tab" aria-selected="true">
                                                        {{$cat->name}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="tab-content col-lg-8" id="myTabContent">
                                        @foreach($salon->categories as $cat)
                                            <div class="tab-pane {{$loop->iteration == 1 ? 'active show':''}}" id="{{$cat->name}}" role="tabpanel" >
                                                @foreach ($cat->services as $service)
                                                    <div class="mini-list-card checkbox display-block">
                                                        <input type="hidden" name="name-{{$service->service_id}}" value="{{$service->name}}">
                                                        <input type="hidden" name="price-{{$service->service_id}}" value="{{$service->price}}">
                                                        <label class="checkbox-wrapper">
                                                            <input type="checkbox" name="service_id[]" class="checkbox-input services wizard-required" value="{{$service->service_id}}"/>
                                                            <div class="checkbox-tile">
                                                                <div class="mini-list-img">
                                                                    <div class="d-block">
                                                                        <img src="{{ $service->imagePath .'/'. $service->image }}" alt="{{$service->name}}">
                                                                    </div>
                                                                </div>
                                                                <div class="mini-list-body w-100">
                                                                    <h4 class="mini-list-title display-inline-block"> {{$service->name}} </h4>
                                                                    <span class="category-link after-none pl-0 font-size-15 font-weight-semi-bold float-right">
                                                                        {{$service->price}}{{$setting->currency_symbol}}
                                                                    </span><br>
                                                                    <span class="category-link after-none pl-0 font-size-14 font-weight-medium">
                                                                        <i class="la la-clock mr-1 listing-icon text-color-2"></i> {{$service->time}} {{__('layout.Min')}}
                                                                    </span>
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
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-next-btn theme-btn gradient-btn border-0 shadow-none float-right">{{__('layout.Next')}}</a>
                                </div>
                            </div>
                        </fieldset>	

                        <fieldset class="wizard-fieldset">
                            <div class="block-card mb-4">
                                <div class="block-card-header">
                                    @if ($salon->give_service != 'Salon')
                                        <h3 class="widget-title"> {{__('layout.Select Time & Place')}} </h3>
                                    @else
                                        <h3 class="widget-title"> {{__('layout.Select Time')}} </h3>
                                    @endif
                                    <div class="stroke-shape"></div>
                                </div>
                                <div class="form-group">
                                    <span class="la la-calendar-o form-icon"></span>
                                    <input class="date-dropper-input form-control wizard-required" type="text" name="date" placeholder="Select Date"/>
                                </div>

                                <div class="user-chosen-select-container">
                                    <select class="user-chosen-select wizard-required" name="timeslot" id="timeslot">
                                        <option value="0" disabled selected>{{__('layout.Time Slots')}}</option>
                                    </select>
                                </div>
                                
                                @if ($salon->give_service == 'Both')
                                    <div class="form-group">
                                        <div class="user-chosen-select-container">
                                            <select class="user-chosen-select wizard-required" name="service_at" id="service_at">
                                                <option value="Salon" selected> {{__('layout.At Salon')}} </option>
                                                <option value="Home"> {{__('layout.At Home')}}  </option>
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                @if ($salon->give_service == "Both" || $salon->give_service == 'Home' )
                                    <div class="form-group {{$salon->give_service == 'Home' ? '':'display-none'}}" id="address_div">
                                        <div class="user-chosen-select-container">
                                            <select class="user-chosen-select {{$salon->give_service == 'Home' ? 'wizard-required':''}}" name="address" id="choose_address">
                                                @if (count($addresses) > 0)
                                                    <option value="0" disabled selected> {{__('layout.Choose Address')}} </option>
                                                    @foreach ($addresses as $item)
                                                        <option value="{{$item->address_id}}"> {{$item->street}}, {{$item->city}}, {{$item->state}}, {{$item->country}} </option>
                                                    @endforeach
                                                @else
                                                    <option value="0" disabled selected> {{__('layout.Choose Address')}} </option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-previous-btn theme-btn gradient-btn border-0 shadow-none float-left">{{__('layout.Previous')}}</a>
                                    <a href="javascript:;" class="form-wizard-next-btn theme-btn gradient-btn border-0 shadow-none float-right next-staff">{{__('layout.Next')}}</a>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="wizard-fieldset">
                            <div class="block-card mb-4">
                                <div class="block-card-header mb-2">
                                    <h3 class="widget-title"> {{__('layout.Select Staff')}} </h3>
                                    <div class="stroke-shape"></div>
                                </div>
                                <div class="emp-list mt-4">
                                    <div class="emp_list">
                                        @include('website.pages.empList')
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-previous-btn theme-btn gradient-btn border-0 shadow-none float-left">{{__('layout.Previous')}}</a>
                                    <a href="javascript:;" class="form-wizard-next-btn theme-btn gradient-btn border-0 shadow-none float-right">{{__('layout.Next')}}</a>
                                </div>
                            </div>
                        </fieldset>	

                        <fieldset class="wizard-fieldset">
                            <div class="block-card mb-4">
                                <div class="block-card-header">
                                    <h3 class="widget-title"> {{__('layout.Use Coupon')}} </h3>
                                    <div class="stroke-shape"></div>
                                </div>
                                <div class="coupon-widget">
                                    <div class="input-box">
                                        <div class="form-group mb-0">
                                            <input class="form-control pl-3" type="text" name="coupon_code" placeholder="Enter code" readonly>
                                            <button class="theme-btn gradient-btn border-0 shadow-none apply_coupon" type="button">{{__('layout.Apply')}} <i class="la la-arrow-right ml-1"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="" name="coupon_id">
                                {{-- <div class="sidebar-widget">
                                    <div class="card-carousel-coupon owl-trigger-action">
                                        @foreach ($coupons as $coupon)
                                            <div class="price-item">
                                                <div class="price-head bg-12">
                                                    @if ($coupon->for_point)
                                                        <span class="ribbon ribbon-2"> {{__('layout.Loyalty Point')}} </span>
                                                    @endif
                                                    <h3 class="price__title text-uppercase"> {{$coupon->code}} </h3>
                                                    <svg class="svg-bg h-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><path fill="#fff" d="M0 10 0 0 A 90 59, 0, 0, 0, 100 0 L 100 10 Z"></path></svg>
                                                </div>
                                                <div class="price-box d-flex flex-column align-items-center justify-content-center mx-auto text-color-2">
                                                    <h3 class="price__text text-color-2">
                                                        @if ($coupon->type == "Percentage")
                                                            {{$coupon->discount}}%
                                                        @else
                                                            {{$setting->currency_symbol}}{{$coupon->discount}}
                                                        @endif
                                                    </h3>
                                                </div>
                                                <div class="text-center px-3">
                                                    {{$coupon->desc}}
                                                </div>
                                                <div class="price-btn-box text-center mt-5">
                                                    <button class="theme-btn bg-12 text-white border-0 shadow-none" type="button" onclick="useCoupon({{$coupon}})">{{__('layout.Use This')}}</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div> --}}
                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-previous-btn theme-btn gradient-btn border-0 shadow-none float-left">{{__('layout.Previous')}}</a>
                                    <a href="javascript:;" class="form-wizard-next-btn theme-btn gradient-btn border-0 shadow-none float-right next-payment">{{__('layout.Next')}}</a>
                                </div>
                            </div>
                        </fieldset>

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
                    </form>
                </div>
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="block-card">
                    <div class="block-card-header">
                        <h3 class="widget-title">{{__('layout.Booking Summary')}}</h3>
                        <div class="stroke-shape"></div>
                    </div><!-- block-card-header -->
                    <div class="block-card-body">
                        <div class="booking-summary">
                            <ul class="list-items list--items">
                                <li><span class="text-color">{{__('layout.Date')}}:</span> <span class="selected_date">-</span> </li>
                                <li><span class="text-color">{{__('layout.Time')}}:</span> <span class="selected_time">-</span> </li>
                                @if ($salon->give_service == "Salon" || $salon->give_service == "Both" )
                                    <li><span class="text-color">{{__('layout.Place')}}:</span> <span class="service_at">{{__('layout.Salon')}} </span> </li>
                                @elseif($salon->give_service == "Home")
                                    <li><span class="text-color">{{__('layout.Place')}}:</span> <span class="service_at"> {{__('layout.Home')}} </span> </li>
                                @endif
                                <li class="display-none" id="address_show"><span class="text-color">{{__('layout.Address')}}:</span> <span class="address">-</span> </li>
                                <li><span class="text-color">{{__('layout.Staff')}}:</span> <span class="selected_staff">-</span> </li>

                            </ul>
                            <div class="section-block-2 my-3"></div>
                            <div class="selected_services"></div>
                            @if ($salon->give_service != "Salon")
                                <div class="display-none" id="home_charges">
                                    <div class="widget-title d-flex align-items-center justify-content-between font-size-16 pb-0">{{__('layout.Extra Charges')}}: <span class="font-weight-medium"><span class="home_charges">{{$salon->home_charges}}</span>{{$setting->currency_symbol}}</span></div>
                                </div>
                            @endif
                            <div class="display-none" id="display_discount">
                                <div class="widget-title d-flex align-items-center justify-content-between font-size-16 pb-0">{{__('layout.Discount')}}: <span class="font-weight-medium"> <span class="total_discount">0</span>{{$setting->currency_symbol}}</span></div>
                            </div>
                            <div class="widget-title d-flex align-items-center justify-content-between font-size-16 pb-0">{{__('layout.Total Cost')}}: <span class="text-color-2 font-weight-semi-bold"> <span class="total_cost">0</span>{{$setting->currency_symbol}}</span></div>
                            <div class="section-block-2 my-3"></div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================================
    END BOOKING AREA
================================= -->

<script src="{{ asset('includes/website/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('includes/website/js/datedropper.min.js') }}"></script>
@endsection