<?php
include "checksession.php";
//editadmin.php
include "headeradmin.template.php";
include "dbconnect.php";
$id = $_GET['lect_id'];
$sql = "SELECT * FROM lecturer
		WHERE lect_id='$id' ";
$rs = mysqli_query($conn, $sql);
if (mysqli_error($conn) == true) {
    echo mysqli_error($conn);
} //sql error
$record = mysqli_fetch_array($rs);

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lecturer</h6>
        </div>
        <div class="card-body">
            <form method="post" action="updatelectprocess.php" enctype="multipart/form-data">
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
                    <a href="viewlect.php"><button type="button" class="btn btn-primary">View List</button></a>

            </form>
        </div>
    </div>
</div>
</div>




<?php

include("footer.template.php");
?>