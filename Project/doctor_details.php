<!DOCTYPE html>
<html lang="en">
<head>
	<title>NTUClinic</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="doctors.css" />
	<script type="text/javascript" src="methods/getPath.js"></script>
<body>
<div id="wrapper">

<?php include "header.php"?>
	
	<div id="bodycontent">
		<div class="doctors-banner">
			<h1>Our Doctors</h1>
		</div>

    <div class="doctors-section">
    <?php
				include "methods/dbconnect.php";
				$query = "SELECT *  FROM doctors";

				$result = $dbcnx->query($query);

				if ($result->num_rows >0 )
				{
					while ($row = mysqli_fetch_assoc($result)){
						$docname = $row['docname'];
						$docdesc = $row['description'];
						$docid = $row['doctorid'];
						$docimg = $row['image'];
						echo '
							<a href="doctors'.$docid.'.php" style="text-decoration: none; color:black;">
							<div class="doctor-card">
								<img src="images/doctors/'.$docimg.'"class="doctor-card-img" resi>
								<div class="doctor-card-text">
									<h2>'.$docname.'</h2>
									<p class="doctor-desc">'.$docdesc.'</p>
								</div>
							</div>
							</a>
						';
					}
				}

			?>
    </div>
    <div class="doctors-detail-modal">
			<div class="close-modal">
				<a class="close" href="doctors.php">&times;</a>
			</div>
			<div class="detail-wrapper">
				
				<?php
					$docid = $_GET['docid'];


					// GET DOC DATA
					include "methods/dbconnect.php";
					$query = "SELECT *  FROM doctors d INNER JOIN clinics c on d.clinicid = c.clinicid WHERE doctorid=$docid ";

					$result = $dbcnx->query($query);
					if ($result->num_rows >0 )
					{
						while ($row = mysqli_fetch_assoc($result)){
							$docdata = $row;
						}
					}

					echo '<div class="detail-left">';
					
					echo '
					<h1>'.$docdata['docname'].'</h1>
					<p>
						'.$docdata['description'].' <br/><br/>
						Clinic: '.$docdata['clinicname'].'<br/>
						Contact no: '.$docdata['contact'].' <br/>
						<br/>
						Working days: Mon, Tue, Wed, Thu, Fri, Sat, Sun 
					</p>
					<a href="javascript:getAbsolutePath(\'bookappointment.php\',"patient/");">
						<button class="primarybutton">
							Book Appointment
						</button>
					</a>
					';
					echo '</div>';
					
					// GET APPOINTMENT LIST
						$query2 = "SELECT * FROM appointments WHERE doctor='".$docid."'";
						$result2 = $dbcnx->query($query2);

						date_default_timezone_set("Asia/Singapore");

						$today = date("Y-m-d");
						$todayinstr = strtotime($today);
						$onedayinstr = 60*60*24;
						$nextDayinstr=  $todayinstr + $onedayinstr;
						$next5dayinstr = $todayinstr + $onedayinstr*5;
						$nextday = date("Y/m/d", $nextDayinstr);
						$next5day = date("Y/m/d", $next5dayinstr);

					echo '<div class="detail-right">'	;
					echo '
						<h2>Availability in the next 5 days</h2>					
						From '. date($nextday).' - '.$next5day.'</p>
						<table class="availability-table">
						<tr class="availability-row">
							<th>Day/Date</th>
							<th>08:00</th>
							<th>09:00</th>
							<th>10:00</th>
							<th>11:00</th>
							<th>12:00</th>
							<th>13:00</th>
							<th>14:00</th>
							<th>15:00</th>
							<th>16:00</th>
							<th>17:00</th>
						</tr>
					';
					
					for ($i = 1; $i<=5; $i+=1) {
						$curDate = $todayinstr + $onedayinstr*$i;
						$curDateInStr = date("Y-m-d", $curDate);
						echo '
						<tr class="availability-row">
						<td>'.$curDateInStr.'</td>';
						for ($j = 8 ; $j<18; $j+=1){
							$time = sprintf("%02d", $j);
							$check = "SELECT * FROM appointments WHERE doctor='".$docid."' AND date='".$curDateInStr."' AND time='".$time.":00:00'";
							$result3 = $dbcnx->query($check);
							if ($result3->num_rows >0){
								echo '
								<td>
								<img src="images/close.png" width="20" height="20"/>
							</td>
								';
							} else {
								echo '
								<td>
									<img src="images/tick-mark.png" width="20" height="20"/>
								</td>';
							}
						}
					}
					echo '</div>';
					?>
					

			</div>
		</div>
		
	</div>
</div>
</body>
