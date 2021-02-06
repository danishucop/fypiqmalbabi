<?php
require  "dbconnect.php";
$id = $_GET['id'];
$sql = "delete from lecturer
 WHERE lect_id='$id' ";
$q = mysqli_query($conn, $sql);
if ($q == true) {
    echo header('Location: viewlect.php?messagedelete');
    exit();
} else {
    echo header('Location: viewlect.php?messagedeletefail');
}
