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
			<a href="myappointment.php" class="botnav">My Appointment</a>
			> <b>Edit Appointment</b>
		</div>
		<?php
					include "../methods/dbconnect.php";
						if (!empty($_POST['location'])) {
							$location = $_POST['location'];
						}
						else {
							$location = "";
						}
						if (!empty($_POST['doctor'])) {
							$doctor = $_POST['doctor'];
						}
						else {
							$doctor = "";
						}
						if (!empty($_POST['doctor2'])) {
							$doctor2 = $_POST['doctor2'];
						}
						else {
							$doctor2 = "";
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
						$c_id = array();
						if ($result->num_rows >0 )
						{
							while ($row = mysqli_fetch_assoc($result)){
							$clinic_name = $row['clinicname'];
							$clinic_id = $row['clinicid'];
							$c_id[] = $clinic_id; 
							//print_r($c_id); echo "<br>";
							$c_name[] = $clinic_name;
							//print_r($c_name); echo "<br>";
							}
						}
	?>
	<div class="maincontainer">
		<div class="leftform">
		<dt><b>Proceed to change this appointment?</b><br><br></dt>
		<form method="post" action="editappointment1a.php" id="appointmentform">
			<?php include "../methods/getAppointment.php" ?>
			<table>
			<tr><td colspan="2">Click <b>'Next'</b> to begin re-selection.</th></tr>
			<tr style="height:25px;"><td colspan='2'></td></tr>
			<tr>
			<td style="width: 350px;">
		</td>
			<td>
			<input type="hidden" name="date" value='<?php echo "$date";?>'></input>
			<input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
			<input type="hidden" name="doctor" value='<?php echo "$doctor"; ?>'></input>
			<input type="hidden" name="doctor2" value='<?php echo "$doctor2"; ?>'></input>
			<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
			<input value='<?php echo $apptID; ?>' name='apptID' type='hidden'/>
			<input type="submit" value="Next" class="darkbluebutton" id="nextBtn"></input></td>
			</tr>
			</table>
		</form>
		</div>
	</div>
	</div>
	</div>
	<?php include "footer.php";?>
	<script type="text/javascript" src="bookappointment.js"></script>

</div>
</body>
