@extends('layouts.app')
@section('content')

@include('layouts.top-header', [
        'title' => __('Calendar'),
        'class' => 'col-lg-7'
    ])

<div class="container-fluid mt--6 mb-5">
    <div class="row">
        <div class="col">
            <div class="card px-4 pb-4">
                <div class="card-header border-0">
                    <span class="h3">{{__('Calendar')}}</span>
                    <div class="">
                        <button class="btn btn-primary rtl-mr addbtn float-right p-2 add_user" id="add_user"><i class="fas fa-plus mr-1"></i>{{__('Add New Client')}}</button>
                    </div>
                    <div>
                        <button class="btn btn-primary addbtn float-right p-2 add_appointment mr-3" id="add_appointment"><i class="fas fa-plus mr-1"></i>{{__('Add Appointment')}}</button>
                    </div>
                </div>
                <div class="row statusRow text-center ml-1">
                    <div class="col completedBox p-1 mr-3 rounded"><span>{{__('Completed')}}</span></div>
                    <div class="col pendingBox p-1 mr-3 rounded"><span>{{__('Pending')}}</span></div>
                    <div class="col approvedBox p-1 mr-3 rounded"><span>{{__('Approved')}}</span></div>
                    <div class="col cancelBox p-1 mr-3 rounded"><span>{{__('Cancel')}}</span></div>
                </div>
                <div id="calendar-row" class="mb-4 mt-4">
                    <h4>Filter by employee:</h4>
                    <div class="row justify-content-center">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="all" data-toggle="tab" href="#all-tab" role="tab" aria-controls="all" aria-selected="true">All</a>
                            </li>
                            @foreach ($employees as $emp)
                                <li class="nav-item">
                                    <a class="nav-link emp_id" data-id="{{$emp->emp_id}}" id="emp-{{$emp->emp_id}}-tab" data-toggle="tab" href="#emp-{{$emp->name}}-tab" role="tab" aria-controls="emp-{{$emp->name}}-tab" aria-selected="false">{{$emp->name}}</a>
                                </li>
                            @endforeach
                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="all-tab" role="tabpanel" aria-labelledby="all">
                                <div class="mt-3">
                                    {!! $calendar->calendar() !!}
                                    {!! $calendar->script() !!}
                                </div>
                            </div>
                            @foreach ($employees as $emp)
                                <div class="tab-pane fade" id="emp-{{$emp->name}}-tab" role="tabpanel" aria-labelledby="emp-{{$emp->emp_id}}-tab">
                                    <div class="mt-3" id="calendarList{{$emp->emp_id}}"></div>
                                </div>
                            @endforeach
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('owner.booking.create')
@include('owner.booking.show')
@include('owner.user.create')

<style>
.nav-tabs {
    border-bottom: 0;
} 
.nav-tabs .nav-item {
    margin-bottom: 0;
}
.nav-tabs .nav-item .nav-link {
    margin: 0 10px;
    background: transparent;
    color: var(--primary_color) !important;
    border-radius: 0.375rem !important;
    border: 0;
    border: 1px solid var(--primary_color) !important;
    transition: .5s all;
}
.nav-tabs .nav-item .nav-link.active, 
.nav-tabs .nav-item .nav-link:hover {
    background: var(--primary_color) !important;
    color: #ffffff !important;
}
#calendar-row h4 {
    margin: 0 -15px 10px;
}
#calendar-row #myTab {
    width: 100%;
    background: #f0f3f6;
    padding: 10px 0;
    border-radius: 0.375rem !important;
}
</style>

@endsection

@push('js')
<script>
    $('.emp_id').each(function () {
        var $this = $(this);
        $this.on("click", function () {
            var emp_id = $(this).attr("data-id");

            $.ajax({
                type: 'GET',
                data: {'id' : emp_id},
                url: "{{ route('empCalendar') }}",
                success: function (response) {
                    $("#calendarList"+emp_id).html(response);
                }
            });

        });
    });

</script>
@endpush