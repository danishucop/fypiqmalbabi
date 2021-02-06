<?php

if (isset($_POST['stu_password']) && isset($_POST['stu_repeatpassword'])) {

    //simpan ke database
    include "dbconnect.php";

    //fettch data
    $id = $_POST['stu_id'];
    $stu_password = md5($_POST['stu_password']);
    $stu_repeatpassword = md5($_POST['stu_repeatpassword']);

    if ((md5($_POST['stu_password'])) !== (md5($_POST['stu_repeatpassword']))) {
        echo header("Location:updatestudpassword.php?messagefailpassword");
    }


    //sql insert
    $sql = "UPDATE student
            SET
            stu_password = '$stu_password'
            WHERE stu_id='$id'";

    $rs = mysqli_query($conn, $sql);
    if ($rs == true) {
        echo header("Location:dashstudent.php?msgupdate");
    } else {
        //header ("Location: searchactivity.php?msg=Cannot save Record ");
        echo header("Location:updatestudpassword.php?msgfailupdate");
    }
}
