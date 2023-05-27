@extends('website.layouts.master')
@section('website_content')
@include('website.layouts.breadcrumb', [
    'title' => __('All Categories'),
])


<!-- ================================
    START CATEGORY AREA
================================= -->
<section class="category-area section--padding">
    <div class="container">
        <div class="row">
            @foreach ($categories as $item)
                <div class="col-lg-3 responsive-column">
                    <div class="category-item overflow-hidden">
                        <img src="{{ url($item->imagePath .'/'. $item->banner) }}" alt="category-image" class="cat-img">
                        <div class="category-content d-flex align-items-center justify-content-center">
                            {{-- <a href="{{ url('/'.$item->cat_id.'/'.Str::slug($item->name) .'/salons') }}" class="category-link d-flex flex-column justify-content-center w-100 h-100"> --}}
                                <a href="{{url('/all-salons?category='.$item->cat_id)}}" class="category-link d-flex flex-column justify-content-center w-100 h-100">
                                <div class="icon-element mb-3 mx-auto">
                                    <img src="{{ url($item->imagePath .'/'. $item->image) }}" alt="">
                                </div>
                                <div class="cat-content">
                                    <h4 class="cat__title mb-3"> {{$item->name}} </h4>
                                    <span class="badge"> {{$item->salonCount}} {{ $item->salonCount > 1? __('layout.Salons') : __('layout.Salon') }}  </span>
                                </div>
                            </a>
                        </div>
                    </div><!-- end category-item -->
                </div>
            @endforeach
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end category-area -->
<!-- ================================
    END CATEGORY AREA
================================= -->

@endsection