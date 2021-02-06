<?php
if (isset($_POST['lect_name']) && isset($_POST['lect_email'])) {

    //simpan ke database
    include "dbconnect.php";

    //fettch data
    $lect_matricnum = $_POST['lect_matricnum'];
    $lect_name = $_POST['lect_name'];
    $lect_email = $_POST['lect_email'];
    $lect_hpnum = $_POST['lect_hpnum'];
    $status = 'Available';
    $level = 'Lecturer';
    $lectimage = date('d-m-Y') . "-" . basename($_FILES["fileToUpload"]["name"]);
    $lect_password = md5($_POST['lect_password']);
    $lect_repeatpassword = md5($_POST['lect_repeatpassword']);


    if ($lect_password != $lect_repeatpassword) {
        header('Location: ../fyp/formlect.php?errorpassword&repeatpasswordnotmatch');
    }


    //sql insert
    $sql = "INSERT INTO lecturer 
    (lect_matricnum, lect_name, lect_email, lect_hpnum,lect_imagefile,lect_password,lect_status,lect_accesslevel )
    Values ('$lect_matricnum','$lect_name', '$lect_email','$lect_hpnum','$lectimage','$lect_password','$status','$level')";
    //data dari borang html


    $rs = mysqli_query($conn, $sql);
    if ($rs == true) {
        echo header('Location: viewlect.php?messageadd');
    } else {
        echo header('Location: formlect.php?messagefail');
    }
}
