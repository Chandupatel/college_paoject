<?php
	include '../database/db.php';
	if(isset($_POST['Updateproduct']))
	{
		$up_id =$_POST['Upid'];
		$up_date =$_POST['Update'];
		$up_prd_name =$_POST['pname'];
		$up_prd_brand =$_POST['UP_Brand'];
		$up_prd_cat  = $_POST['UPCatagory'];
		$up_prd_unit = $_POST['Upunit'];
		$up_prd_price = $_POST['Up_price'];
		$upt_price = $up_prd_price * $up_prd_unit ;

	$que= "SELECT b.b_id,c.cat_id FROM brand b, catagory c, products p WHERE b.brand_name='$up_prd_brand' AND c.Catagory='$up_prd_cat' AND p.pro_id ='$up_id'";
	$res = mysqli_query($con,$que);
	$row = mysqli_fetch_array($res);
	$br_id = $row[0];
	$catg_id = $row[1];
	
	$que1 = "UPDATE `products` SET `brand_id`='$br_id',`cat_id`='$catg_id',`product_name`='$up_prd_name',`product_stock`='$up_prd_unit',`product_price`='$up_prd_price',`total_price`='$upt_price',`add_date`='$up_date' WHERE `pro_id` = '$up_id' ";
	$res1 = mysqli_query($con,$que1);
	
	if ($res1 == true) {

		echo "<script>window.open('../Manage.php?Prd_update= Data has Been Updated successfully','_self')</script>";
	}
	else{
		echo "Error";
	}


	}
?>