@extends('website.layouts.master')
@section('website_content')
@include('website.layouts.breadcrumb', [
'title' => 'Subscription',
'headerData' => __('Subscribe'),
'url' => 'subscribe'
])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap');


.container1 {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #eee;
}

.container1 .card {
    height: 730px;
    width: 700px;
    background-color: #fff;
    position: relative;
    font-family: 'Rubik', sans-serif;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
}

.container1 .card .form {
    width: 100%;
    height: 100%;
    display: flex;
}

.container1 .card .left-side {
    width: 50%;
    background-color: #fff;
    height: 100%;
    object-fit: cover;
    /* background-image: url("https://imgur.com/1bGSNIo.jpg"); */
}

.summer {
    margin-top: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    text-align: center;
}

.summer h4 {
    color: #abb3b6;
}

.summer h2 {
    margin-top: 10px;
    color: #2f4d57;
}

.summer h3 {
    color: #f1c3bd;
    margin-top: 10px;
}




.container1 .card .right-side {
    width: 50%;
    background-color: #f8c1b8;
    height: 100%;
    padding: 20px;
    position: relative;
}

.checkout {
    display: flex;
    justify-content: center;
    align-items: center;

}

.checkout span {
    height: 25px;
    width: 25px;
    background-color: #fff;
    border-radius: 50%;
    position: absolute;
    top: -12px;
    right: -12px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.right-side h4 {
    margin-top: 30px;
}

.option {

    display: flex;
    justify-content: space-between;
    align-items: center;
}

.option img {
    width: 70px;
    cursor: pointer;
    opacity: 0.5;
    transition: all 0.5s;
}

.option img:hover {
    opacity: 1;
}

.input_text {
    margin-top: 40px;
    position: relative;
    width: 100%;
}

input[type="text"] {
    width: 100%;
    height: 45px;
    padding: 5px 10px;
    background-color: #f8c1b8;
    border: none;
    outline: 0;
    border-bottom: 1px solid #a07c77;
    transition: all 0.5s;

}


.input_text span {
    position: absolute;
    top: -15px;
    left: 10px;
    font-size: 13px;
    font-weight: 700;
    transition: all 0.5s;
}

.input_text input:focus {
    border-bottom: 1px solid #494dcf !important;

}

.input_text input:focus~span {
    color: #494dcf;
}

.input_div {
    display: flex;
    gap: 20px;
}

.check_btn {
    margin-top: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.check_btn button {
    height: 45px;
    width: 100%;
    background-color: #8198ef;
    border: none;
    outline: 0;
    color: #fff;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.5s;
}

.check_btn button:hover {
    background-color: #5a6baf;
}

.warning {
    border-bottom: 3px solid red !important;
}







@media (max-width:750px) {
    .container .card {
        max-width: 350px;
    }

    .container .card .right-side {

        width: 100%;
    }

    .container .card .left-side {
        display: none;
    }
}
</style>


<div class="container1">
    <div class="card">
        <div class="form">
            <div class="left-side">
                <div class="summer">
                    <h4>You are purchasing</h4>
                    <h2>{{$subscription->name}}</h2>
                    <h3>{{$subscription->new_price}} <span class="text-info">AED</span></h3>



                </div>

                <div class="pt-2" style="text-align: left;">

                    <ul class="p-2">
                        @foreach($subscription->subscription_details as $data)
                        <li>
                            <i class="fa fa-check text-info"></i>
                            {{$data->feature}}
                        </li>

                        @endforeach
                    </ul>

                </div>

            </div>
            <div class="right-side">
                <div class="checkout">
                    <h2>Payment</h2>

                </div>

                <div class="option">


                </div>
                <div class="input_text">
                    <input type="text" placeholder="">
                    <span>Cardholder Name</span>
                </div>
                <div class="input_text">
                    <input type="text" placeholder="0000 0000 0000 0000" data-slots="0" data-accept="\d" size="19">
                    <span>Card Number</span>
                </div>
                <div class="input_div">
                    <div class="input_text">
                        <input type="text" placeholder="mm/yyyy" data-slots="my">
                        <span>Expiry</span>
                    </div>
                    <div class="input_text">
                        <input type="text" placeholder="000" data-slots="0" data-accept="\d" size="3">
                        <span>CVC</span>
                    </div>
                </div>
                <div class="check_btn">
                    <button class="click">Pay</button>
                </div>


            </div>
        </div>
    </div>
</div>


@endsection