<?php
include "checksessionstud.php";
//editadmin.php
include "headerstud.template.php";
include "dbconnect.php";
$id = $_SESSION['stu_id'];
$sql = "SELECT * FROM student
		WHERE stu_id='$id' ";
$rs = mysqli_query($conn, $sql);
if (mysqli_error($conn) == true) {
    echo mysqli_error($conn);
} //sql error
$record = mysqli_fetch_array($rs);

?>

<div class="my-3 my-md-5">
    <div class="container">
        <div class="col-lg-16">
            <?php if (isset($_GET['msgfailupdate']) == true) { ?>
                <div class='alert alert-danger'>Failed Updated</div>
            <?php } ?>
            <div class="card">

                <br>

                <h5 class="card-title text-center">Student Password</h5>
                <div class="card-body">
                    <div class="text-wrap p-lg-6">
                        <form method="post" action="updatestudpasswordprocess.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" name="stu_id" value="<?php echo $record['stu_id'] ?>" hidden>


                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="stu_password" placeholder="" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Repeat Password</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="stu_repeatpassword" placeholder="" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="dashstudent.php"><button type="button" class="btn btn-primary">Cancel</button></a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.template.php";
    ?>