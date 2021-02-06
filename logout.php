<?php
//logout.php
session_start();
if (isset($_SESSION['sessionid'])){
	session_destroy();
	//this to destroy all session info
		header("Location: login.php?msg=User Loged Out");

}
else{
	header("Location: login.php?msg=User already Logged Out");
}
?>