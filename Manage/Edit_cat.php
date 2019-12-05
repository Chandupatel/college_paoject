<?php 
include '../database/db.php';

	if(isset($_POST['Updatecat']))
	{
		$upcatid = $_POST['Ucatid'];
		$upcatname = $_POST['Ucat_name'];
		$upcat_parent = $_POST['Upar_Catagory'];

		$que = "UPDATE `catagory` SET `Parent_cat`='$upcat_parent',`Catagory`='$upcatname' WHERE `Cat_id`='$upcatid' ";
		$res = mysqli_query($con,$que);
		if ($res == true ) {
			echo "<script>window.open('../cat_manage.php','_self')</script>";
	
		}
		else{
			echo "error";
		}
	}



 ?>