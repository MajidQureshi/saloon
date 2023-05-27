@foreach ($salon->review as $review)
    <div class="comment">
        <div class="user-thumb user-thumb-lg flex-shrink-0">
            <img src="{{ $review->user->imagePath.'/'.$review->user->image }}" alt="author-img">
        </div>
        <div class="comment-body w-100">
            <div class="meta-data d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="comment__title"> {{$review->user->name}} </h4>
                </div>
                <div class="star-rating-wrap text-center mt-1">
                    <div class="star-rating text-color-5 font-size-18">
                        @php
                            $rating = $review->rate;
                        @endphp
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
                    <p class="font-size-13 font-weight-medium"> {{\Carbon\Carbon::parse($review->created_at)->format('Y-m-d')}} </p>
                </div>
            </div>
            <p class="comment-desc">
                {{$review->message}}
            </p>
        </div>
    </div><!-- end comment -->
@endforeach