@extends('website.layouts.master')
@section('website_content')
@include('website.layouts.breadcrumb', [
    'title' => $salon->name,
    'headerData' => __('Salon'),
    'url' => 'all-salons'
])


<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bg-gradient-gray py-5">
    <div class="container">
        <div class="row">
            <div class="breadcrumb-content breadcrumb-content-2 d-flex flex-wrap align-items-end justify-content-between">
                <div class="section-heading display-flex">
                    <div class="salon-image mr-4">
                        <a href="{{$salon->imagePath .'/'. $salon->image}}" data-fancybox="gallery" class="d-block">
                            <img src="{{$salon->imagePath .'/'. $salon->image}}" alt="blog single image" width="300" height="200" class="radius-round" style="">
                        </a>
                    </div>
                    <div class="salon-desc">
                        <div class="d-flex align-items-center">
                            <h4 class="mb-0"> {{$salon->name}} </h4>
                        </div>
                        <p class="sec__desc py-2 font-size-17"><i class="la la-map-marker mr-1 text-color-2"></i>
                            {{$salon->city}}, {{$salon->state}}, {{$salon->country}}
                        </p>
                        <p class="pb-2 font-weight-medium font-size-17">
                            @if ($salon->gender == "Male")
                                <i class="la la-mars mr-1 listing-icon text-color-2"></i> {{__('layout.Male')}}
                            @elseif ($salon->gender == "Female")
                                <i class="la la-venus mr-1 listing-icon text-color-2"></i> {{__('layout.Female')}}
                            @else
                                <i class="la la-venus-mars mr-1 listing-icon text-color-2"></i> {{__('layout.Unisex')}}
                            @endif
                            <span class="category-link">
                                {{__('Give service at :')}}
                                @if ($salon->give_service == "Home")
                                    {{__('layout.Home')}}
                                @elseif ($salon->give_service == "Salon")
                                    {{__('layout.Salon')}}
                                @else
                                    {{__('layout.Both')}}
                                @endif
                            </span>
                        </p>

                        @php $rating = $salon->rate; @endphp
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="star-rating-wrap d-flex align-items-center">
                                <div class="star-rating text-color-5 font-size-18">
                                    @foreach(range(1,5) as $i)
                                            @if($rating >0)
                                                @if($rating >0.5)
                                                    <span class="ml-n1"><i class="la la-star"></i></span>
                                                @endif
                                            @else 
                                                <span class="ml-n1"><i class="la la-star-o"></i></span>
                                            @endif
                                            @php $rating--; @endphp
                                        </span>
                                    @endforeach
                                </div>
                                <p class="font-size-14 pl-2 font-weight-medium">{{$salon->rateCount}} {{__('reviews')}}</p>
                            </div>
                            <div class="timestamp font-weight-medium ml-3 pl-3 border-left border-left-color line-height-20">
                                
                                @if ($today == "Close")
                                    <span class="text-color-4 mr-2">{{__('layout.Now')}}:</span>
                                    <span class="badge bg-11 text-white">{{__('layout.Closed')}}</span>
                                @else
                                    <span class="text-color-4 mr-2">{{__('layout.Open')}}:</span>
                                    <span> {{$today}} </span>
                                @endif
                            </div>
                        </div>
                        @if (Auth::check())
                            <a href="{{ url('salon/' .$salon->salon_id .'/'. Str::slug($salon->name)) .'/booking' }}" class="theme-btn gradient-btn shadow-none add-listing-btn-hide mt-3">
                                </i> {{__('layout.Book Now')}}
                            </a>
                        @else
                            <a href="#" class="theme-btn gradient-btn shadow-none add-listing-btn-hide mt-3"  data-toggle="modal" data-target="#loginModal">
                                </i> {{__('layout.Book Now')}}
                            </a>
                        @endif
                    </div>
                </div>
            </div><!-- end breadcrumb-content -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->


<!-- ================================
    START LISTING DETAIL AREA
================================= -->
<section class="listing-detail-area padding-top-60px padding-bottom-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="listing-detail-wrap">
                    <div class="block-card mb-4">
                       <div class="block-card-header">
                           <h2 class="widget-title"> {{__('layout.Description')}} </h2>
                           <div class="stroke-shape"></div>
                       </div><!-- end block-card-header -->
                        <div class="block-card-body">
                            @if(strlen($salon->desc) > 300)
                                <p class="pb-3 font-weight-medium line-height-30">
                                    {{substr($salon->desc,0,300)}}
                                    <span class="collapse collapse-content" id="showMoreOptionCollapse">
                                            {{substr($salon->desc,300)}}
                                    </span>
                                </p>
                                <a class="collapse-btn" data-toggle="collapse" href="#showMoreOptionCollapse" role="button" aria-expanded="false" aria-controls="showMoreOptionCollapse">
                                    <span class="collapse-btn-hide"> {{__('layout.Read More')}} <i class="la la-plus ml-1"></i></span>
                                    <span class="collapse-btn-show"> {{__('layout.Read Less')}} <i class="la la-minus ml-1"></i></span>
                                </a>
                            @else
                                <p class="pb-3 font-weight-medium line-height-30">
                                    {{$salon->desc}}
                                </p>
                            @endif
                        </div><!-- end block-card-body -->
                    </div><!-- end block-card -->
                  
                    <div class="block-card mb-4">
                        <div class="block-card-header">
                            <h2 class="widget-title">{{__('layout.Location / Contact')}}</h2>
                            <div class="stroke-shape"></div>
                        </div><!-- end block-card-header -->
                        <div class="block-card-body">
                            <div class="map-container height-400">
                                <input type="hidden" value="{{$salon->latitude}}" name="latitude" id="latitude">
                                <input type="hidden" value="{{$salon->longitude}}" name="longitude" id="longitude">
                                <div id="map"></div>
                            </div>
                            <ul class="list-items list--items list-items-style-2 py-4">
                                <li><span class="text-color"><i class="la la-map mr-2 text-color-2 font-size-18"></i>{{__('layout.Address')}}:</span> <a href="https://maps.google.com/?q={{$salon->latitude}},{{$salon->longitude}}" target="_blank"> {{$salon->address}}, {{$salon->city}}-{{$salon->zipcode}}, {{$salon->state}}, {{$salon->country}} </a></li>
                                <li><span class="text-color"><i class="la la-phone mr-2 text-color-2 font-size-18"></i>{{__('layout.Phone')}}:</span><a href="tel:{{$salon->phone}}"> {{$salon->phone}} </a></li>
                                @if ($salon->website != null)
                                    <li><span class="text-color"><i class="la la-globe mr-2 text-color-2 font-size-18"></i>{{__('layout.Website')}}:</span><a href="{{$salon->website}}">{{$salon->website}}</a></li>
                                @endif
                            </ul>
                        </div><!-- end block-card-body -->
                    </div><!-- end block-card -->
                    <div class="block-card mb-4">
                        <div class="block-card-header">
                            <h3 class="widget-title"> {{__('layout.Services')}} <span class="ml-1 text-color-2"> ({{$salon->serviceCount}}) </span></h3>
                            <div class="stroke-shape"></div>
                        </div><!-- end block-card-header -->
                        <div class="cat-tabs row">
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
                                            <div class="mini-list-card">
                                                <div class="mini-list-img">
                                                    <a href="#" class="d-block">
                                                        <img src="{{ $service->imagePath .'/'. $service->image }}" alt="{{$service->name}}">
                                                    </a>
                                                </div><!-- end mini-list-img -->
                                                <div class="mini-list-body w-100">
                                                    <h4 class="mini-list-title display-inline-block"> {{$service->name}} </h4>
                                                    <span class="category-link after-none pl-0 font-size-15 font-weight-semi-bold float-right">
                                                       {{$service->price}} {{$setting->currency_symbol}}
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
                                                </div><!-- end mini-list-body -->
                                            </div><!-- end mini-list-card -->
                                        @endforeach
                                    </div>
                                @endforeach
                             </div>
                        </div>
                    </div><!-- end block-card -->
                  
                </div><!-- end listing-detail-wrap -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="sidebar mb-0">
                    <div class="sidebar-widget">
                        <h3 class="widget-title"> {{__('layout.Opening Hours')}} </h3>
                        <div class="stroke-shape mb-4"></div>
                        <ul class="list-items">
                            <li class="d-flex justify-content-between">{{__('layout.Monday')}}
                                <span class="{{implode(" : ",$times[0]) == 'Close' ? 'text-color-2' : ''}}">{{implode(" : ",$times[0])}}</span>
                            </li>
                            <li class="d-flex justify-content-between">{{__('layout.Tuesday')}} <span class="{{implode(" : ",$times[1]) == 'Close' ? 'text-color-2' : ''}}">{{implode(" : ",$times[1])}}</span></li>
                            <li class="d-flex justify-content-between">{{__('layout.Wednesday')}} <span class="{{implode(" : ",$times[2]) == 'Close' ? 'text-color-2' : ''}}">{{implode(" : ",$times[2])}}</span></li>
                            <li class="d-flex justify-content-between">{{__('layout.Thursday')}} <span class="{{implode(" : ",$times[3]) == 'Close' ? 'text-color-2' : ''}}">{{implode(" : ",$times[3])}}</span></li>
                            <li class="d-flex justify-content-between">{{__('layout.Friday')}} <span class="{{implode(" : ",$times[4]) == 'Close' ? 'text-color-2' : ''}}">{{implode(" : ",$times[4])}}</span></li>
                            <li class="d-flex justify-content-between">{{__('layout.Saturday')}} <span class="{{implode(" : ",$times[5]) == 'Close' ? 'text-color-2' : ''}}">{{implode(" : ",$times[5])}}</span></li>
                            <li class="d-flex justify-content-between">{{__('layout.Sunday')}} <span class="{{implode(" : ",$times[6]) == 'Close' ? 'text-color-2' : ''}}">{{implode(" : ",$times[6])}}</span></li>
                        </ul>
                    </div><!-- end sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title"> {{__('layout.Gallery')}} </h3>
                        <div class="stroke-shape mb-4"></div>
                        <div class="card-image after-none">
                            <!-- <div class="single-slider owl-trigger-action owl-trigger-action-3">
                                @foreach ($salon->gallery  as $item)
                                    <div class="single-slider-item">
                                        <img src="{{$item->imagePath}}{{$item->image}}" class="card__img" alt="blog image">
                                    </div>
                                @endforeach
                            </div>  -->
                            <div class="photoset -square -portrait">
                                <a href="{{$salon->imagePath}}{{$salon->image}}" class="fs-slider-item d-block photo img-box-item"
                                    style="background-image:url({{$salon->imagePath}}{{$salon->image}})" data-fancybox="gallery">
                               </a><!-- end fs-slider-item -->
                                @foreach ($salon->gallery  as $item)
                                    <a href="{{$item->imagePath}}{{$item->image}}" class="fs-slider-item d-block photo img-box-item"
                                         style="background-image:url({{$item->imagePath}}{{$item->image}})" data-fancybox="gallery">
                                    </a><!-- end fs-slider-item -->
                                @endforeach
                            </div>
                        </div><!-- end card-image -->
                    </div><!-- end sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title"> {{__('layout.Salon Owner')}} </h3>
                         <div class="stroke-shape mb-4"></div>
                        <div class="hosted-by d-flex align-items-center">
                            <a href="user-profile.html" class="user-thumb user-thumb-md flex-shrink-0 mr-3">
                                <img src=" {{url($salon->ownerDetails->imagePath .'/'.$salon->ownerDetails->image)}} " alt="author-img">
                            </a>
                            <div>
                                <h4 class="font-size-18"><a href="user-profile.html" class="text-color"> {{$salon->ownerDetails->name}} </a></h4>
                                <span class="font-size-13 text-gray font-weight-medium d-block line-height-22"> {{$salon->serviceCount}} {{__('layout.Services')}} </span>
                            </div>
                        </div>
                         <ul class="list-items py-4">
                             <li><i class="la la-phone mr-2 text-color-2 font-size-18"></i><a href="tel:{{$salon->ownerDetails->phone}}" class="before-none">{{$salon->ownerDetails->code}}{{$salon->ownerDetails->phone}}</a></li>
                             <li><i class="la la-envelope mr-2 text-color-2 font-size-18"></i><a href="mailto:{{$salon->ownerDetails->email}}" class="before-none"> {{$salon->ownerDetails->email}} </a></li>
                         </ul>
                    </div><!-- end sidebar-widget -->
                   
                </div><!-- end sidebar -->
            </div><!-- end col-lg-4 -->
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="listing-detail-wrap">
                    <div class="block-card mb-4">
                        <div class="block-card-header">
                            <h2 class="widget-title">{{__('layout.Reviews')}} <span class="ml-1 text-color-2"> ({{$salon->rateCount}}) </span></h2>
                            <div class="stroke-shape"></div>
                        </div><!-- end block-card-header -->
                        <div class="block-card-body">
                             <div class="comments-list">
                                @include('website.pages.review')
                             </div>
                            @if ($salon->review->total() >= 3)
                                <button class="theme-btn border-0 gradient-btn" id="load-more">
                                    {{__('layout.View More')}}
                                </button>
                            @endif
                        </div><!-- end block-card-body -->
                        
                    </div><!-- end block-card -->
                </div>
            </div>
        </div>
    </div><!-- end container -->
</section><!-- end listing-detail-area -->
<!-- ================================
    END LISTING DETAIL  AREA
================================= -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous"></script>
<script>
      $('[data-fancybox]').fancybox();
</script>

<?php $mapkey = \App\AdminSetting::find(1)->mapkey; ?>
<script src="https://maps.googleapis.com/maps/api/js?key={{$mapkey}}"></script>
@endsection