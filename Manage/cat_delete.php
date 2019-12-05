<?php 
include '../database/db.php';
$Delete_cat = $_GET['cat_delete'];

$que = "DELETE FROM `catagory` WHERE `Cat_id`='$Delete_cat' ";
$res = mysqli_query($con,$que);
if ($res == true ) {

	echo "<script>window.open('../cat_manage.php','_self')</script>";
}
 ?>