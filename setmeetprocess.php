<?php
if (isset($_POST['lect_name']) && isset($_POST['stu_name'])) {

    //simpan ke database
    include "dbconnect.php";

    //fettch data
    $lect_id = $_POST['lect_id'];
    $stu_id = $_POST['stu_id'];
    $lect_name = $_POST['lect_name'];
    $stu_name = $_POST['stu_name'];
    $date = $_POST['date'];
    $time_from = $_POST['time_from'];
    $time_to = $_POST['time_to'];
    $place = $_POST['place'];
    $purpose = $_POST['purpose'];
    $status = 'Pending';



    //sql insert
    $sql = "INSERT INTO meeting 
    (meeting_lect_id, meeting_stu_id,meeting_lect_name, meeting_stu_name, meeting_date,time_from,time_to,place,purpose,meeting_status )
    Values ('$lect_id','$stu_id', '$lect_name','$stu_name','$date','$time_from','$time_to','$place','$purpose','$status')";
    //data dari borang html


    $rs = mysqli_query($conn, $sql);
    if ($rs == true) {
        echo header("Location:dashstudent.php?msgaddedmeet");
    } else {
        //header ("Location: searchactivity.php?msg=Cannot save Record ");
        echo header("Location:setmeetform.php?messagefailupdate");
    }
}
