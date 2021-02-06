<?php
session_start();
// verify.php

include "dbconnect.php";
$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT userid,username,password,email,hpnumber,accesslevel,imagefile 
	  FROM users
	  WHERE email='$email'
 	  AND password='$password'";
$rs = mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM lecturer WHERE lect_email='$email' AND lect_password='$password'";

$rs2 = mysqli_query($conn, $sql2);

$sql3 = "SELECT * FROM student WHERE stu_email='$email' AND stu_password='$password'";

$rs3 = mysqli_query($conn, $sql3);

if (mysqli_error($conn)) {
	echo "error" . mysqli_error($conn);
}
if (mysqli_num_rows($rs) == 1) { //jumpa user
	$record = mysqli_fetch_array($rs);
	//session data
	$_SESSION['sessionid'] = session_id();
	$_SESSION['userid'] = $record['userid'];
	$_SESSION['username'] = $record['username'];
	$_SESSION['password'] = $record['password'];
	$_SESSION['email'] = $record['email'];
	$_SESSION['hpnumber'] = $record['hpnumber'];
	$_SESSION['accesslevel'] = $record['accesslevel'];
	$_SESSION['imagefile'] = $record['imagefile'];

	//go to dashboard
	header("Location: dashadmin.php?msgloginsuccess");
	echo "1 user found";

	echo "Admin name " . $record['username'];
} else if (mysqli_num_rows($rs2) == 1) {
	$record2 = mysqli_fetch_array($rs2);
	//session data
	$_SESSION['sessionid'] = session_id();
	$_SESSION['lect_id'] = $record2['lect_id'];
	$_SESSION['lect_email'] = $record2['lect_email'];
	$_SESSION['lect_name'] = $record2['lect_name'];
	$_SESSION['lect_accesslevel'] = $record2['lect_accesslevel'];
	$_SESSION['lect_imagefile'] = $record2['lect_imagefile'];
	$_SESSION['lect_password'] = $record2['lect_password'];
	$_SESSION['lect_hpnum'] = $record2['lect_hpnum'];
	$_SESSION['lect_status'] = $record2['lect_status'];

	header("location: dashlect.php?msgloginsuccess");
	echo "1 user found";

	echo "Lecturer name " . $record2['lect_name'];
} else if (mysqli_num_rows($rs3) == 1) {
	$record3 = mysqli_fetch_array($rs3);
	//session data
	$_SESSION['sessionid'] = session_id();
	$_SESSION['stu_id'] = $record3['stu_id'];
	$_SESSION['stu_email'] = $record3['stu_email'];
	$_SESSION['stu_name'] = $record3['stu_name'];
	$_SESSION['stu_accesslevel'] = $record3['stu_accesslevel'];
	$_SESSION['stu_imagefile'] = $record3['stu_imagefile'];
	$_SESSION['stu_password'] = $record3['stu_password'];
	$_SESSION['stu_hpnum'] = $record3['stu_hpnum'];

	header("Location: dashstudent.php?msgloginsuccess");

	echo "1 user found";

	echo "Student name " . $record3['stu_name'];
} else {
	//redirect login.php
	header("Location: login.php?msg=Login failed");
	echo "no user founded";
}
