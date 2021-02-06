<?php
session_start();
include "dbconnect.php";
include "headeradmin.template.php";
$sql = "SELECT * FROM student";
$rs = mysqli_query($conn, $sql);
if (mysqli_error($conn)) {
    echo "Error" . mysqli_error($conn);
} else { //paparan rekod
?>




    <div class="portlet light bordered">
        <table width="100%">
            <tr>
                <td>
                    <a href="formstud.php"><button type="button" class="btn btn-primary">ADD</button></a>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <?php if (isset($_GET['messageupdate']) == true) { ?>
        <div class='alert alert-success'>Successfully Updated</div>
    <?php } else if (isset($_GET['messageadd']) == true) { ?>
        <div class='alert alert-success'>Successfully Added</div>
    <?php } else if (isset($_GET['messagedelete']) == true) { ?>
        <div class='alert alert-success'>Successfully Deleted</div>
    <?php } else if (isset($_GET['messagedeletefail']) == true) { ?>
        <div class='alert alert-success'>Failed Deleted</div>
    <?php } ?>
    <div class="portlet light bordered">
        <table class="table table-striped table-bordered table-hover table-checkable order-column table-auto-width" id="table_list">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $counter = 0;
                while ($record = mysqli_fetch_array($rs)) {
                    $counter++;

                    echo "<tr><td>";
                    $id = $record['stu_id'];
                    //end display for admin\
                    echo $counter;
                    echo "</td>";
                    echo "<td>" . $record['stu_name'] . "</td>";
                    echo "<td>" . $record['stu_email'] . "</td>";
                    echo "<td>" . $record['stu_hpnum'] . "</td>";
                    if (
                        isset($_SESSION['accesslevel']) &&
                        $_SESSION['accesslevel'] == 'admin'
                    ) {
                        echo "<td>" . "<a href='updatestud.php?stu_id=$id'>
				<i type='button'  class='btn btn-primary fa fa-edit'></i></a> " .
                            "<a href='#'
				onclick='confirmdelete($id)'><button type='button' class='btn btn-danger'>
				<i class= 'fa fa-trash danger'  style='color:white'></i></button></a> " . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <script>
            function confirmdelete(id) {
                var answer = confirm("Are u sure to delete?");
                if (answer == true) {
                    //redirect
                    window.location.href = "deletestud.php?id=" + id;
                }
            }
        </script>
    <?php
}
    ?>

    <br>
    <?php
    include "footer.template.php";
    ?>