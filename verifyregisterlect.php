<?php
if (isset($_POST['registerbtn'])) {
	include 'dbconnect.php';

	$lect_matricnum = $_POST['lect_matricnum'];
	$lect_email = $_POST['lect_email'];
	$lect_name = strtoupper($_POST['lect_name']);
	$lect_hpnum = $_POST['lect_hpnum'];
	$lect_password = md5($_POST['lect_password']);
	$lect_repeatpassword = md5($_POST['lect_repeatpassword']);

	// chech if the password are macthing if not return to register page
	if ($lect_password != $lect_repeatpassword) {
		header('Location: index.php?error=notmatch');
	}
	$sql = "INSERT INTO lecturer (lect_matricnum,lect_email,lect_name,lect_accesslevel,lect_password,lect_hpnum,lect_status) 
		   VALUES ('$lect_matricnum','$lect_email','$lect_name','Lecturer','$lect_password','$lect_hpnum','Available')";
	$rs = mysqli_query($conn, $sql);
	if (mysqli_error($conn)) {
		echo "Error" . mysqli_error($conn);
		exit();
	} else
		header('Location: ../fyp/login.php?success');
}
