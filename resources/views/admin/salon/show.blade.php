@extends('layouts.app')
@section('content')

@include('layouts.top-header', [
    'title' => __('View') ,
    'headerData' => __('Salon') ,
    'url' => 'admin/salons' ,
    'class' => 'col-lg-7'
])

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{asset('storage/images/salon logos/'.$salon->image)}}" class="rounded-circle salon_round">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                    </div>
                </div>
                <div class="card-body pt-0 pt-md-4">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                <div>
                                    <span class="heading">{{count($services)}}</span>
                                    <span class="description">{{__('Services')}}</span>
                                </div>
                                <div>
                                    <span class="heading">{{count($emps)}}</span>
                                    <span class="description">{{__('Employee')}}</span>
                                </div>
                                <div>
                                    <span class="heading">{{count($users)}}</span>
                                    <span class="description">{{__('Clients')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3> {{ $salon->name }} </h3>
                        <div>
                            {{__('Phone :')}} {{$salon->phone}}
                            @if ($salon->website != null)
                                <br>{{__('Website :')}} {{$salon->website}}
                            @endif
                        </div>
                        <hr class="my-4" />
                        <p>{{ $salon->desc }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header border-0">
                    <h3>{{__('Show Salon')}}</h3>
                </div>
                <div class="card-body rtl-icon">
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-scissors mr-2"></i>{{__('Service')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class=" mr-2 fa fa-group"></i>{{__('Employee')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fas fa-star mr-2"></i>{{__('Review')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false"><i class="ni ni-time-alarm mr-2"></i>{{__('About')}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card shadow mx-auto my-0">
                        <div class="my-0 mx-auto w-90">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    
                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                        <div class="card border-0">
                                            <div class="row">
                                                <div class="card-title h3 col-7">{{__('Services of')}} {{$salon->name}}</div>
                                                <div class="float-left col">
                                                    <div class="form-group">
                                                        <input type="text" name="search_service" onkeyup="service_search()" id="search_service" class="form-control" placeholder="{{__('Search Service')}}" autofocus>
                                                        <i></i>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (count($services) != 0)
                                                <div id="main_div">
                                                    @foreach ($services as $ser)
                                                        <div class="card single_div">
                                                            <div class="card-body">
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto">
                                                                        <div class="avatar avatar-xl rounded-circle">
                                                                            <img alt="Service Image" class="small_round" src="{{asset('storage/images/services/'.$ser->image)}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col ml--2">
                                                                        <h4 class="mb-0"> {{$ser->name}} </h4>
                                                                        <span class="text-sm font-weight-500">{{__('Category :')}} </span><span class="text-sm text-muted">{{$ser->category->name}}</span><br>
                                                                        @if ($ser->status == 1)
                                                                            <span class="text-success">●</span>
                                                                            <small>Active</small>
                                                                        @else
                                                                            <span class="text-danger">●</span>
                                                                            <small>Inactive</small>
                                                                        @endif
                                                                        
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <span class="text-sm font-weight-500">{{__('Price :')}} </span><span class="text-sm text-muted">{{$ser->price}}{{$symbol}}</span><br>
                                                                        <span class="text-sm font-weight-500">{{__('Time :')}} </span><span class="text-sm text-muted">{{$ser->time}} {{__('Min')}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="text-center">{{__('No Services Available')}}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                        <div class="card border-0">
                                            <div class="row">
                                                <div class="card-title h3 col-7">{{__('Employess of')}} {{$salon->name}}</div>
                                                <div class="float-left col">
                                                    <div class="form-group">
                                                        <input type="text" name="search_emp" onkeyup="emp_search()" id="search_emp" class="form-control" placeholder="{{__('Search Employee')}}" autofocus>
                                                        <i></i>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(count($emps) != 0)
                                                <div id="main_div_emp">
                                                    @foreach ($emps as $emp)
                                                        <div class="card single_div_emp">
                                                            <div class="card-body">
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto">
                                                                        <div class="avatar avatar-xl rounded-circle">
                                                                            <img alt="Employee Image" class="small_round" src="{{asset('storage/images/employee/'.$emp->image)}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col ml--2">
                                                                        
                                                                        <h4 class="mb-0"> {{$emp->name}} </h4>
                                                                        <span class="text-sm font-weight-500">{{__('Email :')}} </span><span class="text-sm text-muted">{{$emp->email}}</span><br>
                                                                        @if ($salon->give_service == "Both")
                                                                            <span class="text-sm font-weight-500">{{__('Give Services At :')}} </span><span class="text-sm text-muted">
                                                                                @if ($emp->give_service == "Both")
                                                                                    Salon & Home
                                                                                @else
                                                                                    {{ $emp->give_service }}
                                                                                @endif
                                                                            </span><br>
                                                                        @endif

                                                                        @if ($emp->status == 1)
                                                                            <span class="text-success">●</span>
                                                                            <small>Active</small>
                                                                        @else
                                                                            <span class="text-danger">●</span>
                                                                            <small>Inactive</small>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="text-center">{{__('No Employess Available')}}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                        @if(count($reviews) != 0)
                                            @foreach ($reviews as $review)
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-xl rounded-circle">
                                                                    <img alt="User Image" class="small_round" src="{{asset('storage/images/users/'.$review->user->image)}}">
                                                                </div>
                                                            </div>
                                                            <div class="col ml--2">
                                                                <h4 class="mb-0">
                                                                    <div>{{$review->user->name}}</div>
                                                                </h4>
                                                                <div>
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        <i class="fas fa-star  {{$i<=$review->rate ? 'activerate' : ''}}"></i>
                                                                    @endfor
                                                                </div>
                                                                <div>{{$review->message}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="text-center">{{__('No Review')}}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <?php 
                                                    $start_time1 = new Carbon\Carbon($salon->sunday['open']);
                                                    $close_time1 = new Carbon\Carbon($salon->sunday['close']);
                                                    
                                                    $start_time2 = new Carbon\Carbon($salon->monday['open']);
                                                    $close_time2 = new Carbon\Carbon($salon->monday['close']);
                                                    
                                                    $start_time3 = new Carbon\Carbon($salon->tuesday['open']);
                                                    $close_time3 = new Carbon\Carbon($salon->tuesday['close']);
                                                    
                                                    $start_time4 = new Carbon\Carbon($salon->wednesday['open']);
                                                    $close_time4 = new Carbon\Carbon($salon->wednesday['close']);
                                                    
                                                    $start_time5 = new Carbon\Carbon($salon->thursday['open']);
                                                    $close_time5 = new Carbon\Carbon($salon->thursday['close']);
                                                    
                                                    $start_time6 = new Carbon\Carbon($salon->friday['open']);
                                                    $close_time6 = new Carbon\Carbon($salon->friday['close']);
                                                    
                                                    $start_time7 = new Carbon\Carbon($salon->saturday['open']);
                                                    $close_time7 = new Carbon\Carbon($salon->saturday['close']);
                                                ?>    
                                                <p class="h3 heading text-muted mb-3">{{__('Timings :')}} </p>
                                                
                                                <div class="row align-items-center">
                                                    <span class="font-weight-bold col-3 text-left"> {{__('Sunday :')}}</span>
                                                    <span class="text-muted col">
                                                        @if ($salon->sunday['open'] == null && $salon->sunday['close'] == null)
                                                            {{__('OFF DAY')}}
                                                        @else
                                                            {{$start_time1->format('g:i A')}} To {{$close_time1->format('g:i A')}}
                                                        @endif
                                                    </span><br>
                                                </div>
                                                <div class="row align-items-center">
                                                    <span class="font-weight-bold col-3 text-left"> {{__('Monday :')}}</span>
                                                    <span class="text-muted col">
                                                        @if ($salon->monday['open'] == null && $salon->monday['close'] == null)
                                                            {{__('OFF DAY')}}
                                                        @else
                                                            {{$start_time2->format('g:i A')}} To {{$close_time2->format('g:i A')}}
                                                        @endif
                                                    </span><br>
                                                </div>
                                                <div class="row align-items-center">
                                                    <span class="font-weight-bold col-3 text-left"> {{__('Tuesday :')}}</span>
                                                    <span class="text-muted col">
                                                        @if ($salon->tuesday['open'] == null && $salon->tuesday['close'] == null)
                                                            {{__('OFF DAY')}}   
                                                        @else
                                                            {{$start_time3->format('g:i A')}} To {{$close_time3->format('g:i A')}}
                                                        @endif
                                                    </span><br>
                                                </div>
                                                <div class="row align-items-center">        
                                                    <span class="font-weight-bold col-3 text-left">{{__('Wednesday :')}}</span>
                                                    <span class="text-muted col">
                                                        @if ($salon->wednesday['open'] == null && $salon->wednesday['close'] == null)
                                                            {{__('OFF DAY')}}   
                                                        @else
                                                            {{$start_time4->format('g:i A')}} To {{$close_time4->format('g:i A')}}
                                                        @endif
                                                    </span><br>
                                                </div>
                                                <div class="row align-items-center">     
                                                    <span class="font-weight-bold col-3 text-left"> {{__('Thursday :')}}</span>
                                                    <span class="text-muted col">
                                                        @if ($salon->thursday['open'] == null && $salon->thursday['close'] == null)
                                                            {{__('OFF DAY')}}
                                                        @else
                                                            {{$start_time5->format('g:i A')}} To {{$close_time5->format('g:i A')}}
                                                        @endif
                                                    </span><br>
                                                </div>
                                                <div class="row align-items-center">    
                                                    <span class="font-weight-bold col-3 text-left"> {{__('Friday :')}}</span>
                                                    <span class="text-muted col">
                                                        @if ($salon->friday['open'] == null && $salon->friday['close'] == null)
                                                            {{__('OFF DAY')}}
                                                        @else
                                                            {{$start_time6->format('g:i A')}} To {{$close_time6->format('g:i A')}}
                                                        @endif
                                                    </span><br>
                                                </div>
                                                <div class="row align-items-center">   
                                                    <span class="font-weight-bold col-3 text-left"> {{__('Saturday :')}}</span>
                                                    <span class="text-muted col">
                                                        @if ($salon->saturday['open'] == null && $salon->saturday['close'] == null)
                                                            {{__('OFF DAY')}}
                                                        @else
                                                            {{$start_time7->format('g:i A')}} To {{$close_time7->format('g:i A')}}
                                                        @endif
                                                    </span><br>
                                                </div>

                                                <hr class="my-4" />
 
                                                <p class="h3 heading text-muted mb-3">{{__('Contact :')}} </p>
                                                @if ($salon->website != NULL)
                                                    <span class="font-weight-bold">{{__('Website :')}} </span><span> &numsp;{{$salon->website}}</span><br>
                                                @endif
                                                <div class="mt-1"><span class="font-weight-bold">{{__('Phone no :')}} </span><span> &numsp;{{$salon->phone}}</span></div>
                                                <div class="mt-1"><span class="font-weight-bold">{{__('Address :')}} </span></div>
                                                <div>{{$salon->address}},</div>
                                                <div>{{$salon->city}}</div>
                                                <div>{{$salon->country}}</div>
                                                <div class="mt-1"><span class="font-weight-bold">{{__('ID Card :')}} </span>
                                                    <img src="{{asset('storage/images/salon logos/'.$salon->id_card)}}">
                                                    <div class="mt-1"><span class="font-weight-bold">{{__('license :')}} </span>
                                                        <img src="{{asset('storage/images/salon logos/'.$salon->license_image)}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection