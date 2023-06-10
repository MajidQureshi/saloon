
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="A multi-step form is a long-form broken down into multiple pieces/steps to make an otherwise long form less intimidating for visitors to complete." name="description">
    <meta content="Sam Norton" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registration Form</title>
    <!-- FAVICONS -->
    <link href="favicons/apple-icon-57x57.png" rel="apple-touch-icon" sizes="57x57">
    <link href="favicons/apple-icon-60x60.png" rel="apple-touch-icon" sizes="60x60">
    <link href="favicons/apple-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="favicons/apple-icon-76x76.png" rel="apple-touch-icon" sizes="76x76">
    <link href="favicons/apple-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="favicons/apple-icon-120x120.png" rel="apple-touch-icon" sizes="120x120">
    <link href="favicons/apple-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">
    <link href="favicons/apple-icon-152x152.png" rel="apple-touch-icon" sizes="152x152">
    <link href="favicons/apple-icon-180x180.png" rel="apple-touch-icon" sizes="180x180">
    <link href="favicons/android-icon-192x192.png" rel="icon" sizes="192x192" type="image/png">
    <link href="favicons/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
    <link href="favicons/favicon-96x96.png" rel="icon" sizes="96x96" type="image/png">
    <link href="favicons/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
    <link href="/manifest.json" rel="manifest">
    <meta content="#ffffff" name="msapplication-TileColor">
    <meta content="favicons/ms-icon-144x144.png" name="msapplication-TileImage">
    <meta content="#ffffff" name="theme-color">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="{{ asset('register/css/style.css') }}" rel="stylesheet">
    <!-- FONT -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
    <!-- CONTAINER -->
    <div class="container d-flex align-items-center min-vh-100">
        <div class="row g-0 justify-content-center">
            <!-- TITLE -->
            <div class="col-lg-4 offset-lg-1 mx-0 px-0">
                <div id="title-container">
                    <div style="
    text-align: left;
    margin-left: 7px;
"><img src="{{ asset('assests/shared/logo.webp') }}" alt="Meetendo logo" class="nav__logo__img" style="
    height: 30px;
    text-align: left;
">
<p id="short_heading" style="color: #9A9AB0;text-transform: uppercase;font-size: 10px;margin-top: -20px;margin-left: 10px;">Meetendo Business Registration Process</p>
</div><h2 id="main_heading">Manage Your Customer in easy way</h2>
                    <img id="main_pic" class="covid-image" src="{{ asset('register/img/step1.webp') }}" style="max-height: 330px;margin-left: -20px;width: 110%;">
                    
                    <!-- <h3>Self Checker Form</h3> -->
                    
                </div>
            </div>
            <!-- FORMS -->
            <div class="col-lg-7 mx-0 px-0">
                <div class="progress">
                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%;background-color: #5541d7 !important;"></div>
                </div>
                <div id="qbox-container" style="min-height: 98%;padding-left: 0px;padding-right: 0px;">
                    <form class="needs-validation" id="form-wrapper" method="post" name="form-wrapper" novalidate="">
                        <div id="steps-container">
                            <div class="step">
                                <h4>Signup to your new Dashboard</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- <button id="google-btn" type="button" style="width: 300px;margin-top:1px !important;">Signup with Google</button>  -->
                                        <img src="{{ asset('register/img/signin_google.png') }}" style="height: 85%;cursor: pointer;width: 100%;border: 2px solid #706f6f;border-radius: 7px;border: none;margin-top:-20px">
                                    </div>
                                    <!-- <div class="col-lg-4">                                        
                                        <img src="./img/refresh.webp" style="height: 50px;cursor: pointer;">
                                        <img src="./img/refresh.webp" style="height: 50px;cursor: pointer;float:right;">
                                    </div> -->
                                    <!-- <div class="col-lg-2">                                        
                                        <img src="./img/refresh.webp" style="height: 50px;cursor: pointer;">
                                    </div> -->
                                </div>
                                <hr style="margin-top: -15px;">
                                <div class="first_error_div hide">
                                    Please fill all the mandatory fields and checked agree with Terms of Services
                                </div>    
                                <div class="user_exist_error_div hide">
                                    User already exist
                                </div> 
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <label class="form-label">Full Name</label> 
                                                <input class="form-control" id="full_name" name="full_name" type="text" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <label class="form-label">Mobile Number</label> 
                                                <input class="form-control" id="mobile_number" name="mobile_number" type="tel" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-12" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <label class="form-label">Email</label> 
                                                <input class="form-control" id="email" name="email" type="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <label class="form-label">Password</label> 
                                                <input class="form-control" id="password" name="password" type="password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_2_yes" name="q_2" type="checkbox" value="agree"> 
                                                <label class="form-check-label question__label" style="border: none;display:inline-block;" for="q_2_yes">I have read and agree to the </label> <a style="color:#5541D7; cursor: pointer;" id="termsofservices" >Terms of Services</a> 
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="step">
                                <h4>Tell us about your company</h4>
                                <p>Thousands Company like yours are manage their project and team in easy way</p>
                                <div class="second_error_div hide">
                                    Please fill all the mandatory fields and checked agree with Terms of Services
                                </div> 
                                <div class="row">
                                    <div class="col-lg-12" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <label class="form-label">Your Company Name</label> 
                                                <input class="form-control" id="company_name" name="company_name" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <label class="form-label">Your Company Description</label> 
                                                <input class="form-control" id="company_desc" name="company_desc" type="text">
                                            </div>
                                        </div>
                                    </div>

                                    

                                </div>

                                <div class="row"> 
                                    <div class="col-lg-12" style="margin-top: 25px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <label class="form-label">How many employees</label> 
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    

                                </div>

                                <div class="row"> 
                                    <div class="col-lg-4" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_33_yes" name="q_33" type="radio" value="1-10" checked> 
                                                <label class="form-check-label question__label" for="q_33_yes" style="">1- 10</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_34_yes" name="q_33" type="radio" value="20-30"> 
                                                <label class="form-check-label question__label" for="q_34_yes" style="">20 - 30</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_35_yes" name="q_33" type="radio" value="50+"> 
                                                <label class="form-check-label question__label" for="q_35_yes" style="">50+</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="step">
                                <h4>Complete your company profile</h4>
                                <p>Thousands Company like yours are manage their project and team in easy way</p>
                                <div class="third_error_div hide">
                                    Please fill all the mandatory fields and checked agree with Terms of Services
                                </div>
                                <div class="row">
                                    <div class="col-lg-6" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <label class="form-label">Select Your Company Logo</label> 
                                                <input class="form-control" id="company_logo" name="company_logo" type="file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <label class="form-label">Select Your Trade Licence</label> 
                                                <input class="form-control" id="licence" name="licence" type="file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <label class="form-label">Your ID Copy</label> 
                                                <input class="form-control" id="id_copy" name="id_copy" type="File">
                                            </div>
                                        </div>
                                    </div>

                                    

                                </div>

                                <div class="row"> 
                                    <div class="col-lg-12" style="margin-top: 15px;">
                                        <div class="q-box__question">
                                            <label class="form-label">Your Company Location</label> 
                                            <input class="form-control" id="company_location" name="company_location" type="text">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="step">
                                <h4>What's your company interest?</h4>
                                <div class="fourth_error_div hide">
                                    Please fill all the mandatory fields and checked agree with Terms of Services
                                </div>
                                <div class="row"> 
                                    <div class="col-lg-12" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <label class="form-label">We want to know what's your company interest</label> 
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-lg-4" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_44_yes" name="q_44" type="radio" value="Male" checked> 
                                                <label class="form-check-label question__label" for="q_44_yes" style="">Male</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_45_yes" name="q_44" type="radio" value="Female"> 
                                                <label class="form-check-label question__label" for="q_45_yes" style="">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_46_yes" name="q_44" type="radio" value="Both"> 
                                                <label class="form-check-label question__label" for="q_46_yes" style="">Both</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row"> 
                                    <div class="col-lg-12" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <label class="form-label">We want to know where do you serve your customer</label> 
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-lg-5" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_55_yes" name="q_55" type="radio" value="Work Location" checked> 
                                                <label class="form-check-label question__label" for="q_55_yes" style="">Work Location</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_56_yes" name="q_55" type="radio" value="Home Services"> 
                                                <label class="form-check-label question__label" for="q_56_yes" style="margin-left: -20px;">Home Services</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2" style="margin-top: 15px;margin-left: -22px;width: 21%;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_57_yes" name="q_55" type="radio" value="Both"> 
                                                <label class="form-check-label question__label" for="q_57_yes" style="padding-left: 38px;">Both</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                
                                <div class="row">
                                    <div class="col-lg-12" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <label class="form-label">Extra Charges for Home Services</label> 
                                                <input class="form-control" id="extra_charges_home_services" name="extra_charges_home_services" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <label class="form-label">Company Overview</label> 
                                                <input class="form-control" id="company_overview" name="company_overview" type="text">
                                            </div>
                                        </div>
                                    </div>

                                    

                                </div>

                                

                            </div>
                            <div class="step">
                                <h4>What's your company working days</h4>
                                <p>We want to know What is your working Days</p>
                                <div class="fifth_error_div hide">
                                    Please fill all the mandatory fields and checked agree with Terms of Services
                                </div>
                                <div class="row"> 
                                    <div class="col-lg-4" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_66_yes" name="q_66[]" type="checkbox" value="Monday"> 
                                                <label class="form-check-label question__label" for="q_66_yes" style="">Monday</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_71_yes" name="q_66[]" type="checkbox" value="Tuesday"> 
                                                <label class="form-check-label question__label" for="q_71_yes" style="">Tuesday</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_72_yes" name="q_66[]" type="checkbox" value="Wednesday"> 
                                                <label class="form-check-label question__label" for="q_72_yes" style="">Wednesday</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_73_yes" name="q_66[]" type="checkbox" value="Thursday"> 
                                                <label class="form-check-label question__label" for="q_73_yes" style="">Thursday</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_74_yes" name="q_66[]" type="checkbox" value="Friday"> 
                                                <label class="form-check-label question__label" for="q_74_yes" style="">Friday</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_75_yes" name="q_66[]" type="checkbox" value="Saturday"> 
                                                <label class="form-check-label question__label" for="q_75_yes" style="">Saturday</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_76_yes" name="q_66[]" type="checkbox" value="Sunday"> 
                                                <label class="form-check-label question__label" for="q_76_yes" style="">Sunday</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_77_yes" name="q_66[]" type="checkbox" value="All Week" checked> 
                                                <label class="form-check-label question__label" for="q_77_yes" style="">All Week</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <p style="margin-bottom: 5px;margin-top: 30px;">We want to know What is your opening and closing times</p>
                                <div class="row">
                                    <div class="col-lg-4" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_88_yes" name="q_88" type="radio" value="9am - 6pm" checked> 
                                                <label class="form-check-label question__label" for="q_88_yes" style="padding-left:45px">9am - 6pm</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_89_yes" name="q_88" type="radio" value="10am - 7pm"> 
                                                <label class="form-check-label question__label" for="q_89_yes" style="padding-left:42px">10am - 7pm</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="margin-top: 15px;">
                                        <div class="form-check ps-0 q-box">
                                            <div class="q-box__question">
                                                <input class="form-check-input question__input" id="q_90_yes" name="q_88" type="radio" value="9am - 12pm"> 
                                                <label class="form-check-label question__label" for="q_90_yes" style="padding-left:42px">9am - 12pm</label>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                

                                    

                              

                                

                            </div>

                           
                            <div class="step">
                                <div style="text-align: center;">
                                    <img src="{{ asset('register/img/blue-env.png') }}" style="height: 100px;">
                                </div>
                                
                                <div class="col-lg-12" style="text-align: center;">
                                    <h4>Thank You</h4>
                                    <p>Warmest congratulations on your achievement! Wishing you even more success in the future. </p>
                                    <button id="google-btn" type="button" class="go_to_owner" style="width: 300px;margin-top:1px !important;">Continue to Dashboard</button> 
                                    
                                </div>
                                
                            </div>
                            <div class="step">
                                <div class="mt-1">
                                    <div class="closing-text">
                                        <h4>That's about it! Stay healthy!</h4>
                                        <p>We will assess your information and will let you know soon if you need to get tested for COVID-19.</p>
                                        <p>Click on the submit button to continue.</p>
                                    </div>
                                </div>
                            </div>
                            <div id="success">
                                <div class="mt-5">
                                    <h4>Success! We'll get back to you ASAP!</h4>
                                    <p>Thanks for registering.</p>
                                    <a class="back-link" href="">Go back from the beginning ➜</a>
                                </div>
                            </div>
                        </div>
                        <div id="q-box__buttons" style="text-align: center;">
                            <button id="prev-btn" type="button" style="float:left;margin-left: 60px;background-color: #959595;">Previous</button> 
                            <button id="next-btn" type="button" style="float:right;margin-right: 60px;">Next</button> 
                            <button id="submit-btn" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- PRELOADER -->
    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terms of Services</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>This website (the "Site") is a service made available by INSERT YOUR BUSINESS NAME ("we", "us" or "our"). Your access to and use of the Site is subject to your acceptance of and compliance with these Terms of Service (these "Terms"). These Terms apply to all visitors, users and others who access or use the Site. By accessing or using the Site you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Site.
                    </p>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">I Agree</button>
                    
                </div>
            </div>
        </div>
    </div>
    <img src="3sec.gif" id="gif" style="display: none;">
    <div id="preloader-wrapper">
        <div id="preloader"></div>
        <div class="preloader-section section-left"></div>
        <div class="preloader-section section-right"></div>
    </div>
    <script src="{{ asset('register/js/script.js') }}">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<!-- Static App Form Collection Script -->
<script src="https://static.app/js/static-forms.js" type="text/javascript"></script>
<!-- Static App Form Collection Script -->
<script src="https://static.app/js/static-forms.js" type="text/javascript"></script>
<!-- Static App Form Collection Script -->
<script src="" type="text/javascript"></script>
<!-- Static App Form Collection Script -->
<script src="" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        // $("#next-btn").click(function(e){
        //     // alert("nnnn");
        //     let full_name = $("#full_name").val();
        //     let mobile_number = $("#mobile_number").val();
        //     let email = $("#email").val();
        //     let password = $("#password").val();
        //     let company_name = $("#company_name").val();
        //     let company_desc = $("#company_desc").val();
        //     let how_many_employees = $('input[name="q_33"]:checked').val();
        //     let company_location = $("#company_location").val();
        //     let company_interest = $('input[name="q_44"]:checked').val();
        //     let serve_your_customer = $('input[name="q_55"]:checked').val();
        //     let extra_charges_home_services = $("#extra_charges_home_services").val();
        //     let company_overview = $("#company_overview").val();
        //     let company_working_days = $('input[name="q_66"]:checked').val();
        //     let opening_closing_times = $('input[name="q_88"]:checked').val();

        //     console.log(full_name);
        //     console.log(mobile_number);
        //     console.log(email);
        //     console.log(password);
        //     console.log(company_name);
        //     console.log(company_desc);
        //     console.log(how_many_employees);
        //     console.log(company_location);
        //     console.log(company_interest);
        //     console.log(serve_your_customer);
        //     console.log(extra_charges_home_services);
        //     console.log(company_overview);
        //     console.log(company_working_days);
        //     console.log(opening_closing_times);

            
        // })
        $("#termsofservices").click(function(){
            // $("#myModal").modal("show");
            window.location.href = "./termsofservices";
        });
        $(".go_to_owner").click(function(){
            $("#preloader-wrapper").attr("style", "display:block !important;");
            let full_name = $("#full_name").val();
            let mobile_number = $("#mobile_number").val();
            let email = $("#email").val();
            let password = $("#password").val();
            let company_name = $("#company_name").val();
            let company_desc = $("#company_desc").val();
            let how_many_employees = $('input[name="q_33"]:checked').val();
            let company_location = $("#company_location").val();
            let company_interest = $('input[name="q_44"]:checked').val();
            let serve_your_customer = $('input[name="q_55"]:checked').val();
            let extra_charges_home_services = $("#extra_charges_home_services").val();
            let company_overview = $("#company_overview").val();
            let company_working_days = $('input[name="q_66"]:checked').val();
            let opening_closing_times = $('input[name="q_88"]:checked').val();

            var fd = new FormData();
            var company_logo = $('#company_logo')[0].files;
            var licence = $('#licence')[0].files;
            var id_copy = $('#id_copy')[0].files;

            fd.append('company_logo',company_logo[0]);
            fd.append('licence',licence[0]);
            fd.append('id_copy',id_copy[0]);
            fd.append('_token','{{csrf_token()}}');
            fd.append('name',full_name);
            fd.append('phone',mobile_number);
            fd.append('email',email);
            fd.append('password',password);
            fd.append('company_name',company_name);
            fd.append('company_desc',company_desc);
            fd.append('how_many_employees',how_many_employees);
            fd.append('company_location',company_location);
            fd.append('company_interest',company_interest);
            fd.append('serve_your_customer',serve_your_customer);
            fd.append('extra_charges_home_services',extra_charges_home_services);
            fd.append('company_overview',company_overview);
            fd.append('company_working_days',company_working_days);
            fd.append('opening_closing_times',opening_closing_times);

            $.ajax({
                url:'{{URL::to("/submitbusinessregister")}}',
                type: "post",
                async:false,
                data:fd,
                dataType: 'json',
                contentType: false,
                processData: false,
                // data: { 
                //     name: full_name, 
                //     phone: mobile_number,
                    // _token: '{{csrf_token()}}',
                //     email: email,
                //     password: password,
                //     company_name: company_name,
                //     company_desc: company_desc,
                //     how_many_employees: how_many_employees,
                //     company_location: company_location,
                //     company_interest: company_interest,
                //     serve_your_customer: serve_your_customer,
                //     extra_charges_home_services: extra_charges_home_services,
                //     company_overview: company_overview,
                //     company_working_days: company_working_days,
                //     opening_closing_times: opening_closing_times
                //  },
                success: function (res) {},
                error: function (error) {},
            });
            setTimeout(() => {
                window.location.href = "./owner/login";
            }, 4000);
            // $('#gif').show(); 
            // alert('go');
            // window.location.href = "https://test.smartcita.com/owner/login";
            
        })
    });
</script>
</body>
</html>