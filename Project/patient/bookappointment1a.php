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
		<b>Make An Appointment > </b>
		Step 1a
	</dt>
	</div>
	<div class="maincontainer">
	<dt id="abcd">
		<form method="post" action="bookappointment1b.php" id="appointmentform">
			<table>
			<th style="float:left;">Step 1a:</th>
			<tr><td colspan='2'>Select our locations.</td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td colspan='2'>View <a href="doctors.php" id="botnav"><i>'Our Doctors'</i></a> for their location, and available date and time slots.</td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td colspan='2'>Locations: </td></tr>
			<tr style="height:25px;"><td colspan='2'></td></tr>
			<?php 
				include "../methods/dbconnect.php";
				
				if (!empty($_POST['location'])) {
					$location = $_POST['location'];
				}
				else {
					$location = "1";
				}
				if (!empty($_POST['doctor'])) {
					$doctor = $_POST['doctor'];
				}
				else {
					$doctor = "";
				}
				if (!empty($_POST['date'])) {
					$date = $_POST['date'];
				}
				else {
					$date = "";
				}
				if (!empty($_POST['timeslot'])) {
					$time = $_POST['timeslot'];
				}
				else {
					$time = "";
				}
				$query = "SELECT * FROM clinics";
				// echo "<br>" .$query. "<br>";
				$result = $dbcnx->query($query);
				//echo "<input value='$apptID' name='apptID' type='hidden'/>";
				if ($result->num_rows >0 )
				{
					while ($row = mysqli_fetch_assoc($result)){
					$clinic_name = $row['clinicname'];
					$clinic_id = $row['clinicid'];
						if ($location == $clinic_id) {
							echo '
							<tr><td><input type="radio" value="'.$clinic_id.'" id="clinic_'.$row['clinicid'].'" name="location" checked>
							';
						}
						else {
						echo '
						<tr><td><input type="radio" value="'.$clinic_id.'" id="clinic_'.$row['clinicid'].'" name="location" required>
						';
						}
					echo '
					<label for="">'.$clinic_name.'</label>
					</td></tr>
					<tr style="height:10px;"><td colspan="2"></td></tr>
					';
					}
				}
				$dbcnx->close();
			?>
			<tr style="height:450px;"><td colspan='2'></td></tr>
			<tr>
			<td>
			<input type="submit" value="Previous" formaction="bookappointment.php" id="nextBtn"></input></td>
			<td>
			<input type="hidden" name="date" value='<?php echo "$date";?>'></input>
			<input type="hidden" name="doctor" value='<?php echo "$doctor"; ?>'></input>
			<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
			<input type="submit" value="Next" id="nextBtn"></input></td>
			</tr>
			</table>
		</form>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>
