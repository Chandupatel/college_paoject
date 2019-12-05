<?php
include 'database/db.php';

$que= "SELECT * FROM `catagory` WHERE `Parent_cat`=0";
$res = mysqli_query($con,$que);

?>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="Catagory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Catagories</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="deshbord.php" method="post">
					<input type="text" name="Catagory" placeholder="Enter Catagory Name" style="width: 100%; height: 40px;border-radius:5px; font-size: 20px;">
					<select name="Par_cat" style="width: 100%; height: 40px;border-radius:5px; font-size: 20px;margin-top: 15px;">
						<option value="">Select Parent Catagory </option>
						<?php 
							while($row =mysqli_fetch_array($res)){
						 $cat_name = $row[2]; ?>
						 ?>
						 <option value="<?php echo $cat_name;?>"><?php echo $cat_name; ?></option>
						<?php } ?>
					</select>

					<button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-top: 20px; margin-left: 70%;">Close</button>
					<button type="submit" class="btn btn-primary" name="Addcat" style="margin-top:20px;">Add</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
if (isset($_POST['Addcat'])){
	$Catagory= $_POST['Catagory'];
	$Parent = $_POST['Par_cat'];
	
	$que2 = "SELECT * FROM `catagory` WHERE `Catagory` = '$Catagory' ";
	$res2 = mysqli_query($con,$que2);
	$row1 = mysqli_num_rows($res2);
	if($row1>0){
		echo "Catagory Exist";
	}

	else{
	$que1= "SELECT * FROM `catagory` WHERE `Catagory`= '$Parent'";
	$res1 = mysqli_query($con,$que1);
	$row =mysqli_fetch_array($res1);
	$Cat_id = $row[0];
	$quary= "INSERT INTO `catagory`(`Parent_cat`, `Catagory`) VALUES ('$Cat_id','$Catagory')";
		$res1 = mysqli_query($con,$quary);
		if ($res1== true) {
			echo "Catagory Complet Add";
		}
	}
	
}
?>