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
		<b>Step 1a > </b>
		Step 1b
	</dt>
	</div>
	<div class="maincontainer">
	<dt id="abcd">
	<?php
		$location = $_POST['location'];
	?>
		<form method="post" action="bookappointment2a.php" id="appointmentform">
			<table>
			
			<th style="float:left;">Step 1b:</th>
			<tr><td colspan='2'>Select available doctors.</td></tr>
			<tr style="height:25px;"><td colspan='2'></td></tr>
			<tr><td colspan='2'><i>Note: Doctors available are subjected to a <u>first come first serve basis</u> and their available schedule. <br></i></td></tr>
			<tr style="height:25px;"><td colspan='2'></td></tr>
			<tr><td colspan='2'>Doctors:</td></tr>
			<tr style="height:10px;"><td colspan='2'></td></tr>
			<?php 
				include "../methods/dbconnect.php";
				
				$location = $_POST['location'];
				
				if (!empty($_POST['doctor'])) {
					$doctor = $_POST['doctor'];
				}
				else {
					$doctor = 1;
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
				$doc_id = array((int)1,(int)2,(int)3,(int)4,(int)5);
				$doc_id_get = array();
				
				$query = "SELECT * FROM doctors WHERE clinicid='".$location."'";
				// echo "<br>" .$query. "<br>";
				$result = $dbcnx->query($query);
				if ($result->num_rows >0 )
				{
					while ($row = mysqli_fetch_assoc($result)){
						$doctor_name = $row['docname'];
						$doctor_id = $row['doctorid'];
						$doc_id_get[] = (int)$doctor_id; //store retrived data in array
						if ($doctor == $doctor_id) {
						echo "
						<tr><td colspan='2'><input type='radio' value='$doctor_id' name='doctor' checked>
						";
						}
						else {
						echo "
						<tr><td colspan='2'><input type='radio' value='$doctor_id' name='doctor' required>
						";
						}
						echo "
						<label>$doctor_name</label></td></tr>
						<tr style='height:10px;'><td colspan='2'></td></tr>
						";
					}
				}
				$dbcnx->close();
		?>
		
			<tr style="height:370px;"><td colspan='2'></td></tr> 
			<tr height="35px"><td>
			<input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
			<input type="hidden" name="date" value='<?php echo "$date";?>'></input>
			<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
			<input type="submit" value="Previous" formaction="bookappointment1a.php" id="nextBtn"></input></td>
			<td><input type="submit" value="Next" id="nextBtn"></input></td>
			</tr>
			<!-- <input value="Back" id="nextBtn" onclick></input></td></tr> -->
			</table>
		</form>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>
