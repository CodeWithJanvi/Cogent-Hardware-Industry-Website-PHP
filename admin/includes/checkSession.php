<?php
  session_start();
  if(isset($_SESSION['admin_username'])){
        echo $_SESSION['admin_username'];
  }else{
    echo "not set";
  }
?>