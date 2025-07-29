 <?php 
    include("header.php");

    ?>
    



    <br><br><br>

   
    <!-- ======= Tabs Section ======= -->
        

        <br><br><br>

        <div class="row">
    <div class="col p-4 bg-dark text-white text-center h1">ABOUT US</div>
    
  </div>


  <section id="tabs" class="tabs">
      <div class="container" data-aos="fade-up">
        <div class="tab-content">
          <div class="tab-pane active show" id="tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                <h1>WHO WE ARE</h1>
                <p class="font-italic">
                  <?php 
                  $ab = mysqli_fetch_array(mysqli_query($conn ,"SELECT * FROM about_us"));
                  echo $ab['company_history'];
                  ?>
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                <img src="Uploads/Company.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          
        </div>

      </div>
    </section><!-- End Tabs Section -->




    
    <!-- ======= About Section-->
   <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">
        <?php 
          $about = mysqli_fetch_array(mysqli_query($conn ,"SELECT * FROM about_us"));
        ?>
        <div class="row no-gutters">
          <div class="content col-xl-5 d-flex align-items-stretch">
            <div class="content">
              <h3>Profile</h3>
              <p align="justify">
                <img src="Uploads/Company2.jpg" alt="Company Profile" style="max-width: 100%; height: auto;">
              </p>
              <!-- <a href="#" class="about-btn"><span>About us</span> <i class="bx bx-chevron-right"></i></a> -->
            </div>
          </div>
          <div class="col-xl-7 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-receipt"></i>
                  <h4>Our Vision</h4>
                  <p align="justify"><?php echo $about['our_vision']; ?></p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Our Mission</h4>
                  <p align="justify"><?php echo $about['our_mission']; ?></p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bx bx-images"></i>
                  <h4>Quality Policy</h4>
                  <p align="justify"><?php echo $about['quality_policy']; ?></p>
                </div>
               <!--  <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bx bx-shield"></i>
                  <h4>Beatae veritatis</h4>
                  <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                </div> -->
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section> <!--End About Section -->
<br><br><br>


<!--<div class="container p-3 my-7 bg-dark text-white text-center">
  
    <h1>OUR DIIFFERENT DIVISIONS</h1>
</div>-->


    <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/ninja-slider.js"></script>


    




    <?php
    include("footer.php");
    ?>