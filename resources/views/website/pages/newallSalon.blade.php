@extends('website.layouts.salonmaster')
@section('website_content')
{{-- @include('website.layouts.hero') --}}

<section class="salon__selection__section">
            <div class="salon__select">
                <label
                    class="appointment__form__label--category"
                    for=""
                ></label>

                <input type="text" placeholder="Salon Type" />
            </div>
            <div class="salon__select">
                <label
                    class="appointment__form__label--category"
                    for=""
                ></label>

                <input type="text" placeholder="Service Place" />
            </div>
            <div class="salon__select">
                <label
                    class="appointment__form__label--category rating__label"
                    for=""
                ></label>

                <input type="text" placeholder="Rating" />
            </div>
            @foreach ($salons as $salon)
            <div onclick="window.location.href = '../html/single-salon.html'" class="salon__selection__section--card">
                <img src="../assests/salon/image 5.jpg" alt="Salon" />
                <div class="salon__selection__section--card--content">
                    <span class="salon__card--title">Salons</span>
                    <h3 class="salon__card--name">
                        <a href="{{ url('salon/'.$salon['salon_id']. '/'. Str::slug($salon['name'])) }}">{{ $salon['name'] }}</a><span>{{ $salon['rate'] }}</span>
                    </h3>
                    <p class="salon__card--text">
                    {{ $salon['desc'] }}
                    </p>
                    <div class="salon__card--features">
                        <span>{{ $salon['gender'] }}</span>
                        <span>{{ $salon['give_service'] }}</span>
                    </div>
                    <p class="salon__card--location">
                    {{ $salon['city'] }}, {{ $salon['country'] }}
                    </p>
                </div>
            </div>
            @endforeach
            
            
            @if(count($salons) > 18)
            <br>
            <div class="salon__section-button--container">
                <button class="salon__section-button">Load More</button>
            </div>
            @endif
           
        </section>

        <!-- <section class="join__section">
            <h2 class="join__section-title">
                You have a Business and want to join Meetendo ?
            </h2>

            <form class="join__section-form" action="">
                <label class="join__section-label"></label>

                <input
                    class="join__section-input"
                    type="text"
                    placeholder="Enter Your Email"
                />
                <input class="join__section-button" type="submit" />
            </form>
            <div class="join__section-overlay"></div>
        </section> -->

<?php $mapkey = \App\AdminSetting::find(1)->mapkey; ?>
<script src="https://maps.googleapis.com/maps/api/js?key={{$mapkey}}&libraries=places&callback=initAutocomplete"  defer></script>

@endsection