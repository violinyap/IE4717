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
			<tr><td>Select our locations.</td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td>View <a href="doctors.php" id="botnav"><i>'Our Doctors'</i></a> for their location, and available date and time slots.</td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td>Locations: </td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td><input type="radio" value="NTU Clinic Fullerton" id="Fullerton" name="location" onInput="getlocation()" checked='check'> 
			<label for="">NTU Clinic Fullerton</label>
			</td></tr>
			<tr style='height:10px;'><td></td></tr>
			<tr><td><input type="radio" value="NTU Clinic Raffles" id="Raffles" name="location" onInput="getlocation();"> 
			<label for="">NTU Clinic Raffles</label><br>
			</td></tr>
			<tr style="height:400px;"><td></td></tr>
			<tr><td><input type="submit" value="Next" id="nextBtn"></input>
			</td></tr>
			</table>
		</form>
	</div>
	</div>
	<?php include "../footer.php";?>
</div>
</body>