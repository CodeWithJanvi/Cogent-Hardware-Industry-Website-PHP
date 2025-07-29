<?php 
  include("header.php");
  include("includes/config.php"); // Ensure database connection

  if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize input

    $result = mysqli_query($conn, "SELECT * FROM product WHERE id = $id");

    if ($result && mysqli_num_rows($result) > 0) {
      $cat = mysqli_fetch_array($result);
    } else {
      echo "<div class='alert alert-danger text-center mt-5'>Product not found or invalid ID.</div>";
      include("footer.php");
      exit();
    }
?>

<br><br><br>

<!-- ======= Product Title Section ======= -->
<div class="row">
  <div class="col p-4 bg-dark text-white text-center h1">
    <?php echo htmlspecialchars($cat['product_name']); ?>
  </div>
</div>

<!-- ======= Product Detail Section ======= -->
<section id="team" class="team">
  <div class="container" data-aos="fade-up">
    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <!-- Product Image -->
      <div class="member d-flex align-items-stretch col-md-6">
        <img src="Uploads/<?php echo htmlspecialchars($cat['product_image']); ?>" 
             style="width: 100%; height: auto;" 
             id="main-image" 
             class="img-fluid" 
             alt="<?php echo htmlspecialchars($cat['product_name']); ?>">
      </div>

      <!-- Product Info -->
      <div class="member-info col-md-6">
        <h4><?php echo htmlspecialchars($cat['product_name']); ?></h4>
        <p align="justify"><?php echo nl2br(htmlspecialchars($cat['description'])); ?></p>
      </div>
    </div>
  </div>
</section>

<?php 
  } else {
    // No ID provided, show all subcategories
    $subcats = mysqli_query($conn, "SELECT * FROM subcategory");
?>

<br><br><br>
<div class="container">
  <div class="row text-center mb-3">
    <div class="col">
      <h2 class="text-dark">All Subcategories</h2>
    </div>
  </div>

  <div class="row">
    <?php while ($row = mysqli_fetch_assoc($subcats)) { ?>
      <div class="col-md-4 mb-4 text-center">
        <!-- Subcategory Name Outside Card -->
        <h5 class="mb-2 font-weight-bold text-dark"><?php echo htmlspecialchars($row['sub_name']); ?></h5>

        <!-- Card with Image Inside -->
        <div class="card shadow-sm border rounded p-2">
          <?php if (!empty($row['image'])) { ?>
            <img src="Uploads/<?php echo htmlspecialchars($row['image']); ?>" 
                 class="card-img-top" 
                 style="height: 200px; object-fit: cover;" 
                 alt="<?php echo htmlspecialchars($row['sub_name']); ?>">
          <?php } else { ?>
            <p class="text-muted">No image available</p>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php } ?>

<!-- JS to switch image -->
<script>
  function change_image(image) {
    var container = document.getElementById("main-image");
    container.src = image.src;
  }
</script>

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
