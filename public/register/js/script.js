
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
 
 
    nextBtn.addEventListener('click', () => {
       current_step++;
       console.log(current_step);
        if(current_step == 1){
            $("#short_heading").text('Dazboard');
            $("#main_heading").text('Manage Your Project and Team in an easy way');
            $("#main_pic").attr("src", "register/img/step"+(current_step+1)+".webp");
        }
        if(current_step == 2){
            $("#short_heading").text('Dazboard');
            $("#main_heading").text('Manage Your Clients in an easy way');
            $("#main_pic").attr("src", "register/img/step2.webp");
        }
        if(current_step == 3){
            $("#short_heading").text('');
            $("#main_heading").text('Serve Your Customer either at home or in your location');
            $("#main_pic").attr("src", "register/img/step2.webp");
        }
        if(current_step == 4){
            $("#short_heading").text('Dazboard');
            $("#main_heading").text('Manage your Working schedule');
            $("#main_pic").attr("src", "register/img/step"+(current_step+1)+".webp");
        }
        if(current_step == 5){
            $("#short_heading").text('Dazboard');
            $("#main_heading").text('Thats it let us start our journey');
            $("#main_pic").attr("src", "register/img/step2.webp");
            $("#submit-btn").attr('style', 'display:none !important');
            $("#prev-btn").attr('style', 'display:none !important');
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
            $("#main_pic").attr("src", "./img/step1.webp");
      }

      if(current_step == 1){
        $("#short_heading").text('Dazboard');
        $("#main_heading").text('Manage Your Project and Team in an easy way');
        $("#main_pic").attr("src", "./img/step"+(current_step+1)+".webp");
    }
    if(current_step == 2){
        $("#short_heading").text('Dazboard');
        $("#main_heading").text('Manage Your Clients in an easy way');
        $("#main_pic").attr("src", "./img/step2.webp");
    }
    if(current_step == 3){
        $("#short_heading").text('Dazboard');
        $("#main_heading").text('Serve Your Customer either at home or in your location');
        $("#main_pic").attr("src", "./img/step2.webp");
    }
    if(current_step == 4){
        $("#short_heading").text('Dazboard');
        $("#main_heading").text('Manage your Working schedule');
        $("#main_pic").attr("src", "./img/step"+(current_step+1)+".webp");
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
 