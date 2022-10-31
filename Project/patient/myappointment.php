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
	<dt>
		<a href="myappointment.php" class="botnav">My Appointment</a>
	</dt>
	</div>
	<div class="maincontainer">
	<dt id="abcd">
		<?php include 'appointmentRetrieval.php';
		echo "<p>
		View all upcoming appointment(s) here.<br><br>" .
		"<i>" . $count . " appointment(s) found.</i></p><br>";
		?>
		<?php
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
		$patientid = $_SESSION['valid_user_id'];
		$db = mysqli_connect('localhost', 'root', '');
		mysqli_select_db($db,'project');
		$sql=
		"SELECT *
		FROM appointments a
		INNER JOIN patients p on a.user = p.userid
		INNER JOIN doctors d on a.doctor = d.doctorid
		INNER JOIN clinics c on a.location = c.clinicid
		WHERE user='$patientid'";
		$result = mysqli_query($db,$sql);
		while ($row = mysqli_fetch_assoc($result)){
		if ($row['paid_status'] == "1") {
			if ($row['book_status'] == "1")
			{
				$location = $row['clinicname'];
				$doctor = $row['docname'];
			$date = $row['date'];
			$time = $row['time'];
			$apptID = $row['appointmentID'];
			$date2 = date("d-m-Y", strtotime($date));
			echo "
			<table class='appointment-table' style='font-size:20px;border:1px solid black;height:300px;width:450px;'>
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
				Paid
				</span></td>
			</tr>
			<tr>
			<td style='float: center; width:250px;'>
				<form action='editappointment.php' method='post'>
					<input value='$apptID' name='apptID' type='hidden'/>
					<button id='editbutton'>Edit</button>
				</form>
			</td>
			<td style='float: center;'>
			<form action='cancelappointment.php' method='post'>
			<input value='$apptID' name='apptID' type='hidden'/>
				<button id='cancelbutton' onclick='alertpopup()'>Cancel</button>
				</form>
			</td>
			</tr>
			</table><br>";
			}
			}
			}
			$result->free();
			$db->close();
		?>
	<script>
	function alertpopup(){
		var val = alert("Confirm to cancel the appointment? Refund will be made.");
		if (!val) {
			window.location.href = "myappointment.php";
		}
	}
	</script>
	</div>
	</div>
</div>
<?php include "footer.php";?>
</body>
