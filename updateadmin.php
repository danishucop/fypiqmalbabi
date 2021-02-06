<?php
include "checksession.php";
include "headeradmin.template.php";
?>
<?php
// updateadmin.php
//image upload only

$target_dir = "adminimage/";
//rename file image
$newfilename=date('d-m-Y')."-".basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir .$newfilename;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {//bytes
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

//update to database
//simpan ke database
	include "dbconnect.php";
	
	//fetch data
	$userid=$_SESSION['userid'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$hpnumber=$_POST['hpnumber'];

	//sql insert
	$sql="UPDATE users
		SET
		username='$username', 
		imagefile='$newfilename'
		WHERE userid='$userid'";
		//data dari borang html
		//echo $sql;

	$rs=mysqli_query($conn,$sql);
	//if (mysqli_error($rs)==true){
		//echo mysqli_error($rs);
	//}//sql error
	if($rs==true){
		//header ("Location: dash-admin.php?msg=Record update");
		echo "Record update for $username <br>";
		echo "<img src='$target_file' width='100'>";
	}else{
		//header ("Location: dash-admin.php?msg=Failed to update");
		echo "Cannot save record";
	}


?>
<?php
include "footer.template.php";
?>