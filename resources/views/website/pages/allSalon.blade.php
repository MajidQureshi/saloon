@extends('website.layouts.master')
@section('website_content')
@include('website.layouts.breadcrumb', [
    'title' => __('All Salons'),
])


<!-- ================================
    START CARD AREA
================================= -->
<section class="card-area section-padding">
    <div class="container">
        <form action="#" method="POST">
            <div class="row">
                <div class="col-lg-12">
                    <div class="filter-bar d-flex flex-wrap justify-content-between align-items-center margin-bottom-30px">
                        <p class="result-text font-weight-medium" id="salon_found"> {{count($salons)}} Salons Found </p>
                        <div class="filter-bar-action d-flex flex-wrap align-items-center">
                            <div class="user-chosen-select-container ml-3">
                                <select class="user-chosen-select" name="sort" id="sort">
                                    <option value="sort-by-default">{{__('layout.Sort by default')}}</option>
                                    <option value="high-rated">{{__('layout.High Rated')}}</option>
                                    <option value="most-reviewed">{{__('layout.Most Reviewed')}}</option>
                                    <option value="popular-salons">{{__('layout.Popular Salons')}}</option>
                                    <option value="newest-salons">{{__('layout.Newest Salons')}}</option>
                                    <option value="older-salons">{{__('layout.Older Salons')}}</option>
                                </select>
                            </div>
                            
                            <ul class="filter-nav ml-1">
                                <input type="hidden" name="view" id="view" value="Grid">
                                <li>
                                    <div data-toggle="tooltip" data-placement="top" title="Grid View" class="active" id="grid"><span class="la la-th-large"></span></div>
                                </li>
                                <li>
                                    <div data-toggle="tooltip" data-placement="top" title="List View" class="" id="list"><span class="la la-list"></span></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar mt-0">
                        <div class="sidebar-widget">
                            <h3 class="widget-title">{{__('layout.Search')}}</h3>
                            <div class="stroke-shape mb-4"></div>
                            <div class="form-box">
                                <div class="form-group">
                                    <span class="la la-search form-icon"></span>
                                    <input class="form-control" type="search" id="look_for" value="{{$requests['look_for']}}" name="look_for" placeholder="What are you looking for?">
                                </div>
                                <div class="form-group search-location">
                                    <span class="la la-map-marker form-icon"></span>
                                    <input class="form-control" type="search" id="search_address" value="{{$requests['location']}}" name="location" placeholder="Search a Location">
                                </div>
                                <div class="form-group user-chosen-select-container">
                                    <select class="user-chosen-select" name="category" id="category" data-default="0">
                                        <option value="0" selected="selected" >{{__('layout.Select a Category')}}</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{$cat->cat_id}}" {{$requests["category"] == $cat->cat_id ? 'selected': ''}}> {{$cat->name}} </option>
                                        @endforeach
                                    </select>
                                </div><!-- end form-group -->
                                <input type="hidden" name="lat" id="lat" value="{{$requests['lat']}}">
                                <input type="hidden" name="lang" id="lang" value="{{$requests['lang']}}">
                                <div class="btn-box">
                                    <input type="hidden" value="" name="open" id="isopen">
                                    <button class="btn-gray btn-gray-lg open-filter-btn w-100"><i class="la la-clock mr-2"></i>{{__('layout.Now Open')}}</button>
                                    <button type="button" class="theme-btn gradient-btn border-0 w-100 mt-3" id="search-btn">
                                        <i class="la la-search mr-2"></i>{{__('layout.Search Now')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h3 class="widget-title">{{__('layout.Filter by Salon Type')}}</h3>
                            <div class="stroke-shape mb-4"></div>
                            <ul class="custom-radio">
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="salon_type" value="Male">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="font-weight-medium">
                                            {{__('layout.Male')}}
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="salon_type" value="Female">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="font-weight-medium">
                                            {{__('layout.Female')}}
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="salon_type" value="All" checked="checked">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="font-weight-medium">
                                            {{__('layout.All')}}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-widget">
                            <h3 class="widget-title">{{__('layout.Filter by Service Place')}}</h3>
                            <div class="stroke-shape mb-4"></div>
                            <ul class="custom-radio">
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="service_place" value="Salon">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="font-weight-medium">
                                            {{__('layout.Salon')}}
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="service_place" value="Home">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="font-weight-medium">
                                            {{__('layout.Home')}}
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="service_place" value="Both" checked="checked">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="font-weight-medium">
                                            {{__('layout.Both')}}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-widget">
                            <h3 class="widget-title">{{__('layout.Filter by Ratings')}}</h3>
                            <div class="stroke-shape mb-4"></div>
                            <ul class="custom-radio">
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="rate" value="all" checked="checked">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="font-weight-medium">
                                            {{__('layout.Show All')}}
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="rate" value="5">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="stars">
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="rate" value="4">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="stars">
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star-o text-gray"></span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="rate" value="3">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="stars">
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star-o text-gray"></span>
                                            <span class="la la-star-o text-gray"></span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="rate" value="2">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="stars">
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star-o text-gray"></span>
                                            <span class="la la-star-o text-gray"></span>
                                            <span class="la la-star-o text-gray"></span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label class="radio-label">
                                            <input type="radio" name="rate" value="1">
                                            <span class="radio-mark"></span>
                                        </label>
                                        <div class="stars">
                                            <span class="la la-star"></span>
                                            <span class="la la-star-o text-gray"></span>
                                            <span class="la la-star-o text-gray"></span>
                                            <span class="la la-star-o text-gray"></span>
                                            <span class="la la-star-o text-gray"></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-widget col-lg-12">
                            <div class="btn-box">
                                <button type="button" class="theme-btn gradient-btn w-100 border-0" id="apply_filter">
                                    {{__('layout.Apply Filter')}} <i class="la la-arrow-right ml-1"></i>
                                </button>
                                <button type="reset" class="btn-gray btn-gray-lg mt-3 w-100" id="reset-btn">
                                    <i class="la la-redo-alt mr-1"></i> {{__('layout.Reset Filters')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row" id="salon-list">
                        @if ($include == "Grid")
                            @include('website.pages.allSalonGrid')
                        @else
                            @include('website.pages.allSalonList')
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- ================================
    END CARD AREA
================================= -->

<?php $mapkey = \App\AdminSetting::find(1)->mapkey; ?>
<script src="https://maps.googleapis.com/maps/api/js?key={{$mapkey}}&libraries=places&callback=initAutocomplete"  defer></script>

@endsection