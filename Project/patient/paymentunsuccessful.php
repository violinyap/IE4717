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
	<div class="leftcontent">
		<div class="breadcrumb">
			<a href="profile.php" class="botnav">Make An Appointment</a>
			>	Step 1a
			>	Step 1b
			>	Step 2a
			>	Step 2b
			>	Step 3
			>	Step 4
			>	<b>Payment Unsuccessful</b>
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
		$date2 = date("d-m-Y", strtotime($date));
		
		@ $db = new mysqli('localhost', 'root', '', 'project');
		
		$sql=
		"SELECT *
		FROM appointments a
		INNER JOIN patients p on a.user = p.userid
		INNER JOIN doctors d on a.doctor = d.doctorid
		INNER JOIN clinics c on a.location = c.clinicid
		WHERE doctor='$doctor' AND location='$location' AND date='$date' AND time='$time' AND user='$userid'";

		$result = $db->query($sql);
		if ($result )
		{
			while ($row = mysqli_fetch_assoc($result)){
				$clinic_name = $row['clinicname'];
				$doctor_name = $row['docname'];
				$apptID = $row['appointmentID'];
			}
		}
		echo 
		"<table style='width:600px;'>
			<tr>
				<td colspan='2'>
				<b>Payment <u>NOT</u> successfully.</b><br>
				<i>Go to payment tab to complete the payment soon. </i>
				</td>
			</tr>
			<tr style='height:35px'><td colspan='2'><br></td></tr>
			<tr>
				<td style='font-size:30px;width:200px;'>Location: </td>
				<td class='confirmation-column'>" . $clinic_name . "</td>
			</tr>
			<tr style='height:35px'><td colspan='2'><br></td></tr>
			<tr>
				<td style='font-size:30px;width:200px;'>Doctor:  </td>
				<td class='confirmation-column'>" . $doctor_name . "</td>
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
				<td class='confirmation-column'>UNPAID</td>
			</tr>
			<tr style='height:35px'><td colspan='2'><br></td></tr>
			<tr><td colspan='2'>
				Please pay on the payment tab or payment will be charged automatically after your doctor' appointment.
				<br><br>Or else cancel the appointment slot to free up the slot for other patients.
			</td></tr>
			<tr style='height: 35px'><td colspan='2'><br></td></tr>
			<tr colspan='2'><td>
			<a href='payment.php'><button id='nextBtn' class='primarybutton'>To Payment</button></a>
			</td></tr>
		</table>";
			
		$db->close();
	?>
	</div>
	</div>
	</div>
<?php include "footer.php";?>
</div>
</body>
