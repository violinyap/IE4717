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
		<b>My Appointment</b> &nbsp; > &nbsp;<a href="editappointment.php" class="botnav">Edit Appointment</a>
	</dt>
	</div>
	<div class="maincontainer">
		<div style="float:left; width: 700px; margin-top: 20px; margin-left:15px;">
		
				
		<?php
		include "../methods/getUserData.php";
		$userid = $currentUserData['userid'];
		$apptID = $_POST['apptID'];
		$location = $_POST['location'];
		$doctor = $_POST['doctor'];
		$doctor2 = $_POST['doctor2'];
		$date = $_POST['date'];
		$time = $_POST['timeslot'];
		date_default_timezone_set("Asia/Singapore");
		$timeCompleted = date('H:i');
		$date2 = date("d-m-Y", strtotime($date));
				
		@ $db = new mysqli('localhost', 'root', '', 'project');
		
		if (mysqli_connect_errno()) {
		echo "Error: Could not connect to database.  Please try again later.";
		exit;
		}
		$query = "UPDATE `Appointments` SET `location`='".$location."',`doctor`='".$doctor."',`date`='".$date."',`time`='".$time."',`timeCompleted`='".$timeCompleted."'
					WHERE `appointmentID`='".$apptID."'";
			
		$result = $db->query($query);
		if ($result) {
		echo "<b>Appointment updated successfully!</b><br>
		<i>Check your email for the softcopy confirmation. </i> <br><br>";
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
		<tr style='height:35px'><td colspan='2'><br></td></tr>
		<tr>
		<td style='font-size:30px;width:200px;'>Paid Status: </td>
		<td class='confirmation-column'>Yes</td>
		</tr>
		<tr style='height:35px'><td colspan='2'><br></td></tr>
		<tr><td colspan='2'>
		Please be on time for your appointment(s).
		<br>You can re-schedule your appointment on your appointment page. 
		<br>*Terms & Conditions applies
		</td></tr>
		<tr style='height:35px'><td colspan='2'><br></td></tr>
		<tr>
		<td><a href='myappointment.php'><button id='nextBtn'>View Your Appointments</button></a></td>
		<td><a href='bookappointment.php'><button id='nextBtn'>Make A New Appointment</button></a></td>
		</tr>
		</table>";
		//email
				$to      = 'f32ee@localhost';
				$subject = 'Appointment updated';
				
				$message = "
				<html>
				<table>
				<th>Appointment updated successfully. View details below: </th>
				<tr><td> Location: </td><td>" . $clinic_name . "</td></tr>
				<tr><td> Doctor: </td><td>" . $doctor_name . "</td></tr>
				<tr><td> Date: </td><td>" . $date2 . "</td></tr>
				<tr><td> TIme: </td><td>" . $time . "</td></tr>
				<tr><td colspan='2'>To edit or cancel appointment, login to the web app to make changes.</td></tr>
				</table>
				<dt>From: NTUClinc@donotreply</dt>
				</html>
				";
				
				$headers = 'From: f31ee@localhost' . "\r\n" .
					'Reply-To: f32ee@localhost' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
				
				$headers .= "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				
				
		
				mail($to, $subject, $message, $headers, '-ff32ee@localhost');
				} else {
					echo "An error has occurred.  The appointment was not updated.";
					echo "Please try again";
					// TODO: add try again button
				}
			
		?>
					
		</div>
		<div style="float:right; padding-top: 20px;">
		<?php include "../methods/getAppointment.php"; ?>
		<dt>Updated successfully!</dt>
		</div>
	</div>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>
