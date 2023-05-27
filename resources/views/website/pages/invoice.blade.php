<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base_url" content="{{ url('/') }}">
    
    <?php $color = \App\AdminSetting::find(1)->color; ?>
    <style>
        :root{
            --primary_color : <?php echo $color ?>;
            /* --primary_color_hover : <?php echo '#000000cc' ?>; */
            --primary_color_hover : <?php echo $color.'cc' ?>;
        }
        @media print
        {    
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
    </style>
    <meta name="main_color" content="{{ $color }}">
   
    <!-- Title -->
    <?php $app_name = \App\AdminSetting::find(1)->app_name; ?>
    <?php $logo = \App\AdminSetting::find(1)->black_logo; ?>
    <title>{{$app_name}}</title>

    <!-- Favicon -->
    <?php $favicon = \App\AdminSetting::find(1)->favicon; ?>
    <link href="{{asset('storage/images/app/'.$favicon)}}" rel="icon" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('includes/website/css/style.css')}}">
    <script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
   
</head>
<body>
    <!-- start per-loader -->
    <div class="loader-container">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <script>
        var preloader = $('.loader-container');
        preloader.delay('500').fadeOut(2000);
    </script>
<!-- end per-loader -->


<!-- ================================
    START INVOICE AREA
================================= -->
<section class="invoice-area padding-top-80px padding-bottom-80px">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="block-card">
                    <div class="block-card-header d-flex flex-wrap align-items-center justify-content-between">
                        <div class="invoice-logo">
                            <img src="{{asset('storage/images/app/'.$logo)}}" alt="logo" width="200">
                        </div>
                        <h2 class="widget-title pb-0 font-size-30 line-height-30">{{__('layout.Invoice')}}</h2>
                    </div>
                    <div class="block-card-body">
                        <div class="invoice-item mb-5">
                            <ul class="list-items text-right">
                                <li class="mb-1"><span class="text-color font-weight-semi-bold">{{__('layout.Appointment ID')}}:</span> {{$booking->booking_id}}</li>
                                <li class="mb-1"><span class="text-color font-weight-semi-bold">{{__('layout.Service Place')}}:</span> {{$booking->booking_at}}</li>
                                <li class="mb-1"><span class="text-color font-weight-semi-bold">{{__('layout.Date')}}:</span> {{$booking->date}} </li>
                                <li class="mb-1"><span class="text-color font-weight-semi-bold">{{__('layout.Time')}}:</span> {{$booking->start_time}} </li>
                                <li class="mb-1"><span class="text-color font-weight-semi-bold">{{__('layout.Status')}}:</span> {{$booking->booking_status}} </li>
                            </ul>
                        </div><!-- end invoice-item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="invoice-info">
                                        <h3 class="widget-title pb-2">{{__('layout.Salon')}}:</h3>
                                        <ul class="list-items">
                                            <li class="mb-1"> {{$booking->salon->name}} </li>
                                            <li class="mb-1"> {{$booking->salon->address}}, </li>
                                            <li class="mb-1">{{$booking->salon->city}},{{$booking->salon->state}},{{$booking->salon->country}}</li>
                                            <div class="invoice-logo">
                                                <img src="{{asset('storage/images/salon logos/'.$booking->salon->logo)}}" alt="logo" width="200">
                                            </div>
                                        </ul>
                                    </div><!-- end invoice-info -->
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="invoice-info">
                                        <h3 class="widget-title pb-2">{{__('layout.To')}}:</h3>
                                        <ul class="list-items">
                                            <li class="mb-1">{{$booking->user->name}}</li>
                                            <li class="mb-1">{{$booking->user->email}}</li>
                                            <li class="mb-1">{{$booking->user->code}}{{$booking->user->phone}}</li>
                                        </ul>
                                    </div><!-- end invoice-info -->
                                </div><!-- end col-lg-6 -->
                            </div><!-- end row -->
                        </div><!-- end invoice-item -->
                        <div class="invoice-item mt-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="my-table table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>{{__('layout.Service')}}</th>
                                                    <th>{{__('layout.Price')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($booking->services as $item)
                                                    <tr>
                                                        <td> {{$item->name}} </td>
                                                        <td> {{$item->price}}{{$currency}} </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div><!-- end table-responsive -->
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-3 ml-auto">
                                    <ul class="list-items list--items text-right">
                                        @php
                                            $subtotal =  $booking->payment;
                                            $subtotal =  $subtotal - $booking->extra_charges;
                                            $subtotal =  $subtotal + $booking->discount;
                                        @endphp
                                        <li><span class="text-color mr-3">{{__('layout.Subtotal')}}:</span> {{$currency}}{{$subtotal}} </li>
                                        @if ($booking->booking_at == "Home")
                                            <li><span class="text-color mr-3">{{__('layout.Extra Charges')}}:</span> {{$currency}}{{$booking->extra_charges}} </li>
                                        @endif
                                        @if ($booking->discount != 0)
                                            <li><span class="text-color mr-3">{{__('layout.Discount')}}:</span> -{{$currency}}{{$booking->discount}} </li>
                                        @endif
                                        <li><span class="text-color mr-3">{{__('layout.Total Amount')}}:</span> {{$currency}}{{$booking->payment}}  </li>
                                    </ul>
                                    @if ($booking->payment_status)
                                        <p class="text-right font-weight-medium">{{__('layout.Paid via')}} {{ $booking->payment_type == "LOCAL"? 'Cash':'Stripe'}}</p>
                                    @else
                                        <p class="text-right font-weight-medium">{{__('layout.Payment Pending')}}  </p>
                                    @endif
                                </div><!-- end col-lg-4 -->
                            </div><!-- end row -->
                        </div><!-- end invoice-item -->
                    </div>
                </div><!-- end block-card -->
            </div><!-- end col-lg-10 -->
        </div><!-- end row -->
        <div class="row no-print">
            <div class="col-lg-12">
                <div class="btn-box mt-4 text-center">
                    <a href="javascript:window.print()" class="btn-gray mr-2">
                        <i class="la la-print mr-2"></i>{{__('layout.Print this Invoice')}}
                    </a>
                    <a href="{{ url('/') }}" class="btn-gray">
                        <i class="la la-backward mr-2"></i>{{__('layout.Back to Home')}}
                    </a>
                </div><!-- end btn-box -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end invoice-area -->
<!-- ================================
    END INVOICE AREA
================================= -->

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="la la-arrow-up" title="Go top"></i>
</div>

<!-- Template JS Files -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>