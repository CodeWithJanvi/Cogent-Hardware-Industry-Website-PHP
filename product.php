<?php 
  include("header.php");
  include("admin/includes/config.php");

  $sub = null;
  $pro = null;
  $heading = "";

  if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Get subcategory info
    $sub_result = mysqli_query($conn, "SELECT * FROM subcategory WHERE id = '$id'");
    if (mysqli_num_rows($sub_result) > 0) {
      $sub = mysqli_fetch_array($sub_result);
      $heading = $sub['sub_name'];

      // Get products under this subcategory
      $pro = mysqli_query($conn, "SELECT * FROM product WHERE sub_cat = '$id'");
    } else {
      $heading = "Subcategory Not Found";
    }
  } else {
    // No subcategory selected, fetch all products
    $heading = "All Products";
    $pro = mysqli_query($conn, "SELECT * FROM product");
  }
?>

<br><br><br><br><br>

<!-- Heading -->
<div class="row">
  <div class="col p-4 bg-dark text-white text-center h1">
    <?php echo $heading; ?>
  </div>
</div>

<!-- Product List -->
<section id="team" class="team">
  <div class="container" data-aos="fade-up">
    <div class="section-title"></div>
    <div class="row">
      <?php 
        if ($pro && mysqli_num_rows($pro) > 0) {
          while ($ress = mysqli_fetch_array($pro)) {
      ?>
      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member" data-aos="fade-up" data-aos-delay="100">
          <div class="member-img">
            <img src="Uploads/<?php echo $ress['product_image']; ?>" style="height: 300px; width: 100%;" class="img-fluid" alt="">
            <div class="social">
              <a href="Uploads/<?php echo $ress['product_image']; ?>" data-gall="portfolioGallery" class="venobox" title="<?php echo $ress['product_name']; ?>"><i class="bx bx-plus"></i></a>

            </div>
          </div>
          <div class="member-info">
            <h4><?php echo $ress['product_name']; ?></h4>
          </div>
        </div>
      </div>
      <?php
          }
        } else {
          echo "<div class='col-12 text-center'><p class='text-muted'>No products found.</p></div>";
        }
      ?>
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

<?php include("footer.php"); ?>
