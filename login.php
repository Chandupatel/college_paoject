<?php 
include 'database/db.php';

$p_detail= $_GET["Detaile"];
	if($p_detail < 1){
		echo "product id not found";
		echo $p_detail;
	}
	else{
  $que = "SELECT * from products p ,brand b ,catagory c where p.brand_id =b.b_id AND p.cat_id =c.Cat_id AND p.pro_id='$p_detail' ";

  $res = mysqli_query($con,$que);

  $row =mysqli_fetch_array($res);
  $prd_name = $row[3];
  $prd_brand = $row[10];
  $prd_cat = $row[11];
  $prd_stock = $row[4];
  $prd_price = $row[5];
  $prd_t_price = $row[6];
  $prd_adddate = $row[7];
}
echo $prd_name;<br/>
echo $prd_brand;
echo $prd_cat;
echo $prd_stock;
echo $prd_price;
echo $prd_t_price;
echo $prd_adddate;
?>