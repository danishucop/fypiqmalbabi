<?php
include "checksessionlect.php";
include "dbconnect.php";
include "headerlect.template.php";

$lect_id = $_SESSION['lect_id'];
$pending = 'Pending';
$sql = "SELECT * FROM meeting WHERE meeting_lect_id = '$lect_id' AND meeting_status = '$pending' ";
$rs = mysqli_query($conn, $sql);
if (mysqli_error($conn)) {
	echo "Error" . mysqli_error($conn);
} else { //paparan rekod
?>

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
	<div class="container-fluid">

		<!-- Page Heading -->

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Lecturer Pending Meeting</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Student Name</th>
							<th scope="col">Date</th>
							<th scope="col">Time From</th>
							<th scope="col">Time To</th>
							<th scope="col">Place</th>
							<th scope="col">Purpose</th>
							<th scope="col">Action</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$counter = 0;
						while ($record = mysqli_fetch_array($rs)) {
							$counter++;
							echo "<tr><td>";
							$id = $record['id'];
							//end display for admin\
							echo $counter;
							echo "</td>";
							echo "<td>" . $record['meeting_stu_name'] . "</td>";
							echo "<td>" . $record['meeting_date'] . "</td>";
							echo "<td>" . $record['time_from'] . "</td>";
							echo "<td>" . $record['time_to'] . "</td>";
							echo "<td>" . $record['place'] . "</td>";
							echo "<td>" . $record['purpose'] . "</td>";


							echo "<td>" . "<a href='lectacceptprocess.php?id=$id'>
				<i type='button'  class='btn btn-primary'> Accept </i></a> " .
								"<a href='lectrejectprocess.php?id=$id'><button type='button' class='btn btn-danger'>
				Reject </button></a> " . "</td>";

							echo "</tr>";
						}
					}

						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	<br>
	<?php
	include "footer.template.php";
	?>