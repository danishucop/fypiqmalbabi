<?php
//forminsert.php
include "checksession.php";


include("headeradmin.template.php");
?>
<div class="my-3 my-md-5">
    <div class="container">
        <div class="col-lg-16">
            <div class="card">
                <br>
                <h5 class="card-title text-center">Lecturer Details</h5>
                <div class="card-body">
                    <div class="text-wrap p-lg-6">
                        <form method="post" action="lectaddprocess.php" enctype="multipart/form-data">
                            <div class="form-group">

                                <div class="mb-3">
                                    <label class="form-label ">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="lect_name" placeholder="Enter Your Name" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Matric Number</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="lect_matricnum" placeholder="Enter Your Matric Number" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="lect_email" placeholder="example@com" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="lect_hpnum" placeholder="012805050" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="lect_password" placeholder="" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Repeat Password</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="lect_repeatpassword" placeholder="" required>
                                    </div>
                                </div>
                                <input type="date" class="form-control" value="<?php date('Y-m-d') ?>">
                                <h4>Upload profile picture image file only</h4>
                                <input type="file" name="fileToUpload">
                                <br>
                                <br>

                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="viewlect.php"><button type="button" class="btn btn-primary">View List</button></a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



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

    // if (isset($_POST['lect_name']) && isset($_POST['lect_email'])) {

    //     //simpan ke database
    //     include "dbconnect.php";

    //     //fettch data
    //     $lect_matricnum = $_POST['lect_matricnum'];
    //     $lect_name = $_POST['lect_name'];
    //     $lect_email = $_POST['lect_email'];
    //     $lect_hpnum = $_POST['lect_hpnum'];
    //     $status = 'Available';
    //     $level = 'Lecturer';
    //     $lect_password = md5($_POST['lect_password']);
    //     $lect_repeatpassword = md5($_POST['lect_repeatpassword']);


    //     if ($lect_password != $lect_repeatpassword) {
    //         header('Location: ../fyp/formlect.php?errorpassword&repeatpasswordnotmatch');
    //     }


    //     //sql insert
    //     $sql = "INSERT INTO lecturer 
    // 	(lect_matricnum, lect_name, lect_email, lect_hpnum,lect_imagefile,lect_password,lect_status,lect_accesslevel )
    // 	Values ('$lect_matricnum','$lect_name', '$lect_email','$lect_hpnum','$lectimage','$lect_password','$status','$level')";
    //     //data dari borang html


    //     $rs = mysqli_query($conn, $sql);
    //     if ($rs == true) {
    //         echo header('Location: viewlect.php');
    //     } else {
    //         echo "Cannot save record";
    //     }
    // }

    include("footer.template.php");
    ?>