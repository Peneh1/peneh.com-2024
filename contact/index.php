<?php
include('../includes/var/contact.php'); 
include('../includes/sections/header.php'); 
 include('../includes/sections/hero.php'); 
?>
 
  <main id="main">
<!--contact-->
<section class="content-inner">

  <div class="container">

    <div class="row align-items-center">

      <div class="col-xl-6 col-lg-7 m-b30 ">
        <div class="section-head style-1">
          <h6 class="sub-title bgl-primary m-b20 text-primary" data-aos="fade-down" data-aos-duration="1000">Contact Us</h6>

          <h2 class="title" data-aos="fade-up" data-aos-duration="1000">We welcome your queries, concerns, and feedback to improve our services furthermore. Please let us know what you need, and we will get back to your right away.</h2>
        </div>
          <div class="final">
        <form class="dlab-form dzForm" method="POST" action="ajax.php" autocomplete="on">
          <div class="dzFormMsg" id="error"></div>
          <input type="hidden" class="form-control" name="dzToDo" value="Contact">
          <div class="row mt-5">

            <div class="col-sm-6">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                 <i class="far fa-user"></i>
               </span>
             </div>
                  <input id="fname" name="first_name" type="text"  class="form-control" placeholder="First Name">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="far fa-user"></i>
                    </span>
                  </div>
                  <input id="lname" name="last_name" type="text" class="form-control" required="" placeholder="Last Name"></div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-envelope"></i>
                      </span>
                      </div>
                      <input id="email" name="email" type="text" required="" class="form-control" placeholder="Email Address">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-mobile-alt"></i>
                        </span>
                      </div>
                      <input id="phone" name="phone" type="text"  required="" class="form-control" placeholder="Phone No.">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="far fa-bookmark"></i>
                        </span>
                      </div>
                      <input id="subject" name="subject" type="text" class="form-control" required="" placeholder="Subject">
                    </div>
                  </div>
                 <div class="col-sm-12">

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-comment"></i>
                      </span>
                      </div>
                      <textarea id="message" name="message" required="" class="form-control" placeholder="Message" style="padding: 10px 10px 10px 55px;"></textarea>
                    </div>
                  </div>
                  <div>
                    <div>


                    </div>
                  </div>
                  <div class="g-recaptcha" name="recaptcha" data-sitekey="6LeEnZ0aAAAAABnk1qx0OQ9T0J2waG_EZUKMp16k"> </div>
                  <div class="col-sm-12 mt-2">
                    <button id="form-submit" name="submit" class="btn btn-default">Send Message</button>
                    
                    </div>
                  </div>
        </form>
          </div>
              </div>
              <div class="col-xl-6 col-lg-5 m-b30 ">
                <div class="vfx_contact_info_item">
            <h6 class="f_p f_size_20 t_color3 f_500 mt_30 mb_20" data-aos="fade-down" data-aos-duration="1000">Feel free to contact us via Contact Form or a phone call. </h6>
        <p class="f_400 f_size_15">
        <span class="f_400 t_color3">Phone:</span> 
        <a href="tel:8456059776">(845) 605-9776</a></p>
                 <p class="f_400 f_size_15">
        <span class="f_400 t_color3">Website:</span>
         <a href="https://peneh.com">www.peneh.com</a>
       </p>            
          </div>
<!----------------------->
<div class="vfx_contact_info_item">
            <h6 class="f_p f_size_20 t_color3 f_500 mt_30 mb_20" data-aos="fade-up" data-aos-duration="1000"></h6>
      <p class="f_400 f_size_15">
      We look forward to hearing from you!
       </p>            
          </div>



              </div>
            </div>
          </div>
        </section>
        <script>
          
        </script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script src="../assets/js/ajax.js"></script>
        <script src="../assets/js/form-validation.js"></script>
     
         <style>
     

          

.message_box {
	background-color:red;
    position:relative;
  border-radius:.7rem;
	float: right;
	
}

.loader {
  border:.6rem solid #d1710a;
    border-radius: 50%;
  border-top: .6rem solid #65002c;
  width: 10rem;
  height: 10rem;
	margin: auto;
  -webkit-animation: spin 0.5s linear infinite; /* Safari */
  animation: spin 0.5s linear infinite;
}
.sending {
	width: 10rem;
  height: 12rem;
	margin:auto;
	text-align: center;
	font-size: 1.6rem
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
      </style>
<!--contact-->
<!--map-->
<div class="container-fluid">
  <div class="row">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24046.017240987!2d-74.08406902119258!3d41.11810362453262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2c9caf11a7127%3A0xbdd352cb7aa1e754!2sMonsey%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1631189820454!5m2!1sen!2sin" style="border:none;" allowfullscreen="" loading="lazy" class="map"></iframe>
  </div>
</div>
<!--map-->
      
<?php
      include '../includes/sections/our-customers.php';

      include('../includes/sections/footer.php'); 
       include '../includes/sections/g-analytics.php';
?>