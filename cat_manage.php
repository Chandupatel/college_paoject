<!DOCTYPE html>
<html>
	<head><title>Inventory System</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/       popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include 'templet/header.php'; ?>
		<div class="container" style="border: 1px solid black; margin-top: 20px;">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Cat id</th>
						<th>Catagory Name </th>
						<th>Pr. Cat. Id</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php include 'database/db.php';
						$que = "SELECT * FROM `catagory`";
						$res = mysqli_query($con,$que);
						$sir = 1;
						while($row =mysqli_fetch_array($res)){
							$que1= "SELECT * FROM `catagory` WHERE `Parent_cat`=0";
							$res1 = mysqli_query($con,$que1);

						$ucatid = $row[0];
						$uppcat= $row[1];
						$upcatname = $row[2];

						$que2= "SELECT * FROM `catagory` WHERE `Parent_cat`='$ucatid' ";
						$res2 = mysqli_query($con,$que2);


						 ?>
						<td><?php echo $ucatid; ?></td>
						<td><?php echo $upcatname; ?></td>
						<td><?php echo $uppcat; ?></td>
						<td>
							<a data-toggle="modal"  href="#Edit<?php echo  $ucatid;?>" class="btn btn-success" class="btn btn-success"style="height:30px; line-height:15px;">Edit
							</a>
						</td>
						<!-- Button trigger modal -->
						<!-- Modal -->
						<div class="modal fade" id="Edit<?php echo  $ucatid;?>"  role="dialog" >
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<div> <h6>Catagory Update</h6></div>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										
										<form action="Manage/Edit_cat.php" method="post">
											<div class="form-row">
												<div class="col"><input type="text" class="form-control" name="Ucatid" readonly value="<?php echo  $ucatid;?>" style="font-size: 20px; border:1px solid black; "></div>
												<div class="col">
													<input type="text" name="Ucat_name" class="form-control" placeholder="Enter Brand Name" value="<?php echo $upcatname;?>" style="font-size: 20px; border:1px solid black;">
												</div>
											</div>
											<select name="Upar_Catagory" class="form-control" style="margin-top: 15px; font-size: 20px; border:1px solid black; ">
												<option value=""><----Update Parent car-------></option>
												<?php 
												 while($row =mysqli_fetch_array($res1)){
						 						 $cat_name = $row[2]; ?>
						 						 ?>
						 						<option value="<?php echo $cat_name;?>"><?php echo $cat_name; ?></option>
												<?php } ?>
											</select>
											<hr>
											<button type="button" class="btn btn-secondary" data-dismiss="modal" style=" margin-left: 60%;">Close</button>
											<button type="submit" class="btn btn-success" name="Updatecat" style="margin-left:15px;">Update</button>
										</form>
									</div>
								</div>
							</div>
						</div>

						<td>
							<a data-toggle="modal"  href="#Delete<?php echo  $ucatid;?>" class="btn btn-danger" class="btn btn-danger"style="height:30px; line-height:15px;">Delete
							</a>
						</td>

						<!-- Button trigger modal -->
						<!-- Modal -->
						<div class="modal fade" id="Delete<?php echo  $ucatid;?>"  role="dialog" >
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<div> <h6>Delete catagory</h6></div>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="row" >
											<div  class="col-md-3" style=" margin-left: 20px;" ><img src="image/Deletw.png" class="rounded" alt="Cinque Terre" style="width: 100px; "></div>
											<div  class="col-md-8" ><h5>Are You Shure delete catagory </h5><br><h2 style="margin-left: 40px;"><?php echo  $upcatname;?></h2></div>
										</div>
										<form method="post" action="Manage/cat_delete.php?cat_delete=<?php echo $ucatid; ?>" " >
											<button type="submit" class="btn btn-danger"  style="margin-top: 20px; margin-left: 30%; width: 80px;">Yes</button>
										</form>
										<button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-top: 20px; margin-left: 20px; width: 80px; ">NO</button>
										<hr>
									</div>
								</div>
							</div>
						</div>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</body>
</html>