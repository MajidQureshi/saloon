
const progress = (value) => {
    document.getElementsByClassName('progress-bar')[0].style.width = `${value}%`;
 }
 
    let step = document.getElementsByClassName('step');
    let prevBtn = document.getElementById('prev-btn');
    let nextBtn = document.getElementById('next-btn');
    let submitBtn = document.getElementById('submit-btn');
    let form = document.getElementsByTagName('form')[0];
    let preloader = document.getElementById('preloader-wrapper');
    let bodyElement = document.querySelector('body');
    let succcessDiv = document.getElementById('success');
  
    form.onsubmit = () => { return false }
 
    let current_step = 0;
    let stepCount = 5
    step[current_step].classList.add('d-block');
    if(current_step == 0){
       prevBtn.classList.add('d-none');
       submitBtn.classList.add('d-none');
       nextBtn.classList.add('d-inline-block');
    }
 
 
    nextBtn.addEventListener('click', (e) => {
        current_step++;
        console.log(current_step);
        if(current_step == 1){
            // alert('cc');
            
            let full_name = $("#full_name").val();
            let mobile_number = $("#mobile_number").val();
            let email = $("#email").val();
            let password = $("#password").val();
            let agree = $('input[name="q_2"]:checked').val();
            let user_exist = 0;
            let firstflag = true;

            // console.log("mobile_number"+mobile_number);
            // console.log(mobile_number.slice(0, 2) == "05");
            console.log(agree);
            $(".first_error_div").addClass("hide");
            $(".first_error_div").removeClass("show");
            $("#full_name").removeClass("red_border");
            $("#mobile_number").removeClass("red_border");
            $("#email").removeClass("red_border");
            $("#password").removeClass("red_border");
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

            if(full_name == ""){
                console.log("firstname missing");
                $("#full_name").addClass("red_border");
                firstflag = false;
            }
            if(mobile_number == ""){
                console.log("mobile number missing");
                $("#mobile_number").addClass("red_border");
                firstflag = false;
            }
            if((mobile_number.slice(0, 2) == "05") == false)
            {
                console.log("invalid mobile");
                $("#mobile_number").addClass("red_border");
                firstflag = false;
            }
            if(email == ""){
                console.log("email missing");
                $("#email").addClass("red_border");
                firstflag = false;
            }
            if(!email.match(mailformat))
            {
                console.log("invalid email");
                $("#email").addClass("red_border");
                firstflag = false;
            }
            if(password == ""){
                console.log("password missing");
                $("#password").addClass("red_border");
                firstflag = false;
            }

            if(agree != "agree"){
                console.log("agree missing");
                firstflag = false;
            }

            if(email != ""){
                $.ajax({
                    url:'isexistuseremail',
                    type: "get",
                    async:false,
                    data: { 
                        email: email,
                    },
                    success: function (res) {
                        if(res == '1'){
                            console.log('exist')
                            user_exist = 1;
                            
                            
                            $("#email").addClass("red_border");
                            return user_exist;
                        }
                    },
                    error: function (error) {},
                });
            }
            
            
            if(firstflag == false){
                $(".first_error_div").removeClass("hide");
                $(".first_error_div").addClass("show");
                current_step = 0;
                return false;
            }
            console.log(user_exist); 
            if(user_exist == 1){
                $(".user_exist_error_div").removeClass("hide");
                $(".user_exist_error_div").addClass("show");
                current_step = 0;
                return false;
            }

            $("#short_heading").text('Dazboard');
            $("#main_heading").text('Manage Your Project and Team in an easy way');
            $("#main_pic").attr("src", "register/img/step"+(current_step+1)+".webp");
            progress((100 / stepCount) * current_step);
        }
        if(current_step == 2){
            let company_name = $("#company_name").val();
            let company_desc = $("#company_desc").val();
            let how_many_employees = $('input[name="q_33"]:checked').val();
            let secondflag = true;

            console.log(how_many_employees);
            $(".second_error_div").addClass("hide");
            $(".second_error_div").removeClass("show");
            $("#company_name").removeClass("red_border");
            $("#company_desc").removeClass("red_border");
            
            if(company_name == ""){
                console.log("company_name missing");
                $("#company_name").addClass("red_border");
                secondflag = false;
            }
            if(company_desc == ""){
                console.log("company_desc missing");
                $("#company_desc").addClass("red_border");
                secondflag = false;
            }
           
            if(secondflag == false){
                $(".second_error_div").removeClass("hide");
                $(".second_error_div").addClass("show");
                current_step = 1;
                return false;
            }



            $("#short_heading").text('Dazboard');
            $("#main_heading").text('Manage Your Clients in an easy way');
            $("#main_pic").attr("src", "register/img/step2.webp");
            progress((100 / stepCount) * current_step);
        }
        if(current_step == 3){
            let company_location = $("#company_location").val();
            let company_logo = $("#company_logo").val();
            let licence = $("#licence").val();
            let id_copy = $("#id_copy").val();
            console.log(id_copy);
            let secondflag = true;

            $(".third_error_div").addClass("hide");
            $(".third_error_div").removeClass("show");
            $("#company_location").removeClass("red_border");
            $("#company_logo").removeClass("red_border");
            $("#licence").removeClass("red_border");
            $("#id_copy").removeClass("red_border");

            if(company_logo == ""){
                console.log("company_logo missing");
                $("#company_logo").addClass("red_border");
                secondflag = false;
            }

            if(licence == ""){
                console.log("licence missing");
                $("#licence").addClass("red_border");
                secondflag = false;
            }

            if(id_copy == ""){
                console.log("id_copy missing");
                $("#id_copy").addClass("red_border");
                secondflag = false;
            }

            if(company_location == ""){
                console.log("company_location missing");
                $("#company_location").addClass("red_border");
                secondflag = false;
            }
           
            if(secondflag == false){
                $(".third_error_div").removeClass("hide");
                $(".third_error_div").addClass("show");
                current_step = 2;
                return false;
            }

            $("#short_heading").text('');
            $("#main_heading").text('Serve Your Customer either at home or in your location');
            $("#main_pic").attr("src", "register/img/step2.webp");
            progress((100 / stepCount) * current_step);
        }
        if(current_step == 4){
            let company_interest = $('input[name="q_44"]:checked').val();
            let serve_your_customer = $('input[name="q_55"]:checked').val();
            let extra_charges_home_services = $("#extra_charges_home_services").val();
            let company_overview = $("#company_overview").val();
            let thirdflag = true;

            if(extra_charges_home_services == ""){
                console.log("extra_charges_home_services missing");
                $("#extra_charges_home_services").addClass("red_border");
                thirdflag = false;
            }
            if(company_overview == ""){
                console.log("company_overview missing");
                $("#company_overview").addClass("red_border");
                thirdflag = false;
            }
           
            if(thirdflag == false){
                $(".fourth_error_div").removeClass("hide");
                $(".fourth_error_div").addClass("show");
                current_step = 3;
                return false;
            }


            $("#short_heading").text('Dazboard');
            $("#main_heading").text('Manage your Working schedule');
            $("#main_pic").attr("src", "register/img/step"+(current_step+1)+".webp");
            progress((100 / stepCount) * current_step);
        }
        if(current_step == 5){
            let company_working_days = $('input[name="q_66"]:checked').val();
            let opening_closing_times = $('input[name="q_88"]:checked').val();
            // let fourthflag = true;

            // if(company_overview == ""){
            //     console.log("company_overview missing");
            //     $("#company_overview").addClass("red_border");
            //     fourthflag = false;
            // }
           
            // if(fourthflag == false){
            //     $(".fifth_error_div").removeClass("hide");
            //     $(".fifth_error_div").addClass("show");
            //     current_step = 4;
            //     return false;
            // }

            $("#short_heading").text('Dazboard');
            $("#main_heading").text('Thats it let us start our journey');
            $("#main_pic").attr("src", "register/img/step2.webp");
            $("#submit-btn").attr('style', 'display:none !important');
            $("#prev-btn").attr('style', 'display:none !important');
            progress((100 / stepCount) * current_step);
        }



       let previous_step = current_step - 1;
       if(( current_step > 0) && (current_step <= stepCount)){
         prevBtn.classList.remove('d-none');
         prevBtn.classList.add('d-inline-block');
         step[current_step].classList.remove('d-none');
         step[current_step].classList.add('d-block');
         step[previous_step].classList.remove('d-block');
         step[previous_step].classList.add('d-none');
         if (current_step == stepCount){
           submitBtn.classList.remove('d-none');
           submitBtn.classList.add('d-inline-block');
           nextBtn.classList.remove('d-inline-block');
           nextBtn.classList.add('d-none');
         }
       } else {
         if(current_step > stepCount){
             form.onsubmit = () => { return true }
         }
       }

        //
            console.log(full_name);
            console.log(mobile_number);
            console.log(email);
            console.log(password);
            console.log(company_name);
            console.log(company_desc);
            // console.log(how_many_employees);
            console.log(company_location);
            console.log(company_interest);
            console.log(serve_your_customer);
            console.log(extra_charges_home_services);
            console.log(company_overview);
            console.log(company_working_days);
            console.log(opening_closing_times);
        //
     progress((100 / stepCount) * current_step);
     });
 
 
    prevBtn.addEventListener('click', () => {
      if(current_step > 0){
         current_step--;

         
         let previous_step = current_step + 1; 
         prevBtn.classList.add('d-none');
         prevBtn.classList.add('d-inline-block');
         step[current_step].classList.remove('d-none');
         step[current_step].classList.add('d-block')
         step[previous_step].classList.remove('d-block');
         step[previous_step].classList.add('d-none');
         if(current_step < stepCount){
            submitBtn.classList.remove('d-inline-block');
            submitBtn.classList.add('d-none');
            nextBtn.classList.remove('d-none');
            nextBtn.classList.add('d-inline-block');
            prevBtn.classList.remove('d-none');
            prevBtn.classList.add('d-inline-block');
         } 
      }
 
      if(current_step == 0){
         prevBtn.classList.remove('d-inline-block');
         prevBtn.classList.add('d-none');
            $("#short_heading").text('MEETENDO BUSINESS REGISTRATION PROCESS');
            $("#main_heading").text('Manage Your Customer in easy way');
            $("#main_pic").attr("src", "./register/img/step1.webp");
      }

      if(current_step == 1){
        $("#short_heading").text('Dazboard');
        $("#main_heading").text('Manage Your Project and Team in an easy way');
        $("#main_pic").attr("src", "./register/img/step"+(current_step+1)+".webp");
    }
    if(current_step == 2){
        $("#short_heading").text('Dazboard');
        $("#main_heading").text('Manage Your Clients in an easy way');
        $("#main_pic").attr("src", "./register/img/step2.webp");
    }
    if(current_step == 3){
        $("#short_heading").text('Dazboard');
        $("#main_heading").text('Serve Your Customer either at home or in your location');
        $("#main_pic").attr("src", "./register/img/step2.webp");
    }
    if(current_step == 4){
        $("#short_heading").text('Dazboard');
        $("#main_heading").text('Manage your Working schedule');
        $("#main_pic").attr("src", "./register/img/step"+(current_step+1)+".webp");
    }
    if(current_step == 5){
        $("#short_heading").text('Dazboard');
        $("#main_heading").text('Thats it let us start our journey');
        $("#main_pic").attr("src", "./img/step"+(current_step+1)+".webp");
    }


     progress((100 / stepCount) * current_step);
    });
 
 
 submitBtn.addEventListener('click', () => {
     preloader.classList.add('d-block');
 
     const timer = ms => new Promise(res => setTimeout(res, ms));
 
     timer(3000)
       .then(() => {
            bodyElement.classList.add('loaded');
       }).then(() =>{
           step[stepCount].classList.remove('d-block');
           step[stepCount].classList.add('d-none');
           prevBtn.classList.remove('d-inline-block');
           prevBtn.classList.add('d-none');
           submitBtn.classList.remove('d-inline-block');
           submitBtn.classList.add('d-none');
           succcessDiv.classList.remove('d-none');
           succcessDiv.classList.add('d-block');
       })
       
 });
 