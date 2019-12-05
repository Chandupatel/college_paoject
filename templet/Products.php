<?php 
include 'database/db.php';
	$que = "SELECT * FROM `brand`;";
	$res = mysqli_query($con,$que);

	$que1= "SELECT * FROM `catagory` WHERE `Parent_cat` > 0 ";
	$res1 = mysqli_query($con,$que1);
 ?>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="Product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="deshbord.php" method="post">
					<div class="form-row">
						<div class="col">
							<input type="text" name="pdate" class="form-control" placeholder="Add Date" value="<?php echo date("Y-m-d"); ?>" readonly style="border:1px solid black;">
						</div>
						<div class="col">
							<input type="text" name="pname" class="form-control" placeholder="Enter Product Name" style="border:1px solid black;">
						</div>
					</div>
					
					<select name="P_Brand" style="width: 100%; height: 40px;border-radius:5px; font-size: 20px;margin-top: 15px; border:1px solid black;" >
						<option value=""><-------------Select Product Brand-------------></option>
						<?php 
						while($row =mysqli_fetch_array($res)){
						 $Brand_name = $row[1]; ?>
						 ?>
						 <option value="<?php echo $Brand_name;?>"><?php echo $Brand_name; ?></option>
						<?php } ?>
					</select>
					<select name="P_Catagory" style="width: 100%; height: 40px;border-radius:5px; font-size: 20px;margin-top: 15px; border:1px solid black;">
						<option value=""><-------------Select product catigary-------------> </option>
						<?php
						while($row1 =mysqli_fetch_array($res1)){
						$cat_name = $row1[2]; ?>
						?>
						<option value="<?php echo $cat_name;?>"><?php echo $cat_name; ?></option>
						<?php } ?>
					</select>
					<input type="text" name="punit" placeholder="Enter Totel Units" style="width: 100%; height: 40px;border-radius:5px; font-size: 20px; margin-top: 15px; border:1px solid black;">
					
					<input type="text" name="p_price" placeholder="Enter Price" style="width: 100%; height: 40px;border-radius:5px; font-size: 20px; margin-top: 15px; border:1px solid black;">
					
					<button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-top: 20px; margin-left: 70%;">Close</button>
					
					<button type="submit" class="btn btn-primary" name="Addproduct" style="margin-top:20px;">Add</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php 
		if (isset($_POST['Addproduct'])){
		$Brand_name= $_POST['P_Brand'];
		$Cat_name= $_POST['P_Catagory'];
		$Product_name= $_POST['pname'];
		$Product_Stock= $_POST['punit'];
		$Product_price= $_POST['p_price'];
		$P_total_price= $Product_Stock * $Product_price;
		$Product_AddDate= $_POST['pdate'];

		$que2 = "SELECT * FROM `brand` WHERE `brand_name`='$Brand_name' ";
		$res2 = mysqli_query($con,$que2);
		$row2 =mysqli_fetch_array($res2);

		$Br_id = $row2[0];
		$cat_id = $row2[2];

		$que3 = "SELECT * FROM `products` WHERE `product_name`='$Product_name' ";
		$res3 = mysqli_query($con,$que3);
		$row3 = mysqli_num_rows($res3);
		if ($row3>0){
		echo "Products Exist";
		}

	else{
		$que4 = "INSERT INTO `products`(`brand_id`, `cat_id`, `product_name`, `product_stock`, `product_price`, `total_price`, `add_date`) VALUES ('$Br_id','$cat_id','$Product_name','$Product_Stock','$Product_price','$P_total_price','$Product_AddDate')";

		$res4 = mysqli_query($con,$que4);
		if ($res4 == true) {

		   echo "Products Add";
		}
		else{
			echo "Errorfind ";
		}
	}
}
 ?>