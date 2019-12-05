<?php 
include '../database/db.php';
	if(isset($_POST['Updatebrand']))
	{
		$Ubr_id = $_POST['UBrandid'];
		$Ubr_name = $_POST['UBrand_name'];
		$Ubr_cat= $_POST['UB_Catagory'];

		$que = "SELECT * FROM `catagory` WHERE `Catagory`='$Ubr_cat' ";
		$res = mysqli_query($con,$que);
		$row = mysqli_fetch_array($res);
		$Ubr_catid = $row[0];
		
	$que1 = "UPDATE `brand` SET `brand_name`='$Ubr_name',`bra_cat`='$Ubr_catid' WHERE `b_id`= '$Ubr_id' ";
	$res1= mysqli_query($con,$que1);
	if ($res1== true) {
		echo "<script>window.open('../brabd_manage.php?Brd_update= Brand has Been Updated successfully','_self')</script>";
	}
	else{
		echo "Error";
	}
	}
 ?>