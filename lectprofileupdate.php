<?php
include "checksessionlect.php";
include "headerlect.template.php";
include "dbconnect.php";
$id = $_SESSION['lect_id'];
$sql = "SELECT * FROM lecturer
		WHERE lect_id='$id' ";
$rs = mysqli_query($conn, $sql);
if (mysqli_error($conn) == true) {
    echo mysqli_error($conn);
} //sql error
$record = mysqli_fetch_array($rs);

?>


<div class="my-3 my-md-5">
    <div class="container">
        <div class="col-lg-16">
            <div class="card">
                <br>
                <h5 class="card-title text-center">Lecturer Details</h5>
                <div class="card-body">
                    <div class="text-wrap p-lg-6">
                        <form method="post" action="lectupdateprofileprocess.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" name="lect_id" value="<?php echo $record['lect_id'] ?>" hidden>

                                <div class="mb-3">
                                    <label class="form-label ">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="lect_name" placeholder="Enter Your Name" value="<?php echo $record['lect_name'] ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Matric Number</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="lect_matricnum" placeholder="Enter Your Matric Number" value="<?php echo $record['lect_matricnum'] ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="lect_email" placeholder="example@com" value="<?php echo $record['lect_email'] ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="lect_hpnum" placeholder="012805050" value="<?php echo $record['lect_hpnum'] ?>" required>
                                    </div>
                                </div>

                                <hr>
                                <h4>Upload profile picture image file only</h4>
                                <input type="file" name="fileToUpload" value="<?php echo $record['lect_imagefile'] ?>">
                                <br>
                                <br>

                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="dashlect.php"><button type="button" class="btn btn-primary">Cancel </button></a>

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


    include("footer.template.php");
    ?>