<?php $bg_img = \App\AdminSetting::find(1)->bg_img; ?>

<!-- Modal -->
<div class="modal fade modal-container forgotPassword-form" id="recoverModal" tabindex="-1" role="dialog" aria-labelledby="recoverModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center" style="background-image: url({{asset('storage/images/app/'.$bg_img)}});">
                <h5 class="modal-title" id="recoverModalTitle">{{__('layout.Forgot password')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times-circle"></span>
                </button>
            </div>
            <div class="modal-body">
                <p class="font-size-15 font-weight-medium pb-3">
                    {{__('layout.Enter your email and get new password. You will receive email or sms with new password')}}
                    .
                </p>
                <form method="post" class="form-box" id="forgotPasswordForm">
                    @csrf
                    <div class="input-box">
                        <label class="label-text">{{__('layout.Email')}}</label>
                        <div class="form-group">
                            <span class="la la-user form-icon"></span>
                            <input class="form-control form-control-styled" type="email" name="email" placeholder="Email address">
                            <span class="invalid-div text-danger"><span class="email"></span></span>
                        </div>
                    </div>
                    <div class="btn-box">
                        <button type="button" class="theme-btn gradient-btn w-100" id="forgotPasswordSubmit">
                            {{__('layout.Get New Password')}} <i class="la la-arrow-right ml-1"></i>
                        </button>
                        <p class="sub-text-box text-right pt-1 font-weight-medium font-size-14">
                            {{__('layout.Not a member')}}? <a class="text-color-2 signup-btn" href="javascript:void(0)">{{__('layout.Create account')}}</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
