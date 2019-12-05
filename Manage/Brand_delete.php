<?php  
include '../database/db.php';
$Delete_brd = $_GET['brd_delete'];

$que = "DELETE FROM `brand` WHERE `b_id`='$Delete_brd' ";
$res  = mysqli_query($con,$que);
if ($res== true) {
	echo "<script>window.open('../brabd_manage.php?Brd_delete= Brand has Been Deleted successfully','_self')</script>";
}
else {
	echo "Error";

}

 ?>


