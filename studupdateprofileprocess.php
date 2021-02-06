<?php

if (isset($_POST['stu_name']) && isset($_POST['stu_email'])) {

    //simpan ke database
    include "dbconnect.php";

    //fettch data
    $id = $_POST['stu_id'];
    $stu_matricnum = $_POST['stu_matricnum'];
    $stu_name = $_POST['stu_name'];
    $stu_email = $_POST['stu_email'];
    $stu_hpnum = $_POST['stu_hpnum'];
    $level = 'Student';
    $stuimage = date('d-m-Y') . "-" . basename($_FILES["fileToUpload"]["name"]);



    //sql insert
    $sql = "UPDATE student
 SET
 stu_matricnum='$stu_matricnum',
 stu_name= '$stu_name',
 stu_email= '$stu_email',
 stu_hpnum=    '$stu_hpnum',
 stu_imagefile='$stuimage',
 stu_password='$stu_password',
 stu_accesslevel='$level'
WHERE stu_id='$id'";
    //data dari borang html


    $rs = mysqli_query($conn, $sql);
    if ($rs == true) {
        echo header("Location:dashstudent.php?msgupdate");
    } else {
        //header ("Location: searchactivity.php?msg=Cannot save Record ");
        echo header("Location:studprofileupdate.php?messagefail");
    }
}
