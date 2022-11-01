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
		<div style="float:left; width: 800px;">
		<form method="post" action="bookappointment1b.php" id="appointmentform">
			<table>
			<th style="float:left;">Step 1a:</th>
			<tr>
			<td colspan='2'>Select our locations.</td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr>
			<td colspan='2'>View <a href="doctors.php" id="botnav"><i>'Our Doctors'</i></a> for their location, and available date and time slots.</td></tr>
			<tr style="height:25px;"><td colspan="2"></td></tr>
			<tr style="height:25px;text-align:left;"><th colspan="2">Locations:</th></tr>
			<tr>
			<td colspan='2' style="height:10px;"></td></tr>
			<?php 
			for ($i=0;$i<2;$i+=1) {
				if ($location == $c_id[$i]) {
				//echo $c_id[$i] ." ". $c_name[$i];
				echo '
				<tr><td colspan="2">
				<label for="clinic_'.$c_id[$i].'">
				<input type="radio" value="'.$c_id[$i].'" id="clinic_'.$c_id[$i].'" name="location" onInput="getlocation()" checked>
				<span>'.$c_name[$i].'</span></label>
				</td></tr>
				<tr style="height:25px;"><td colspan="2"></td></tr>
				';
				}
				else {
				echo '
				<tr><td colspan="2">
				<label for="clinic_'.$c_id[$i].'">
				<input type="radio" value="'.$c_id[$i].'" id="clinic_'.$c_id[$i].'" name="location" onInput="getlocation()" required>
				<span>'.$c_name[$i].'</span></label>
				</td></tr>
				<tr style="height:25px;"><td colspan="2"></td></tr>
				';
				}
			}
			$dbcnx->close();
			?>
			<tr style="height:250px;"><td colspan='2'></td></tr>
			<tr>
			<td>
			<input type="submit" value="Previous" formaction="bookappointment.php" id="nextBtn"></input></td>
			<td>
			<input type="hidden" name="date" value='<?php echo "$date";?>'></input>
			<input type="hidden" name="doctor" value='<?php echo "$doctor"; ?>'></input>
			<input type="hidden" name="doctor2" value='<?php echo "$doctor2"; ?>'></input>
			<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
			<input type="submit" value="Next" id="nextBtn"></input></td>
			</tr>
			</table>
		</form>
		</div>
		<div style="float:right; background-color: white; padding-top: 20px; width: 350px;">
		<table style="border:1px solid black;">
		<th>Options Selected:</th>
		<tr><td colspan="2" style="height:25px;"></td></tr>
		<tr><th style="text-align:right;"> Location: </th>
		<td style="width:200px;background-color: #D9D9D9; border: 1px solid black;text-align:center;">
		<span id="location">
			<?php
			for ($i=0;$i<2;$i+=1) {
				if ($location == $c_id[$i]) {
					$location2 = $c_name[$i];
				}
				else if ($location == ""){$location2="TBD";}
			}
			echo $location2;
			?>
		</span>
		</td></tr>
		<tr><td colspan="2" style="height:25px;"></td></tr>
		<tr><th style="text-align:right;"> Doctor: </th>
		<td style="width:200px; background-color: #D9D9D9; border: 1px solid black;text-align:center;"> 
		<?php
			if ($doctor2 == "") {
			echo "TBD";}
			else {echo $doctor2;}
		?>
		</td></tr>
		<tr><td colspan="2" style="height:25px;"></td></tr>
		<tr><th style="text-align:right;"> Date: </th>
		<td style="width:200px; background-color: #D9D9D9; border: 1px solid black;text-align:center;"> 
		<span id="date_show">
		<?php
			if ($date == "") {
			echo "TBD";}
			else {echo $date;}
		?>
		</span>
		</td></tr>
		<tr><td colspan="2" style="height:25px;"></td></tr>
		<tr><th style="text-align:right;"> Time: </th>
		<td style="width:200px; background-color: #D9D9D9; border: 1px solid black;text-align:center;"> 
		<?php
			if ($time == "") {
			echo "TBD";}
			else {echo $time;}
		?>
		</td></tr>
		</table>
		</div>
		<script type="text/javascript" src="bookappointment.js"></script>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>
