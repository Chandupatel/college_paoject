<?php 
include '../database/db.php';
if(isset($_POST['addcart'])){
$cart = $_GET['cart'];
$cartunit = $_POST['unit'];

$que = "SELECT * FROM `products` WHERE `pro_id` ='$cart' ";
$res = mysqli_query($con,$que);
$row = mysqli_fetch_array($res);
$pid = $row[0];
$pname = $row[3];
$punit = $row[4];
$prprice = $row[5];
$totel_p = $cartunit * $prprice;

if ($punit < $cartunit) {
	
	echo "<script>window.open('Sell.php?Stocknot= Totel Stock Not Aveleble','_self')</script>";
}
 else{
 	$que1 = "INSERT INTO `cart`(`pr_id`, `prd_name`, `cart_unit`, `prd_price`, `prd_t_prie`) VALUES ('$pid','$pname','$cartunit','$prprice','$totel_p')";

 		$res1 = mysqli_query($con,$que1);
 		if ($res1 == true) {
 			
 			echo "<script>window.open('Sell.php','_self')</script>";
 		}
 		else{
 			echo "error";
 		}
 }
}
 ?>