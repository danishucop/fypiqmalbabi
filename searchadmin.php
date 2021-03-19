<?php
session_start(); //mesti di atas
include "headeradmin.template.php";
//searchactivity.php
include "dbconnect.php";

if (isset($_GET['katakunci'])) {
    $key = $_GET['katakunci'];
} else {
    $key = "";
}
$sql = "SELECT lect_id,lect_name,lect_email
        FROM lecturer
        WHERE lect_name LIKE '%$key%' ";
$rs = mysqli_query($conn, $sql);

$sql_student = "SELECT stu_id,stu_name,stu_email,stu_hpnum 
                FROM student 
                WHERE stu_name LIKE '%$key%' ";
$rs_student = mysqli_query($conn, $sql_student);
if (mysqli_num_rows($rs) >= 1) { //jumpa user
?>
    <div class="portlet light bordered">
        <table class="table table-striped table-bordered table-hover table-checkable order-column table-auto-width" id="table_list">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Lecturer Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $counter = 0;
                while ($record = mysqli_fetch_array($rs)) {
                    $counter++;
                    echo "<tr><td>";
                    $id = $record['lect_id'];
                    //end display for admin\
                    echo $counter;
                    echo "</td>";
                    echo "<td>" . $record['lect_name'] . "</td>";
                    echo "<td>" . $record['lect_email'] . "</td>";
                    if (
                        isset($_SESSION['accesslevel']) &&
                        $_SESSION['accesslevel'] == 'admin'
                    ) {
                        echo "<td>" . "<a href='editmenu.php?id=$id'>
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
                    window.location.href = "deleteactivity.php?id=" + id;
                }
            }
        </script>
    <?php
} else if (mysqli_num_rows($rs_student) >= 1) {
    ?>
        <div class="portlet light bordered">
            <table class="table table-striped table-bordered table-hover table-checkable order-column table-auto-width" id="table_list">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $counter = 0;
                    while ($record = mysqli_fetch_array($rs_student)) {
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
                            echo "<td>" . "<a href='editmenu.php?id=$id'>
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
                        window.location.href = "deleteactivity.php?id=" + id;
                    }
                }
            </script>


        <?php } else {

        echo "NO RECORD FOUND";
    } ?>
        <br>
        <?php
        include "footer.template.php";
        ?>