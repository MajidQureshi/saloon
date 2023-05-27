@extends('website.layouts.master')
@section('website_content')
@include('website.layouts.breadcrumb', [
'title' => 'Subscription',
'headerData' => __('Subscribe'),
'url' => 'subscribe'
])
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
section.pricing {
    background: #007bff;
    background: linear-gradient(to right, #0062E6, #33AEFF);
}

.pricing .card {
    border: none;
    border-radius: 1rem;
    transition: all 0.2s;
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

.pricing hr {
    margin: 1.5rem 0;
}

.pricing .card-title {
    margin: 0.5rem 0;
    font-size: 0.9rem;
    letter-spacing: .1rem;
    font-weight: bold;
}

.pricing .card-price {
    font-size: 3rem;
    margin: 0;
}

.pricing .card-price .period {
    font-size: 0.8rem;
}

.pricing ul li {
    margin-bottom: 1rem;
}

.pricing .text-muted {
    opacity: 0.7;
}

.pricing .btn {
    font-size: 80%;
    border-radius: 5rem;
    letter-spacing: .1rem;
    font-weight: bold;
    padding: 1rem;
    opacity: 0.7;
    transition: all 0.2s;
}

/* Hover Effects on Card */

@media (min-width: 992px) {
    .pricing .card:hover {
        margin-top: -.25rem;
        margin-bottom: .25rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
    }

    .pricing .card:hover .btn {
        opacity: 1;
    }

    .frame-129 {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 0px;
        gap: 24px;

        position: relative;
        width: 1138px;
        height: 212px;
        /* left: 151px; */
        top: 12px;
        padding-bottom: 50px;
    }

    .frame-129 h6 {

        font-family: 'Poppins';
        font-style: normal;
        font-weight: 600;
        font-size: 32px;
        line-height: 48px;

        text-align: center;

        color: #fff;
        flex: none;
        order: 0;
        align-self: stretch;
        flex-grow: 0;
    }

    .frame-129 p {


        font-family: 'Poppins';
        font-style: normal;
        font-weight: 400;
        font-size: 22px;
        line-height: 26px;
        text-align: center;

        color: #f2f2f2;

        flex: none;
        order: 1;
        align-self: stretch;
        flex-grow: 0;
    }

    .frame-130 {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 0px;
        gap: 14px;

        position: relative;
        width: 1138px;
        height: 212px;
        /* left: 151px; */
        top: 97px;
        padding-bottom: 20px;
    }

    .frame-130 h6 {

        font-family: 'Poppins';
        font-style: normal;
        font-weight: 600;
        font-size: 24px;
        line-height: 48px;

        text-align: center;

        color: #fff;
        flex: none;
        order: 0;
        align-self: stretch;
        flex-grow: 0;
    }
}
</style>

<section class="pricing py-5">
    <div class="container">

        <div class="row">
            <div class="frame-129">
                <h6>Subscriptions & Pricing Suits All Size of <br>Businesses</h6>
                <p>No matter what size your business is, we have a plan suited to your needs. Our flexible subscription
                    plans offer you the best value and performance for any business, big or small.
                </p>
            </div>
        </div>


        <div class="row" style="padding-top:20px;">

            @if($subscriptions)
            @foreach($subscriptions as $data)
            <!-- Free Tier -->
            <div class="col-lg-4 ">
                <div class="card mb-5 mb-lg-0" style="min-height:800px !important">
                    <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center">{{$data->name}}</h5>
                        <h6 class="card-price text-center">{{$data->new_price}} AED<span class="period"></span></h6>
                        <hr>
                        @if($data->subscription_details)
                        <ul class="fa-ul">
                            @foreach($data->subscription_details as $details)
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>{{$details->feature}}</li>
                            @endforeach
                        </ul>
                        @endif
                        <div class="d-grid">
                            <a href="{{route('choose-subscription',$data->id)}}"
                                class="btn btn-primary text-uppercase">Subscribe Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .. -->
            @endforeach

            @endif

        </div>

        <div class="row">
            <div class="frame-130">
                <h6>Comparing Meetendo Plans</h6>
            </div>
        </div>


        <div class="row">


            <div class="table table-responsive">
                <table class="table table-striped fa-check text-successtable-border border-light">
                    <thead class="border-light">
                        <tr>
                            <th scope="col"></th>
                            @if($subscriptions_table)
                            @foreach($subscriptions_table as $data2)
                            <th scope="col" style="text-align: center;">
                                <p class="font-weight-bold p-2">{{$data2->name}}</p>
                            </th>
                            @endforeach
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if($sub_plan_detail)
                        @foreach($sub_plan_detail as $data3)
                        <tr>
                            <th scope="row">
                                <p class="font-weight-normal p-2">{{$data3->name}}</p>
                            </th>
                            @if($subscriptions_table)
                            @foreach($subscriptions_table as $data2)
                            <th scope="col" style="text-align: center;">
                                @php
                                $List = explode(',', $data3->sub_ids);
                                @endphp
                                @if(in_array($data2->id,$List))
                                <i class="fa fa-check text-success"></i>
                                @else
                                <i class="fa fa-times text-danger"></i>
                                @endif
                            </th>
                            @endforeach
                            @endif
                        </tr>
                        @endforeach
                        @endif


                        <tr>
                            <th></th>
                            @if($subscriptions_table)
                            @foreach($subscriptions_table as $data2)
                            <th style="text-align: center;">
                                <a href="{{route('choose-subscription',$data2->id)}}"
                                    class="btn btn-primary text-uppercase">Subscribe Now</a>
                            </th>
                            @endforeach
                            @endif
                        </tr>


                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>

@endsection