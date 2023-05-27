@foreach ($salons as $salon)
    <div class="col-lg-6 responsive-column">
        <div class="card-item">
            <div class="card-image">
                <a href="{{ url('salon/'.$salon['salon_id']. '/'. Str::slug($salon['name'])) }}" class="d-block">
                    <img src="{{ $salon['imagePath'] .'/'. $salon['image'] }}" class="card__img" alt="">
                    @if ($salon['open'])
                        <span class="badge"> {{__('layout.Open')}} </span>
                    @else
                        <span class="badge bg-11"> {{__('layout.Close')}} </span>
                    @endif
                    <div class="card-image-shape">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="50px" viewBox="0 0 1200 150" preserveAspectRatio="none">
                            <g><path fill="#fff" fill-opacity="0.2" d="M0,150 C600,100 1000,50 1200,-1.13686838e-13 C1200,6.8027294 1200,56.8027294 1200,150 L0,150 Z"></path></g><g class="pix-waiting animated" data-anim-type="fade-in-up" data-anim-delay="300"><path fill="rgba(255,255,255,0.8)" d="M0,150 C600,120 1000,80 1200,30 C1200,36.8027294 1200,76.8027294 1200,150 L0,150 Z"></path></g><path fill="#fff" d="M0,150 C600,136.666667 1000,106.666667 1200,60 C1200,74 1200,104 1200,150 L0,150 Z"></path><defs></defs>
                        </svg>
                    </div>
                </a>
            </div>
            <div class="card-content">
                <a href="#" class="user-thumb d-inline-block" data-toggle="tooltip" data-placement="top" title="{{$salon['name']}}">
                    <img src="{{ $salon['imagePath'] .'/'. $salon['logo'] }}" alt="author-img">
                </a>
                <h4 class="card-title pt-3">
                    <a href="{{ url('salon/'.$salon['salon_id']. '/'. Str::slug($salon['name'])) }}">{{$salon['name']}}</a>
                </h4>
                <p class="card-sub">{{ substr($salon['desc'],0,60)}} {{ strlen($salon['desc']) > 60 ? '...' : ""}}</p>
                <ul class="listing-meta d-flex align-items-center">
                    <li class="d-flex align-items-center">
                        <span class="rate flex-shrink-0"> {{$salon['rate']}} </span>
                        <span class="rate-text"> {{$salon['rateCount']}} {{__('layout.Ratings')}}</span>
                    </li>
                    <li class="mx-4">
                        @if ($salon['give_service'] == "Salon")
                            <i class="la la-at listing-icon text-color-2"></i> {{__('layout.Salon')}}
                        @elseif ($salon['give_service'] == "Home")
                            <i class="la la-at listing-icon text-color-2"></i> {{__('layout.Home')}}
                        @else
                            <i class="la la-at listing-icon text-color-2"></i> {{__('layout.Both')}}
                        @endif
                    </li>
                    <li class="d-flex align-items-center">
                        @if ($salon['gender'] == "Male")
                            <i class="la la-mars mr-1 listing-icon text-color-2"></i> {{__('layout.Male')}}
                        @elseif ($salon['gender'] == "Female")
                            <i class="la la-venus mr-1 listing-icon text-color-2"></i> {{__('layout.Female')}}
                        @else
                            <i class="la la-venus-mars mr-1 listing-icon text-color-2"></i> {{__('layout.Unisex')}}
                        @endif
                    </li>
                </ul>
                <ul class="info-list padding-top-20px">
                    <li><span class="la la-map-marker mr-2 icon"></span>
                        {{$salon['city']}}, {{$salon['state']}}, {{$salon['country']}}
                    </li>
                    <li><span class="la la-phone mr-2 icon"></span>
                        {{$salon['phone']}}
                    </li>
                </ul>
            </div>
        </div><!-- end card-item -->
    </div>
@endforeach