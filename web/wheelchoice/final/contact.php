<?php include 'includes/header.php'; ?>

    <!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper breadcumb-layout1 pt-175 pb-125" data-bg-src="assets/img/bg/bg-contact.jpg" data-overlay="dark" data-opacity="6">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title sec-title text-white">Contact Us</h1>
                <ul class="breadcumb-menu text-white pt-1">
                    <li><a href="index.php"><i class="far fa-home-lg"></i>Home</a></li>
                    <li class="active">Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
      Contact Form Area
    ==============================-->
    <section class="vs-contact-wrapper vs-contact-layout1 space-top space-md-bottom">
        <div class="container" style="margin: auto; max-width: 600px">
            <div class="row gx-60 align-items-center">
                    <form action="mail.php" method="POST" class="ajax-contact form-wrap5 bg-smoke mb-30" >
                        <div class="form-title">
                            <h3 class="mt-n2 fls-n2 mb-0">Send Us a Message</h3>
                            
                        </div>
                        <div class="form-group mb-15">
                            <input type="text" class="form-control border-0 rounded-0" name="name" id="name" placeholder="Name">
                            <i class="fal fa-user"></i>
                        </div>
                        <div class="form-group mb-15">
                            <input type="text" class="form-control border-0 rounded-0" name="email" id="email" placeholder="E-mail">
                            <i class="fal fa-envelope"></i>
                        </div>
                        <div class="form-group mb-15">
                            <textarea name="message" id="message" cols="30" rows="3" class="form-control border-0 rounded-0" placeholder="Message"></textarea>
                            <i class="fal fa-pencil-alt"></i>
                        </div>
                        <div class="g-recaptcha"  data-sitekey="6LcmypgeAAAAACViCF5IdX2WG_jHIyuD3p17GZyE"></div>
                        <div class="form-btn pt-15">
                            <button type="submit" class="vs-btn">Send Message<i class="fas fa-chevron-right"></i></button>
                        </div>
                        <p class="form-messages error mb-0 mt-3"></p>
                    </form>
               
                
            </div>
            
        </div>
    </section>
<!-- Recupta -->
 <script src="https://www.google.com/recaptcha/api.js"></script>
    <!--==============================
			Footer Area
	==============================-->
        <?php include 'includes/footer.php'; ?>