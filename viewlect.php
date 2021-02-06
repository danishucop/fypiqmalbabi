<?php
session_start();
include "dbconnect.php";
include "headeradmin.template.php";
$sql = "SELECT * FROM lecturer";
$rs = mysqli_query($conn, $sql);
if (mysqli_error($conn)) {
	echo "Error" . mysqli_error($conn);
} else { //paparan rekod
?>




	<div class="portlet light bordered">
		<table width="100%">
			<tr>
				<td>
					<a href="formlect.php"><button type="button" class="btn btn-primary">ADD</button></a>
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
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Lecturer Name</th>
							<th scope="col">Lecturer Email</th>
							<th scope="col">Status</th>
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
								echo "<td>" . $record['lect_status'] . "</td>";
								if (
									isset($_SESSION['accesslevel']) &&
									$_SESSION['accesslevel'] == 'admin'
								) {
									echo "<td>" . "<a href='updatelect.php?lect_id=$id'>
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
				</div>
			</div>
		</div>
	</div>
	<script>
		function confirmdelete(id) {
			var answer = confirm("Are u sure to delete?");
			if (answer == true) {
				//redirect
				window.location.href = "deletelect.php?id=" + id;
			}
		}
		$(document).ready(function() {
			$('#dataTable').DataTable();
		});
		window.$ = window.jquery = require('./node_modules/jquery');
		window.dt = require('./node_modules/datatables.net')();
		window.$('#dataTable').DataTable();
	</script>
<?php
}
?>

<br>
<?php
include "footer.template.php";
?>