@extends('website.layouts.newmaster')
@section('website_content')
{{-- @include('website.layouts.hero') --}}
<?php $setting = \App\AdminSetting::find(1) ?>

<header class="container subscription__header">
            <h1>Subscriptions & Pricing Suits All Size of Businesses</h1>
            <p>
                No matter what size your business is, we have a plan suited to
                your needs. Our flexible subscription plans offer you the best
                value and performance for any business, big or small.
            </p>
        </header>

        <section class="subscriptions__section">
            <div class="subscription__background"></div>

            <div
                class="subscriptions__section-card subscriptions__section-card--gold"
            >
                <header class="card__header">
                    <h2 class="card__header-title">Monthly Gold</h2>
                    <p class="card__header-paragraph">
                        Get 3 Months For FREE with this Pack, plus all these
                        features
                    </p>
                    <span class="card__header-price--old"> 799 AED</span>
                    <span class="card__header-price"> 399 AED</span>
                </header>
                <ul class="card__list">
                    <li>Silver Feature</li>
                    <li>Online Booking</li>
                    <li>Online booking Payment</li>
                    <li>Shop booking SMS Notification</li>
                    <li>Online booking system</li>
                    <li>Unlimited employee definition</li>
                    <li>Unlimited Client Definition</li>
                    <li>Unlimited Services Definition</li>
                    <li>Shop Reports Access</li>
                    <li>Mobile appointment booking integration</li>
                    <li>Client invoices</li>
                    <li>5% AED online booking transaction</li>
                    <li>3000 AED Setup fee</li>
                </ul>
                <button class="card__button card__button__gold">
                    <a href="../html/gold.html"> Subscribe Now</a>
                </button>
            </div>

            <div
                class="subscriptions__section-card subscriptions__section-card--silver"
            >
                <img src="../assests/subscription/artisan.png" alt="" />

                <header class="card__header">
                    <h2 class="card__header-title">Free Silver</h2>
                    <p class="card__header-paragraph">
                        Start for free with our free Silver Pack to get these
                        features
                    </p>
                    <span class="card__header-price">00 AED</span>
                </header>
                <ul class="card__list">
                    <li>Mobile application advertisement</li>
                    <li>show your current available services</li>
                    <li>
                        show your current available artist based on his / her
                        specialty
                    </li>
                    <li>see your customer reviews</li>
                    <li>see your location on the Smartcita map</li>
                    <li>Book a ride to your location Using uber easily</li>
                    <li>Shop Photos on the mobile application</li>
                    <li>Your phone number will appear in the app</li>
                    <li>No Setup fees</li>
                </ul>
                <button class="card__button">
                    <a href="../html/silver.html"> Subscribe Now</a>
                </button>
            </div>

            <div
                class="subscriptions__section-card subscriptions__section-card--platinum"
            >
                <img
                    src="../assests/subscription/platniumBackground.png"
                    alt=""
                />

                <header class="card__header">
                    <h2 class="card__header-title">Yearly Platinum</h2>
                    <p class="card__header-paragraph">
                        Pay Yearly and free months to enhance your reach with
                        Meetendo
                    </p>
                    <span class="card__header-price">3600 AED</span>
                </header>
                <ul class="card__list">
                    <li>Same as Gold Features</li>
                    <li>With limited time offer</li>
                    <li>Discounted Price</li>
                    <li>+6 Months free</li>
                    <li>3000 AED Setup fees</li>
                </ul>
                <button class="card__button">
                    <a href="../html/plat.html"> Subscribe Now</a>
                </button>
            </div>
        </section>

        <section class="container comparison__section">
            <h2>Comparing Meetendo Plans</h2>
            <div class="comparison__section-boxs">
                <div class="comparison__section-box">
                    <div class="comparison__section-div">
                        <ul class="comparison__section-list">
                            <li>Pay with what you have</li>
                            <li>Free Trials</li>
                            <li>24/7 Support System</li>
                            <li>Switch or Cancel Anytime</li>
                        </ul>
                    </div>

                    <div class="comparison__section-scroll">
                        <p>Scroll Horizontally for plans features</p>
                        <img
                            src="../assests/subscription/arrow-right.svg"
                            alt="arrow-right"
                        />
                    </div>
                    <!--  -->
                    <div class="comparison__section-plans">
                        <ul>
                            <li>No Setup fees</li>
                            <li>Showing in Mobile application</li>
                            <li>Show your current available services</li>
                            <li>Show your current available artist</li>
                            <li>See your customer reviews</li>
                            <li>See your location on the Smartcita map</li>
                            <li>Shop Photos on the mobile application</li>
                            <li>Online booking</li>
                            <li>Online booking Payment</li>
                            <li>Shop booking SMS Notification</li>
                            <li>Shop Booking Email Notification</li>
                            <li>Online booking system</li>
                            <li>Unlimited employee definition</li>
                            <li>Unlimited Client Definition</li>
                            <li>Unlimited Services Definition</li>
                            <li>Shop Reports Access</li>
                            <li>Mobile appointment booking integration</li>
                            <li>Client invoices</li>
                            <li>2,9% +2 AED online booking transaction</li>
                            <li>One Time Setup fees 3000 AED</li>
                            <li>One Time Setup fees 3000 AED</li>
                            <li>
                                3 months free Subscription for a Booking system
                            </li>
                            <li>6 months Free Subscription for booking</li>
                            <li>5% Online Booking Fees</li>
                        </ul>
                    </div>
                </div>
                <div class="table__div">
                    <div class="table-headers">
                        <div class="comparison__section-box">
                            <h3>Free Silver</h3>
                            <p>Start with 3 Months Free</p>
                            <a href="../html/silver.html">Subscribe Now</a>
                        </div>
                        <div class="comparison__section-box">
                            <h3>Monthly Partner</h3>
                            <p>Start with 3 Months Free</p>
                            <a href="../html/gold.html">Subscribe Now</a>
                        </div>

                        <div class="comparison__section-box">
                            <h3>Yearly Platinum</h3>
                            <p>Start with 3 Months Free</p>
                            <a href="../html/plat.html">Subscribe Now</a>
                        </div>

                        <div class="comparison__section-box">
                            <h3>Diamond Partner</h3>
                            <p>Start with 3 Months Free</p>
                            <a href="">Subscribe Now</a>
                        </div>
                    </div>
                    <table>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="../assests/subscription/dash.svg"
                                    alt="None"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                            <td>
                                <img
                                    src="../assests/subscription/purple-check.svg"
                                    alt="Check mark"
                                />
                            </td>
                        </tr>
                        <tr class="comparison__section-buttons">
                            <td>
                                <a href="../html/silver.html">
                                    <button class="comparison__section-button">
                                        Subscribe Now
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="../html/gold.html">
                                    <button class="comparison__section-button">
                                        Subscribe Now
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="../html/plat.html">
                                    <button class="comparison__section-button">
                                        Subscribe Now
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="">
                                    <button class="comparison__section-button">
                                        Subscribe Now
                                    </button>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>

        <section class="container details__section">
            <div class="details__section-content">
                <h2>You Need More Details</h2>
                <p>
                    If you have any questions about our pricing or need help
                    understanding it, please visit our support page for more
                    information.
                </p>
                <a href="{{ url('/support') }}"><button>Go To Support Page</button></a>
            </div>
            <img
                class="details__section-image"
                src="../assests/subscription/FAQ.png"
                alt="FAQ Image"
            />
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