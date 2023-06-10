const carouselContainer = document.querySelector(".carousel__track-container");
if (carouselContainer)
    var swiper = new Swiper(".carousel__track-container", {
        slidesPerView: 3,
        spaceBetween: 42,
        slidesPerGroup: 3,
        loop: true,
        centerSlide: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                slidesPerGroup: 1,
            },
            620: {
                slidesPerView: 2,
                slidesPerGroup: 2,
            },
            950: {
                slidesPerView: 3,
                slidesPerGroup: 3,
            },
        },
    });

const credit = document.querySelector("#credit-card");
if (credit)
    credit.addEventListener("click", function (e) {
        const creditInputs = document.querySelector("#credit-inputs");
        // creditInputs.classList.toggle("hidden");
    });

const creditInputs = document.querySelector("#credit-inputs");
const payment = document.querySelector(".subscription__checkout-pay__button");
const price = document.querySelector(".subscription__checkout-new_price");

if (payment) payment.innerText = `Pay ${price.innerText.slice(0, -3)} AED`;
if (creditInputs) creditInputs.classList.remove("hidden");

const navMenu = document.querySelector(".nav__menu");
const mobileMenu = document.querySelector(".mobile-menu");
const overlay = document.querySelector(".overlay");

if (navMenu)
    navMenu.addEventListener("click", function (e) {
        mobileMenu.classList.remove("hidden");
        overlay.classList.remove("hidden");
    });

if (overlay)
    overlay.addEventListener("click", function (e) {
        mobileMenu.classList.add("hidden");
        overlay.classList.add("hidden");
    });

//Map
const mapItem = document.querySelector("#map");

if (mapItem) {
    var map = L.map("map").setView([24.4539, 54.3873], 13);

    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    L.marker([24.4539, 54.3873]).addTo(map);
}

// Booking

const servicesContainer = document.querySelectorAll(
    ".salon__services__container"
);
const bookingBtn = document.querySelector(".salon__services__booking_button ");
const salonServiceBox = document.querySelectorAll(".salon__services__box");
const itemNumber = document.querySelector(".item__numbers");
const itemNumberBtn = document.querySelector(
    ".salon__services__booking_button--number"
);
if (servicesContainer)
    servicesContainer.forEach((element) => {
        element.addEventListener("click", function (e) {
            console.log(e);
            console.log(e.target.id);
            const item = e.target.closest(".salon__services__box");

            let flag = item.classList.contains("active-service-item");
            if(flag === false){
                service_storage = JSON.parse(localStorage.getItem("service_storage") || "[]");
                service_storage.push(e.target.id);
                localStorage.setItem("service_storage", JSON.stringify(service_storage));
                service_price = JSON.parse(localStorage.getItem("service_price") || "[]");
                service_storage.push(e.target.id);
                localStorage.setItem("service_price", JSON.stringify(service_price));
                // document.querySelector(".active-service-item")
            }else{

                service_storage = JSON.parse(localStorage.getItem("service_storage") || "[]");
                let filtered = service_storage.filter(function(value, index, arr){ 
                    return value != e.target.id;
                });
                // service_storage.pop(e.target.id);
                localStorage.setItem("service_storage", JSON.stringify(filtered));
            }

            if (item) item.classList.toggle("active-service-item");

            const activeItem = document.querySelector(".active-service-item");

            if (activeItem) {
                bookingBtn.classList.add("active__booking__button");
            } else {
                bookingBtn.classList.remove("active__booking__button");
            }
        });
    });

if (salonServiceBox)
    salonServiceBox.forEach((element) => {
        element.addEventListener("click", function (e) {
            const activeItems = document.querySelectorAll(
                ".active-service-item"
            );
            itemNumber.classList.remove("hidden");
            const item = e.target.closest(".salon__services__box");
            let flag = item.classList.contains(".active-service-item");
            console.log(flag);

            // itemNumber.children[0].innerText = activeItems.length+" Service Selected";

            console.log(activeItems.length);

            //////
            
            if(flag === false){
                // itemNumber.children[0].innerText = `${
                //     activeItems.length + 1
                // } Service Selected`;
                // service_storage = JSON.parse(localStorage.getItem("service_storage") || "[]");
                // service_storage.push(e.target.id);
                // localStorage.setItem("service_storage", JSON.stringify(service_storage));
                // itemNumber.children[0].innerText = (activeItems.length + 1)+" Service Selected";
            }else{
                // itemNumber.children[0].innerText = (activeItems.length - 1)+" Service Selected";
                // service_storage = JSON.parse(localStorage.getItem("service_storage") || "[]");
                // let filtered = service_storage.filter(function(value, index, arr){ 
                    // return value != e.target.id;
                // });
                // localStorage.setItem("service_storage", JSON.stringify(filtered));
                
            }


            if (item) item.classList.toggle(".active-service-item");

            ////

            const activeItem = document.querySelector(".active-service-item");
            // let cflag = activeItem.classList.contains(".active-service-item");
            // if(cflag === true){
                
            //     itemNumber.children[0].innerText = "5 Service Selected";
                
            // }else{
            //     itemNumber.children[0].innerText = "1 Service Selected";
            // }

            console.log(localStorage.getItem("service_storage"));
            if (activeItem) {
                itemNumberBtn.classList.add(".active__booking__button");
            } else {
                itemNumberBtn.classList.remove(".active__booking__button");
            }  
            


        });
    });

if (bookingBtn)
    bookingBtn.addEventListener("click", function () {
        if (bookingBtn.classList.contains("active__booking__button")) {
            window.location.href = "../html/booking-2.html";
        }
    });

const inputDate = document.querySelector("#date");
const inputClock = document.querySelector("#clock");
const inputLocation = document.querySelector("#location");
const timeForm = document.querySelector("#time__form");
const timeButton = document.querySelector("#time__button");
const inputsValues = [];

if (timeForm) {
    timeForm.addEventListener("keyup", function (e) {
        e.preventDefault();
        if (
            inputDate.value !== "" &&
            inputClock.value !== "" &&
            inputLocation.value !== ""
        ) {
            timeButton.classList.add("active__booking__button");
        } else {
            timeButton.classList.remove("active__booking__button");
        }
    });

    timeForm.addEventListener("mouseover", function (e) {
        e.preventDefault();
        if (
            inputDate.value !== "" &&
            inputClock.value !== "" &&
            inputLocation.value !== ""
        ) {
            timeButton.classList.add("active__booking__button");
        } else {
            timeButton.classList.remove("active__booking__button");
        }
    });

    timeForm.addEventListener("submit", function (e) {
        sessionStorage.clear();

        e.preventDefault();
        inputsValues.push(inputDate.value);
        inputsValues.push(inputClock.value);
        inputsValues.push(inputLocation.value);
        if (timeButton.classList.contains("active__booking__button")) {
            window.location.href = "./bookingstepthree";
        }
        sessionStorage.setItem("key", JSON.stringify(inputsValues));
    });
}

const bookingStaff = document.querySelector(".booking-3");
const dateText = document.querySelector("#date__text");
const timeText = document.querySelector("#time__text");
const placeText = document.querySelector("#place__text");

const timePlaceData = JSON.parse(sessionStorage.getItem("key"));

if (bookingStaff) {
    dateText.innerText = timePlaceData[0];
    localStorage.setItem("datetext", timePlaceData[0]);
    timeText.innerText = timePlaceData[1];
    localStorage.setItem("timetext", timePlaceData[1]);
    placeText.innerText = timePlaceData[2];
    localStorage.setItem("placetext", timePlaceData[2]);
}

const staffItem = document.querySelectorAll(".booking__staff__list__item");
const staffBtn = document.querySelector("#staff__button");

const skipLink = document.querySelector(".skip__link");

if (staffItem)
    staffItem.forEach((element) => {
        element.addEventListener("click", function (e) {
            if (element) element.classList.toggle("active-service-item");

            const activeItem = document.querySelector(".active-service-item");

            if (activeItem) {
                staffBtn.classList.add("active__booking__button");
            } else {
                staffBtn.classList.remove("active__booking__button");
            }
        });
    });

if (staffBtn)
    staffBtn.addEventListener("click", function (e) {
        e.preventDefault();

        if (staffBtn.classList.contains("active__booking__button"))
            window.location.href = "./bookingstepfour";
        sessionStorage.setItem("staff", "Selected");
    });

if (skipLink)
    skipLink.addEventListener("click", function (e) {
        sessionStorage.setItem("staff", "Unselected");
    });

// Coupon
const coupon = document.querySelector(".booking-4");
const staffText = document.querySelector("#staff__text");
const staffData = sessionStorage.getItem("staff");

const couponBtn = document.querySelector("#coupon__button");

if (coupon) {
    dateText.innerText = timePlaceData[0];
    timeText.innerText = timePlaceData[1];
    placeText.innerText = timePlaceData[2];
    staffText.innerText = staffData;
}

if (couponBtn)
    couponBtn.addEventListener("click", function (e) {
        e.preventDefault();
        if (sessionStorage.getItem("coupon"))
            window.location.href = "./bookingstepfive";
    });

const couponModal = document.querySelector(".coupon__modal");
const couponOverlay = document.querySelector(".overlay__booking");
const couponInput = document.querySelector("#coupon__input");
const applyCoupon = document.querySelector(".apply__coupon");

if (couponOverlay)
    couponOverlay.addEventListener("click", () => {
        couponOverlay.classList.add("hidden");
        couponModal.classList.add("hidden");
    });

if (applyCoupon)
    applyCoupon.addEventListener("click", function () {
        try {
            sessionStorage.removeItem("coupon");
        } catch (error) {}

        if (couponInput.value === "XRT44H") {
            couponOverlay.classList.remove("hidden");
            couponModal.classList.remove("hidden");
            sessionStorage.setItem("coupon", "Discount");
        }
    });

// Payment

const payLater = document.querySelector(".pay__later");
const paymentBtn = document.querySelector("#payment__button");
const inputName = document.querySelector("#name__input");
const inputCard = document.querySelector("#card__input");
const inputMonth = document.querySelector("#month__input");
const inputCVC = document.querySelector("#CVC__input");
const creditPayment = document.querySelector(".booking__payment__button");

if (payLater)
    payLater.addEventListener("click", function (e) {
        payLater.classList.toggle("active-service-item");

        const activeItem = document.querySelector(".active-service-item");

        if (activeItem) {
            paymentBtn.classList.add("active__booking__button");
        } else {
            paymentBtn.classList.remove("active__booking__button");
        }
    });

if (creditPayment) {
    creditPayment.addEventListener("click", function (e) {
        e.preventDefault();
        console.log("first");
        if (
            inputName.value !== "" &&
            inputCard.value !== "" &&
            inputMonth.value !== "" &&
            inputCVC.value !== ""
        ) {
            paymentBtn.classList.add("active__booking__button");
        } else {
            paymentBtn.classList.remove("active__booking__button");
        }
    });
}

if (paymentBtn)
    paymentBtn.addEventListener("click", function () {
        if (paymentBtn.classList.contains("active__booking__button"))
            window.location.href = "../html/booking-6.html";
    });

if (creditPayment) {
    dateText.innerText = timePlaceData[0];
    timeText.innerText = timePlaceData[1];
    placeText.innerText = timePlaceData[2];
    staffText.innerText = staffData;
}

// Done

const bookingDone = document.querySelector(".booking__done");

if (bookingDone) {
    dateText.innerText = timePlaceData[0];
    timeText.innerText = timePlaceData[1];
    placeText.innerText = timePlaceData[2];
    staffText.innerText = staffData;
}


// const step1 = document.querySelector("#step1");
// step1.addEventListener("click", function (e) {
//     alert('set');
// });
$("#gostep2").click(function(){
    $("#salon__services__container").each(function(){
        console.log($(this).html());
    });
});

$("#gostepone").click(function(){
    window.location.href = "./booking";
});
$("#gosteptwo").click(function(){
    window.location.href = "./bookingsteptwo";
});

$("#gostepthree").click(function(){
    window.location.href = "./bookingstepthree";
});

$("#gostepfour").click(function(){
    window.location.href = "./bookingstepfour";
});

$("#gostepfive").click(function(){
    window.location.href = "./bookingstepfive";
});


// function setLocalServices(){
//     const serContainer = document.querySelectorAll(
//         ".ser"
//     );
//     serContainer.forEach((element) => {
//         console.log(element);
//         // element.addEventListener("click", function (e) {
//         //     console.log(e);
//         //     console.log(e.target.id);
//         //     const item = e.target.closest(".salon__services__box");

//         //     let flag = item.classList.contains("active-service-item");
//         //     if(flag === false){
//         //         service_storage = JSON.parse(localStorage.getItem("service_storage") || "[]");
//         //         service_storage.push({id: e.target.id});
//         //         localStorage.setItem("service_storage", JSON.stringify(service_storage));
//         //         // document.querySelector(".active-service-item")
//         //     }else{
//         //         service_storage = JSON.parse(localStorage.getItem("service_storage") || "[]");
//         //         service_storage.pop({id: e.target.id});
//         //         localStorage.setItem("service_storage", JSON.stringify(service_storage));
//         //     }

//         //     if (item) item.classList.toggle("active-service-item");

//         //     const activeItem = document.querySelector(".active-service-item");

//         //     if (activeItem) {
//         //         bookingBtn.classList.add("active__booking__button");
//         //     } else {
//         //         bookingBtn.classList.remove("active__booking__button");
//         //     }
//         // });
//     });
//     exit();


//     alert("hi");
// }