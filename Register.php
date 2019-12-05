<!DOCTYPE html>
<html>
	<head>
		<title>Inventory System </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/       popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
	</head>
	<body>
		<?php include 'templet/header.php'; ?>
		<div class="container" style="margin-top: 20px;">
			<div class="card mx-auto" style="width: 30rem; margin: 0 auto;">
				<div class="card-header">
					Rrgister
				</div>
				<div class="card-body">
					<form id="Register_form" action="Register.php" method="POST">
						<div class="form-group">
							<label for="username"> Full Name</label>
							<input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
							<font color= 'red'><?php echo @$_GET['fullname'];?></font>
						</div>
						<div class="form-group">
							<label for="Email"> Email</label>
							<input type="Email" name="Email" class="form-control" id="Email" placeholder="Enter your email id">
							<font color= 'red'><?php echo @$_GET['email'];?></font>
						</div>
						<div class="form-group">
							<label for="Password" >Password</label>
							<input type="password" class="form-control" name="Password" id="Password" placeholder="Enter Your Password">
							<font color= 'red'><?php echo @$_GET['password'];?></font>
						</div>
						<div class="form-group">
							<label for="Re-Password">Conferm Password</label>
							<input type="password" class="form-control" name="Re_Password" id="Re-Password" placeholder="Password Re-Enter">
						</div>
						<div class="form-group">
							<label for="Usertype">Usetype</label>
							<select name="Usertype" id="Usertype" class="form-control">
								<option value="NULL">Select User Type </option>
								<option value="Admin">Admin</option>
								<option value="Other">Other</option>
								<font color= 'red'><?php echo @$_GET['user'];?></font>
							</select>
							<button type="submit" name="user_Register" class="btn btn-primary" style="margin-top: 10px;"> <span class="fa fa-user">&nbsp; Regisrer</span></button>
							<span style="margin-left: 30px; margin-top: 50px;"><a href="index.php"><i class="fa fa-login">Login</i></a></span>
						</div>
					</form>
				</div>
				<div class="card-footer text-muted">
					<a href="#">Forgate Password ?...</a>
				</div>
			</div>
		</div>
	</body>
</html>
<?php 
include 'database/db.php';


	if (isset($_POST['user_Register'])){

		$username = $_POST['username'];
		$Email = $_POST['Email'];
		$passwoord = $_POST['Password'];
		$Re_passwoord = $_POST['Re_Password'];
		$Usertype = $_POST['Usertype'];

		if($username==''){
			echo "<script>window.open('Register.php?fullname= Enter Your Full Name','_self')</script>";
			exit();
			}
			if($Email==''){
			echo "<script>window.open('Register.php?email= Enter Your Email','_self')</script>";
			exit();
			}
			if($passwoord==''){
			echo "<script>window.open('Register.php?password= Enter Your Password','_self')</script>";
			exit();
			}
			/*if($Re_passwoord!=$passwoord){
			echo "<script>window.open('Register.php?Re_passwoord= Enter Conferm Password','_self')</script>";
			exit();
			}*/
			if($Usertype==''){
			echo "<script>window.open('Register.php?user= Choose User','_self')</script>";
			exit();
			}

		$query = "SELECT * FROM `user` WHERE `email`='$Email'";

		$result = mysqli_query($con,$query);

		$row = mysqli_num_rows($result);
		if($row>0){
  	  	$email_error = "Sorry... Email already Register ";
  	  	echo $email_error;
  	  	}
  	  	else{

  	  		$query1 = "INSERT INTO `user`(`username`, `email`,`password`, `usertype`) VALUES ('$username','$Email','$passwoord','$Usertype')";
           
           $res = mysqli_query($con,$query1);
		
           if ($res == true) {
           	echo "Data Has Been inserted In Database";
           }
           else{
           echo "query1 Error";
        
			}
		}
}
 ?>