/* Template: Tivo - SaaS App HTML Landing Page Template
   Author: Inovatik
   Created: Sep 2019
   Description: Custom JS file
*/


(function($) {
    "use strict"; 
	
	/* Preloader */
	$(window).on('load', function() {
		var preloaderFadeOutTime = 500;
		function hidePreloader() {
			var preloader = $('.spinner-wrapper');
			setTimeout(function() {
				preloader.fadeOut(preloaderFadeOutTime);
			}, 500);
		}
		hidePreloader();
	});

	
	/* Navbar Scripts */
	// jQuery to collapse the navbar on scroll
    $(window).on('scroll load', function() {
		if ($(".navbar").offset().top > 60) {
			$(".fixed-top").addClass("top-nav-collapse");
		} else {
			$(".fixed-top").removeClass("top-nav-collapse");
		}
    });

	// jQuery for page scrolling feature - requires jQuery Easing plugin
	$(function() {
		$(document).on('click', 'a.page-scroll', function(event) {
			var $anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 600, 'easeInOutExpo');
			event.preventDefault();
		});
	});

    // closes the responsive menu on menu item click
    $(".navbar-nav li a").on("click", function(event) {
    if (!$(this).parent().hasClass('dropdown'))
        $(".navbar-collapse").collapse('hide');
    });


    /* Image Slider - Swiper */
    var imageSlider = new Swiper('.image-slider', {
        autoplay: {
            delay: 2000,
            disableOnInteraction: false
		},
        loop: true,
        spaceBetween: 30,
        slidesPerView: 5,
		breakpoints: {
            // when window is <= 580px
            580: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            // when window is <= 768px
            768: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            // when window is <= 992px
            992: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            // when window is <= 1200px
            1200: {
                slidesPerView: 4,
                spaceBetween: 20
            },

        }
    });


    /* Text Slider - Swiper */
	var textSlider = new Swiper('.text-slider', {
        autoplay: {
            delay: 6000,
            disableOnInteraction: false
		},
        loop: true,
        navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev'
		}
    });


    /* Video Lightbox - Magnific Popup */
    $('.popup-youtube, .popup-vimeo').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
        iframe: {
            patterns: {
                youtube: {
                    index: 'youtube.com/', 
                    id: function(url) {        
                        var m = url.match(/[\\?\\&]v=([^\\?\\&]+)/);
                        if ( !m || !m[1] ) return null;
                        return m[1];
                    },
                    src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                },
                vimeo: {
                    index: 'vimeo.com/', 
                    id: function(url) {        
                        var m = url.match(/(https?:\/\/)?(www.)?(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/);
                        if ( !m || !m[5] ) return null;
                        return m[5];
                    },
                    src: 'https://player.vimeo.com/video/%id%?autoplay=1'
                }
            }
        }
    });


    /* Details Lightbox - Magnific Popup */
	$('.popup-with-move-anim').magnificPopup({
		type: 'inline',
		fixedContentPos: false, /* keep it false to avoid html tag shift with margin-right: 17px */
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-slide-bottom'
	});
    
    
    /* Move Form Fields Label When User Types */
    // for input and textarea fields
    $("input, textarea").keyup(function(){
		if ($(this).val() != '') {
			$(this).addClass('notEmpty');
		} else {
			$(this).removeClass('notEmpty');
		}
    });


    /* Sign Up Form */
    $("#signUpForm").validator().on("submit", function(event) {
    	if (event.isDefaultPrevented()) {
            // handle the invalid form...
            sformError();
            ssubmitMSG(false, "Please fill all fields!");
        } else {
            // everything looks good!
            event.preventDefault();
            ssubmitForm();
        }
    });

    function ssubmitForm() {
        // initiate variables with form content
		var email = $("#semail").val();
		var name = $("#sname").val();
		var password = $("#spassword").val();
        var terms = $("#sterms").val();
        
        $.ajax({
            type: "POST",
            url: "php/signupform-process.php",
            data: "email=" + email + "&name=" + name + "&password=" + password + "&terms=" + terms, 
            success: function(text) {
                if (text == "success") {
                    sformSuccess();
                } else {
                    sformError();
                    ssubmitMSG(false, text);
                }
            }
        });
	}

    function sformSuccess() {
        $("#signUpForm")[0].reset();
        ssubmitMSG(true, "Sign Up Submitted!");
        $("input").removeClass('notEmpty'); // resets the field label after submission
    }

    function sformError() {
        $("#signUpForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
            $(this).removeClass();
        });
	}

    function ssubmitMSG(valid, msg) {
        if (valid) {
            var msgClasses = "h3 text-center tada animated";
        } else {
            var msgClasses = "h3 text-center";
        }
        $("#smsgSubmit").removeClass().addClass(msgClasses).text(msg);
    }


    /* Log In Form */
    $("#logInForm").validator().on("submit", function(event) {
    	if (event.isDefaultPrevented()) {
            // handle the invalid form...
            lformError();
            lsubmitMSG(false, "Please fill all fields!");
        } else {
            // everything looks good!
            event.preventDefault();
            lsubmitForm();
        }
    });

    function lsubmitForm() {
        // initiate variables with form content
		var email = $("#lemail").val();
		var password = $("#lpassword").val();
        
        $.ajax({
            type: "POST",
            url: "php/loginform-process.php",
            data: "email=" + email + "&password=" + password, 
            success: function(text) {
                if (text == "success") {
                    lformSuccess();
                } else {
                    lformError();
                    lsubmitMSG(false, text);
                }
            }
        });
	}

    function lformSuccess() {
        $("#logInForm")[0].reset();
        lsubmitMSG(true, "Log In Submitted!");
        $("input").removeClass('notEmpty'); // resets the field label after submission
    }

    function lformError() {
        $("#logInForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
            $(this).removeClass();
        });
	}

    function lsubmitMSG(valid, msg) {
        if (valid) {
            var msgClasses = "h3 text-center tada animated";
        } else {
            var msgClasses = "h3 text-center";
        }
        $("#lmsgSubmit").removeClass().addClass(msgClasses).text(msg);
    }


    /* Newsletter Form */
    $("#newsletterForm").validator().on("submit", function(event) {
    	if (event.isDefaultPrevented()) {
            // handle the invalid form...
            nformError();
            nsubmitMSG(false, "Please fill all fields!");
        } else {
            // everything looks good!
            event.preventDefault();
            nsubmitForm();
        }
    });

    function nsubmitForm() {
        // initiate variables with form content
		var email = $("#nemail").val();
        var terms = $("#nterms").val();
        $.ajax({
            type: "POST",
            url: "php/newsletterform-process.php",
            data: "email=" + email + "&terms=" + terms, 
            success: function(text) {
                if (text == "success") {
                    nformSuccess();
                } else {
                    nformError();
                    nsubmitMSG(false, text);
                }
            }
        });
	}

    function nformSuccess() {
        $("#newsletterForm")[0].reset();
        nsubmitMSG(true, "Subscribed!");
        $("input").removeClass('notEmpty'); // resets the field label after submission
    }

    function nformError() {
        $("#newsletterForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
            $(this).removeClass();
        });
	}

    function nsubmitMSG(valid, msg) {
        if (valid) {
            var msgClasses = "h3 text-center tada animated";
        } else {
            var msgClasses = "h3 text-center";
        }
        $("#nmsgSubmit").removeClass().addClass(msgClasses).text(msg);
    }
    

    /* Privacy Form */
    $("#privacyForm").validator().on("submit", function(event) {
    	if (event.isDefaultPrevented()) {
            // handle the invalid form...
            pformError();
            psubmitMSG(false, "Please fill all fields!");
        } else {
            // everything looks good!
            event.preventDefault();
            psubmitForm();
        }
    });

    function psubmitForm() {
        // initiate variables with form content
		var name = $("#pname").val();
		var email = $("#pemail").val();
        var select = $("#pselect").val();
        var terms = $("#pterms").val();
        
        $.ajax({
            type: "POST",
            url: "php/privacyform-process.php",
            data: "name=" + name + "&email=" + email + "&select=" + select + "&terms=" + terms, 
            success: function(text) {
                if (text == "success") {
                    pformSuccess();
                } else {
                    pformError();
                    psubmitMSG(false, text);
                }
            }
        });
	}

    function pformSuccess() {
        $("#privacyForm")[0].reset();
        psubmitMSG(true, "Request Submitted!");
        $("input").removeClass('notEmpty'); // resets the field label after submission
    }

    function pformError() {
        $("#privacyForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
            $(this).removeClass();
        });
	}

    function psubmitMSG(valid, msg) {
        if (valid) {
            var msgClasses = "h3 text-center tada animated";
        } else {
            var msgClasses = "h3 text-center";
        }
        $("#pmsgSubmit").removeClass().addClass(msgClasses).text(msg);
    }
    

    /* Back To Top Button */
    // create the back to top button
    $('body').prepend('<a href="body" class="back-to-top page-scroll">Back to Top</a>');
    var amountScrolled = 700;
    $(window).scroll(function() {
        if ($(window).scrollTop() > amountScrolled) {
            $('a.back-to-top').fadeIn('500');
        } else {
            $('a.back-to-top').fadeOut('500');
        }
    });


	/* Removes Long Focus On Buttons */
	$(".button, a, button").mouseup(function() {
		$(this).blur();
	});


//validat signup================================================================================================

$(document).ready(function() {
    var delay = 2000;
    $('#signUpForm').click(function(e){
    e.preventDefault();
        //first name required
        
    var fname = $('#fname').val();
    if(fname.length < 3){
         $('#fname').css('border', '3px solid red');
        $('#smsgSubmit').html(
    '<span style="color:red">First Name required</span>');
    $('#fname').focus();
    return false;
    }
   //last name required
        
        var lname = $('#lname').val();
    if(lname.length < 3){
          $('#fname').css('border', '1px solid #c4d8dc');
               $('#lname').css('border', '3px solid red');
           $('#smsgSubmit').html(
    '<span style="color:red">Last Name required</span>');
     $('#lname').focus();
    return false;
    }
    // company
        
        var company = $('#company').val();
    if(company.length < 2)
    {
         $('#fname').css('border', '1px solid #c4d8dc');
             $('#lname').css('border', '1px solid #c4d8dc');
             $('#email').css('border', '1px solid #c4d8dc');
                  $('#company').css('border', '3px solid red');
              $('#smsgSubmit').html(
       '<span style="color:red">Company name is required</span>');
    
       $('#company').focus();
       return false;
    }
     // subdomain
        
     var subdomain = $('#subdomain').val();
     if(subdomain.length < 5)
     {
          $('#fname').css('border', '1px solid #c4d8dc');
              $('#lname').css('border', '1px solid #c4d8dc');
              $('#company').css('border', '1px solid #c4d8dc');
                   $('#subdomain').css('border', '3px solid red');
               $('#smsgSubmit').html(
        '<span style="color:red">Subdomain name is required, (5-32 characters)</span>');
     
        $('#subdomain').focus();
        return false;
     }
        
 //email  required
        
    var email = $.trim($('#email').val().replace(/\s+/g, ' '));
    if(email == ''){
     $('#fname').css('border', '1px solid #c4d8dc');
     $('#lname').css('border', '1px solid #c4d8dc');
     $('#company').css('border', '1px solid #c4d8dc');
     $('#subdomain').css('border', '1px solid #c4d8dc');
               $('#email').css('border', '3px solid red');
           $('#smsgSubmit').html(
    '<span style="color:red">Email Address required</span>');
 
    $('#email').focus();
    return false;
    }
        
        //invalid email
        
    if( $("#email").val()!='' ){
    if( !isValidEmailAddress( $("#email").val() ) ){
        $('#fname').css('border', '1px solid #c4d8dc');
        $('#lname').css('border', '1px solid #c4d8dc');
        $('#company').css('border', '1px solid #c4d8dc');
        $('#subdomain').css('border', '1px solid #c4d8dc');
               $('#email').css('border', '3px solid red');
           $('#smsgSubmit').html(
    '<span style="color:red">Invalid Email Address</span>');
    $('#email').focus();
    return false;
    }
    }
  
         //password required
        
         var password1 = $('#password1').val();
    if(!goodPassword(password1)){
        $('#fname').css('border', '1px solid #c4d8dc');
        $('#lname').css('border', '1px solid #c4d8dc');
        $('#company').css('border', '1px solid #c4d8dc');
        $('#subdomain').css('border', '1px solid #c4d8dc');
        $('#email').css('border', '1px solid #c4d8dc');
        $('#password1').css('border', '3px solid red');
           $('#smsgSubmit').html(
    '<span style="color:red">password not secure</span><br><span style="font-size: 9px">At least one upper case, one lower case, one number, min 8 digit</span>');
 
    $('#password1').focus();
    return false;
    }

    //safe password required

    var password1 = $('#password1').val();
    if(password1 == ''){
        $('#fname').css('border', '1px solid #c4d8dc');
        $('#lname').css('border', '1px solid #c4d8dc');
        $('#company').css('border', '1px solid #c4d8dc');
        $('#subdomain').css('border', '1px solid #c4d8dc');
        $('#email').css('border', '1px solid #c4d8dc');
        $('#password1').css('border', '3px solid red');
        $('#smsgSubmit').html(
    '<span style="color:red">password must contain </span>');

    $('#password1').focus();
    return false;
    }

        
    //password 2 required

    var password2 = $('#password2').val();
    if(password2 == ''){
        $('#fname').css('border', '1px solid #c4d8dc');
        $('#lname').css('border', '1px solid #c4d8dc');
        $('#company').css('border', '1px solid #c4d8dc');
        $('#subdomain').css('border', '1px solid #c4d8dc');
        $('#email').css('border', '1px solid #c4d8dc');
        $('#password1').css('border', '1px solid #c4d8dc');
        $('#password2').css('border', '3px solid red');
        $('#smsgSubmit').html(
    '<span style="color:red">Please retype Password</span>');

    $('#password2').focus();
    return false;
    }

    if (password1 != password2){
        $('#smsgSubmit').html(
            '<span style="color:red">Password Do not Match</span>');
        return false;    
    }
                 

 
 
    //collect form info into var
         var formData = {
            first_name: $("#fname").val(),
            last_name: $("#lname").val(),
            email: $("#email").val(),
            company: $("#company").val(),
            subdomain: $("#subdomain").val(),
            password1: $("#password1").val(),
            password2: $("#password2").val(),
 
     };
        //call ajex
    $.ajax
    ({
    type: "POST",
    url: "app/sys/hendler/signup.php",
    data: formData,
    beforeSend: function() {
    $('#smsgSubmit').html(
    '<span style="color:orange">Validating your form...</span>'
    );
    }, 
    success: function(data)
    {
    setTimeout(function() {
    $('#smsgSubmit').html(data);
    }, delay);
    }
    });
    });
  
 });
 function isValidEmailAddress(emailAddress) {
     var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
     return pattern.test(emailAddress);
 }
 
function goodPassword(password1){
    var pettern = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/;
    return pettern.test(password1);

}
 
 

})(jQuery);