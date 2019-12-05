<?php 
	include 'database/db.php';
	session_start();
	$id=$_SESSION['User_id'];
	if($id == false){
  	header('location:index.php');
	}
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Inventory System </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
	</head>
	<body>
		<?php include 'templet/header.php'; ?>
		<div class="container"style="margin-top: 20px;">
			<div class="row">
				<div  class="col-md-4">
					<div class="card" style="width: 20rem;">
						<img class="card-img-top mx-auto" src="image/usecbo.png" alt="Card image cap" style="width:60%;">
						<div class="card-body">
							<h5 class="card-title">Profile Info</h5>
							<p class="card-text"><i class="fa fa-user">&nbsp;</i>Chandrakant Patel</p>
							<p class="card-text"><i class="fa fa-user">&nbsp;</i>Admin</p>
							<p class="card-text">Last login : xxxx-xxxx-xxxx</p>
							<a href="#" class="btn btn-dark"><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="jumbotron" style="width: 100%; height: 100%;">
						<h1>Wel-Come Admin</h1>
						<div class="row">
							<div class="col-sm-6" style="margin-top: 30px;">
								<iframe src="http://free.timeanddate.com/clock/i6abk6zh/n1648/szw160/szh160/cf100/hnce1ead6" frameborder="0" width="160" height="160"></iframe>
							</div>
							<div class="col-sm-6">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title">New Orders</h5>
										<p class="card-text">Here you can make invoice and make order</p>
										<a href="#" class="btn btn-info">New Orders</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container" style="margin-top: 20px;">
			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<div class="card-body" style="width: 20rem;">
							<h5 class="card-title">Catagories</h5>
							<p class="card-text">Here you can manage your catagorice and you add new parent and sub catagories</p>
							<a href="#" data-toggle="modal" data-target="#Catagory" class="btn btn-primary"><i class="fa fa-plus-square">&nbsp;</i>Add</a>
							<a href="cat_manage.php" class="btn btn-danger">Manage</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<div class="card-body" style="width: 20rem;">
							<h5 class="card-title">Brand</h5>
							<p class="card-text">Here you can manage your Brand and you add new Brand</p><br>
							<a href="#" data-toggle="modal" data-target="#Brands" class="btn btn-primary" class="btn btn-primary">Add</a>
							<a href="brabd_manage.php" class="btn btn-danger">Manage</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<div class="card-body" style="width: 20rem;">
							<h5 class="card-title">Products</h5>
							<p class="card-text">Here you can manage your Products and you add new Products</p><br>
							<a href="#" data-toggle="modal" data-target="#Product" class="btn btn-primary" class="btn btn-primary">Add</a>
							<a href="Manage.php" class="btn btn-danger">Manage</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include 'templet/Catagories.php';?>
		<?php include 'templet/Brand.php';?>
		<?php include 'templet/Products.php';?>

		<div class="container" style="margin-top: 20px;">
			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<div class="card-body" style="width: 20rem;">
							<h5 class="card-title">Sell Product </h5>
							<p class="card-text">Here you can Sell your product </p>
							<a href="Sell/Sell.php"class="btn btn-primary">Sell</a>
							<!--<a href="cat_manage.php" class="btn btn-danger">Manage</a>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>