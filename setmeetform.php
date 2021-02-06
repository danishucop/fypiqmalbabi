<?php
include "checksessionstud.php";
//editadmin.php
include "headerstud.template.php";
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


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Set Meet Form</h6>
        </div>
        <div class="card-body">
            <form method="post" action="setmeetprocess.php" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" name="lect_id" value="<?php echo $record['lect_id'] ?>" hidden>
                    <input type="text" class="form-control" name="stu_id" value="<?php echo $_SESSION['stu_id'] ?>" hidden>


                    <div class="mb-3">
                        <label class="form-label ">Lecturer Name </label>
                        <div class="col-md-6">
                            <div class="form-control" style="border:none"><?php echo $record['lect_name'] ?></div>
                            <input type="text" class="form-control" name="lect_name" placeholder="Enter Your Name" value="<?php echo $record['lect_name'] ?>" hidden>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Student Name</label>
                        <div class="col-md-6">
                            <div class="form-control" style="border:none"><?php echo $_SESSION['stu_name'] ?></div>
                            <input type="text" class="form-control" name="stu_name" placeholder="Enter Your Matric Number" value="<?php echo $_SESSION['stu_name'] ?>" hidden>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control" style="width:240px" name="date" value="<?php echo date("Y-m-d") ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label ">Time</label>
                        <div class="col-md-6 form-inline">
                            <input type="time" class="form-control" name="time_from" style="width:240px" value="" required> &nbsp; Untill &nbsp; <input type="time" class="form-control" name="time_to" style="width:240px" value="" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Place</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="place" value="" placeholder="Enter Place For Meet Lecturer" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Purpose For Meet</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="purpose" value="" placeholder="Enter Purpose For Meet Lecturer" required>
                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="viewlect4stud.php"><button type="button" class="btn btn-primary">View List</button></a>

            </form>
        </div>
    </div>
</div>
</div>




<?php

include("footer.template.php");
?>