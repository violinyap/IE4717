<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../style.css" />
<link rel="stylesheet" href="./sidepanel.css" />
<link rel="stylesheet" href="./myappointment.css" />
<body>
<div id="wrapper">
	<?php include 'header.php'; ?>
	
	<div id="bodycontent">
	<?php include "sidepanel.php"; ?>
	<div class="leftcontent">
	<div class="breadcrumb">
			<a href="payment.php" class="botnav">Payment</a>
		</div>
	
	<div class="maincontainer">
	<dt id="abcd">
		<?php include 'preappointmentRetrieval.php';
		echo "<p>
		Make payment here if you want to continue/edit your planned appointment.<br>
		Slots will be reserved only for 1 hour and will be deleted after the timing.<br><br>" .
		"<i>" . $count . " pre-appointment(s) found.</i></p><br>";
		?>
		<?php
		include "../methods/getUserData.php";
		$db = mysqli_connect('localhost', 'root', '');
		mysqli_select_db($db,'project');
		$sql=
		"SELECT *
		FROM appointments a
		INNER JOIN patients p on a.user = p.userid
		INNER JOIN doctors d on a.doctor = d.doctorid
		INNER JOIN clinics c on a.location = c.clinicid";
		$result = mysqli_query($db,$sql);

		
		while ($row = mysqli_fetch_assoc($result)){
		if ($row['user'] == $currentUserData['userid']) {
		if ($row['paid_status'] == "0") {
			if ($row['book_status'] == "1")
			{
			$apptID = $row['appointmentID'];
			$location = $row['clinicname'];
			$doctor = $row['docname'];
			$date = $row['date'];
			$time = $row['time'];
			$date2 = date("d-m-Y", strtotime($date));
			$timeCompleted = $row['timeCompleted'];
			echo "
			<div class='table-wrapper'>
			<table class='appointment-table' style='font-size:20px;height:300px;width:450px;'>
			<th colspan='2' style='float:left;font-size:24px;'>
				<i>Appointment Details</i>
			</th>
			<tr>
				<td style='width:250px;'><b>ID: </b></td>
				<td><span id='doctor'>
				NTCL$apptID
				</span></td>
			</tr>
			<tr>
				<td style='width:250px;'><b>Doctor: </b></td>
				<td><span id='doctor'>
				$doctor
				</span></td>
			</tr>
			<tr>
				<td style='width:250px;'><b>Date: </b></td>
				<td><span id='date'>
				$date2
				</span></td>
			</tr>
			<tr>
				<td style='width:250px;'><b>Time: </b></td>
				<td><span id='time'>
				$time
				</span></td>
			</tr>
			<tr>
				<td style='width:250px;'><b>Location: </b></td>
				<td><span id='location'>
				$location
				</span></td>
			</tr>
			<tr>
				<td style='width:250px;'><b>Status: </b></td>
				<td><span id='status'>
				Unpaid
				</span></td>
			</tr>
			<tr>
				<td style='width:250px;'><b>Time Completed: </b></td>
				<td><span id='time_completed'>
				$timeCompleted
				</span></td>
			</tr>
			<tr>
			<form action='confirmpayment.php' method='post'>
			<td style='float: center; width:250px;'>
					<input value='$apptID' name='apptID' type='hidden'/>
					<button id='editbutton' onclick='alertpopup2()' type='submit' class='darkbluebutton'>Pay</button>
					</td>
					</form>
			<td style='float: center;'>
				<form action='cancelappointment.php' method='post'>
				<input value='$apptID' name='apptID' type='hidden'/>
					<button id='cancelbutton' onclick='alertpopup()' class='primarybutton'>Cancel</button>
				</form>
			</td>
			</td>
			</tr>
			</table>
			</div>
			<br>";
			}
			}
			}
			}
			$result->free();
			$db->close();
		?>
	<script>



	function alertpopup(){
		var val = confirm("Confirm to cancel the pre-appointment? Refund will be made.");
		if (val == true) {
		alert("Appointment successfully cancelled.");
		} else {
		alert("Appointment not cancelled. To confirm the appointment, click pay.");
		}
	}
	function alertpopup2(){
		var val1 = window.confirm("Open payment in new window?")
		if (val1 == true) {
		alert("Payment Successful!");
		}
		else {
		alert("Payment not successful. Try again.");
		}
		}
	</script>
	</div>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>
