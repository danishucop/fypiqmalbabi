<?php
session_start();
//dash-admin.php
//echo "session ".$_SESSION['accesslevel'];
include("headerlect.template.php");

?>

<?php if (isset($_GET['msgloginsuccess']) == true) { ?>
    <div class='alert alert-success'>Successfully Login</div>
<?php } else if (isset($_GET['msgupdate']) == true) { ?>
    <div class='alert alert-success'>Successfully Update</div>
<?php } else if (isset($_GET['messagedelete']) == true) { ?>
    <div class='alert alert-success'>Successfully Deleted</div>
<?php } else if (isset($_GET['messagedeletefail']) == true) { ?>
    <div class='alert alert-success'>Failed Deleted</div>
<?php } ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card card-signin my-1">
                <div class="card-body">
                    <h5 class="card-title text-center">Welcome lect <?php echo $_SESSION['lect_name'] ?></h5>
                    <div class="portlet light bordered">
                        <div class="container-md">
                            <a href="lectprofileupdate.php">Update Profile</a><br>
                            <a href="lectpending.php">My Pending Meeting</a><br>
                            <a href="lectaccept.php">My Accept Meeting</a><br>
                            <a href="lectreject.php">My Reject Meeting</a><br>
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