
$(document).ready(function() {
   var delay = 2000;
   $('#form-submit').click(function(e){
   e.preventDefault();
       //first name required
       
   var fname = $('#fname').val();
   if(fname == ''){
 	   $('#fname').css('border', '3px solid red');
       $('#error').html(
   '<span style="color:black; border-top:3px solid red; margin-top:15px;font-size:0.8rem">First Name required</span>');
   $('#fname').focus();
   return false;
   }
  //last name required
       
       var lname = $('#lname').val();
   if(lname == ''){
         $('#fname').css('border', '1px solid rgb(187 112 31)');
 	  	   $('#lname').css('border', '3px solid red');
          $('#error').html(
   '<span style="color:black; border-top:3px solid red; margin-top:15px;font-size:0.8rem">Last Name required</span>');

   $('#lname').focus();
   return false;
   }
       
//email  required
       
   var email = $.trim($('#email').val().replace(/\s+/g, ' '));
   if(email == ''){
    $('#fname').css('border', '1px solid rgb(187 112 31)');
        $('#lname').css('border', '1px solid rgb(187 112 31)');
 	  	   $('#email').css('border', '3px solid red');
          $('#error').html(
   '<span style="color:black; border-top:3px solid red; margin-top:15px;font-size:0.8rem">Email Address required</span>');

   $('#email').focus();
   return false;
   }
       
       //invalid email
       
   if( $("#email").val()!='' ){
   if( !isValidEmailAddress( $("#email").val() ) ){
    $('#fname').css('border', '1px solid rgb(187 112 31)');
        $('#lname').css('border', '1px solid rgb(187 112 31)');
 	  	   $('#email').css('border', '3px solid red');
          $('#error').html(
   '<span style="color:black; border-top:3px solid red; margin-top:15px;font-size:0.8rem">Invalid Email Address</span>');
   $('#email').focus();
   return false;
   }
   }
 // invalid Phone Number
       
        var phone = $('#phone').val(),  intRegex = /[0-9 -()+]+$/;
if((phone.length < 10) || (!intRegex.test(phone)))
{
     $('#fname').css('border', '1px solid rgb(187 112 31)');
         $('#lname').css('border', '1px solid rgb(187 112 31)');
         $('#email').css('border', '1px solid rgb(187 112 31)');
 	  	   $('#phone').css('border', '3px solid red');
          $('#error').html(
   '<span style="color:black; border-top:3px solid red; margin-top:15px;font-size:0.8rem">Invalid Phone Number</span>');

   $('#phone').focus();
   return false;
}
        //subject required
       
        var subject = $('#subject').val();
   if(subject == ''){
         $('#fname').css('border', '1px solid rgb(187 112 31)');
         $('#lname').css('border', '1px solid rgb(187 112 31)');
         $('#email').css('border', '1px solid rgb(187 112 31)');
       $('#phone').css('border', '1px solid rgb(187 112 31)');
 	  	   $('#subject').css('border', '3px solid red');
          $('#error').html(
   '<span style="color:black; border-top:3px solid red; margin-top:15px;font-size:0.8rem">subject is required</span>');

   $('#subject').focus();
   return false;
   }
       
       // Massage
   var message = $('#message').val();
   if(message == ''){
        $('#fname').css('border', '1px solid rgb(187 112 31)');
       $('#lname').css('border', '1px solid rgb(187 112 31)');
        $('#email').css('border', '1px solid rgb(187 112 31)');
         $('#phone').css('border', '1px solid rgb(187 112 31)');
         $('#subject').css('border', '1px solid rgb(187 112 31)');
 	  	   $('#message').css('border', '3px solid red');
          $('#error').html(
   '<span style="color:black; border-top:3px solid red; margin-top:15px;font-size:0.8rem">Massage is required</span>');
   $('#message').focus();
      return false;
   } 
   //massage to short
   var mesMinLength = 12;
 
   if (message.length < mesMinLength){
    $('#fname').css('border', '1px solid rgb(187 112 31)');
       $('#lname').css('border', '1px solid rgb(187 112 31)');
        $('#email').css('border', '1px solid rgb(187 112 31)');
         $('#phone').css('border', '1px solid rgb(187 112 31)');
         $('#subject').css('border', '1px solid rgb(187 112 31)');
 	  	   $('#message').css('border', '3px solid red');
          $('#error').html(
   '<span style="color:black; border-top:3px solid red; margin-top:15px;font-size:0.8rem">Massage too short</span>');
   $('#message').focus();
   return false;
   }
       
       //url is not allowed
       if( $("#subject").val()!='' ){
   if(url_in( $("#message").val() ) ){
    $('#fname').css('border', '1px solid rgb(187 112 31)');
       $('#lname').css('border', '1px solid rgb(187 112 31)');
        $('#email').css('border', '1px solid rgb(187 112 31)');
         $('#phone').css('border', '1px solid rgb(187 112 31)');
         $('#subject').css('border', '1px solid rgb(187 112 31)');
 	  	   $('#message').css('border', '3px solid red');
          $('#error').html(
   '<span style="color:black; border-top:3px solid red; margin-top:15px;font-size:0.8rem">URL not allowed in Contact Form</span>');
   $('#message').focus();

   return false;
   }
   }

   //require recaptcha. Are you a Humen??
  //var grecaptcha = $('.g-recaptcha').val();
  var response = grecaptcha.getResponse();
    if(response.length == 0) 
  { 
    //reCaptcha not verified
    $('#fname').css('border', '1px solid rgb(187 112 31)');
    $('#lname').css('border', '1px solid rgb(187 112 31)');
     $('#email').css('border', '1px solid rgb(187 112 31)');
      $('#phone').css('border', '1px solid rgb(187 112 31)');
      $('#subject').css('border', '1px solid rgb(187 112 31)');
      $('#message').css('border', '1px solid rgb(187 112 31)');
           $('.g-recaptcha').css('border', '3px solid red');
       $('#error').html(
'<span style="color:black; border-top:3px solid red; margin-top:15px;font-size:0.8rem">Are you a Humen?</span>');
    $('.g-recaptcha').focus();

    return false;
  }
  
  //captcha verified
  


   //collect form info into var
        var formData = {
        first_name: fname,
        last_name: lname,
        email: email,
        phone: phone,
        subject: subject,
        message: message,
        recaptcha: response,

    };
       //call ajex
   $.ajax
   ({
   type: "POST",
   url: "ajax.php",
   data: formData,
   beforeSend: function() {
   $('.final').html(
   '<div class="loader"></div><br><div class="sending">sending...</div>'
   );
   }, 
   success: function(data)
   {
   setTimeout(function() {
   $('.final').html(data);
   }, delay);
   }
   });
   });
 
});
function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}

function url_in(message) {
    var pattern = /[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;

    return pattern.test(message);
}

