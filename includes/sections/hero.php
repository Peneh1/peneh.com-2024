 <!-- ======= Hero Section ======= -->
  <section class="hero-section" id="hero" style="background: linear-gradient(to right, rgba(87, 1, 47, 0.9) 0%, rgba(187, 112, 31, 0.9) 100%), url(<?php echo $location;?>assets/images/banner.jpg);">

    <div class="wave">

      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 1920 421" style="enable-background:new 0 0 1920 421;" xml:space="preserve">
<style type="text/css">
  .st0{fill:#FFFFFF;}
</style>
<path id="XMLID_1_" class="st0" d="M0,25.1c0,0,250.7,39.2,546.7,154.8c0,0,303.5,108.1,403.4,128.7c0,0,228.6,74.6,650.4-14.9
  l329.9-98.8v224.7H0V25.1z"/>
</svg>


    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 hero-text-image">
          <div class="row">
            <div class="col-lg-7 col-md-7 text-center text-lg-left" data-aos="fade-down" data-aos-duration="1000">
              <h1><?php echo $hero['h1']; ?></h1>
              <p class="mb-5"><?php echo $hero['p']; ?></p>
              <p><a href="<?php echo $location;?>contact/" class="btn btn-outline-white">Get In Touch</a></p>
            </div>
           <div class="col-lg-5 col-md-5">
             <div class="right-part">
               <div class="right-part-image" data-aos="fade-right" data-aos-duration="1000">
                 <img src="<?php echo $location;?>assets/images/<?php echo $hero['man']; ?>.png" class="img-fluid">
               </div>
               <div class="icon-one">
                 <img src="<?php echo $location;?>assets/images/icon1.png" class="img-fluid">
               </div>
               <div class="icon2">
                 <img src="<?php echo $location;?>assets/images/icon2.png" class="img-fluid">
               </div>
               <div class="icon3">
                 <img src="<?php echo $location;?>assets/images/icon3.png" class="img-fluid">
               </div>
             </div>
           </div>
          </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->