<div class="container-fluid sidebar_open @if($errors->any()) show_sidebar_edit @endif"
    id="features_subscription_sidebar">
    <div class="row">
        <div class="col">
            <div class="card py-3 border-0">
                <div class="border_bottom_pink pb-3 pt-2 mb-4">
                    <span class="h3">{{__('Subscription Features')}}</span>
                    <button type="button" class="subscription_features_close close">&times;</button>
                </div>
                <form class="form-horizontal" id="subscription_features_form" action="#" method="post">
                    @csrf
                    <div>

                        <div class="p-2">

                            <button type="button" class="btn btn-primary btn-sm" id="btn_add_sub_features"
                                alt="1">Add</button>
                            <button type="button" class="btn btn-secondary btn-sm" id="btn_remove_sub_features"
                                alt="0">Remove</button>

                        </div>

                        <div class="container" id="div_sub_features">
                        </div>
                        <input type="hidden" name="subscription_id">

                        <div class="text-center">
                            <button type="button" id="btn_save_changes"
                                onclick="save_sub_features('subscription_features_form','subscriptions-features')"
                                class="btn btn-primary rtl-float-none mt-4 mb-5 d-none">{{ __('Save Changes') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>