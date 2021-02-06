<?php
if (isset($_POST['stu_name']) && isset($_POST['stu_email'])) {

    //simpan ke database
    include "dbconnect.php";

    //fettch data
    $stu_matricnum = $_POST['stu_matricnum'];
    $stu_name = $_POST['stu_name'];
    $stu_email = $_POST['stu_email'];
    $stu_hpnum = $_POST['stu_hpnum'];
    $level = 'Student';
    $stuimage = date('d-m-Y') . "-" . basename($_FILES["fileToUpload"]["name"]);
    $stu_password = md5($_POST['stu_password']);
    $stu_repeatpassword = md5($_POST['stu_repeatpassword']);


    if ($stu_password != $stu_repeatpassword) {
        header('Location: ../fyp/formlect.php?errorpassword&repeatpasswordnotmatch');
    }


    //sql insert
    $sql = "INSERT INTO student
    (stu_matricnum, stu_name, stu_email, stu_hpnum,stu_imagefile,stu_password,stu_accesslevel )
    Values ('$stu_matricnum','$stu_name', '$stu_email','$stu_hpnum','$stuimage','$stu_password','$level')";
    //data dari borang html


    $rs = mysqli_query($conn, $sql);
    if ($rs == true) {
        echo header('Location: viewstud.php?messageadd');
    } else {
        echo header('Location: formstud.php?messagefail');
    }
}
