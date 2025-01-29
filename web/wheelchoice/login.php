<?php include 'includes/header.php'; ?>

   
    <!--==============================
      Contact Form Area
    ==============================-->
    <section class="vs-contact-wrapper vs-contact-layout1 space-top space-md-bottom">
        <div class="container" style="margin: auto">
            <div class="row gx-60 align-items-center">
                <div class="col-lg-6">
                    <form action="account.php" method="post" id="VisitorsLogForm" onsubmit="return validateRecaptcha();" class="ajax-contact form-wrap5 bg-smoke mb-30">
                        <div class="form-title">
                            <h3 class="mt-n2 fls-n2 mb-0">Log In</h3>
                            
                        </div>
                        <div class="form-group mb-15">
                            <input type="text" class="form-control border-0 rounded-0" name="name" id="name" placeholder="Username">

                            <i class="fal fa-user"></i>
                        </div>
                        <div class="form-group mb-15">
                            <input class="form-control border-0 rounded-0" type="password" name="message" id="psw" placeholder="Passward">
                            <i class="fal fa-lock-alt"></i>
                        </div>
                        <div class="form-c">
                        <div class="g-recaptcha" data-sitekey="6LcmypgeAAAAACViCF5IdX2WG_jHIyuD3p17GZyE"></div></div>
                        <div class="form-btn pt-15">
                            <button type="submit" class="vs-btn">Send Message<i class="fas fa-chevron-right"></i></button>
                        </div>
                        <p class="form-messages error mb-0 mt-3"></p>
                    </form>
                </div>
                
            </div>
            
        </div>
    </section>
<!-- Recupta -->
<script src="https://www.google.com/recaptcha/api.js"></script>



    <!--==============================
			Footer Area
	==============================-->
        <?php
include 'includes/footer.php';
?>