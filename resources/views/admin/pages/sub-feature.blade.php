@extends('layouts.app')
@section('content')

@include('layouts.top-header', [
'title' => __('Sub-Feature'),
'class' => 'col-lg-7'
])

<div class="container-fluid mt--6 mb-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-0">
                    <span class="h3">{{__('Sub Feature table')}}</span>
                    <button class="btn btn-primary addbtn float-right p-2 add_subscription" id="add_sub_feature"><i
                            class="fas fa-plus mr-1"></i>{{__('Add New')}}</button>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort">{{__('#')}}</th>
                                <th scope="col" class="sort">{{__('Name')}}</th>
                                <th scope="col" class="sort">{{__('Subscriptions')}}</th>
                                <th scope="col" class="sort">{{__('Status')}}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @if (count($sub_features) != 0)
                            @foreach ($sub_features as $sub_feature)
                            <tr>
                                <th>{{$loop->iteration}} </th>
                                <td>{{$sub_feature->name}}</td>
                                <td>

                                    @foreach($sub_feature->subscriptions($sub_feature->sub_ids) as $data)
                                    <span class="badge badge-danger">{{($data->name)}}</span><br>
                                    @endforeach

                                </td>

                                <td>
                                    <label class="custom-toggle">
                                        <input type="checkbox" onchange="hide_sub_feature({{$sub_feature->id}})"
                                            {{$sub_feature->status == 0?'checked': ''}}>
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                            data-label-on="Hide"></span>
                                    </label>
                                </td>
                                <td class="table-actions">
                                    @php
                                    $base_url = url('/');
                                    @endphp


                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white"
                                        onclick="edit_sub_feature({{$sub_feature->id}},'{{$base_url}}')"
                                        data-toggle="tooltip" data-original-title="{{__('Edit Sub Feature ')}}">
                                        <i class="fas fa-user-edit"></i>
                                    </button>

                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <th colspan="10" class="text-center">{{__('No Sub Feature')}}</th>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.subscription.feature.create-sub-feature')
@include('admin.subscription.feature.edit-sub-feature')
@endsection