<?php
require  "dbconnect.php";
$id = $_GET['id'];
$sql = "DELETE FROM student
 WHERE stu_id='$id' ";
$q = mysqli_query($conn, $sql);
if ($q == true) {
    header('Location: viewstud.php?messagedelete');
    exit();
} else {
    header('Location: viewstud.php?messagedeletefail');
}
