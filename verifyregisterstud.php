<?php
if (isset($_POST['registerbtn'])) {
    include 'dbconnect.php';

    $stu_matricnum = $_POST['stu_matricnum'];
    $stu_email = $_POST['stu_email'];
    $stu_name = strtoupper($_POST['stu_name']);
    $stu_hpnum = $_POST['stu_hpnum'];
    $stu_password = md5($_POST['stu_password']);
    $stu_repeatpassword = md5($_POST['stu_repeatpassword']);

    // chech if the password are macthing if not return to register page
    if ($stu_password != $stu_repeatpassword) {
        header('Location: index.php?error=notmatch');
    }
    $sql = "INSERT INTO student (stu_matricnum,stu_email,stu_name,stu_accesslevel,stu_password,stu_hpnum) 
		   VALUES ('$stu_matricnum','$stu_email','$stu_name','Student','$stu_password','$stu_hpnum')";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_error($conn)) {
        echo "Error" . mysqli_error($conn);
        exit();
    } else
        header('Location: ../fyp/login.php?success');
}
