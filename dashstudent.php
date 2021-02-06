<?php
session_start();
//dash-admin.php
//echo "session ".$_SESSION['accesslevel'];
include("headerstud.template.php");

?>

<?php if (isset($_GET['msgloginsuccess']) == true) { ?>
    <div class='alert alert-success'>Successfully Login</div>
<?php } else if (isset($_GET['msgupdate']) == true) { ?>
    <div class='alert alert-success'>Successfully Update</div>
<?php } else if (isset($_GET['messagedelete']) == true) { ?>
    <div class='alert alert-success'>Successfully Deleted</div>
<?php } else if (isset($_GET['messagedeletefail']) == true) { ?>
    <div class='alert alert-danger'>Failed Deleted</div>
<?php } else if (isset($_GET['msgaddedmeet']) == true) { ?>
    <div class='alert alert-success'>Successfully Submit Meeting Request</div>
<?php } ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card card-signin my-1">
                <div class="card-body">
                    <h5 class="card-title text-center">Welcome Student <?php echo $_SESSION['stu_name'] ?></h5>
                    <div class="portlet light bordered">
                        <div class="container-md">
                            <a href="viewlect4stud.php">View Lecturer </a><br>
                            <a href="studprofileupdate.php">Edit Profile</a><br>
                            <a href="updatestudpassword.php">Edit Password</a><br>
                            <a href="logout.php">Log out</a><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include("footer.template.php");
?>