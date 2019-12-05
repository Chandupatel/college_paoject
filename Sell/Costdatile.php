<?php 
include '../database/db.php';
if(isset($_POST['sellprd'])){
	$prdid = $_POST['pid'];
	$cname = $_POST['ocname'];
	$cmob = $_POST['cmobile'];
	$cemail = $_POST['coemail'];
	$choaddress = $_POST['coaddr'];
	$cdistic = $_POST['codistic'];
	$cstate = $_POST['costate'];
	$cpincode = $_POST['copin'];
	$puit = $_POST['unit'];
	$p_price = $_POST['price'];
	$total = $puit * $p_price ;
	
	$que2 = "SELECT `product_name`, `product_stock` FROM `products` WHERE `pro_id`='$prdid' ";
	$res2 = mysqli_query($con,$que2);
	$row2 = mysqli_fetch_array($res2);
	$prdname= $row2[0];
	$prdunit= $row2[1];
	if ($puit> $prdunit) {
		echo "stock not avalivle in given unit";
	}
	else{
		$avlunit =$prdunit - $puit;
		$que3 = "UPDATE `products` SET `product_stock`='$avlunit'  WHERE `pro_id`='$prdid' ";
		$res3= mysqli_query($con,$que3);

		$que4 = "INSERT INTO `sell`(`prid`, `prdname`, `unit`, `price`, `total_pric`, `co_name`, `comobil`, `coemail`, `home_address`, `distic`, `state`, `pincode`) VALUES ('$prdid','$prdname','$puit','$p_price','$total','$cname','$cmob','$cemail','$choaddress','$cdistic','$cstate','$cpincode')";
		$res4 = mysqli_query($con,$que4);
		if ($res4 == true) {
			echo "<script>window.open('Sell.php?Selled=Product has been Selled','_self')</script>";
		}
	}
}

?>