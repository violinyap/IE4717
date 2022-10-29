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
		<form method="post" action="editappointment3.php" id="appointmentform">
				<?php
		$doctor = $_POST['doctor'];
		$location = $_POST['location'];
		$date = $_POST['date'];
		echo "<input value='$apptID' name='apptID' type='hidden'/>";
	?>
			<?php
			echo "
			<table class='time-table'>
			<th style='text-align:left; padding-bottom:10px;'>Step 2b:
			<br><br>Select the available time slots as displayed below:</th>
			";
			$db = mysqli_connect('localhost', 'root', '');
			mysqli_select_db($db,'project');
			$sql=
			"SELECT doctor, date, time
			FROM appointments";
			$result = mysqli_query($db,$sql);
			$items = array();
			$items2 = array((strtotime("08:00")),(strtotime("09:00")), (strtotime("10:00")), (strtotime("11:00")),(strtotime("12:00")),(strtotime("13:00")),(strtotime("14:00")),(strtotime("15:00")), (strtotime("16:00")), (strtotime("17:00")));
			$firstTime = strtotime("08:00");
			$lastTime = strtotime("17:00");
			while ($row = mysqli_fetch_assoc($result)){
			if ( ($row['doctor'] == $doctor) && ($row['date'] == $date) ) {
			for ($i=$firstTime;$i<=$lastTime; $i+=3600) {
				$timeRetrieved= strtotime($row['time']);
				//$time = date("H:i" , $i);
				if ($timeRetrieved == $i)
				{
					$items[]=$i; //array $items[] contain occupied appointment slot
				}
			}
			}
			}
			$items3 = array();
			$items3 = array_diff($items2,$items);
			foreach($items3 as $items3){
			$time = date("H:i" , $items3);
			echo "
			<tr class='time-row'>
			<td>
			<p><input type='radio' value='". $time ."' name='timeslot' onInput='getTime();' checked='checked'>
			<label>" . $time . "</label><br></p>
			</td>
			</tr>
			";
			}
			if (empty($items3)) {
			echo "
			<tr><td>All slots occupied! Press 'Back' to restart.</td></tr>
			<tr style='height:540px;'><td></td></tr>
			<tr><td>
			<a href='bookappointment1a.php' id='cancelButton'>Back</a>
			</td></tr>
			";
			}
			else {
			echo "
			<tr style='height:25px;'><td></td></tr>
			<tr><td>
			<input type='hidden' name='date' value='" .$date. "'></input>
			<input type='hidden' name='location' value='" .$location. "'></input>
			<input type='hidden' name='doctor' value='" .$doctor. "'></input>
			<input type='submit' value='Next' id='nextBtn'></input>
			</tr></td>
			";
			}
			$result->free();
			$db->close();
			
			echo "</table>";
			?>
		</form>
			</div>
			
		
	</div>
	</div>
	</div>
	<?php include "../footer.php";?>
</div>
</body>
