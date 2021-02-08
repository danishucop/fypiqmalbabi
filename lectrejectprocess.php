<?php

include "dbconnect.php";

//fettch data
$id = $_GET['id'];
$reject = 'Reject';



//sql insert
$sql = "UPDATE meeting
SET
meeting_status = '$reject'
WHERE id='$id'";
//data dari borang html


$rs = mysqli_query($conn, $sql);
if ($rs == true) {
    echo header("Location:lectreject.php?msgupdate");
} else {
    //header ("Location: searchactivity.php?msg=Cannot save Record ");
    echo header("Location:lectpending.php?messagefail");
}
