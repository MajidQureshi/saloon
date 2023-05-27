@extends('website.layouts.master')
@section('website_content')
@include('website.layouts.breadcrumb', [
    'title' => __('All Appointments'),
])
<section class="category-area section--padding">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="section-tab">
                    <ul class="nav nav-tabs justify-content-center align-items-center" id="myTab" role="tablist">
                        <li class="nav-item mr-4">
                            <span class="circle-bg"></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-gradient active" id="pending-tab" data-toggle="tab" href="#pending-appointment" role="tab" aria-controls="pending-appointment" aria-selected="true">
                            <i class="la la-calendar-day mr-2"></i> {{__('layout.Pending')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-gradient" id="approved-tab" data-toggle="tab" href="#approved-appointment" role="tab" aria-controls="approved-appointment" aria-selected="false">
                                <i class="la la-check-circle mr-2"></i> {{__('layout.Approved')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-gradient" id="completed-tab" data-toggle="tab" href="#completed-appointment" role="tab" aria-controls="completed-appointment" aria-selected="false">
                                <i class="la la-heart mr-2"></i> {{__('layout.Completed')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-gradient" id="cencel-tab" data-toggle="tab" href="#cancel-appointment" role="tab" aria-controls="cencel-appointment" aria-selected="false">
                                <i class="la la-times-circle mr-2"></i> {{__('layout.Cancel')}}
                            </a>
                        </li>
                        <li class="nav-item ml-4">
                            <span class="circle-bg"></span>
                        </li>
                    </ul>
                    <div class="tab-content hiw-tab-content margin-top-60px" id="myTabContent">
                        <div class="tab-pane fade show active" id="pending-appointment" role="tabpanel" aria-labelledby="pending-tab">
                            <div class="row">
                                <div class="col-lg-10 mx-auto">
                                    @if (count($master['pending']) > 0)
                                        @foreach ($master['pending'] as $item)
                                            <div class="block-card-body pt-0">
                                                <div class="generic-list dashboard-booking-list ">
                                                    <div class="generic-list-item d-flex mini-list-card">
                                                        <div class="mini-list-img">
                                                            <img src="{{ $item->salon->imagePath .'/'. $item->salon->image }}" alt="salon-image"  class="d-block">
                                                        </div>
                                                        <div class="ml-3 flex-grow-1 position-relative">
                                                            <h4 class="text-color font-size-20 mb-3">
                                                                <a href="{{ url('salon/'.$item->salon->salon_id. '/'. Str::slug($item->salon->name)) }}" class="text-color">  {{$item->salon->name}}  </a>
                                                            </h4>
                                                            <ul class="list-items list--items">
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Appointment ID')}}:</span> {{$item->booking_id}} </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Date')}}:</span> {{$item->date}} </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Time')}}:</span> {{$item->start_time .' to '. $item->end_time}} </li>
                                                                @php
                                                                    $ar = array();
                                                                    foreach ($item->services as $ser) {
                                                                        array_push($ar,$ser->name);
                                                                    }
                                                                    $services = implode(', ', $ar);
                                                                @endphp
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Service')}}:</span> {{$services}} </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Service Place')}}:</span> {{$item->booking_at}} </li>
                                                                @if ($item->booking_at == "Home")
                                                                    <li class="mb-3"><span class="text-color">{{__('layout.Address')}}:</span>
                                                                        {{$item->addressDetails->street}},
                                                                        {{$item->addressDetails->city}},
                                                                        {{$item->addressDetails->state}},
                                                                        {{$item->addressDetails->country}}
                                                                    </li>
                                                                @endif
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Payment')}}:</span> {{$currency}}{{$item->payment}} </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Payment Type')}}:</span>
                                                                    {{ $item->payment_type == "LOCAL"? 'Cash':'Stripe' }}
                                                                </li>
                                                                <li class="mb-3"><span class="text-color">Staff:</span> {{$item->employee->name}} </li>
                                                            </ul>
                                                            @if($item->review == null)
                                                                @if ($item->booking_status == "Completed" || $item->booking_status == "Cancel")
                                                                    <div class="btn-gray line-height-26 mt-1 cursor-pointer mr-2" onclick="ReviewModel({{ $item->id }})">
                                                                        {{__('layout.Add Review')}}
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            <a href="{{ url('invoice/'.$item->id) }}" class="btn-gray line-height-26 mt-1 cursor-pointer" target="_blank">View Invoice</a>
                                                            @if ($item->booking_status == "Pending" || $item->booking_status == "Approved")
                                                                <div class="action-buttons position-absolute top-0 right-0">
                                                                    <button class="btn bg-rgb-danger font-weight-medium mr-2" onclick="cancelAppointment({{$item->id}})">
                                                                        <i class="la la-times-circle mr-1"></i>{{__('layout.Cancel')}}
                                                                    </button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="info-box">
                                            <div class="info-icon">
                                                <span class="la la-sticky-note"></span>
                                            </div><!-- end info-icon-->
                                            <div class="info-content">
                                                <h4 class="info__title"> {{__('layout.No Appointment Found')}} </h4>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="approved-appointment" role="tabpanel" aria-labelledby="approved-tab">
                            <div class="row">
                                <div class="col-lg-10 mx-auto">
                                    @if (count($master['approved']) > 0)
                                        @foreach ($master['approved'] as $item)
                                            <div class="block-card-body pt-0">
                                                <div class="generic-list dashboard-booking-list ">
                                                    <div class="generic-list-item d-flex mini-list-card">
                                                        <div class="mini-list-img">
                                                            <img src="{{ $item->salon->imagePath .'/'. $item->salon->image }}" alt="salon-image"  class="d-block">
                                                        </div>
                                                        <div class="ml-3 flex-grow-1 position-relative">
                                                            <h4 class="text-color font-size-20 mb-3">
                                                                <a href="{{ url('salon/'.$item->salon->salon_id. '/'. Str::slug($item->salon->name)) }}" class="text-color">  {{$item->salon->name}}  </a>
                                                            </h4>
                                                            <ul class="list-items list--items">
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Appointment ID')}}:</span> {{$item->booking_id}} </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Date')}}:</span> {{$item->date}} </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Time')}}:</span> {{$item->start_time .' to '. $item->end_time}} </li>
                                                                @php
                                                                    $ar = array();
                                                                    foreach ($item->services as $ser) {
                                                                        array_push($ar,$ser->name);
                                                                    }
                                                                    $services = implode(', ', $ar);
                                                                @endphp
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Service')}}:</span> {{$services}} </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Service Place')}}:</span> {{$item->booking_at}} </li>
                                                                @if ($item->booking_at == "Home")
                                                                    <li class="mb-3"><span class="text-color">{{__('layout.Address')}}:</span>
                                                                        {{$item->addressDetails->street}},
                                                                        {{$item->addressDetails->city}},
                                                                        {{$item->addressDetails->state}},
                                                                        {{$item->addressDetails->country}}
                                                                    </li>
                                                                @endif
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Payment')}}:</span> {{$currency}}{{$item->payment}} </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Payment Type')}}:</span>
                                                                    {{ $item->payment_type == "LOCAL"? 'Cash':'Stripe' }}
                                                                </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Staff')}}:</span> {{$item->employee->name}} </li>
                                                            </ul>
                                                            @if($item->review == null)
                                                                @if ($item->booking_status == "Completed" || $item->booking_status == "Cancel")
                                                                    <div class="btn-gray line-height-26 mt-1 cursor-pointer mr-2" onclick="ReviewModel({{ $item->id }})">
                                                                        {{__('layout.Add Review')}}
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            <a href="{{ url('invoice/'.$item->id) }}" class="btn-gray line-height-26 mt-1 cursor-pointer" target="_blank">View Invoice</a>
                                                            @if ($item->booking_status == "Pending" || $item->booking_status == "Approved")
                                                                <div class="action-buttons position-absolute top-0 right-0">
                                                                    <button class="btn bg-rgb-danger font-weight-medium mr-2" onclick="cancelAppointment({{$item->id}})">
                                                                        <i class="la la-times-circle mr-1"></i>{{__('layout.Cancel')}}
                                                                    </button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="info-box">
                                            <div class="info-icon">
                                                <span class="la la-sticky-note"></span>
                                            </div><!-- end info-icon-->
                                            <div class="info-content">
                                                <h4 class="info__title"> {{__('layout.No Appointment Found')}} </h4>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="completed-appointment" role="tabpanel" aria-labelledby="completed-tab">
                            <div class="row">
                                <div class="col-lg-10 mx-auto">
                                    @if (count($master['completed']) > 0)
                                        @foreach ($master['completed'] as $item)
                                            <div class="block-card-body pt-0">
                                                <div class="generic-list dashboard-booking-list ">
                                                    <div class="generic-list-item d-flex mini-list-card">
                                                        <div class="mini-list-img">
                                                            <img src="{{ $item->salon->imagePath .'/'. $item->salon->image }}" alt="salon-image"  class="d-block">
                                                        </div>
                                                        <div class="ml-3 flex-grow-1 position-relative">
                                                            <h4 class="text-color font-size-20 mb-3">
                                                                <a href="{{ url('salon/'.$item->salon->salon_id. '/'. Str::slug($item->salon->name)) }}" class="text-color">  {{$item->salon->name}}  </a>
                                                            </h4>
                                                            <ul class="list-items list--items">
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Appointment ID')}}:</span> {{$item->booking_id}} </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Date')}}:</span> {{$item->date}} </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Time')}}:</span> {{$item->start_time .' to '. $item->end_time}} </li>
                                                                @php
                                                                    $ar = array();
                                                                    foreach ($item->services as $ser) {
                                                                        array_push($ar,$ser->name);
                                                                    }
                                                                    $services = implode(', ', $ar);
                                                                @endphp
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Service')}}:</span> {{$services}} </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Service Place')}}:</span> {{$item->booking_at}} </li>
                                                                @if ($item->booking_at == "Home")
                                                                    <li class="mb-3"><span class="text-color">{{__('layout.Address')}}:</span>
                                                                        {{$item->addressDetails->street}},
                                                                        {{$item->addressDetails->city}},
                                                                        {{$item->addressDetails->state}},
                                                                        {{$item->addressDetails->country}}
                                                                    </li>
                                                                @endif
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Payment')}}:</span> {{$currency}}{{$item->payment}} </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Payment Type')}}:</span>
                                                                    {{ $item->payment_type == "LOCAL"? 'Cash':'Stripe' }}
                                                                </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Staff')}}:</span> {{$item->employee->name}} </li>
                                                            </ul>
                                                            @if($item->review == null)
                                                                @if ($item->booking_status == "Completed" || $item->booking_status == "Cancel")
                                                                    <div class="btn-gray line-height-26 mt-1 cursor-pointer mr-2" onclick="ReviewModel({{ $item->id }})">
                                                                        {{__('layout.Add Review')}}
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            <a href="{{ url('invoice/'.$item->id) }}" class="btn-gray line-height-26 mt-1 cursor-pointer" target="_blank">View Invoice</a>
                                                            @if ($item->booking_status == "Pending" || $item->booking_status == "Approved")
                                                                <div class="action-buttons position-absolute top-0 right-0">
                                                                    <button class="btn bg-rgb-danger font-weight-medium mr-2" onclick="cancelAppointment({{$item->id}})">
                                                                        <i class="la la-times-circle mr-1"></i>{{__('layout.Cancel')}}
                                                                    </button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="info-box">
                                            <div class="info-icon">
                                                <span class="la la-sticky-note"></span>
                                            </div><!-- end info-icon-->
                                            <div class="info-content">
                                                <h4 class="info__title"> {{__('layout.No Appointment Found')}} </h4>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cancel-appointment" role="tabpanel" aria-labelledby="cencel-tab">
                            <div class="row">
                                <div class="col-lg-10 mx-auto">
                                    @if (count($master['cancel']) > 0)
                                        @foreach ($master['cancel'] as $item)
                                            <div class="block-card-body pt-0">
                                                <div class="generic-list dashboard-booking-list ">
                                                    <div class="generic-list-item d-flex mini-list-card">
                                                        <div class="mini-list-img">
                                                            <img src="{{ $item->salon->imagePath .'/'. $item->salon->image }}" alt="salon-image"  class="d-block">
                                                        </div>
                                                        <div class="ml-3 flex-grow-1 position-relative">
                                                            <h4 class="text-color font-size-20 mb-3">
                                                                <a href="{{ url('salon/'.$item->salon->salon_id. '/'. Str::slug($item->salon->name)) }}" class="text-color">  {{$item->salon->name}}  </a>
                                                            </h4>
                                                            <ul class="list-items list--items">
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Appointment ID')}}:</span> {{$item->booking_id}} </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Date')}}:</span> {{$item->date}} </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Time')}}:</span> {{$item->start_time .' to '. $item->end_time}} </li>
                                                                @php
                                                                    $ar = array();
                                                                    foreach ($item->services as $ser) {
                                                                        array_push($ar,$ser->name);
                                                                    }
                                                                    $services = implode(', ', $ar);
                                                                @endphp
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Service')}}:</span> {{$services}} </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Service Place')}}:</span> {{$item->booking_at}} </li>
                                                                @if ($item->booking_at == "Home")
                                                                    <li class="mb-3"><span class="text-color">{{__('layout.Address')}}:</span>
                                                                        {{$item->addressDetails->street}},
                                                                        {{$item->addressDetails->city}},
                                                                        {{$item->addressDetails->state}},
                                                                        {{$item->addressDetails->country}}
                                                                    </li>
                                                                @endif
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Payment')}}:</span> {{$currency}}{{$item->payment}} </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Payment Type')}}:</span>
                                                                    {{ $item->payment_type == "LOCAL"? 'Cash':'Stripe' }}
                                                                </li>
                                                                <li class="mb-3"><span class="text-color">{{__('layout.Staff')}}:</span> {{$item->employee->name}} </li>
                                                            </ul>
                                                            @if($item->review == null)
                                                                @if ($item->booking_status == "Completed" || $item->booking_status == "Cancel")
                                                                    <div class="btn-gray line-height-26 mt-1 cursor-pointer mr-2" onclick="ReviewModel({{ $item->id }})">
                                                                        {{__('layout.Add Review')}}
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            <a href="{{ url('invoice/'.$item->id) }}" class="btn-gray line-height-26 mt-1 cursor-pointer" target="_blank">View Invoice</a>
                                                            @if ($item->booking_status == "Pending" || $item->booking_status == "Approved")
                                                                <div class="action-buttons position-absolute top-0 right-0">
                                                                    <button class="btn bg-rgb-danger font-weight-medium mr-2" onclick="cancelAppointment({{$item->id}})">
                                                                        <i class="la la-times-circle mr-1"></i>{{__('layout.Cancel')}}
                                                                    </button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="info-box">
                                            <div class="info-icon">
                                                <span class="la la-sticky-note"></span>
                                            </div><!-- end info-icon-->
                                            <div class="info-content">
                                                <h4 class="info__title"> {{__('layout.No Appointment Found')}} </h4>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('website.layouts.reviewModel')
@endsection