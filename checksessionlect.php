<?php
session_start();
if (isset($_SESSION['lect_id']) && $_SESSION['lect_accesslevel']=='Lecturer'){

}else{
	header("Location: login.php?msg= Guest must login first");

}
