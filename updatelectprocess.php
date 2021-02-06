<?php
$target_dir = "adminimage/";
//rename file image
$lectimage = date('d-m-Y') . "-" . basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $lectimage;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
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
if ($_FILES["fileToUpload"]["size"] > 10000000) { //bytes
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


if (isset($_POST['lect_name']) && isset($_POST['lect_email'])) {

    //simpan ke database
    include "dbconnect.php";

    //fettch data
    $id = $_POST['lect_id'];
    $lect_matricnum = $_POST['lect_matricnum'];
    $lect_name = $_POST['lect_name'];
    $lect_email = $_POST['lect_email'];
    $lect_hpnum = $_POST['lect_hpnum'];
    $status = 'Available';
    $level = 'Lecturer';
    $lectimage = date('d-m-Y') . "-" . basename($_FILES["fileToUpload"]["name"]);


    //sql insert
    $sql = "UPDATE lecturer
 SET
 lect_matricnum='$lect_matricnum',
 lect_name= '$lect_name',
 lect_email= '$lect_email',
 lect_hpnum=    '$lect_hpnum',
 lect_imagefile='$lectimage',
 lect_status=  '$status',
 lect_accesslevel='$level'
WHERE lect_id='$id'";
    //data dari borang html


    $rs = mysqli_query($conn, $sql);
    if ($rs == true) {
        echo header("Location:viewlect.php?messageupdate");
    } else {
        //header ("Location: searchactivity.php?msg=Cannot save Record ");
        echo header("Location:updatelect.php?messagefailupdate");
    }
}
