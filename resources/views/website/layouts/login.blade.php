<?php $bg_img = \App\AdminSetting::find(1)->bg_img; ?>

<!-- Modal -->
<div class="modal fade modal-container login-form" tabindex="-1" id="loginModal" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center" style="background-image: url({{asset('storage/images/app/'.$bg_img)}});">
                <h5 class="modal-title" id="loginModalTitle">{{__('layout.Hey, Welcome back')}}!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times-circle"></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="form-box" id="loginForm" action="{{url('/login')}}">
                    <div class="input-box">
                        <label class="label-text">{{__('layout.Email')}}</label>
                        <div class="form-group">
                            <span class="la la-user form-icon"></span>
                            <input class="form-control form-control-styled mb-1" value="" type="email" name="email" placeholder="Email address" autocomplete="email">
                            <span class="invalid-div text-danger"><span class="email"></span></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text">{{__('layout.Password')}}</label>
                        <div class="form-group">
                            <span class="la la-lock form-icon"></span>
                            <input class="form-control form-control-styled mb-1" value="" type="password" name="password" placeholder="Enter password" autocomplete="current-password">
                            <span class="invalid-div text-danger"><span class="password"></span></span>
                        </div>
                    </div>
                    <div class="input-box d-flex align-items-center justify-content-between pb-4 user-action-meta">
                        <div class="custom-checkbox">
                            <input type="checkbox" id="keepMeSignedChb" name="remember">
                            <label for="keepMeSignedChb" class="font-size-14">{{__('layout.Keep me signed in')}}</label>
                        </div>
                        <a href="javascript:void(0)" class="margin-bottom-10px lost-pass-btn font-size-14">{{__('layout.Lost Password')}}?</a>
                    </div>
                    <div class="btn-box mb-3">
                        <button type="button" class="theme-btn gradient-btn w-100" id="submitLogin">
                            <i class="la la-sign-in mr-1"></i> {{__('layout.Login to Account')}}
                        </button>
                        <p class="sub-text-box text-right pt-1 font-weight-medium font-size-14">
                            {{__('layout.New to Meetendo')}}? <a class="text-color-2 signup-btn" href="javascript:void(0)">{{__('layout.Create account')}}</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>