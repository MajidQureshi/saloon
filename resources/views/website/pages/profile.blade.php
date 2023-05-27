@extends('website.layouts.master')
@section('website_content')
@include('website.layouts.breadcrumb', [
    'title' => __('Profile'),
])
<?php $is_point_package = config('point.active'); ?>
<section class="category-area section--padding">
    <div class="container">
        <div class="container-fluid dashboard-inner-body-container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="block-card dashboard-card mb-4">
                        <div class="block-card-header">
                            <h2 class="widget-title pb-0">{{__('layout.Profile Details')}}</h2>
                        </div>
                        <div class="block-card-body w-100">
                            <form method="post" class="form-box row pt-4" action="{{ url('/profile-data') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="edit-profile-photo d-flex align-items-center mb-3">
                                    <img src="{{Auth::user()->imagePath}}{{Auth::user()->image}}" alt="" class="profile-img">
                                    <div class="file-upload-wrap file-upload-wrap-2 ml-4">
                                        <input type="file" name="image" class="multi file-upload-input with-preview">
                                        <span class="file-upload-text"><i class="la la-photo mr-2"></i>{{__('layout.Upload Photo')}}</span>
                                    </div>
                                </div><!-- end edit-profile-photo -->
                           
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">{{__('layout.Your Name')}}</label>
                                        <div class="form-group">
                                            <span class="la la-user form-icon"></span>
                                            <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}" placeholder="Name">
                                            @error('name')                                    
                                                <div class="invalid-div text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">{{__('layout.Your Email')}}</label>
                                        <div class="form-group">
                                            <span class="la la-envelope-o form-icon"></span>
                                            <input class="form-control" type="email" name="email" value="{{Auth::user()->email}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">{{__('layout.Phone Code')}}</label>
                                        <div class="form-group">
                                            <span class="la la-phone form-icon"></span>
                                            <input class="form-control" type="text" name="code" value="{{Auth::user()->code}}" placeholder="Enter phonecode e.g., +91">
                                            @error('code')                                    
                                                <div class="invalid-div text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">{{__('layout.Phone Number')}}</label>
                                        <div class="form-group">
                                            <span class="la la-phone form-icon"></span>
                                            <input class="form-control" type="text" maxlength="10" name="phone" value="{{Auth::user()->phone}}" placeholder="Enter phone number">
                                            @error('phone')                                    
                                                <div class="invalid-div text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @if ($is_point_package == 1)
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">{{__('layout.Referral Code')}}</label>
                                            <div class="form-group">
                                                <span class="la la-gift form-icon"></span>
                                                <input class="form-control" type="text" name="text" value="{{Auth::user()->referral_code}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-lg-12">
                                    <div class="btn-box pt-1">
                                        <button class="theme-btn gradient-btn border-0">{{__('layout.Save Changes')}}<i class="la la-arrow-right ml-2"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if ($is_point_package == 1)
                        <div class="block-card dashboard-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title pb-0"> {{__('layout.Loyalty Point')}} </h2>
                            </div>
                            <div class="block-card-body">
                                <form method="post" class="form-box row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">{{__('layout.Total Earned Points')}}</label>
                                            <div class="form-group">
                                                <span class="la la-gift form-icon"></span>
                                                <input class="form-control" type="text" value="{{Auth::user()->total_points}}" disabled>
                                            </div>
                                        </div>
                                        <div class="input-box">
                                            <label class="label-text">{{__('layout.Remaining Points')}}</label>
                                            <div class="form-group">
                                                <span class="la la-gift form-icon"></span>
                                                <input class="form-control" type="text" value="{{Auth::user()->remain_points}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="block-card dashboard-card mb-4">
                        <div class="block-card-header">
                            <h2 class="widget-title pb-0 display-inline-block"> 
                                {{ count($addresses) >= 1 ? 'Addresses': 'Address' }}
                            </h2>
                            <button class="theme-btn gradient-btn border-0 float-right address_btn" id="add_address"  data-toggle="modal" data-target="#addAddressModal">
                                <i class="la la-plus"></i>
                            </button>
                        </div>
                        <div class="block-card-body">
                            @foreach ($addresses as $item)
                            <div class="{{ $loop->iteration == 1? '':'pt-3' }}">
                                <div class="text-color"><i class="la la-map-marker mr-2 text-color-2 font-size-18"></i>{{__('layout.Address')}}
                                     {{ count($addresses) >= 1 ? $loop->iteration : 'Address'  }}
                                </div>
                                <div class="display-inline-block pl-4 mt-2">
                                    {{ $item->street }},
                                    <br>
                                    {{ $item->city }}, {{ $item->state }}, {{$item->country}}
                                </div>
                                <button class="theme-btn gradient-btn border-0 float-right address_btn edit_address mt-4" onclick="DeleteAddress({{$item->address_id}})" data-toggle="tooltip" data-placement="top" data-original-title="Delete Address">
                                    <i class="la la-trash"></i>
                                </button>
                                <button class="theme-btn gradient-btn border-0 float-right address_btn edit_address mt-4 mr-2" onclick="OpenAddress({{$item->address_id}})" data-toggle="tooltip" data-placement="top" data-original-title="Edit Address">
                                    <i class="la la-pencil"></i>
                                </button>
                            </div>
                            @endforeach
                        </div><!-- end block-card-body -->
                    </div>
                     
                    <div class="block-card dashboard-card mb-4">
                        <div class="block-card-header">
                            <h2 class="widget-title pb-0">{{__('layout.Change Password')}}</h2>
                        </div>
                        <div class="block-card-body">
                            <form method="post" class="form-box row" action="{{ url('/changePassword') }}">
                                @csrf
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">{{__('layout.Current Password')}}</label>
                                        <div class="form-group">
                                            <span class="la la-lock form-icon"></span>
                                            <input class="form-control" type="password" name="current_password" placeholder="Current password" autocomplete="current-password">
                                            @error('current_password')                                    
                                                <div class="invalid-div text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">{{__('layout.New Password')}}</label>
                                        <div class="form-group">
                                            <span class="la la-lock form-icon"></span>
                                            <input class="form-control" type="password" name="new_password" placeholder="New password" autocomplete="new-password">
                                            @error('new_password')                                    
                                                <div class="invalid-div text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">{{__('layout.Confirm New Password')}}</label>
                                        <div class="form-group">
                                            <span class="la la-lock form-icon"></span>
                                            <input class="form-control" type="password" name="confirm_password" placeholder="Confirm new password" autocomplete="new-password">
                                            @error('confirm_password')                                    
                                                <div class="invalid-div text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="btn-box pt-1">
                                        <button type="submit" class="theme-btn gradient-btn border-0">{{__('layout.Change Password')}}<i class="la la-arrow-right ml-2"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $bg_img = \App\AdminSetting::find(1)->bg_img; ?>

<!-- Modal -->
<div class="modal fade modal-container addAddress-form" tabindex="-1" id="addAddressModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center" style="background-image: url({{asset('storage/images/app/'.$bg_img)}});">
                <h5 class="modal-title" id="addAddressModalTitle"> {{__('layout.Add New Address')}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times-circle"></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="form-box" id="addAddressForm" action="{{url('/addAddress')}}">
                    @csrf
                    <div class="map-container height-400 mb-3">
                        <input type="hidden" value="{{$setting->lat}}" name="latitude" id="latitude">
                        <input type="hidden" value="{{$setting->lang}}" name="longitude" id="longitude">
                        <div id="singleMap" class="drag-map height-400" data-latitude="{{$setting->lat}}" data-longitude="{{$setting->lang}}"></div>
                    </div>
                    <div class="input-box">
                        <label class="label-text"> {{__('layout.Street')}} </label>
                        <div class="form-group">
                            <span class="la la-user form-icon"></span>
                            <input class="form-control form-control-styled mb-1" type="text" name="street" placeholder="Enter street address">
                            <span class="invalid-div text-danger"><span class="street"></span></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text"> {{__('layout.City')}} </label>
                        <div class="form-group">
                            <span class="la la-user form-icon"></span>
                            <input class="form-control form-control-styled mb-1" type="text" name="city" placeholder="Enter city">
                            <span class="invalid-div text-danger"><span class="city"></span></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text"> {{__('layout.State')}} </label>
                        <div class="form-group">
                            <span class="la la-user form-icon"></span>
                            <input class="form-control form-control-styled mb-1" type="text" name="state" placeholder="Enter state">
                            <span class="invalid-div text-danger"><span class="state"></span></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text"> {{__('layout.Country')}} </label>
                        <div class="form-group">
                            <span class="la la-user form-icon"></span>
                            <input class="form-control form-control-styled mb-1" type="text" name="country" placeholder="Enter country">
                            <span class="invalid-div text-danger"><span class="country"></span></span>
                        </div>
                    </div>
                   
                    <div class="btn-box mb-3">
                        <button type="submit" class="theme-btn gradient-btn w-100" id="submitaddAddress">
                            </i> {{__('layout.Add Address')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade modal-container editAddress-form" tabindex="-1" id="editAddressModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center" style="background-image: url({{asset('storage/images/app/'.$bg_img)}});">
                <h5 class="modal-title" id="editAddressModalTitle"> {{__('layout.Edit Address')}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times-circle"></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="form-box" id="editAddressForm" action="{{url('/editAddress')}}">
                    @csrf
                    <div class="map-container height-400 mb-3">
                        <input type="hidden" value="" name="latitude" id="latitude_edit">
                        <input type="hidden" value="" name="longitude" id="longitude_edit">
                        <div id="singleMapEdit" class="drag-map height-400"></div>
                    </div>
                    <input type="hidden" name="address_id" value="">
                    <div class="input-box">
                        <label class="label-text"> {{__('layout.Street')}} </label>
                        <div class="form-group">
                            <span class="la la-user form-icon"></span>
                            <input class="form-control form-control-styled mb-1" type="text" name="street" placeholder="Enter street address">
                            <span class="invalid-div text-danger"><span class="street"></span></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text"> {{__('layout.City')}} </label>
                        <div class="form-group">
                            <span class="la la-user form-icon"></span>
                            <input class="form-control form-control-styled mb-1" type="text" name="city" placeholder="Enter city">
                            <span class="invalid-div text-danger"><span class="city"></span></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text"> {{__('layout.State')}} </label>
                        <div class="form-group">
                            <span class="la la-user form-icon"></span>
                            <input class="form-control form-control-styled mb-1" type="text" name="state" placeholder="Enter state">
                            <span class="invalid-div text-danger"><span class="state"></span></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text"> {{__('layout.Country')}} </label>
                        <div class="form-group">
                            <span class="la la-user form-icon"></span>
                            <input class="form-control form-control-styled mb-1" type="text" name="country" placeholder="Enter country">
                            <span class="invalid-div text-danger"><span class="country"></span></span>
                        </div>
                    </div>
                   
                    <div class="btn-box mb-3">
                        <button type="submit" class="theme-btn gradient-btn w-100" id="submiteditAddress">
                            </i> {{__('layout.Edit Address')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('includes/website/js/jquery.MultiFile.min.js') }}"></script>
<?php $mapkey = \App\AdminSetting::find(1)->mapkey; ?>
<script src="https://maps.googleapis.com/maps/api/js?key={{$mapkey}}"></script>

<script src="{{ asset('includes/website/js/map-add.js') }}"></script>
@endsection