<?php
//session_start();
  include_once 'includes/config.php';

  if(isset($_POST['SignInAdmin'])){
    $name = $_POST['username'];
    $password = $_POST['password'];
    
    $query = mysqli_query($conn,"SELECT * FROM `admin` WHERE `admin_username` = '$name'");
    $row = mysqli_fetch_assoc($query);

    if($row['admin_password'] == $password)
    {
      // Login Successfull
      $_SESSION['admin_username'] = $name;
      ?>
        <script>
          window.onload=function()
          {
            alert("Login Successfull");
            window.location="index.php";
          }
          
        </script>
      <?php
      //header("location: index.php");
    }
    else
    {
      // wrong Password
      ?>
        <script>
          window.onload=function()
          {
            alert("Username or password incorrect.");
            window.location="login.php";
          }
        </script>
      <?php
      //header("location: ./login.php");
    }

  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cogent Industry Rajkot  Website</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <style>
   body.login-page {
   color: #ffffff;
    font-family:" Arial";
  
  }
  .login-box {
    width: 460px;
    margin: 60px auto;
  border:2px white;
  }

    .card {
    background-color: #2b3944;
    color: #ffffff;
    padding: 35px 30px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
  }

  .card-header .h2,
  .card-body h3,
  .login-box-msg,
  .form-control::placeholder,
  .input-group-text,
  label,
  .form-control {
    color: #ffffff;
    font-family: Arial, sans-serif;
  }

  /* Input fields */
  .form-control {
    background-color: #3c4a56;
    border: 1px solid #55606a;
    padding: 12px 15px;
    font-size: 16px;
    font-family: Arial, sans-serif;
    border-radius: 6px;
  }
  .input-group-text {
    background-color: #3c4a56;
    border: 1px solid #55606a;
    border-radius: 6px 0 0 6px;
  }
  .btn-outline-info {
    color: #ffffff;
    border-color: #ffffff;
    padding: 12px;
    font-size: 17px;
    font-weight: 600; 
    font-family: Arial, sans-serif;
    border-radius: 6px;
    transition: 0.3s ease;
  }

  .btn-outline-info:hover {
    background-color: #ffffff;
    color: #2b3944;
  }
</style>


</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-info">
      <div class="card-header text-center">
        <a href="./" class="h2">Cogent Industry Rajkot  Website</a>
      </div>
      <div class="card-body">
        <div class="text-center">
          <h3>Sign in</h3>
        </div>
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="" method="post">
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            <input type="text" class="form-control" name="username" placeholder="Enter your username">

          </div>
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <input type="password" class="form-control" name="password" placeholder="Password">

          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12 justify-content-center">
              <button type="submit" name="SignInAdmin" class="btn btn-outline-info btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>


        <p class="mb-0 mt-3 text-right">
          <!-- <a href="./register.php" class="text-center">Register</a> -->
        </p>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="./plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./dist/js/adminlte.min.js"></script>
</body>

</html>