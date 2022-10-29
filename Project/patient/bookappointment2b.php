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
	<header>
		<div id="headerlogo">
			<img src="../images/cliniclogo.png" width="50" height="50" class="icon"/> 
			<h1> NTUClinic </h1>
		</div>
		<nav id="headernav">
			<a href="home.php" class="topnav">Home</a>
			<a href="about.php" class="topnav">About Us</a>
			<a href="doctors.php" class="topnav">Our Doctors</a>
			<a href="contact.php" class="topnav">Contact Us</a>
		</nav>
		<?php // Show registered name
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
        if (isset($_SESSION['valid_user']))
        { 
					echo "<a href='patient/profile.php' id='headerprofile'>";
					echo "<img src='../images/profile.png' width='38' height='38' class='icon'>";
					echo $_SESSION["valid_user"]; 
					echo "<form method=\"post\" action=\"logout.php\" ><button class=\"profiledrop\" type=\"submit\">V</button></form>";
					echo "</a>";
				} 
        else { 
					echo "<a href='login.php' id='headerprofile'>";
					echo "<img src='../images/profile.png' width='38' height='38' class='icon'>";
					echo "Login / Signup"; 
					echo "</a>";
				}
      ?> 
	</header>
	
	<div id="bodycontent">
	<div class="sidecontainer">
		<nav id="sidepanel">
			<div id="panel1">
			<a href="patient/profile.php"><img src="../images/profile.png" width="75" height="75"> </a>
			<br><dt>Example Guy<!--to add javascript-->
			<br><b>User</b><br><br><!--to add javascript-->
			<a href="editprofile.html" id="botnav">Edit Profile</a>
			</div>
			<div id="panel2">
			<a href="bookappointment.php" id="sidenav">
			<dt id="abc">Make An<br>Appointment</dt>
			<img src="../images/bookappointment.png" width="43" height="43"> </a>
			</div>
			<div id="panel2">
			<a href="myappointment.php" id="sidenav">
			<dt id="abc">My<br>Appointment</dt>
			<img src="../images/myappointment.png" width="43" height="43"> </a>
			</div>
			<div id="panel2">
			<a href="payment.php" id="sidenav">
			<dt id="abc">Payment</dt>
			<img src="../images/payment.png" width="43" height="43"> </a>
			</div>
		</nav>
	</div>
	<div id="appointmentnav">
	<dt>
		<b>Make An Appointment > </b>
		<b>Step 1a > </b>
		<b>Step 1b > </b>
		<b>Step 2a > </b>
		Step 2b
	</dt>
	</div>
	<div class="maincontainer">
	<dt id="abcd">
	<?php
		$doctor = $_POST['doctor'];
		$location = $_POST['location'];
		$date = $_POST['date'];
	?>
		<form method="post" action="bookappointment3.php" id="appointmentform">
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
	<footer>
		<div id="footer1">
			<div id="leftcolumn">
				<div id="footerlogo">
					<img src="../images/cliniclogo.png" width="38" height="38" id="icon" /> 
					<h2>NTUClinic</h2>
				</div>
				<small>
					<dt>55 Ubi Ave 1 #08-01 Singapore 408935
					<br>Fax: 6590 4389
					<br>Opens Monday to Friday, 8:30am to
					<br><dt id="lowesttext">6:00pm, except Public Holidays 
				</small>
			</div>
			<div class="footernav">
				<h3 class="footerheader">Information</h3>
				<nav>
					<ul>
						<li><a href="about.html" id="botnav">About Us</a> </li>
						<li><a href="doctor.html" id="botnav">Our Doctors</a> </li>
						<li><a href="contact.html" id="botnav">Contact Us</a> </li>
					</ul>
				</nav>
				
			</div>
			<div class="footernav">
				<h3 class="footerheader">Patient's Site</h3>
				<nav>
					<ul>
						<li><a href="patient/profile.php" id="botnav">Profile</a> </li>
						<li><a href="myappointment.php" id="botnav">Your Appointments</a> </li>
						<li><a href="bookappointment.php" id="botnav">Book Appointments</a> </li>
					</ul>
				</nav>
			</div>
			<div id="rightcolumn">
				<p>Follow us through our social media.</p>
				<div id="socialmedia">
				<image src="../images/facebook.png" width="35" height="35" id="contactlogo">
				<image src="../images/instagram.png" width="35" height="35" id="contactlogo">
				<image src="../images/whatsapp.png" width="35" height="35" id="contactlogo">
				</div>
			</div>
		</div>
		<div id="copyright">
			<small><i>Copyright &copy; 2022 NTUClinic </small>
		</div>
	</footer>
</div>
</body>