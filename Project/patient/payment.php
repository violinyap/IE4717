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
	<div id="appointmentnav">
		<a href="payment.php" id="botnav">Payment</a>
		&nbsp;
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
		"SELECT a.userid, a.location, a.doctor, a.date, a.time, 
		a.paid_status, a.book_status, a.timeCompleted
		FROM appointments a
		INNER JOIN patients p on a.user = p.userid";
		$result = mysqli_query($db,$sql);
		while ($row = mysqli_fetch_assoc($result)){
		if ($row['user'] == $currentUserData['userid']) {
		if ($row['paid_status'] == "0") {
			if ($row['book_status'] == "1")
			{
			$location = $row['location'];
			$doctor = $row['doctor'];
			$date = $row['date'];
			$time = $row['time'];
			$date2 = date("d-m-Y", strtotime($date));
			$timeCompleted = $row['timeCompleted'];
			echo "
			<table class='appointment-table' style='font-size:20px;border:1px solid black;height:300px;width:450px;'>
			<th colspan='2' style='float:left;font-size:24px;'>
				<i>Appointment Details</i>
			</th>
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
			<td style='float: center; width:250px;'>
				<button id='editbutton' onclick='alertpopup2()'>Pay</button>
			</td>
			<td style='float: center;'>
				<button id='cancelbutton' onclick='alertpopup()'>Cancel</button>
			</td>
			</tr>
			</table><br>";
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
	<?php include "../footer.php";?>
</div>
</body>
