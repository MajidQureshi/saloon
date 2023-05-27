<?php $bg_img = \App\AdminSetting::find(1)->bg_img; ?>

<!-- Modal -->
<div class="modal fade modal-container" id="sendMessageModal" tabindex="-1" role="dialog" aria-labelledby="sendMessageModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center" style="background-image: url({{asset('storage/images/app/'.$bg_img)}});">
                <h5 class="modal-title" id="sendMessageModalTitle">Add a Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times-circle"></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="form-box" id="reviewForm">
                    @csrf
                    <div class="add-rating-bars review-bars d-flex flex-row flex-wrap flex-grow-1 align-items-center justify-content-between">
                        <div class="review-bars-item mx-0 mt-0">
                            <span class="review-bars-name label-text">{{__('layout.Rating')}}</span>
                            <div class="review-bars-inner pt-1 leave-rating">
                                <input type="radio" name="rating" id="rating-1" value="1">
                                <label for="rating-1" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-2" value="2">
                                <label for="rating-2" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-3" value="3">
                                <label for="rating-3" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-4" value="4">
                                <label for="rating-4" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-5" value="5">
                                <label for="rating-5" class="fa fa-star"></label>
                            </div>
                        </div>
                        <span class="invalid-div text-danger"><span class="rating"></span></span>
                    </div>
                    <input type="hidden" value="" id="booking_id" name="booking_id">
                    <div class="input-box">
                        <label class="label-text">{{__('layout.Review')}}</label>
                        <div class="form-group">
                            <span class="la la-pencil form-icon"></span>
                            <textarea class="message-control form-control" name="review" placeholder="Write Review"></textarea>
                            <span class="invalid-div text-danger"><span class="review"></span></span>
                        </div>
                    </div>
                    <div class="btn-box">
                        <button type="button" class="theme-btn gradient-btn w-100" id="submitReview">
                            {{__('layout.Submit Review')}}<i class="la la-arrow-right ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>