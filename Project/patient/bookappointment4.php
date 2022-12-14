<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../style.css" />
<link rel="stylesheet" href="./sidepanel.css" />

<link rel="stylesheet" href="./bookappointment.css" />
</head>
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
			><b>	Step 4</b>
		</div>
	<div class="maincontainer">
	<dt id="abcd">
	<?php
		$doctor = $_POST['doctor'];
		$location = $_POST['location'];
		$date = $_POST['date'];
		$time = $_POST['timeslot'];
	?>
		<form method="post" action="confirmpayment.php" id="appointmentform">
			<table style="width:550px;">


			<th style="text-align: left;">Step 4:</th>
			<tr><td colspan='2'>Make your payment. </td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td colspan='2'>A payment of <b><u>$5.00</u></b> booking fee is required to confirm this appointment.
			<br>Proceed by clicking the 'pay' button.<br><br>
			<br>Or press 'cancel' if you want to make payment later.
			<br><i>Note: Appointment(s) will only be saved for an hour before deletion.</i>
			</td></tr>
			<?php 
		include "../methods/getUserData.php";
		$userid = $currentUserData['userid'];
		$location = $_POST['location'];
		$doctor = $_POST['doctor'];
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
		$query = "insert into appointments (`appointmentID`, `user`, `location`, `doctor`, `date`, `time`, `timeCompleted`, `paid_status`, `book_status`)
		values (NULL,'".$userid."','".$location."','".$doctor."', '".$date."', '".$time."', '".$timeCompleted."' ,false, true)";

		$result = $db->query($query);

		if ($result) {

			
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
			echo "<b>Appointment booked successfully!</b><br>
		<i>Check your email for the softcopy confirmation. </i> <br><br>";
		echo 
		"<table style='width:600px;'>
			<tr>
				<td style='font-size:30px;width:200px;'>Location: </td>
				<td class='confirmation-column'>" . $clinic_name . "</td>
			</tr>
			<tr style='height:35px'><td colspan='2'><br></td></tr>
			<tr>
				<td style='font-size:30px;width:200px;'>Doctor:  </td>
				<td class='confirmation-column'>" .  $doctor_name  . "</td>
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
				<td style='font-size:30px;width:200px;'>Payment Status: </td>
				<td class='confirmation-column'>UNPAID</td>
			</tr>
			<tr style='height:35px'><td colspan='2'><br></td></tr>
			<tr><td colspan='2'>
				Please be on time for your appointment(s).
				<br>You can re-schedule your appointment on your appointment page. 
				<br>*Terms & Conditions applies
			</td></tr>
			<tr>
			</tr>
		<input value='$apptID' name='apptID' type='hidden'/>
		";
	?>
			<tr>
			<td style="width: 250px;align-items: center;">
			<input type="hidden" name="date" value='<?php echo "$date";?>'></input>
			<input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
			<input type="hidden" name="doctor" value='<?php echo "$doctor"; ?>'></input>
			<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
			<input type="submit" value="Make Payment" id="nextBtn" class="darkbluebutton"></input><br><br>
			</td>
			<td style="width: 250px;align-items: center;">
			<input type="submit" formaction="paymentunsuccessful.php" id="nextBtn" value="Pay Later" class="primarybutton"></input><br><br>
			<input type="hidden" name="button_pressed" value="1" />
			</td>
			</tr>
			</table>
		</form>
	</div>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
<?php
	$to      = 'f32ee@localhost';
		$subject = 'Payment Required';
		
		$message = "
		<html>
		<table>
		<th>Appointment booked successfully. View details below: </th>
		<tr><td> Location: </td><td>" . $clinic_name . "</td></tr>
		<tr><td> Doctor: </td><td>" . $doctor_name . "</td></tr>
		<tr><td> Date: </td><td>" . $date2 . "</td></tr>
		<tr><td> TIme: </td><td>" . $time . "</td></tr>
		<tr><td colspan='2'> Please complete the payment. To edit or cancel appointment, login to the web app to make changes.</td></tr>
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
			echo "An error has occurred.  The appointment was not registered.";
			echo "Please try again";
			// TODO: add try again button
		}
			
		$db->close();
		
		
?>
</body>
