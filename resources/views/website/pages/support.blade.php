@extends('website.layouts.newmaster')
@section('website_content')
{{-- @include('website.layouts.hero') --}}
<?php $setting = \App\AdminSetting::find(1) ?>

<div class="header-background" style="top:0px;clip-path: polygon(0% 0%, 100% 0%, 100% 47%, 0% 60%);width: 100%;height: 150rem;"></div>
        


        <section class="sales__section" style="margin-top: 7rem !important;justify-content: left;">
            <div class="sales__section__content" style="width:100%;">
                <h2 class="sales__section__content-title">
                    Contact Us for the Support
                </h2>
                
                <p class="sales__section__content-text" style="width: 50ch;">
                    If you are having problems or issues with our product, please feel free to contact us at insert company email address here. We would be more than happy to help and answer any questions you may have. To expedite the process, please include as much information as possible and provide a detailed explanation of what is not working accurately. We welcome any feedback or suggestions concerning the product or services that we offer; if you have an idea for improvement, don't hesitate to let us know
                </p>

                <div>
                    <img src="../assests/shared/support.webp" alt="Meetendo logo" class="sales__section-img" style="max-width: 60%;margin-left: 15%;"/>   
                </div> 
                
            </div>
            <div class="sales__section__content" style="width: 100%;">
                <form class="appointment__form" onsubmit="return test();" style="border-radius: 3.2rem;background-color: #e8e4fb;padding-block: 2.4rem;" action="{{url('/submitsupport')}}" method="post">
                    <div class="first_success_div hide">
                        We received your support ticket We'll respond you soon
                    </div>
                    <div class="appointment__form__box" style="padding: 0px 25px 15px 25px;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />    
                    <label class="appointment__form__label--search" style="left:4rem"></label>
                        <input
                            class="appointment__form__input"
                            type="text"
                            name="problem"
                            placeholder="What is your problem" required
                        />
                    </div>
                    <div class="appointment__form__box" style="padding: 0px 25px 15px 25px;">
                        <label class="appointment__form__label--email" style="left:4rem" ></label>
                        <input
                            class="appointment__form__input"
                            type="email"
                            name="email"
                            placeholder="Email" required
                        />
                    </div>
                    <div class="appointment__form__box" style="padding: 0px 25px 15px 25px;">
                        <label class="appointment__form__label--search" style="left:4rem" ></label>
                        <textarea class="appointment__form__input" type="text" rows="6" placeholder="Your problem please" name="problem_description" required></textarea>
                            
                        
                    </div>
                    <div class="form__buttons" style="padding: 0px 25px 15px 25px;">
                        <button class="form__buttons__search" type="submit" id="submitsupport">Submit</button>
                        
                    </div>
                </form>
            </div>
            
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    function test(){
        $(".first_success_div").removeClass("hide");
        $(".first_success_div").addClass("show");
        return false;
    }
    $("#submitsupport").click(function(){
        // alert("teeeee");
    })
</script>
@endsection