<?php
session_start();
//dash-admin.php
//echo "session ".$_SESSION['accesslevel'];
include("headeradmin.template.php");

?>
<style>
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card card-signin my-1">
                <div class="card-body">
                    <h5 class="card-title text-center">Welcome admin <?php echo $_SESSION['username'] ?></h5>
                    <div class="portlet light bordered">
                        <div class="container-md">
                            <a href="forminsert.php">Insert record</a><br>
                            <a href="searchadmin.php">Update/Delete record</a><br>
                            <a href="viewuser.php">View User</a><br>
                            <a href="viewuserorder.php">View Customer Order</a><br>
                            <a href="editadmin.php">Edit Admin Profile</a><br>
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