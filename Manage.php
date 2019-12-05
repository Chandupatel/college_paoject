<!DOCTYPE html>
<html>
	<head>
		<title>Inventory System</title>
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

		<center><font color= '#228B22'><?php echo @$_GET['Prd_update'];?></font></center> 
		
		<div class="container" style="border: 1px solid black; margin-top: 20px;">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>S No</th>
						<th>Product Name</th>
						<th>Brand Name </th>
						<th>Unit</th>
						<th>Edit</th>
						<th>Delete</th>
						<th>Detailes</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						include 'database/db.php';
						$que =" SELECT * from products p ,brand b ,catagory c where p.brand_id =b.b_id AND p.cat_id =c.Cat_id";
						$res = mysqli_query($con,$que);
						$sir = 1;
						while($row =mysqli_fetch_array($res)){
						
						$que1 = "SELECT * FROM `brand`;";
						$res1 = mysqli_query($con,$que1);
						
						$que2= "SELECT * FROM `catagory` WHERE `Parent_cat` > 0 ";
						$res2 = mysqli_query($con,$que2);
						
						$proid = $row[0];
						$pro_name = $row[3];
						$unit = $row[4];
						$prd_price = $row[5];
						$prd_t_price = $row[6];
						$prd_adddate = $row[7];
						$bra_name = $row[10];
						$prd_cat = $row[15];
						?>
						<td><?php echo $sir;$sir++; ?></td>
						<td><?php echo $pro_name; ?></td>
						<td><?php echo $bra_name; ?></td>
						<td><?php echo $unit; ?></td>
						<td>
							<a data-toggle="modal"  href="#Edit<?php echo  $proid;?>" class="btn btn-warning" class="btn btn-warning"style="height:30px; line-height:15px;">Edit
						</a>
					</td>
					
					<td>
						<a data-toggle="modal"  href="#Delete<?php echo $proid;?>" class="btn btn-danger" class="btn btn-danger"style="height:30px; line-height:15px;">Delete
						</a>
					</td>
					<td>
						<a data-toggle="modal"  href="#Detailes<?php echo  $proid;?>" class="btn btn-success" class="btn btn-success"style="height:30px; line-height:15px;">Detailes
						</a>
					</td>
					<?php include 'Manage/Detaile_product.php'; ?>
					<?php include 'Manage/Edit_product.php';?>
					<?php include 'Manage/Delete_product.php';?>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>
