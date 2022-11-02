<!DOCTYPE html>
<html lang="en">
<head>
	<title>NTUClinic</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css" />
	<link rel="stylesheet" href="./doctors.css" />
<body>
<script type="text/javascript" src="../methods/getPath.js"></script>
<div id="wrapper">

	<header>
		<div id="headerlogo">
			<img src="images/cliniclogo.png" width="50" height="50" class="icon"/> 
			<h1> NTUClinic </h1>
		</div>
		<nav id="headernav">
			<a href="home.php" class="topnav">Home</a>
			<a href="about.php" class="topnav">About Us</a>
			<a href="doctors.php" class="topnav">Our Doctors</a>
			<a href="contact.php" class="topnav">Contact Us</a>
		</nav>
		<?php // Show registered name
				session_start();
        if (isset($_SESSION['valid_user']))
        { 
					echo "<a href='patient/profile.php' id='headerprofile'>";
					echo "<img src='images/profile.png' width='38' height='38' class='icon'>";
					echo $_SESSION["valid_user"]; 
					echo "<form method=\"post\" action=\"login.php\" ><button class=\"profiledrop\" type=\"submit\">V</button></form>";
					echo "</a>";
				} 
        else { 
					echo "<a href='login.php' id='headerprofile'>";
					echo "<img src='images/profile.png' width='38' height='38' class='icon'>";
					echo "Login / Signup"; 
					echo "</a>";
				}
      ?>  
	</header>
	
	<div id="bodycontent">
		<div class="doctors-banner">
			<h1>Our Doctors</h1>
		</div>

    <div class="doctors-section">
    <?php
	$today = date("Y/m/d");
	$todayinstr = strtotime($today);
	$onedayinstr = 60*60*24;
	$next5dayinstr = $todayinstr + $onedayinstr*5;
	$next5day = date("Y/m/d", $next5dayinstr);
	for ($i=$todayinstr;$i<=$next5dayinstr;$i+=$onedayinstr) {
		//$day_plus = date("Y/m/d",$i);
		$days[] = $i;
	} //store next 5 days in array
	//print_r($days);
	$items = array();
	$items2 = array((strtotime("08:00")),(strtotime("09:00")), (strtotime("10:00")), (strtotime("11:00")),(strtotime("12:00")),(strtotime("13:00")),(strtotime("14:00")),(strtotime("15:00")), (strtotime("16:00")), (strtotime("17:00")));
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
						if ($docid == 1) { //change this
						echo '
							<div class="doctor-schedule">
								<div class="doctor-schedule-text">
						';
						echo '
							<h2>'.$docname.'</h2>
									<p class="doctor-desc">'.$docdesc.'</p>
									<p><u>My Schedule</u><br><br>
									FROM '. date($today).' - '.$next5day.'<br><br></p>
									<table border="1">
									<th>Available slots:</th>
						';
						$query2 = "SELECT * FROM appointments WHERE doctor='".$docid."'";
						$result2 = $dbcnx->query($query2);
						if ($result2->num_rows >0 ) {
							while ($row = mysqli_fetch_assoc($result2)){
							$date = strtotime($row['date']);
							$time = $row['time'];
							for ($j=1;$j<6;$j+=1) {
								if ($days[$j]==$date) {
									$timeAvail = array_diff($items2,array(strtotime($time)));
									$date = date('Y/m/d',$date);
									echo '<tr><td style="padding:7px;">' . $date . '</td>';
									foreach ($timeAvail as $timeAvail){
									$timeAvail = date('H:i',$timeAvail);
									echo 
									'<td style="padding:7px;">'.$timeAvail.'</td>
									';
									}
								}
							}
							echo "</tr>";
							}
						}
						}
					}
				}
			?>
							</table>
								<button onclick="history.back()">Back</button>
								<a href="javascript:getAbsolutePath(\'bookappointment.php\');"><button>Book An Appointment</button></a>
								</div>
							</div>
    </div>
	</div>

	

	<?php include "footer.php";?>
</div>
</body>
