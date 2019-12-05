<?php
include 'database/db.php';
$que= "SELECT * FROM `catagory` WHERE `Parent_cat` > 0 ";
$res = mysqli_query($con,$que);
?>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="Brands" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="deshbord.php" method="post">
					<input type="text" name="Brand_name" placeholder="Enter Brand Name" style="width: 100%; height: 40px;border-radius:5px; font-size: 20px;">
					<select name="B_Catagory" style="width: 100%; height: 40px;border-radius:5px; font-size: 20px;margin-top: 15px;">
						<option value="">Select Catagory </option>
						<?php
						while($row =mysqli_fetch_array($res)){
						$cat_name = $row[2]; ?>
						?>
						<option value="<?php echo $cat_name;?>"><?php echo $cat_name; ?></option>
						<?php } ?>
					</select>
					
					<button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-top: 20px; margin-left: 70%;">Close</button>
					<button type="submit" class="btn btn-primary" name="Addbrand" style="margin-top:20px;">Add</button>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<?php
 
if (isset($_POST['Addbrand'])){

	$Brand_name= $_POST['Brand_name'];
	$b_cat = $_POST['B_Catagory'];

	$que1 = "SELECT * FROM `brand` WHERE `brand_name` = '$Brand_name' ";
	$res1 = mysqli_query($con,$que1);
	$row1 = mysqli_num_rows($res1);

	if($row1>0){
		echo "Brand Exist";
	}

	else{
		$que2 = "SELECT * FROM `catagory` WHERE `Catagory`= '$b_cat' ";
		$res2 = mysqli_query($con,$que2);
		$row2 =mysqli_fetch_array($res2);
		$Cat_id = $row2[0];
		$que3 = "INSERT INTO `brand`(`brand_name`, `bra_cat`) VALUES ('$Brand_name','$Cat_id')";
		$res3 = mysqli_query($con,$que3);
		if ($res3== true) {


			echo "Brand Complet Add";
		}
	}
}
 ?>