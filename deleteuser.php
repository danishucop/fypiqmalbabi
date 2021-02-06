<?php
require  "dbconnect.php";
$userid=$_GET['userid'];
$sql="delete from users
 where userid='$userid' ";
$q=mysqli_query($conn,$sql);
if ($q==true){
echo "The record for $userid has been deleted";
header('Location: viewuser.php');
exit();
}
else{
echo "Fail to delete record for $userid";
echo mysqli_error($conn);
}
?>
