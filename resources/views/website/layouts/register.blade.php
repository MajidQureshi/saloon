<?php $bg_img = \App\AdminSetting::find(1)->bg_img; ?>

<!-- Modal -->
<div class="modal fade modal-container signup-form" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center" style="background-image: url({{asset('storage/images/app/'.$bg_img)}});">
                <h5 class="modal-title" id="signUpModalTitle">{{__('layout.Welcome! create your account')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times-circle"></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="form-box" id="RegisterForm">
                    <?php $is_point_package = config('point.active'); ?>
                    @if ($is_point_package == 1)
                        <div class="input-box">
                            <label class="label-text">{{__('layout.Referral code')}}</label>
                            <div class="form-group">
                                <span class="la la-gift form-icon"></span>
                                <input class="form-control form-control-styled" value="" type="text" name="friend_code" placeholder="Referral code">
                            </div>
                        </div>
                    @endif
                    <div class="input-box">
                        <label class="label-text">{{__('layout.Name')}}</label>
                        <div class="form-group">
                            <span class="la la-user form-icon"></span>
                            <input class="form-control form-control-styled" value="" type="text" name="name" placeholder="Name">
                            <span class="invalid-div text-danger"><span class="name"></span></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text">{{__('layout.Email')}}</label>
                        <div class="form-group">
                            <span class="la la-envelope form-icon"></span>
                            <input class="form-control form-control-styled" value="" type="email" name="email" placeholder="Email address" autocomplete="email">
                            <span class="invalid-div text-danger"><span class="email"></span></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text">{{__('layout.Password')}}</label>
                        <div class="form-group">
                            <span class="la la-lock form-icon"></span>
                            <input class="form-control form-control-styled" value="" type="password" name="password" placeholder="Enter password" autocomplete="new-password">
                            <span class="invalid-div text-danger"><span class="password"></span></span>
                        </div>
                    </div>
                    
                    <div class="input-box">
                        <label class="label-text">{{__('layout.Confirm Password')}}</label>
                        <div class="form-group">
                            <span class="la la-lock form-icon"></span>
                            <input class="form-control form-control-styled" value="" type="password" name="confirm_password" placeholder="Enter password" autocomplete="new-password">
                            <span class="invalid-div text-danger"><span class="confirm_password"></span></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text">{{__('layout.Phone Code')}}</label>
                        <div class="form-group">
                            <span class="la la-phone form-icon"></span>
                            <input class="form-control form-control-styled" value="" type="text" name="code" placeholder="Enter phonecode e.g., +91">
                            <span class="invalid-div text-danger"><span class="code"></span></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text">{{__('layout.Phone Number')}}</label>
                        <div class="form-group">
                            <span class="la la-phone form-icon"></span>
                            <input class="form-control form-control-styled" maxlength="10"  value="" type="number" name="phone" placeholder="Enter phone number">
                            <span class="invalid-div text-danger"><span class="phone"></span></span>
                        </div>
                    </div>
                    <div class="btn-box">
                        <button type="button" class="theme-btn gradient-btn w-100" id="submitRegister">
                            <i class="la la-user-plus mr-1"></i> {{__('layout.Register Account')}}
                        </button>
                        <p class="sub-text-box text-right pt-1 font-weight-medium font-size-14">
                            {{__('layout.Already have an account')}}? <a class="text-color-2 login-btn" href="javascript:void(0)">{{__('layout.Log In')}}</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>