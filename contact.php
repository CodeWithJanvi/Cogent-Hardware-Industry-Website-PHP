 <?php 
    include("header.php");
    $call=mysqli_query($conn,"select * from site_setting");
    if (isset($_POST['send'])) 
    {
      $name = $_POST['name'];
      $mail = $_POST['mail'];
      $subject = $_POST['subject'];
      $mobile = $_POST['mobile'];

      $message = $_POST['message'];

      $query = "INSERT INTO `inquiry`(`name`, `mail`, `subject`, `mobile`, `message`) VALUES ('$name','$mail','$subject','$mobile','$message')";
      $result = mysqli_query($conn, $query);
      if ($result) 
      {
      ?>
        <script type="text/javascript">
          alert("Message Send");
        </script>
      <?php
      }
      else
      {
      ?>
        <script type="text/javascript">
          alert("Message Not Send");
        </script>
      <?php
      }
    }

    ?>
    



    <br><br><br>

   
    <!-- ======= Tabs Section ======= -->
        

        <br><br><br>

        <div class="row">
    <div class="col p-4 bg-dark text-white text-center h1">Contact Us</div>
    
  </div>


<section id="contact" class="team section-bg contact">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Contact</h2>
    </div>
    <div class="row align-items-stretch" data-aos="fade-up" data-aos-delay="100">
      
      <!-- Left Column - Contact Info -->
      <div class="col-lg-6 d-flex flex-column justify-content-between">
        <div class="row h-100">
          <?php while($ab = mysqli_fetch_array($call)) { ?>
            <div class="col-12 mb-4">
              <div class="info-box h-100 d-flex flex-column justify-content-center align-items-center">
                <i class="bx bx-map"></i>
                <h3><u>Our Address</u></h3>
                <p><?php echo $ab['reach_us']; ?></p>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="info-box h-100 d-flex flex-column justify-content-center align-items-center">
                <i class="bx bx-envelope"></i>
                <h3><u>Email Us</u></h3>
                <p><?php echo $ab['mail_us']; ?></p>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="info-box h-100 d-flex flex-column justify-content-center align-items-center">
                <i class="bx bx-phone-call"></i>
                <h3><u>Call Us</u></h3>
                <p><?php echo $ab['call_us']; ?></p>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>

      <!-- Right Column - Contact Form -->
      <div class="col-lg-6 d-flex align-items-center">
        <form action="#" method="post" class="w-100">
          <div class="form-row">
            <div class="col form-group">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="col form-group">
              <input type="email" name="mail" class="form-control" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="subject" class="form-control" placeholder="Subject" required>
          </div>
          <div class="form-group">
            <input type="text" name="mobile" class="form-control" placeholder="Enter Number" required>
          </div>
          <div class="form-group">
            <textarea name="message" rows="5" class="form-control" placeholder="Message" required></textarea>
          </div>
          <div class="text-center">
<input type="submit" name="send" value="Send Message" 
style="background-color: #2c3e50; 
       color: white; 
       border: 1px solid rgba(255, 255, 255, 0.4);
       padding: 10px 25px; 
       font-weight: 600; 
       font-size: 16px; 
       border-radius: 6px; 
       ">

          </div>
        </form>
      </div>

    </div>
  </div>
</section>


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