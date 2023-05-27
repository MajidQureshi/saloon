<?php $bg_img = \App\AdminSetting::find(1)->bg_img; ?>

<!-- Modal -->
<div class="modal fade modal-container otp-form" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="otpModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center" style="background-image: url({{asset('storage/images/app/'.$bg_img)}});">
                <h5 class="modal-title" id="otpModalTitle"> Verification </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times-circle"></span>
                </button>
            </div>
            <div class="modal-body">
                <p class="font-size-15 font-weight-medium pb-3">
                    Write OTP here.
                </p>
                <form method="post" class="form-box" id="otpForm">
                    <div class="input-box">
                        <label class="label-text">OTP</label>
                        <input type="hidden" name="user_id">
                        <div class="form-group">
                            <span class="la la-user form-icon"></span>
                            <input class="form-control form-control-styled mb-1" type="number" name="otp" placeholder="OTP">
                            <span class="invalid-div text-danger"><span class="otp"></span></span>
                        </div>
                    </div>
                    <div class="btn-box mb-3">
                        <button type="button" class="theme-btn gradient-btn w-100" id="submitOtp">
                            Verify <i class="la la-arrow-right ml-1"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
