<?php

include "dbconnect.php";

//fettch data
$id = $_GET['id'];
$accept = 'Accept';



//sql insert
$sql = "UPDATE meeting
SET
meeting_status = '$accept'
WHERE id='$id'";
//data dari borang html


$rs = mysqli_query($conn, $sql);
if ($rs == true) {
    echo header("Location:lectaccept.php?msgupdate");
} else {
    //header ("Location: searchactivity.php?msg=Cannot save Record ");
    echo header("Location:lectpending.php?messagefail");
}
