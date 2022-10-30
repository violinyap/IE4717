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
		<b>My Appointment</b> &nbsp; > &nbsp;<a href="editappointment.php" id="botnav">Edit Appointment</a>
	</dt>
	</div>
	<div class="maincontainer">
			
			<div class="rightside">
				<div class="leftside">
				<?php include "../methods/getAppointment.php" ?>
				</div>
					<form method="post" action="saveappointment.php" id="appointmentform">
				<?php
					$date = $_POST['date'];
					$time = $_POST['timeslot'];
					echo "<input value='$apptID' name='apptID' type='hidden'/>";
				?>
						<table style="width:500px;"> 
						<th style="text-align:left; ">Step 3:</th>
						<tr><td colspan="2">Check your selection below.<br>
						<br>Click 'Change' if you want to make changes to your selection.
						<br>If all information is correct, click 'Next' to proceed to Payment.
						</td></tr>
						<tr style="height:35px;"><td colspan="2"></td></tr>
						<tr>
							<td style="font-size:30px;width:200px;">Date: </td>
							<td class="confirmation-column"><span id="date"><?php echo $date;?></span></td>
						</tr>
						<tr style="height:35px;"><td colspan="2"></td></tr>
						<tr>
							<td style="font-size:30px;width:200px;">Time: </td>
							<td class="confirmation-column"><span id="time"><?php echo $time;?></span></td>
						</tr>
						<tr style="height:200px;"><td colspan="2"><br></td></tr>
						<tr>
							<td>
							<input type="hidden" name="date" value='<?php echo "$date";?>'></input>
							<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
							<input type="submit" value="Save Changes" id="nextBtn"></input>
							</td>
							<td>
							<a href="editappointment.php" id="cancelButton">Change</a>
							</td>
						</tr>
						</table>
					</form>
			</div>
			
		
	</div>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>
