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
			<tr><td>Select available doctors.</td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td><i>Note: Doctors available are subjected to a <u>first come first serve basis</u> and their available schedule. <br></i></td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td>Doctors:</td></tr>
			<tr style="height:10px;"><td></td></tr>
			<?php 
				include "../methods/dbconnect.php";
				$query = "SELECT * FROM doctors WHERE clinicid='".$location."'";
				// echo "<br>" .$query. "<br>";
				$result = $dbcnx->query($query);
				if ($result->num_rows >0 )
				{
					while ($row = mysqli_fetch_assoc($result)){
						$doctor_name = $row['docname'];
						$doctor_id = $row['doctorid'];
						echo "
						<tr><td><input type='radio' value='$doctor_id' name='doctor'> 
						<label>$doctor_name</label></td></tr>
						<tr style='height:10px;'><td></td></tr>";
					}
				}
				$dbcnx->close();
		?>
		
			<tr style="height:370px;"><td></td></tr> 
			<tr><td>
			<input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
			<input type="submit" value="Next" id="nextBtn"></input></td></tr>
			<!-- <input value="Back" id="nextBtn" onclick></input></td></tr> -->
			</table>
		</form>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>