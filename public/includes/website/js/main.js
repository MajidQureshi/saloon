/*---------------------------------------------

[Table of Content]

01: Preloader
02: side-widget-menu
02: Mobile Menu Open Control
03: Mobile Menu Close Control
04: Side user panel menu Open Control
05: Back to Top Button and Navbar Scrolling Effects
06: back to top button click control
07: most-visited-wrap
08: Client logo slider
09: client-testimonial
10: gallery-carousel
11: Fancybox js
12: Daterangepicker
13: Quantity number increment control
14: Quantity number decrement control
15: Tooltip
17: Counter up
----------------------------------------------*/
var main_color = $('meta[name="main_color"]').attr('content');
var csrf = $('meta[name="csrf-token"]').attr('content');
var base_url = $('meta[name="base_url"]').attr('content');
var currency = $('meta[name="currency"]').attr('content');
var currency_name = $('meta[name="currency_name"]').attr('content');

var $document = $(document);
 
var append = window.location.search;
append = append.replace("?", '');
if(window.location.href == base_url+'/all-salons?'+append)
    window.history.pushState("object or string", "Title", base_url +'/all-salons');

(function ($) {
    "use strict";

    var $window = $(window);

    $window.on('load', function () {

        var $document = $(document);
        var $dom = $('html, body');
        var preloader = $('.loader-container');
        var dropdownMenu = $('.main-menu-content .dropdown-menu-item');
        var userChosenSelect = $('.user-chosen-select');
        var isMenuOpen = false;
        var numberCounter = $('.counter');
        var userTextEditor = $('.user-text-editor');
        var backToTopBtn = $('#back-to-top');
        var cardCarousel = $('.card-carousel');
        var cardCarouselCoupon = $('.card-carousel-coupon');
        var cardCarouselTwo = $('.card-carousel-2');
        var cardCarouselThree = $('.card-carousel-3');
        var clientLogoCarousel = $('.client-logo');
        var testimonialCarousel = $('.testimonial-carousel');
        var galleryCarousel = $('.gallery-carousel');
        var dateDropperPicker = $('.date-dropper-input');
        var fullScreenSlider = $('.full-screen-slider');
        var onlineUserSlider = $('.online-user-slider');
        var emojiPicker = $('.emoji-picker');
        var scrollLink = $('#sticky-content-nav .scroll-link');
        var singleSlider = $('.single-slider');
        var jsTilt = $('.js-tilt');
        var jsTiltTwo = $('.js-tilt-2');
        var lazyLoading = $('.lazy');

        
        /* ======= Preloader ======= */
        preloader.delay('500').fadeOut(2000);

        /*====  sidebar menu =====*/
        $document.on('click', '#sidebarToggleTop', function () {
            $('.dashboard-sidebar').addClass('sidebar-is-active');
        });

        /*====  sidebar menu =====*/
        $document.on('click', '#sidebar-close', function () {
            $('.dashboard-sidebar').removeClass('sidebar-is-active');
        });

        /*=========== Mobile Menu Open Control ============*/
        $document.on('click','.menu-toggle', function () {
            $(this).toggleClass('active');
            $('.main-menu-content').slideToggle(200);
        });

        /*=========== Dropdown menu ============*/
        dropdownMenu.parent('li').children('a').append(function() {
            return '<span class="drop-menu-toggle"><i class="la la-plus"></i></span>';
        });

        /*=========== Dropdown menu ============*/
        $document.on('click', '.drop-menu-toggle', function() {
            var Self = $(this);
            Self.toggleClass('active');
            Self.parent().parent().children('.dropdown-menu-item').toggle();
            return false;
        });

        /*=========== When window will resize then this action will work ============*/
        $window.on('resize', function () {
            if ($window.width() > 1200) {
                $('.main-menu-content').show();
                $('.dropdown-menu-item').show();
            }else {
                if (isMenuOpen) {
                    $('.main-menu-content').show();
                    $('.dropdown-menu-item').show();
                }else {
                    $('.main-menu-content').hide();
                    $('.dropdown-menu-item').hide();
                }
            }
        });

        /*=========== Side user panel menu Open Control ============*/
        $document.on('click','.header-search', function () {
            $(this).toggleClass('active');
        });

        $document.on("click", function(event){
            var $trigger = $(".header-search");
            if($trigger !== event.target && !$trigger.has(event.target).length){
                $(".header-search").removeClass("active");
            }
        });

        /*===== Back to Top Button and Navbar Scrolling Effects ======*/
        $window.on('scroll', function() {
            //header fixed animation and control
            if($window.scrollTop() > 10) {
                $('.header-menu-wrapper').addClass('header-fixed');
                $('.header-top-bar').hide();
            }else{
                $('.header-menu-wrapper').removeClass('header-fixed');
                $('.header-top-bar').show();
            }

            //back to top button control
            if ($window.scrollTop() > 300) {
                $(backToTopBtn).addClass('btn-active');
            } else {
                $(backToTopBtn).removeClass('btn-active');
            }

            //page scroll position
            findPosition();

        });

        /*===== back to top button click control ======*/
        $document.on("click", '#back-to-top', function() {
            $($dom).animate({
                scrollTop: 0
            }, 800);
            return false;
        });

        /*==== card-carousel =====*/
        if ($(cardCarousel).length) {
            $(cardCarousel).owlCarousel({
                loop: true,
                items: 3,
                nav: true,
                dots: true,
                smartSpeed: 700,
                autoplay: true,
                margin: 30,
                navText: ["<span class=\"la la-angle-left\"></span>", "<span class=\"la la-angle-right\"></span>"],
                responsive : {
                    // breakpoint from 0 up
                        0 : {
                        items: 1
                    },
                    // breakpoint from 768 up
                    768 : {
                        items: 2
                    },
                    // breakpoint from 992 up
                    992 : {
                        items: 3
                    }
                   
                }
            });
        }

         /*==== card-carousel-coupon =====*/
         if ($(cardCarouselCoupon).length) {
            $(cardCarouselCoupon).owlCarousel({
                loop: true,
                items: 2,
                nav: true,
                smartSpeed: 700,
                autoplay: false,
                dots: false,
                margin: 30,
                navText: ["<span class=\"la la-angle-left\"></span>", "<span class=\"la la-angle-right\"></span>"],
                responsive : {
                    // breakpoint from 0 up
                        0 : {
                        items: 1
                    },
                    // breakpoint from 768 up
                    768 : {
                        items: 2
                    },
                    // breakpoint from 992 up
                    992 : {
                        items: 2
                    }
                   
                }
            });
        }

        /*==== card-carousel-2 =====*/
        if ($(cardCarouselTwo).length) {
            $(cardCarouselTwo).owlCarousel({
                loop: true,
                items: 4,
                nav: false,
                dots: true,
                smartSpeed: 700,
                autoplay: false,
                margin: 30,
                responsive : {
                    // breakpoint from 0 up
                    0 : {
                        items: 1
                    },
                    // breakpoint from 600 up
                    600 : {
                        items: 3
                    },
                    // breakpoint from 1200 up
                    1200 : {
                        items: 4
                    }
                }
            });
        }

        /*==== card-carousel-3 =====*/
        if ($(cardCarouselThree).length) {
            $(cardCarouselThree).owlCarousel({
                loop: true,
                items: 2,
                nav: false,
                dots: true,
                smartSpeed: 700,
                autoplay: false,
                margin: 30,
                responsive : {
                    // breakpoint from 0 up
                    0 : {
                        items: 1
                    },
                    // breakpoint from 600 up
                    600 : {
                        items: 2
                    }
                }
            });
        }

        /*==== Client logo =====*/
        if ($(clientLogoCarousel).length) {
            $(clientLogoCarousel).owlCarousel({
                loop: true,
                items: 6,
                nav: false,
                dots: false,
                smartSpeed: 700,
                autoplay: true,
                responsive : {
                    // breakpoint from 0 up
                    0 : {
                        items: 1
                    },
                    // breakpoint from 425 up
                    425 : {
                        items: 2
                    },
                    // breakpoint from 480 up
                    480 : {
                        items: 2
                    },
                    // breakpoint from 767 up
                    767 : {
                        items: 4
                    },
                    // breakpoint from 992 up
                    992 : {
                        items: 6
                    }
                }
            });
        }

        /*==== testimonial-carousel =====*/
        if ($(testimonialCarousel).length) {
            $(testimonialCarousel).owlCarousel({
                loop: true,
                items: 3,
                center: true,
                nav: true,
                dots: true,
                smartSpeed: 700,
                autoplay: false,
                margin: 10,
                navText: ["<i class=\"la la-arrow-left\"></i>", "<i class=\"la la-arrow-right\"></i>"],
                responsive : {
                    // breakpoint from 0 up
                    0 : {
                        items: 1
                    },
                    // breakpoint from 768 up
                    768 : {
                        items: 2
                    },
                    // breakpoint from 992 up
                    992 : {
                        items: 3
                    }
                }
            });
        }

        /*==== gallery-carousel =====*/
        if ($(galleryCarousel).length) {
            $(galleryCarousel).owlCarousel({
                loop: true,
                items: 1,
                nav: true,
                dots: true,
                smartSpeed: 700,
                autoplay: false,
                dotsData: true,
                navText: ["<span class=\"la la-chevron-left\"></span>", "<span class=\"la la-chevron-right\"></span>"]
            });
        }
       
        /*==== Full screen slider =====*/
        if ($(fullScreenSlider).length) {
            $(fullScreenSlider).owlCarousel({
                loop: false,
                items: 4,
                nav: true,
                dots: false,
                smartSpeed: 700,
                autoplay: false,
                margin: 5,
                navText: ["<span class=\"la la-arrow-left\"></span>", "<span class=\"la la-arrow-right\"></span>"],
                responsive : {
                    // breakpoint from 0 up
                    0 : {
                        items: 1,
                        autoplay: true,
                    },
                    // breakpoint from 768 up
                    768 : {
                        items: 2,
                        autoplay: true,
                    },
                    // breakpoint from 992 up
                    992 : {
                        items: 4
                    }
                }
            });
        }

        /*==== Online user slider =====*/
        if ($(onlineUserSlider).length) {
            $(onlineUserSlider).owlCarousel({
                loop: false,
                items: 4,
                nav: true,
                dots: false,
                smartSpeed: 700,
                autoplay: false,
                margin: 5,
                navText: ["<span class=\"la la-angle-left\"></span>", "<span class=\"la la-angle-right\"></span>"],
            });
        }

        /*==== Single slider =====*/
        if ($(singleSlider).length) {
            $(singleSlider).owlCarousel({
                loop: true,
                items: 1,
                nav: true,
                dots: true,
                smartSpeed: 700,
                autoplay: false,
                navText: ["<span class=\"la la-angle-left\"></span>", "<span class=\"la la-angle-right\"></span>"]
            });
        }

        /*==== Quantity number =====*/
        $('.qtyDec, .qtyInc').on('click', function () {
            var $this = $(this);
            var oldValue = $this.parent().find('input[type="text"]').val();

            if ($this.hasClass('qtyInc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $this.parent().find('input[type="text"]').val(newVal);
        });

      
        /*==== Counter up =====*/
        if ($(numberCounter).length) {
            $(numberCounter).counterUp({
                delay: 10,
                time: 1000
            });
        }

        /*==== jqte text editor =====*/
        if ($(userTextEditor).length) {
            $(userTextEditor).jqte({
                placeholder: "Detail description about of your listing",
                formats: [
                    ["p","Paragraph"],
                    ["h1","Heading 1"],
                    ["h2","Heading 2"],
                    ["h3","Heading 3"],
                    ["h4","Heading 4"],
                    ["h5","Heading 5"],
                    ["h6","Heading 6"],
                    ["pre","Preformatted"]
                ]
            });
        }


        /*==== js-tilt =====*/
        if ($(jsTilt).length) {
            $(jsTilt).tilt({
                maxTilt: 1,
            });
        }
        if ($(jsTiltTwo).length) {
            $(jsTiltTwo).tilt({
                maxTilt: 4,
            });
        }


        /*==== emoji-picker =====*/
        if ($(emojiPicker).length) {
            $(emojiPicker).emojioneArea({
                pickerPosition: "top"
            });
        }

        /*====  Tooltip =====*/
        $('[data-toggle="tooltip"]').tooltip();

        /*======= ui price range slider ========*/
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 50, 290 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            " - $" + $( "#slider-range" ).slider( "values", 1 ) );

        /*=========== bookmark btn ============*/
        $document.on('click', '.bookmark-btn', function () {
            $(this).toggleClass('active');
        });

        /*=========== modal ============*/
        $document.on('click', '.login-btn', function () {
            $('.login-form').modal('show');
            $('.signup-form, .message-form').modal('hide');
        });
        $document.on('click', '.signup-btn', function () {
            $('.login-form, .forgotPassword-form').modal('hide');
            $('.signup-form').modal('show');
        });
        $document.on('click', '.lost-pass-btn', function () {
            $('.login-form').modal('hide');
            $('.forgotPassword-form').modal('show');
        });

        /*=========== Google map ============*/
        if($("#map").length) {
            var lat = parseFloat($('.map-container #latitude').val());
            var lng = parseFloat($('.map-container #longitude').val());
            initMap('map', lat, lng);
        }

        /*======== Rating Overview ===========*/
        function ratingOverview(ratingElem) {

            $(ratingElem).each(function() {
                var dataRating = $(this).attr('data-rating');

                // Rules
                if (dataRating >= 4.0) {
                    $(this).addClass('high');
                    $(this).find('.review-bars-review-inner').css({ width: (dataRating/5)*100 + "%", });
                } else if (dataRating >= 3.0) {
                    $(this).addClass('mid');
                    $(this).find('.review-bars-review-inner').css({ width: (dataRating/5)*80 + "%", });
                } else if (dataRating < 3.0) {
                    $(this).addClass('low');
                    $(this).find('.review-bars-review-inner').css({ width: (dataRating/5)*60 + "%", });
                }

            });
        } ratingOverview('.review-bars-review');

        $(window).on('resize', function() {
            ratingOverview('.review-bars-review');
        });

        /*=========== Payment Method Accordion ============*/
        var radios = document.querySelectorAll('.payment-tab-toggle > input');

        for (var i = 0; i < radios.length; i++) {
            radios[i].addEventListener('change', expandAccordion);
        }

        function expandAccordion (event) {
            var allTabs = document.querySelectorAll('.payment-tab');
            for (var i = 0; i < allTabs.length; i++) {
                allTabs[i].classList.remove('is-active');
            }
            event.target.parentNode.parentNode.classList.add('is-active');
        }

        /*========== Page scroll ==========*/
        scrollLink.on('click',function(e){
            var target = $($(this).attr('href'));

            $($dom).animate({
                scrollTop:target.offset().top
            },600);

            $(this).addClass('active');

            e.preventDefault();
        });

        function findPosition (){
            $('.page-scroll').each(function(){
                if(($(this).offset().top - $(window).scrollTop()) < 20){
                    scrollLink.removeClass('active');
                    $('#sticky-content-nav').find('[data-scroll="'+ $(this).attr('id') +'"]').addClass('active');
                }
            });
        }

        /*========== Lazy loading ==========*/
        if ($(lazyLoading).length) {
            $(lazyLoading).Lazy();
        }
        
        /*==== Open now filter btn =====*/
        $document.on('click', '.open-filter-btn', function (e) {
            e.preventDefault();
            $(this).toggleClass('active');
            
            if($(this).hasClass('active')){
                $('#isopen').val(1);
            } else {
                $('#isopen').val('');
            }
        });

        /*==== Chosen select =====*/
        if ($(userChosenSelect).length) {
            $(userChosenSelect).chosen({
                no_results_text: "Oops, nothing found!",
                allow_single_deselect: true
            });
        }

        $(userChosenSelect).on('chosen:showing_dropdown', function(event, params) {
            var chosen_container = $( event.target ).next( '.chosen-container' );
            var dropdown = chosen_container.find( '.chosen-drop' );
            var dropdown_top = dropdown.offset().top - $(window).scrollTop();
            var dropdown_height = dropdown.height();
            var viewport_height = $(window).height();

            if ( dropdown_top + dropdown_height > viewport_height ) {
                chosen_container.addClass( 'chosen-drop-up' );
            }
        });

        $(userChosenSelect).on('chosen:hiding_dropdown', function(event, params) {
            $( event.target ).next( '.chosen-container' ).removeClass( 'chosen-drop-up' );
        });
        $document.on('change', '#timeslot', function (e) {
            var salon_id = $('.salon_id').val();
            var salon_name = $('.salon_name').val();

            var service = $("#myTabContent input:checkbox:checked").map(function(){
                return $(this).val();
            }).get();

            var date = $('.wizard-fieldset input[name="date"]').val();
            var start_time = $('#timeslot').find(":selected").text();
            var booking_at = 'Salon';

            $('.selected_time').html(start_time);

            $.ajax({
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': csrf
                },
                data: {
                    date: date,
                    salon_id: salon_id,
                    start_time: start_time,
                    booking_at: booking_at,
                    service:service,
                    _token: csrf
                },
                url: base_url +'/salon/'+ salon_id +'/'+ salon_name +'/booking',
                success: function (data) {
                    $('.emp_list').empty()
                    if(data.meta.length > 0)
                        $('.emp_list').append(data.html);
                    else
                        $('.emp_list').append('<div class="info-box w-100"><div class="info-icon"><span class="la la-user-tie"></span></div><div class="info-content"><h4 class="info__title"> No Employee Found </h4></div></div>');
                },
                error: function (data) {}
            })
        });
        
        /*==== Date dropper picker =====*/
        if ($(dateDropperPicker).length) {
            $(dateDropperPicker).dateDropper({
                format: 'Y-m-d',
                theme: 'vanilla',
                large: true,
                largeDefault: true,
                minDate: moment().format("MM/DD/YYYY")
            })
            
            var salon_id = $('.salon_id').val();

            $document.on('change', '.date-dropper-input', function () {
                $(dateDropperPicker).dateDropper('getDate', function (date) {
                    $('.selected_date').html(date.formatted);
                    $.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': csrf
                        },
                        url: base_url + '/booking/timeslot',
                        data: {date: date.formatted, salon_id: salon_id ,_token: csrf}, 
                        success: function (data) {
                            $('#timeslot').empty();
                            $('#timeslot').append('<option value="" disabled selected> Time Slots </option>');
                            if(data.success == true) {
                                $.each(data.data, function (idx, obj) {
                                    $('#timeslot').append('<option value="' + obj.start_time + '">' + obj.start_time + '</option>');
                                });
                            } else {
                                $('#timeslot').append('<option value="" disabled selected> Closed </option>');
                            }

                            $('#timeslot').trigger("chosen:updated");
                            $('#timeslot').chosen();
                        },
                        error: function (data) {}
                    });
                });
            });
        }
    });

})(jQuery);

$document.ready(function() {
	// click on next button
	jQuery('.form-wizard-next-btn').click(function() {
		var parentFieldset = jQuery(this).parents('.wizard-fieldset');
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		var next = jQuery(this);
		var nextWizardStep = true;
		parentFieldset.find('.wizard-required').each(function(){
            var services = $('.wizard-fieldset .services');
            var thisValue = jQuery(this).val();

            if (services.filter(':checked').length == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    confirmButtonColor: main_color,
                    text: 'Please, select atleast one service'
                })
                nextWizardStep = false;
            }
			if(thisValue == "" || thisValue == null) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    confirmButtonColor: main_color,
                    text: 'Please, fill all details'
                })
				nextWizardStep = false;
			}
		});
        
        if(nextWizardStep) {
            next.parents('.wizard-fieldset').removeClass("show","400");
            currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',"400");
            next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show","400");
            jQuery(document).find('.wizard-fieldset').each(function(){
                if(jQuery(this).hasClass('show')){
                    var formAtrr = jQuery(this).attr('data-tab-content');
                    jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
                        if(jQuery(this).attr('data-attr') == formAtrr){
                            jQuery(this).addClass('active');
                            var innerWidth = jQuery(this).innerWidth();
                            var position = jQuery(this).position();
                            jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
                        }else{
                            jQuery(this).removeClass('active');
                        }
                    });
                }
            });
        }
	});
	//click on previous button
    $document.on('click', '.form-wizard-previous-btn', function () {
		var counter = parseInt(jQuery(".wizard-counter").text());;
		var prev =jQuery(this);
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		prev.parents('.wizard-fieldset').removeClass("show","400");
		prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
		currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
		jQuery(document).find('.wizard-fieldset').each(function(){
			if(jQuery(this).hasClass('show')){
				var formAtrr = jQuery(this).attr('data-tab-content');
				jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
					if(jQuery(this).attr('data-attr') == formAtrr){
						jQuery(this).addClass('active');
						var innerWidth = jQuery(this).innerWidth();
						var position = jQuery(this).position();
						jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
					}else{
						jQuery(this).removeClass('active');
					}
				});
			}
		});
	});
	//click on form submit button
    $document.on('click', '.form-wizard .form-wizard-submit', function () {
		var parentFieldset = jQuery(this).parents('.wizard-fieldset');
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		parentFieldset.find('.wizard-required').each(function() {
			var thisValue = jQuery(this).val();
			if( thisValue == "" ) {
				jQuery(this).siblings(".wizard-form-error").slideDown();
			}
			else {
				jQuery(this).siblings(".wizard-form-error").slideUp();
			}
		});
	});
	// focus on input field check empty or not
	jQuery(".form-control").on('focus', function(){
        var tmpThis = jQuery(this).val();
		if(tmpThis == '' ) {
            jQuery(this).parent().addClass("focus-input");}
		else if(tmpThis !='' ){
			jQuery(this).parent().addClass("focus-input");
		}
	}).on('blur', function(){
		var tmpThis = jQuery(this).val();
		if(tmpThis == '' ) {
			jQuery(this).parent().removeClass("focus-input");
			jQuery(this).siblings('.wizard-form-error').slideDown("3000");
		}
		else if(tmpThis !='' ){
			jQuery(this).parent().addClass("focus-input");
			jQuery(this).siblings('.wizard-form-error').slideUp("3000");
		}
	});
    
    $document.on('change', '#service_at', function () {
        $('.service_at').html($(this).val());
        var cost = $('.total_cost').html();
        var charges = $('.home_charges').html();
        if($(this).val() == "Salon"){
            $("#address_div").hide(600);
            $("#address_show").hide();
            $("#address_show").removeClass('display-flex');
            $('#choose_address').removeClass('wizard-required');
            $("#home_charges").hide();

            tot = parseInt(cost) - parseInt(charges);
        } else {
            $("#address_div").show(600);
            $("#address_show").addClass('display-flex');
            $('#choose_address').addClass('wizard-required');
            $("#home_charges").show();

            tot = parseInt(cost) + parseInt(charges);
        }
        $('.total_cost').html(tot);
    });
    
    $document.on('change', '#choose_address', function () {
        if($('.user-chosen-select-container').has('#service_at').length > 0)
        {
        } else {
            var cost = $('.total_cost').html();
            var charges = $('.home_charges').html();
            tot = parseInt(cost) + parseInt(charges);
            $('.total_cost').html(tot);
        }
        $("#address_show").addClass('display-flex');
            $("#home_charges").show();
            $('.address').html($(this).find("option:selected").text());
    });

    $document.on('click', '.next-staff', function () {
        var staff = $('input[name="emp_id"]:checked').val();
        var name = $('input[type=hidden][name=emp-'+staff+']').val();
        $('.selected_staff').html(name);
    });

    $document.on('change', 'input[type=radio][name=emp_id]', function (event) {
        var name = $('input[name=emp-'+this.value+']').val();
        $('.selected_staff').html(name);
    });

    $document.on('change', '.services', function (event) {
        var thisValue = jQuery(this).val();
        var name = $('input[name=name-'+thisValue+']').val();
        var price = $('input[name=price-'+thisValue+']').val();
        var cost = $('.total_cost').html();
        cost = parseInt(cost);
        if(this.checked){
            $('.selected_services').append('<div class="widget-title d-flex align-items-center font-weight-medium justify-content-between ser_'+thisValue+' font-size-16 pb-0">'+name+'<span class="font-weight-medium">'+currency+price+'</span></div>');
            tot = parseInt(cost) + parseInt(price);

        } else {
            $('.ser_'+thisValue).html('');
            tot = parseInt(cost) - parseInt(price);
        }
        $('.total_cost').html(tot);
    });

    $document.on('click', '.apply_coupon', function () {
        var cost = $('.total_cost').html();
        var coupon_id = $('input[name=coupon_id]').val();
        var dis = $('.total_discount').html();
        cost = parseFloat(cost) + parseFloat(dis);
        $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': csrf
            },
            data: {
                coupon_id: coupon_id,
                cost: cost,
                _token: csrf
            },
            url: base_url +'/useCoupon',
            success: function (data) {
                $('.total_cost').html(data.data.amount);
                $('.total_discount').html(data.data.discount);
                $('#display_discount').show();
            },
            error: function (data) {}
        })
    });

    $document.on('change', 'input[type=radio][name=payment_type]', function (event) {
        if(this.value == "STRIPE")
        {
            $('#cod_submit').hide();
        
            var key = $("#stripePublicKey").val();
            var cost = parseFloat($('.total_cost').html());
            
            if(currency_name == "USD")
                cost = cost * 100;
            $('.stripe-form').show();
            $('.stripe-form').html('<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key= '+key+' data-amount='+cost+' data-image = "https://stripe.com/img/documentation/checkout/marketplace.png" data-label="Stripe" data-currency='+currency_name+' ></script>');
        }
        else {
            $('#cod_submit').show();
            $('.stripe-form').hide();

        }
    });
    
    $document.on('click', '.next-payment', function () {
        var cost = parseFloat($('.total_cost').html());
        var discount = parseFloat($('.total_discount').html());

        $('input[name=payment]').val(cost);
        $('input[name=discount]').val(discount);
    });
     
    var page = 1;
    $document.on('click', '#load-more', function () {
        page++;
        $.ajax({
            url: '?page=' + page,
            type: 'get',
        })
        .done(function(data){
            if(data.meta.current_page == data.meta.last_page){
                $('#load-more').hide();
            }
            $('.comments-list').append(data.html);
        })
        .fail(function(jqXHR, ajaxOptions, throwError){
            alert('Server error');
        })
    });

    // search
    $document.on('click', '#reset-btn', function () {
        $('#category option').prop('selected', function() {
            return this.defaultSelected;
        });
        $('#category').trigger("chosen:updated");
    });

    $document.on('click', '#search-btn', function () {
        filter();
    });

    $document.on('click', '#sort', function () {
        filter();
    });

    $document.on('click', '#apply_filter', function () {
        filter();
    });

    $document.on('click', '#grid', function () {
        $('#view').val('Grid');
        $('#list').removeClass('active');
        $('#grid').addClass('active');
        filter();
    });

    $document.on('click', '#list', function () {
        $('#view').val('List');
        $('#grid').removeClass('active');
        $('#list').addClass('active');
        filter();
    });

    function filter() {
        var open = $('#isopen').val();
        var sort = $('#sort').find(":selected").val()
        var look_for = $('#look_for').val();
        var category = $('#category').find(":selected").val()

        var lat = $('#lat').val();
        var lang = $('#lang').val();
        var gender = $('input[name="salon_type"]:checked').val();
        var give_service = $('input[name="service_place"]:checked').val();
        var rate = $('input[name="rate"]:checked').val();
        var view = $('#view').val();
        
        $.ajax({
            url: base_url +'/all-salons',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': csrf
            },
            data: {
                open: open,
                sort: sort,
                look_for: look_for,
                category: category,
                lat: lat,
                lang: lang,
                give_service: give_service,
                gender: gender,
                rate: rate,
                view: view,
                _token: csrf
            },
            beforeSend: function() {
                $(".loader-container").fadeIn(1000)
                $(".loader-container").fadeOut(2000);

            },
            success: function (data) {
                setTimeout(() => {
                    $('#salon_found').html(data.meta.length+" Salons Found");
                    $('#salon-list').empty()
                    if(data.meta.length > 0)
                        $('#salon-list').append(data.html);
                    else        
                        $('#salon-list').append('<div class="info-box w-100"><div class="info-icon"><span class="la la-store"></span></div><div class="info-content"><h4 class="info__title"> No Salon Found </h4></div></div>');
                }, 600);
            },
            error: function (data) {
                console.log(data,'err');
            }
        })
    }

    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getPosts(page);
            }
        }
    });
    $document.on('click', '.pagination a', function (e) {
        getPosts($(this).attr('href').split('page=')[1]);
        e.preventDefault();
        $('.pagination').load(document.URL +  ' .pagination');
    });
    
    function getPosts(page) {
        $.ajax({
            url : '?page=' + page,
            dataType: 'json',
        }).done(function (data) {
            $('#salon-list').html(data.html);
            // location.hash = page;
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }
    
    $document.on('click', '#submitRegister', function (e) {
        var formData = new FormData($('#RegisterForm')[0]);
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': csrf
            },
            type: "POST",
            url: base_url+'/register',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result){
                $(".invalid-div span").html('');
                if (result.send == 'verify') {
                    $('.otp-form input[name=user_id]').val(result.data);
                    $('.signup-form').modal('hide');
                    $('.otp-form').modal('show');
                  
                } else {
                    $('.signup-form').modal('hide');
                    $('.login-form').modal('show');
                }
            },
            error: function(err){
                console.log(err);
                $(".invalid-div span").html('');
                $(".invalid-div .phone").html(err.responseJSON.error);
                for (let v1 of Object.keys( err.responseJSON.errors)) {
                    $(".invalid-div ."+v1).html(Object.values(err.responseJSON.errors[v1]));
                }
            }
        });
    });

    $document.on('click', '#submitLogin', function (e) {
        var formData = new FormData($('#loginForm')[0]);
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': csrf
            },
            type: "POST",
            url: base_url+'/loginPost',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result){
                $(".invalid-div span").html('');
                if(result.success){
                    window.location.reload();
                } else {
                    $('.login-form').modal('hide');
                    $('.verify-form').modal('show');
                }
            },
            error: function(err){
                $(".invalid-div span").html('');
                $(".invalid-div .password").html(err.responseJSON.error);
                for (let v1 of Object.keys( err.responseJSON.errors)) {
                    $(".invalid-div ."+v1).html(Object.values(err.responseJSON.errors[v1]));
                }
            }
        });
    });
    
    $document.on('click', '#submitVerify', function (e) {
        var formData = new FormData($('#verifyForm')[0]);
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': csrf
            },
            type: "POST",
            url: base_url+'/sendotp',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result){
                $(".invalid-div span").html('');
                if(result.success){
                    $('.otp-form input[name=user_id]').val(result.data);
                    $('.verify-form').modal('hide');
                    $('.otp-form').modal('show');
                } 
            },
            error: function(err){
                console.log('err ',err);
                $(".invalid-div span").html('');
                $(".invalid-div .email").html(err.responseJSON.error);
                for (let v1 of Object.keys( err.responseJSON.errors)) {
                    $(".invalid-div ."+v1).html(Object.values(err.responseJSON.errors[v1]));
                }
            }
        });
    });
    
    $document.on('click', '#submitOtp', function (e) {
        var formData = new FormData($('#otpForm')[0]);
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': csrf
            },
            type: "POST",
            url: base_url+'/verifyotp',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result){
                $(".invalid-div span").html('');
                if(result.success){
                    $('.otp-form').modal('hide');
                    $('.login-form').modal('show');
                } 
            },
            error: function(err){
                console.log('err ',err);
                $(".invalid-div span").html('');
                $(".invalid-div .otp").html(err.responseJSON.error);
                for (let v1 of Object.keys( err.responseJSON.errors)) {
                    $(".invalid-div ."+v1).html(Object.values(err.responseJSON.errors[v1]));
                }
            }
        });
    });

    $document.on('click', '#forgotPasswordSubmit', function (e) {
        var formData = new FormData($('#forgotPasswordForm')[0]);
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': csrf
            },
            type: "POST",
            url: base_url+'/forgotPassword',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result){
                $(".invalid-div span").html('');
                if(result.success){
                    $('.forgotPassword-form').modal('hide');
                } 
            },
            error: function(err){
                console.log('err ',err);
                $(".invalid-div span").html('');
                $(".invalid-div .email").html(err.responseJSON.error);
                for (let v1 of Object.keys( err.responseJSON.errors)) {
                    $(".invalid-div ."+v1).html(Object.values(err.responseJSON.errors[v1]));
                }
            }
        });
    });
   
});

function booking(){
    $('.loader-container').delay('500').fadeOut(2000);
    document.getElementById('thisform').submit();
    document.getElementById("cod_submit").disabled = true;
}

function useCoupon(coupon) {
    $('input[name=coupon_code]').val(coupon.code);
    $('input[name=coupon_id]').val(coupon.coupon_id);
}

function OpenAddress(address_id) {
    $.ajax({
        headers: {
            'XCSRF-TOKEN': csrf
        },
        type:"GET",
        url: base_url+'/getAddress/'+address_id,
        success: function(result){
            $('.editAddress-form').modal('show');
            $(".invalid-div span").html('');
            $(".editAddress-form input[name='latitude']").val(result.data.let);
            $(".editAddress-form input[name='longitude']").val(result.data.long);
            $(".editAddress-form input[name='address_id']").val(result.data.address_id);
            $(".editAddress-form input[name='street']").val(result.data.street);
            $(".editAddress-form input[name='city']").val(result.data.city);
            $(".editAddress-form input[name='state']").val(result.data.state);
            $(".editAddress-form input[name='country']").val(result.data.country);

        },
        error: function(err){}
    });
}

function DeleteAddress(address_id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this record?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "GET",
                url: base_url+'/deleteAddress/'+address_id,
                success: function (result) {
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'Record is deleted successfully.',
                        showConfirmButton: false,
                    })
                },
                error: function (err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'This record is conntect with another data!'
                    })
                }
            });
        }
    })
}

function ReviewModel(booking_id) {
    $('#sendMessageModal').modal('show');
    $('#booking_id').val(booking_id);
}

$document.on('click', '#submitReview', function (e) {
    var formData = new FormData($('#reviewForm')[0]);
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': csrf
        },
        type: "POST",
        url: base_url+'/addReview',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(result){
            $(".invalid-div span").html('');
            if(result.success){
                window.location.reload();
            }
        },
        error: function(err){
            $(".invalid-div span").html('');
            for (let v1 of Object.keys( err.responseJSON.errors)) {
                $(".invalid-div ."+v1).html(Object.values(err.responseJSON.errors[v1]));
            }
        }
    });
});


function cancelAppointment(booking_id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to cancel this appointment?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, cancel it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "GET",
                url: base_url+'/cancelAppointment/'+booking_id,
                success: function (result) {
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                    Swal.fire({
                        icon: 'success',
                        title: 'Cancel!',
                        text: 'Appointment canceled successfully.',
                        showConfirmButton: false,
                    })
                },
                error: function (err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'This record is conntect with another data!'
                    })
                }
            });
        }
    })
}

var autocomplete;
function initAutocomplete() {
    if(document.getElementById('search_address')){
        autocomplete = new google.maps.places.Autocomplete(document.getElementById('search_address'), { types: ["geocode"] });
        autocomplete.setFields(['address_component', 'geometry']);
        autocomplete.addListener('place_changed', fillInAddress);     
    }  
}

function fillInAddress() {
    var place = autocomplete.getPlace();
    $('#lat').val(place.geometry.location.lat());
    $('#lang').val(place.geometry.location.lng());
}