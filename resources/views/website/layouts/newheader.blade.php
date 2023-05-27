<?php $setting = \App\AdminSetting::find(1); ?>


<header class="header--home" style="top: -1rem;position: absolute;z-index: -5;background-image: linear-gradient( to left top, #837dd3 0%, rgba(131, 125, 211, 0) 100% );clip-path: polygon(0% 0%, 100% 20%, 100% 100%, 0% 100%);width: 100%;height: 71rem;">
            <div class="appointment__content">
                
                <form class="appointment__form" style="background-color: hsl(var(--color-very-light-purple), 20);padding-block: 2.4rem;width: 47rem;border-radius: 3.2rem;padding-left: 25px;padding-right: 25px;" action="">
                    <h2 class="join__section-title" style="text-align: left;font-size: 22px;color: #000;">
                        Hey, Welcome Back !
                    </h2>
                    
                    <div class="appointment__form__box">
                        <!-- <label class="join__section-label"></label> -->
                        <label class="appointment__form__label--email" for=""></label>
                        <input class="appointment__form__input" type="text" placeholder="Email">
                    </div>
                    <div class="appointment__form__box">
                        <label class="appointment__form__label--pin" for=""></label>

                        <input class="appointment__form__input" type="text" placeholder="Password">
                    </div>
                    
                    <div class="form__buttons">
                        <button class="form__buttons__search">Login</button>
                        <a href="#">
                            <span style="padding-left:30px; font-size:18px;">Forget Password ?</span>
                        </a>    
                    </div>

                    <div>
                        <span style="font-size:14px;">You dont have account, <a href="#">Create new Account Now</a></span>
                    </div>
                </form>
            </div>

            <div class="image__logincontainer"></div>
        </header>