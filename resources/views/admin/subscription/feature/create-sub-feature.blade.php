<div class="container-fluid sidebar_open @if($errors->any()) show_sidebar_edit @endif" id="features_sub_sidebar">
    <div class="row">
        <div class="col">
            <div class="card py-3 border-0">
                <div class="border_bottom_pink pb-3 pt-2 mb-4">
                    <span class="h3">{{__('Sub Features')}}</span>
                    <button type="button" class="features_sub_sidebar_close close">&times;</button>
                </div>
                <form class="form-horizontal" id="sub_features_form" action="#" method="post">
                    @csrf
                    <div>

                        <div class="form-group">
                            <label class="form-control-label" for="name">{{__('Name')}}</label>
                            <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control"
                                placeholder="{{__('Name')}}" autofocus>
                            <div class="invalid-div "><span class="name"></span></div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="name">{{__('Subscriptions')}}</label>

                            <div class="container" id="div_sub_features_plan_create">
                            </div>

                        </div>


                        <div class="text-center">
                            <button type="button" id="btn_save_changes"
                                onclick="save_sub_feature_plan('sub_features_form','sub-features')"
                                class="btn btn-primary rtl-float-none mt-4 mb-5">{{ __('Save Changes') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>