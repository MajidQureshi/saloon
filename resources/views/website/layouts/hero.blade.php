<!-- ================================
    START HERO-WRAPPER AREA
================================= -->

<?php $bg_img = \App\AdminSetting::find(1)->bg_img; ?>
<?php $setting = \App\AdminSetting::find(1) ?>

<section class="hero-wrapper hero-bg-2 pb-0 overflow-hidden" style="background-image: url({{asset('storage/images/app/'.$bg_img)}}); background-size: cover; background-position: center center;">
    <div class="overlay"></div><!-- end overlay -->
    <span class="line-bg line-bg1"></span>
    <span class="line-bg line-bg2"></span>
    <span class="line-bg line-bg3"></span>
    <span class="line-bg line-bg4"></span>
    <span class="line-bg line-bg5"></span>
    <span class="line-bg line-bg6"></span>
    <div class="container">
        <form action="{{url('/all-salons')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-heading text-center">
                        <div class="section-heading">
                            <h2 class="sec__title">{{$setting->website_title}}</h2>
                            <p class="sec__desc">{{$setting->website_subtitle}}</p>
                        </div>
                    </div>
                    <div class="main-search-input main-search-input-2 position-relative z-index-2">
                        <div class="main-search-input-item form-box padding-right-10px">
                            <div class="input-box">
                                <label class="label-text">{{__('layout.What are you')}}</label>
                                <div class="form-group mb-0">
                                    <span class="la la-search form-icon"></span>
                                    <input class="form-control" type="search" id="look_for" name="look_for" placeholder="looking for?">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="lat" id="lat" value="">
                        <input type="hidden" name="lang" id="lang" value="">
                        <div class="main-search-input-item form-box">
                            <div class="input-box">
                                <label class="label-text">{{__('layout.Where to look')}}?</label>
                                <div class="form-group mb-0">
                                    <span class="la la-map-marker form-icon"></span>
                                    <input class="form-control" type="search" id="search_address" name="location" placeholder="Search a Location">
                                </div>
                            </div>
                        </div>
                        <div class="main-search-input-item user-chosen-select-container">
                            <label class="label-text">{{__('layout.What Category')}}?</label>
                            <select class="user-chosen-select" name="category" id="category" data-default="0">
                                <option value="0" selected="selected">{{__('layout.Select a Category')}}</option>
                                @foreach ($categories as $cat)
                                    <option value="{{$cat->cat_id}}"> {{$cat->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="main-search-input-item">
                            <label class="label-text">{{__('layout.Search Activities')}}</label>
                            <button class="theme-btn gradient-btn border-0 w-100" type="submit"><i class="la la-search mr-2"></i>{{__('layout.Search Now')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="bg-white position-relative z-index-1 padding-bottom-100px">
        <div class="container">
            <div class="row">
                <div class="highlighted-categories highlighted-categories-2 pb-5 mx-auto mt-0 padding-top-40px">
                </div><!-- end highlighted-categories -->
            </div>
        </div>
    </div>
</section>

<!-- ================================
    END HERO-WRAPPER AREA
================================= -->