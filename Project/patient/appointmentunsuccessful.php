<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../style.css" />
<link rel="stylesheet" href="./sidepanel.css" />
<link rel="stylesheet" href="./bookappointment.css" />
<body>
<div id="wrapper">
	<?php include 'header.php'; ?>
	
	<div id="bodycontent">
	<?php include "sidepanel.php"; ?>
	<div id="appointmentnav">
	<dt>
		<a href="bookappointment.php" class="botnav">Make An Appointment </a> > <b>Appointment Unsuccessful</b>
	</dt>
	</div>
	<div class="maincontainer">
	<dt id="abcd">
	<?php include "../methods/getUserData.php";
		$userid = $currentUserData['userid'];
		$location = $_POST['location'];
		$doctor = $_POST['doctor'];
		$date = $_POST['date'];
		$time = $_POST['timeslot'];
		date_default_timezone_set("Asia/Singapore");
		$timeCompleted = date('H:i');
		$timePay = strtotime($timeCompleted)+60*60;
		$timePay2 = date('H:i', $timePay);
		$date2 = date("d-m-Y", strtotime($date));
		echo 
		"<table style='width:600px;'>
			<tr>
				<td colspan='2'>
				<b>Appointment booked unsuccessfully.</b><br>
				<i>Go to payment tab to complete the payment by the next hour. </i>
				</td>
			</tr>
			<tr style='height:35px'><td colspan='2'><br></td></tr>
			<tr>
				<td style='font-size:30px;width:200px;'>Location: </td>
				<td class='confirmation-column'>" . $location . "</td>
			</tr>
			<tr style='height:35px'><td colspan='2'><br></td></tr>
			<tr>
				<td style='font-size:30px;width:200px;'>Doctor:  </td>
				<td class='confirmation-column'>" . $doctor . "</td>
			</tr>
			<tr style='height:35px'><td colspan='2'><br></td></tr>
			<tr>
				<td style='font-size:30px;width:200px;'>Date: </td>
				<td class='confirmation-column'>" . $date2 . "</td>
			</tr>
			<tr style='height:35px'><td colspan='2'><br></td></tr>
			<tr>
				<td style='font-size:30px;width:200px;'>Time: </td>
				<td class='confirmation-column'>" . $time . "</td>
			</tr>
			</tr>
			<tr style='height:35px'><td colspan='2'><br></td></tr>
			<tr>
				<td style='font-size:30px;width:200px;'>Paid Status: </td>
				<td class='confirmation-column'>No</td>
			</tr>
			<tr style='height:35px'><td colspan='2'><br></td></tr>
			<tr><td colspan='2'>
				Please pay within the next hour by: <b><u>" . $timePay2 . 
				"</u></b><br>Or else cancel the preappointment slot to free up the slot for other patients.
			</td></tr>
			<tr style='height: 150px'><td colspan='2'><br></td></tr>
			<tr><td>
			<a href='payment.php'><button id='nextBtn'>Proceed to Payment Tab</button></a>
			</td>
			<td>
			<a href='bookappointment.php'><button id='nextBtn'>Make Another Appointment</button></a>
			</td></tr>
		</table>";
		
		
		@ $db = new mysqli('localhost', 'root', '', 'project');

		if (mysqli_connect_errno()) {
		echo "Error: Could not connect to database.  Please try again later.";
		exit;
		}
		$query = "insert into appointments values
				(NULL,'".$userid."','".$location."','".$doctor."', '".$date."', '".$time."', '".$timeCompleted."' ,false, true)";
		$result = $db->query($query);
		if ($result) {
			echo "";
			} else {
			echo "An error has occurred.  The appointment was not registered.";
			}
			
		$db->close();
	?>
	</div>
	</div>
</div>
<?php include "footer.php";?>
</div>
</body>
