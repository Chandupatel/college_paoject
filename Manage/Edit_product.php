<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="Edit<?php echo  $proid;?>"  role="dialog" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div> <h5>Update Page</h5></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				
				<form action="Manage/Code.php" method="post">
					<div class="form-row">
						<div class="col">
							<input type="text" name="Upid" class="form-control" placeholder="Enter Product Name" value="<?php echo $proid;?>" readonly style="border:1px solid black;">
						</div>
						<div class="col">
							<input type="date" name="Update" class="form-control" placeholder="Add Date" value="<?php echo $prd_adddate; ?>" style="border:1px solid black;">
						</div>
					</div>
					<div class="form-row">
						<div class="col">
							<input type="text" name="pname" class="form-control" placeholder="Enter Product Name" value="<?php echo $pro_name; ?>" style="border:1px solid black; margin-top: 15px;">
						</div>
						<div class="col">
							<select name="UP_Brand" style="width: 100%; height: 40px;border-radius:5px; font-size: 20px;margin-top: 15px; border:1px solid black;" >
								<option value="<?php echo $bra_name; ?>"><?php echo $bra_name; ?></option>
								<?php
								while($row1 =mysqli_fetch_array($res1)){
								$Brand_name = $row1[1]; ?>
								?>
								<option value="<?php echo $Brand_name;?>"><?php echo $Brand_name; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<select name="UPCatagory" style="width: 100%; height: 40px;border-radius:5px; font-size: 20px;margin-top: 15px; border:1px solid black;">
						<option value="<?php echo $prd_cat; ?>"><?php echo $prd_cat; ?></option>
						<?php
						while($row2 =mysqli_fetch_array($res2)){
						$cat_name = $row2[2]; ?>
						?>
						<option value="<?php echo $cat_name;?>"><?php echo $cat_name; ?></option>
						<?php } ?>
					</select>
					<input type="text" name="Upunit" placeholder="Enter Totel Units" value="<?php echo $unit;?> " style="width: 100%; height: 40px;border-radius:5px; font-size: 20px; margin-top: 15px; border:1px solid black;">
					
					<input type="text" name="Up_price" placeholder="Enter Price" value="<?php echo $prd_price ; ?>" style="width: 100%; height: 40px;border-radius:5px; font-size: 20px; margin-top: 15px; border:1px solid black;">
					<hr>
					<button type="button" class="btn btn-secondary" data-dismiss="modal" style=" margin-left: 60%;">Close</button>
					
					<button type="submit" class="btn btn-success" name="Updateproduct" style="margin-left:15px;">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>