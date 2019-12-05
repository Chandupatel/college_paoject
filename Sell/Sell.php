<?php 	include '../database/db.php';
$que1 = "SELECT * FROM `cart`";
$res1 = mysqli_query($con,$que1);
$row = mysqli_num_rows($res1);

 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Inventory System</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/       popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/style.css">
		
	</head>
	<body>
		<?php include '../templet/header.php'; ?>
		
		<div class="container" style="margin-top: 10px;">
			<a href="../deshbord.php" class="btn btn-info">Back</a>
			<a href="viewcart.php"><i class="fas fa-cart-arrow-down" style="float: right;line-height: 40px;margin-left:10px;"><sup style="color: red;"><?php echo $row; ?></sup></i></a>
			<a href="Sell.php" class="btn btn-info" style="float: right;">Refresh</a>
		</div>

		<div class="container" style="border: 1px solid #D3D3D3; margin-top: 10px; height: 570px; overflow: auto; ">
			
			<input class="form-control" id="myInput" type="text" placeholder="Search Product brand Price ......" style="margin-top: 15px;border: 1px solid #D3D3D3; font-size: 20px;">
			<table class="table table-striped" style="margin-top: 10px;">
				<thead style="text-align: center;">
					<tr>
						<th>S No</th>
						<th>Product Name</th>
						<th>Price </th>
						<th>Unit</th>
						<th>Sell Unit</th>
						<th>Add To Cart  </th>
						<th> Sell</th>
					</tr>
				</thead>
				<tbody   id="myTable" style="text-align:center;">
					<tr>
						<?php
					
						$que =" SELECT * from products p ,brand b ,catagory c where p.brand_id =b.b_id AND p.cat_id =c.Cat_id";
						$res = mysqli_query($con,$que);
						$sir = 1;
						while($row =mysqli_fetch_array($res)){
						$proid = $row[0];
						$pro_name = $row[3];
						$unit = $row[4];
						$prd_price = $row[5];
						?>
						<td><?php echo $sir; $sir ++; ?></td>
						<td><?php echo $pro_name; ?></td>
						<td><?php echo $prd_price; ?></td>
						<td><?php echo $unit; ?></td>
						
						
						<td><form method="post" action="cart.php?cart=<?php echo $proid; ?>">
							<input type="number" name="unit" value="1" style="width:80px; height: 25px;"></td>
						
						<td> <input type="submit" name="addcart" value="Add Cart" class="btn btn-warning" style="height:30px; line-height:15px;"></td>
						</form>
						
						<td> <a href="consell.php?consell=<?php echo $proid; ?>" class="btn btn-primary" style="height:30px; line-height:15px;">Sell</a></td>

					</tr>
					<?php } ?>
				</tbody>
			</table>
			
			<script>
				$(document).ready(function(){
					$("#myInput").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#myTable tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
							});
						});
					});
			</script>
		</body>
	</html>