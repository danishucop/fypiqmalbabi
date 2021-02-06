<?php

if (isset($_POST['lect_name']) && isset($_POST['lect_email'])) {

    //simpan ke database
    include "dbconnect.php";

    //fettch data
    $id = $_POST['lect_id'];
    $lect_matricnum = $_POST['lect_matricnum'];
    $lect_name = $_POST['lect_name'];
    $lect_email = $_POST['lect_email'];
    $lect_hpnum = $_POST['lect_hpnum'];
    $status = 'Available';
    $level = 'Lecturer';
    $lectimage = date('d-m-Y') . "-" . basename($_FILES["fileToUpload"]["name"]);


    //sql insert
    $sql = "UPDATE lecturer
 SET
 lect_matricnum='$lect_matricnum',
 lect_name= '$lect_name',
 lect_email= '$lect_email',
 lect_hpnum=    '$lect_hpnum',
 lect_imagefile='$lectimage',
 lect_status=  '$status',
 lect_accesslevel='$level'
WHERE lect_id='$id'";
    //data dari borang html


    $rs = mysqli_query($conn, $sql);
    if ($rs == true) {
        echo header("Location:dashlect.php?msgupdate");
    } else {
        //header ("Location: searchactivity.php?msg=Cannot save Record ");
        echo header("Location:lectprofileupdate.php?messagefailupdate");
    }
}
