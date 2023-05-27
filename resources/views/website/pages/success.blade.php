@extends('website.layouts.master')
@section('website_content')
@include('website.layouts.breadcrumb', [
    'title' => __('Booking Confirmed'),
    // 'headerData' => __('Salon'),
    // 'url' => 'all-salons',
    // 'headerData2' => $salon->name,
    // 'url2' => $salon->salon_id .'/'. Str::slug($salon->name) .'/booking'
])


<!-- ================================
    START BOOKING CONFIRM AREA
================================= -->
<section class="booking-confirm-area section-padding position-relative">
    <span class="circle-bg circle-bg-1 position-absolute"></span>
    <span class="circle-bg circle-bg-2 position-absolute"></span>
    <span class="circle-bg circle-bg-3 position-absolute"></span>
    <span class="circle-bg circle-bg-4 position-absolute"></span>
    <span class="circle-bg circle-bg-5 position-absolute"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="booking-confirm-content text-center">
                    <i class="la la-check-circle-o font-size-90 text-success"></i>
                    <div class="section-heading pt-3">
                        <h2 class="sec__title mb-2">{{__('layout.Thank you. Your appointment')}} <br> {{__('layout.has been confirmed')}}.</h2>
                        <p class="sec__desc">{{__('layout.Your appointment id is')}} <span class="text-gray"> {{$booking->booking_id}} </span></p>
                    </div>
                    <div class="btn-box padding-top-30px">
                        <a href="{{ url('invoice/'.$booking->id) }}" class="btn-gray btn-gray-lg px-4" target="_blank">{{__('layout.View Invoice')}} <i class="la la-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end booking-confirm-area -->
<!-- ================================
    END BOOKING CONFIRM AREA
================================= -->

@endsection