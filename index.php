<?php
include("header.php");
include('admin/includes/config.php');
$call=mysqli_query($conn,"select * from site_setting");
$slider=mysqli_query($conn,"select * from slider");
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

<section id="hero" class="d-flex align-items-center">
  <div id="ninja-slider">
    <div class="slider-inner">
      <ul>
        <?php
        $count = 0; // slide index
        $dot_html = ""; // store dot HTML

        while($slid = mysqli_fetch_array($slider)) {
        ?>
          <li class="<?php echo $count === 0 ? 'ns-show' : ''; ?>">
            <a class="ns-img" href="Uploads/<?php echo $slid['slider_image'];?>" style="background-repeat: no-repeat; opacity: 0.5;"></a>
          </li>
        <?php
          // Create dot
          $dot_html .= '<span data-index="'.$count.'" class="dot'.($count === 0 ? ' active' : '').'"></span>';
          $count++;
        }
        ?>
      </ul>
    </div>

    <!-- Dot navigation added below -->
    <div id="slider-dots" class="slider-dots">
      <?php echo $dot_html; ?>
    </div>
  </div>
</section>


<main id="main">
  <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Products</h2>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        <?php 
        include('admin/includes/config.php');
        $pro = mysqli_query($conn, "SELECT * FROM subcategory");

        while ($proo = mysqli_fetch_array($pro)) {
        ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap" style="background:none">
              <img src="Uploads/<?php echo $proo['image']; ?>" class="img-fluid" style="height:300px;" alt="">
              <div class="portfolio-info">
                <p><?php echo $proo['sub_name']; ?></p>
                <div class="portfolio-links">
                  <a href="Uploads/<?php echo $proo['image']; ?>" data-gall="portfolioGallery" class="venobox" title="<?php echo $proo['sub_name']; ?>"><i class="bx bx-plus"></i></a>
                  <a href="product.php?id=<?php echo $proo['id']; ?>" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
</main>
<!-- End Portfolio Section -->
  <section id="about" class="about section-bg">
    <div class="container" data-aos="fade-up">
      <?php 
      $about = mysqli_fetch_array(mysqli_query($conn ,"SELECT * FROM about_us"));
      ?>
      <div class="row no-gutters">
        <div class="content col-xl-5 d-flex align-items-stretch">
          <div class="content">
            <h3><!-- Voluptatem dignissimos provident quasi -->Profile</h3>
            <p align="justify">
            <img src="Uploads/Company2.jpg" alt="Company Profile" style="max-width: 100%; height: auto;">

            </p>
          </div>
        </div>
        <div class="col-xl-7 d-flex align-items-stretch">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-receipt"></i>
                <h4><!-- Corporis voluptates sit -->Our Vision</h4>
                <p align="justify"><?php echo $about['our_vision']; ?></p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-cube-alt"></i>
                <h4><!-- Ullamco laboris nisi --> Our Mission</h4>
                <p align="justify"><?php echo $about['our_mission']; ?></p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-images"></i>
                <h4><!-- Labore consequatur -->Quality Policy</h4>
                <p align="justify"><?php echo $about['quality_policy']; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End About Section -->
<section id="tabs" class="tabs">
  <div class="container" >
    <div class="tab-content">
      <div class="tab-pane active show" id="tab-1">
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
            <h1 class="section-title">WHO WE ARE</h1>

            <?php
// Include your database connection file


// Fetch company_history from the database (adjust table name as needed)
$query = mysqli_query($conn, "SELECT company_history FROM about_us LIMIT 1");

// Check if a row is returned
if ($row = mysqli_fetch_assoc($query)) {
    // Output with HTML decoding (if it contains HTML tags)
    echo "<p>" . htmlspecialchars_decode($row['company_history']) . "</p>";
} else {
    echo "<p>Company history not found.</p>";
}
?>

          </div>
          <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
            <img src="Uploads/Company.jpg" alt="Company Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="services" class="services section-bg">
  <section class="why_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2><center>Why Shop With Us</center></h2>
      </div>
      <div class="row">
        <?php 
        $why = mysqli_query($conn, "SELECT * FROM choose_us");
        while ($rec = mysqli_fetch_array($why)) {
        ?>
          <div class="col-md-4">
            <div class="box" style="height: 78%">
              <div class="img-box">
                <!-- You can add icons here if needed -->
              </div>
              <div class="detail-box">
                <h5><?php echo $rec['title']; ?></h5>
                <p class="justify-text"><?php echo $rec['description']; ?></p>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
</section>

 
      <section id="testimonials" class="testimonials">
        <div id="instafeed-container"></div>
        <script src="https://cdn.jsdelivr.net/gh/stevenschobert/instafeed.js@2.0.0rc1/src/instafeed.min.js"></script>
        <script type="text/javascript">
        var userFeed = new Instafeed({
          get: 'user',
          target: "instafeed-container",
          resolution: 'high_resolution',
          limit:6,
          'display_igtv': false,
          'styling': false,
          'image_size': 480,
          filter: function (image) {
            if (image.type === 'image') {
                return true;
            }
            return false;
          },
          accessToken: 'IGQVJYOXVXc29mcWIxaWRJb1pHV19hck9qNmRoVGtQZAnFvRnZAkSm15bUJQRzRPV2N3ZAE9iNDFPVEZANYjdkMnh5azlGYjAxOUd6RFdiTTQ0czd2TE5TeE9tRnlVSW01cEhTNzVXMTdYUzdnZAlpJNXBURAZDZD'
        });
        userFeed.run();
        </script>
      </section>
    </div>
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

</main>
  <?php
  include("footer.php");
  ?>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
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
</body>
</html>