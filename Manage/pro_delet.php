<?php 
include '../database/db.php';
$Delete_prd = $_GET['Delete'];

$que = "DELETE FROM `products` WHERE `pro_id` = '$Delete_prd' ";
if (mysqli_query($con,$que))
  {
	  echo"<script>window.open('../Manage.php?Prd_Delete= Product has Been Deleted successfully....','_self')</script>";
  }

 ?>