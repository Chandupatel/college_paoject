<?php 
include '../database/db.php';
$cart = $_GET['consell'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Inventory System </title>
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
	<?php include '../templet/header.php'; ?>
	<div class="container" style="margin-top: 50px;">
		<div class="row" >
			<div class="col-md-7" style=" margin-left: 25px; margin-top: 10px; border: 1px solid black; height: 200px;">
				<table class="table" style="margin-top: 10px;">
					<thead class="thead-light">
						<tr>
							<th>Product name</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php 
							$que = "SELECT * FROM `products` WHERE `pro_id`='$cart' ";
							$res = mysqli_query($con,$que);
							$row = mysqli_fetch_array($res);
							$pid = $row[0];
							$pname = $row[3];
							$unit = $row[4];
							$price = $row[5];
							?>
							<td><?php echo $pname; ?></td>
							<td><?php echo $price; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-4" style=" margin-left: 20px; margin-top: 10px;">
				<form method="post" action="Costdatile.php">
					<input type="text" class="form-control" name="pid" value="<?php echo $pid; ?>" readonly>
					<input type="text" class="form-control" name="ocname" placeholder="Enter costemer  Name" style="margin-top: 10px;" >
					<input type="text" class="form-control" name="cmobile" placeholder="MObile Number"style="margin-top: 10px;">
					<input type="text" class="form-control" name="coemail" placeholder="Enter Email " style="margin-top: 10px;">
					<input type="text" class="form-control" name="coaddr" placeholder=" Home/city/Addredd" style="margin-top: 10px;">
					<input type="text" class="form-control" name="codistic" placeholder="Distic" style="margin-top: 10px;">
					<input type="text" class="form-control" name="costate" placeholder="State" style="margin-top: 10px;">
					<input type="text" class="form-control" name="copin" placeholder="Pincode" style="margin-top: 10px;">
					<input type="number" name="unit" class="form-control" value="1" placeholder="Unit" style="margin-top: 10px;">
					<input type="text" class="form-control" name="price" placeholder="price" value="<?php echo $price; ?>" style="margin-top: 10px;">
					<input type="text" id="total" class="form-control"  placeholder="total Price" style="margin-top: 10px;">
					<input type="submit" name="sellprd" class="btn btn-primary" value="Sell" style="margin-top: 10px; float: right;">
				</form>
			</div>
		</div>
		

	</div>
	
</body>
</html>
