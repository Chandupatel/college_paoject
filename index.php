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
		<?php include 'templet/header.php'; ?>
		<div class="container" style="margin-top: 20px;">
			<div class="card mx-auto" style="width: 18rem;">
				<img class="card-img-top" style="width:60%;" src="image/login.jpg" alt="login Icon" >
				<div class="card-body">
					<font color= 'red'><?php echo @$_GET['upass'];?></font>
					<form action="index.php" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" name="Username1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
							<small id="emailHelp" class="form-text text-muted"></small>
							<font color= 'red'><?php echo @$_GET['Username'];?></font>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
							<font color= 'red'><?php echo @$_GET['Password'];?></font>
						</div>
						<button type="submit" name="Login" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>Login</button>
						<span><a href="Register.php">Register</a></span> <br>
						<span><a href="Listitem.php"> Add Listitem</a></span>
					</form>
				</div>
				<div class="card-footer">
					<a href="#">Forget Password ?.</a>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
include 'database/db.php';
if(isset($_POST['Login'])){

	$username = $_POST['Username1'];
	$pass = $_POST['password'];
	if($username==''){
	echo "<script>window.open('index.php?Username= Enter Your Username','_self')</script>";
	exit();
	}

	if($pass ==''){
	echo "<script>window.open('index.php?Password= Enter Your Password','_self')</script>";
	exit();
	}

	$que = "SELECT * FROM `user` WHERE `email`='$username' AND`password`='$pass' ";
	$res = mysqli_query($con,$que);
	$row = mysqli_num_rows($res);
	if ($row < 1) {
		echo "<script>window.open('index.php?upass= User name Password Not Mach','_self');</script>";
	}
	else{

		echo "user found";
		$data = mysqli_fetch_assoc($res);
		echo $data;
		$Userid = $data['id'];
		echo $Userid;
		session_start();
		$_SESSION['User_id']= $Userid;
		header('location: deshbord.php');
	}



}

 ?>
