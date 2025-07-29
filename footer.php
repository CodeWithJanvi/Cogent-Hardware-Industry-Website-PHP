<?php
include("header.php");

$contact = mysqli_fetch_Array(mysqli_query($conn,"SELECT * FROM site_setting"));
?>
<!-- ======= Footer ======= -->
 <div class="whatsapp-icon">
        <div class="whatsapp">
            <a href="https://twitter.com/levantaceramica" class="twitter wattsapp"><i class="bx bxl-twitter"></i></a>
       <!--      <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>-->
        <a href="https://www.facebook.com/levantaceramica" class="facebook wattsapp"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/levataceramica/?hl=en" class="instagram wattsapp"><i class="bx bxl-instagram"></i></a>
       
       <a href="https://www.linkedin.com/company/levanta-ceramica/" class="linkedin wattsapp"><i class="bx bxl-linkedin"></i></a>
          <!--   <a href="#" onClick="window.open('https://app.smith.ai/chat/standalone-widget/fd7788fd-7399-4915-8c55-c71075b9eafb/', 'Chat', 'resizable,height=700,width=450'); return false;"><img src="https://s3-us-west-1.amazonaws.com/prod-smith-dynamic/static/chat/chat-icons/smithai-chat-icon.png" width="144" class="wattsapp" alt="Chat"></a>-->
        </div>
    </div>
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">
          <!-- <div class="col-lg-4 col-md-6 footer-newsletter">
            <img src="admin/upload/levanta-logo.png" style="width: 150px;height: 146px;margin-top: -40px;margin-bottom: -37px" />
          </div> -->

          <div class="col-lg-4 col-md-6 footer-contact">
            <h3>Conget Industry Rajkot<span></span></h3>
            <p>
              <?php echo $contact['reach_us']; ?>
              <strong>Phone : </strong>+91<?php echo $contact['call_us']; ?><br>
              <strong>Email : </strong><?php echo $contact['mail_us']; ?><br>
            </p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul type="none">
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.php">About us</a></li>
              
              <li><i class="bx bx-chevron-right"></i> <a href="contact.php">Contact us</a></li>
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li> -->
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
  <h4>Our Categories</h4>
  <ul style="list-style: none; padding-left: 0;">
    <?php 
    $cat = mysqli_query($conn, "SELECT * FROM subcategory LIMIT 5");
    while ($rec = mysqli_fetch_array($cat)) {
    ?>
      <li>
        <i class="bx bx-chevron-right"></i>
        <a href="product.php?id=<?php echo $rec['id']; ?>"><?php echo $rec['sub_name']; ?></a>
      </li>
    <?php
    }
    ?>
  </ul>
</div>

          <!-- <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div> -->

        </div>
      </div>
    </div>

  <div style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap; color: #f1f1f1; padding: 25px; text-align: center; gap: 15px;">

  <!-- Copyright & Design Info -->
  <div>
    <span>
      &copy; Copyright <strong><span>Conget Industry Rajkot</span></strong>. All Rights Reserved.
    </span>
    <span>
      Designed by 
      <a href="https://webcareinfoway.com/" target="_blank" style="color: #f1f1f1; text-decoration: underline; margin-left: 5px;">
        <i>Webcare Infoway</i>
      </a>
    </span>
  </div>

  <!-- Social Icons -->
  <div class="social-links d-flex align-items-center" style="margin-left: 500px;">
    <a href="https://twitter.com/cogentindustry" class="social-icon twitter"><i class="bx bxl-twitter"></i></a>
    <a href="https://www.facebook.com/cogentindustry" class="social-icon facebook"><i class="bx bxl-facebook"></i></a>
    <a href="https://www.instagram.com/lcognentindustry/?hl=en" class="social-icon instagram"><i class="bx bxl-instagram"></i></a>
    <a href="https://www.linkedin.com/company/cogentindustry/" class="social-icon linkedin"><i class="bx bxl-linkedin"></i></a>
  </div>
</div>


  </footer><!-- End Footer -->

  