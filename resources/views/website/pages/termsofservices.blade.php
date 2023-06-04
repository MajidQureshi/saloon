@extends('website.layouts.newmaster')
@section('website_content')
{{-- @include('website.layouts.hero') --}}
<?php $setting = \App\AdminSetting::find(1) ?>


<section class="sales__section">

<div class="mobileonly" style="font-size:40px; font-weight: 600;">Terms of Service</div>
<div class="sales__section__content" style="width:90%">
    <h2 class="sales__section__content-title">
        1. Introduction
    </h2>
    <p style="font-size:16px;">
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
    </p>
    <h2 class="sales__section__content-title">
        2. Appointments
    </h2>
    <p style="font-size:16px;">
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
    </p>
    <h2 class="sales__section__content-title">
        3. Payments
    </h2>
    <p style="font-size:16px;">
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
    </p>
    <h2 class="sales__section__content-title">
        4. Indemnification
    </h2>
    <p style="font-size:16px;">
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
    </p>
    <h2 class="sales__section__content-title">
        5. Liability Disclaimer
    </h2>
    <p style="font-size:16px;">
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
    </p>
</div>

<div>
    <img
    class="appointment__image"
    src="../assests/shared/termsofservice.webp"
    alt="" style="max-width: 70%;padding-top: 80px;padding-left: 50px;"
/>
</div>

<div
    class="sales__section__content-buttons sales__section__content-buttons--mobile"
>
    <a href="../html/subscription.html"
        ><button>Subscribe Now</button></a
    >
    <a href="">Check our Plans</a>
</div>
</section>





<?php $mapkey = \App\AdminSetting::find(1)->mapkey; ?>
<script src="https://maps.googleapis.com/maps/api/js?key={{$mapkey}}&libraries=places&callback=initAutocomplete"  defer></script>

@endsection