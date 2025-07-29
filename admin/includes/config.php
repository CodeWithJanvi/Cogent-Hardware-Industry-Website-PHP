<?php
if(!isset($_SESSION)) { 
    session_start(); 
  }

   
    $db_name = 'conget_industry';



    $conn=mysqli_connect("localhost","root","","conget_industry");

    mysqli_select_db($conn,$db_name);

?>