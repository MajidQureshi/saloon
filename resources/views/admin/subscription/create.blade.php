<div class="container-fluid sidebar_open @if($errors->any()) show_sidebar_create @endif" id="add_subscription_sidebar">
    <div class="row">
        <div class="col">
            <div class="card py-3 border-0">
                <div class="border_bottom_pink pb-3 pt-2 mb-4">
                    <span class="h3">{{__('Create Subscription')}}</span>
                    <button type="button" class="add_subscription close">&times;</button>
                </div>
                <form class="form-horizontal" id="create_subscription_form" action="{{url('/admin/subscriptions')}}"
                    method="post">
                    @csrf
                    <div>
                        <div class="form-group">
                            <label class="form-control-label" for="name">{{__('Name')}}</label>
                            <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control"
                                placeholder="{{__('Name')}}" autofocus>
                            <div class="invalid-div "><span class="name"></span></div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="name">{{__('Description')}}</label>
                            <input type="text" value="{{ old('description') }}" name="description" id="description"
                                class="form-control" placeholder="{{__('Description')}}">
                            <div class="invalid-div "><span class="description"></span></div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="name">{{__('Small Description')}}</label>
                            <input type="text" value="{{ old('small_description') }}" name="small_description"
                                id="small_description" class="form-control" placeholder="{{__('Small Description')}}">
                            <div class="invalid-div "><span class="small_description"></span></div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="name">{{__('Old Price')}}</label>
                            <input type="number" value="{{ old('old_price') }}" name="old_price" id="old_price"
                                class="form-control" placeholder="{{__('Old Price')}}">
                            <div class="invalid-div "><span class="old_price"></span></div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="name">{{__('New Price')}}</label>
                            <input type="number" value="{{ old('new_price') }}" name="new_price" id="new_price"
                                class="form-control" placeholder="{{__('New Price')}}">
                            <div class="invalid-div "><span class="new_price"></span></div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="name">{{__('Fa Icon')}}</label>
                            <input type="text" value="{{ old('icon') }}" name="icon" id="icon" class="form-control"
                                placeholder="{{__('Fa Icon')}}">
                            <div class="invalid-div "><span class="icon"></span></div>
                        </div>





                        <div class="text-center">
                            <button type="button" id="create_btn"
                                onclick="all_create('create_subscription_form','subscriptions')"
                                class="btn btn-primary mt-4 mb-5 rtl-float-none">{{ __('Create') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>