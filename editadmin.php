<?php
include "checksession.php";
//editadmin.php
include "headeradmin.template.php";
include "dbconnect.php";
$userid=$_SESSION['userid'];
$sql="SELECT * FROM users
		WHERE userid='$userid' ";
$rs=mysqli_query($conn, $sql);
if (mysqli_error($conn)==true){
		echo mysqli_error($conn);
	}//sql error
$record=mysqli_fetch_array($rs);
?>

<h2>Edit admin profile</h2>
<form action="updateadmin.php" method="post"
	enctype="multipart/form-data">
	User id<input name="userid" type="text" class="form-control"
	value="<?php echo $record['userid'] ?>" readonly>
	Email<input name="email" type="text" 
	class="form-control"
	value="<?php echo $record['email'] ?>" >
	username<input name="username" type="text" 
	class="form-control"
	value="<?php echo $record['username'] ?>" >
	Hp Number<input name="hpnumber" type="text" 
	class="form-control"
	value="<?php echo $record['hpnumber'] ?>" >

	<hr>
	<h4>Upload profile picture image file  only</h4>
	<input type="file" name="fileToUpload">
	<br>
	<hr>
	<button class="btn btn-success">Save profile update</button>
</form>


<?php
include "footer.template.php";
//editadmin.php
?>