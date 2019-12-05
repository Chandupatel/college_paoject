<?php 

/*class User 
{
	private $con;
	function __construct()
	{
		include '../database/db.php';
		$db = new database();
		$this->con = $db->connect();
		//if ($this->con) {
	    //		echo "connected";
		//}

		private function emailExists($email){
			$pre_stmt= $this->con->preper("SELECT id FROM user WHERE email ?");
		}
		public function createUseeAccount($usernname,$email,$password,$usertype){
		// preper stettment
			 = $this->con->preper("SELECT ")
		}

	}
}
//$obj = new User();*/
include '../database/db.php';

if (isset($_POST['user_Register'])){
	
	$username = $_POST['username'];
	$Email = $_POST['Email'];
	$passwoord = $_POST['Password'];
	$Usertype = $_POST['Usertype'];

	echo $username;
	echo $Email;
	echo $passwoord;
	echo $Usertype ;

}

 ?>
