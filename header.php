<?php
include('admin/includes/config.php');
$cat=mysqli_query($conn,"select * from category");
$logo=mysqli_query($conn,"select * from logo");
$slider=mysqli_query($conn,"select * from slider");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cogent Industry Rajkot  Website </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="admin/upload/levanta-logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/ninja-slider.css" rel="stylesheet">
  <link href="assets/css/responsive.css" rel="stylesheet">
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/product_detail.css">
	<style type="text/css">
  	.wattsapp{
			display: block;
		    text-decoration: none;
		    position: fixed;
		    bottom: 63px;
		    right: 2%;
		    overflow: hidden;
		    z-index: 999;
		    width: 70px;
		    height: 50px;
		    border: none;
		    text-indent: 100%;
		}
  
</style>
  <!-- =======================================================
  * Template Name: Presento - v1.1.1
  * Template URL: https://bootstrapmade.com/presento-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-xl-10 d-flex align-items-center">
      <img src="Uploads/Coget_FIt1.png" 
     alt="Company Logo" 
     style="width: 120px; height:90%; background-color: #fffafa;" />

          <nav class="nav-menu d-none d-lg-block" style="margin-left: 15%;  align-content: right;">
            <ul>
              <li class=""><a href="index.php" class="">Home</a></li>
              <li class="drop-down"><a href="#" >Product</a>
                <ul>
                  <?php
                  while($category=mysqli_fetch_array($cat))
                  {
                    ?>
                    <li class="drop-down">
                      <a href="#"><?php echo $category['category_name'] ?>
                      </a> 
                      <?php
                      $subbb=mysqli_query($conn,"select * from subcategory where cat_id='".$category['id']."'");
                      if(mysqli_num_rows($subbb)>0)
                      {
                        ?>
                        <ul>
                          <?php
                          while($category11=mysqli_fetch_array($subbb))
                          {
                            ?>
                            <li>
                              <a href="product.php?id=<?php echo $category11['id']; ?>"><?php echo $category11['sub_name'] ?></a>
                            </li>
                            <?php
                          }
                          ?>
                        </ul>
                        <?php
                      }
                      ?>
                    </li>
                      
                    <?php 
                  } 
                  ?>
                </ul>  
              </li>
              <li><a href="about.php">About</a></li>
              <li><a href="cogent-industry.pdf" download>Download Brochure</a></li>
             
              <li><a href="contact.php">Contact</a></li>
              <li><a href=" https://wa.me/8210633197" target="_blank" class="bi bi-whatsapp"></a></li>
             <!-- <li><a href=" tel:+931-648-5667" class="bi bi-telephone-fill"></a></li>-->
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header><!-- End Header -->

  
