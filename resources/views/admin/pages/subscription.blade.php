@extends('layouts.app')
@section('content')

@include('layouts.top-header', [
'title' => __('Subscription'),
'class' => 'col-lg-7'
])

<div class="container-fluid mt--6 mb-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-0">
                    <span class="h3">{{__('Subscription table')}}</span>
                    <button class="btn btn-primary addbtn float-right p-2 add_subscription" id="add_subscription"><i
                            class="fas fa-plus mr-1"></i>{{__('Add New')}}</button>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort">{{__('#')}}</th>
                                <th scope="col" class="sort">{{__('Name')}}</th>
                                <th scope="col" class="sort">{{__('Description')}}</th>
                                <th scope="col" class="sort">{{__('Old Price')}}</th>
                                <th scope="col" class="sort">{{__('New Price')}}</th>
                                <th scope="col" class="sort">{{__('Status')}}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @if (count($subscriptions) != 0)
                            @foreach ($subscriptions as $subscription)
                            <tr>
                                <th>{{$loop->iteration}} </th>
                                <td>{{$subscription->name}}</td>
                                <td>{{$subscription->description}}</td>
                                <td>{{$subscription->old_price}}</td>
                                <td>{{$subscription->new_price}}</td>

                                <td>
                                    <label class="custom-toggle">
                                        <input type="checkbox" onchange="hideSubscription({{$subscription->id}})"
                                            {{$subscription->status == 0?'checked': ''}}>
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                            data-label-on="Hide"></span>
                                    </label>
                                </td>
                                <td class="table-actions">
                                    @php
                                    $base_url = url('/');
                                    @endphp

                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-warning bg-white"
                                        onclick="show_sub_features({{$subscription->id}},'{{$base_url}}')"
                                        data-toggle="tooltip" data-original-title="{{__('Features')}}">
                                        <i class="fas fa-list"></i>
                                    </button>

                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white"
                                        onclick="edit_subscription({{$subscription->id}},'{{$base_url}}')"
                                        data-toggle="tooltip" data-original-title="{{__('Edit Subscription')}}">
                                        <i class="fas fa-user-edit"></i>
                                    </button>

                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <th colspan="10" class="text-center">{{__('No Subscriptions')}}</th>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.subscription.create')
@include('admin.subscription.edit')
@include('admin.subscription.features')
@endsection