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
				session_start();
        if (isset($_SESSION['valid_user']))
        { 
					echo "<a href='patient/profile.php' id='headerprofile'>";
					echo "<img src='../images/profile.png' width='38' height='38' class='icon'>";
					echo $_SESSION["valid_user"]; 
					echo "<form method=\"post\" action=\"login.php\" ><button class=\"profiledrop\" type=\"submit\">V</button></form>";
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
	<?php include "sidepanel.php"; ?>
	<div id="appointmentnav">
	<dt>
		<a href="bookappointment.php" id="botnav">Make An Appointment </a> > <b>Appointment Successful</b>
	</dt>
	</div>
	<div class="maincontainer">
	<dt id="abcd">
	<?php include "methods/getPatientsData.php";
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	} 
		$userid = $currentUserData['userid'];
		$location = $_POST['location'];
		$doctor = $_POST['doctor'];
		$date = $_POST['date'];
		$time = $_POST['timeslot'];
		date_default_timezone_set("Asia/Singapore");
		$timeCompleted = date('H:i');
		$date2 = date("d-m-Y", strtotime($date));
		echo "<b>Appointment booked successfully!</b><br>
		<i>Check your email for the softcopy confirmation. </i> <br><br>";
		echo 
		"<table style='width:600px;'>
			<tr>
				<td style='font-size:30px;width:200px;'>Location: </td>
				<td class='confirmation-column'>" . $location . "</td>
			</tr>
			<tr style='height:35px'><td colspan='2'><br></td></tr>
			<tr>
				<td style='font-size:30px;width:200px;'>Doctor:  </td>
				<td class='confirmation-column'>" . $doctor . "</td>
			</tr>
			<tr style='height:35px'><td colspan='2'><br></td></tr>
			<tr>
				<td style='font-size:30px;width:200px;'>Date: </td>
				<td class='confirmation-column'>" . $date2 . "</td>
			</tr>
			<tr style='height:35px'><td colspan='2'><br></td></tr>
			<tr>
				<td style='font-size:30px;width:200px;'>Time: </td>
				<td class='confirmation-column'>" . $time . "</td>
			</tr>
			<tr style='height:35px'><td colspan='2'><br></td></tr>
			<tr>
				<td style='font-size:30px;width:200px;'>Paid Status: </td>
				<td class='confirmation-column'>Yes</td>
			</tr>
			<tr style='height:35px'><td colspan='2'><br></td></tr>
			<tr><td colspan='2'>
				Please be on time for your appointment(s).
				<br>You can re-schedule your appointment on your appointment page. 
				<br>*Terms & Conditions applies
			</td></tr>
			<tr style='height:150px'><td colspan='2'><br></td></tr>
			<tr>
			<td><a href='myappointment.php'><button id='nextBtn'>View Your Appointments</button></a></td>
			<td><a href='bookappointment.php'><button id='nextBtn'>Make Another Appointment</button></a></td>
			</tr>
		</table>";
		
		@ $db = new mysqli('localhost', 'root', '', 'project');

		if (mysqli_connect_errno()) {
		echo "Error: Could not connect to database.  Please try again later.";
		exit;
		}
		$query = "insert into appointments values
				(NULL,'".$userid."','".$location."','".$doctor."', '".$date."', '".$time."', '".$timeCompleted."' ,true, true)";
		$result = $db->query($query);
		if ($result) {
			echo "";
			} else {
			echo "An error has occurred.  The appointment was not registered.";
			}
			
		$db->close();
		
		$to      = 'f32ee@localhost';
		$subject = 'Appointment booked';
		
		$message = "
		<html>
		<table>
		<th>Appointment booked successfully. View details below: </th>
		<tr><td> Location: </td><td>" . $location . "</td></tr>
		<tr><td> Doctor: </td><td>" . $doctor . "</td></tr>
		<tr><td> Date: </td><td>" . $date2 . "</td></tr>
		<tr><td> TIme: </td><td>" . $time . "</td></tr>
		<tr><td colspan='2'>To edit or cancel appointment, login to the web app to make changes.</td></tr>
		</table>
		<dt>From: NTUClinc@donotreply</dt>
		</html>
		";
		
		$headers = 'From: f31ee@localhost' . "\r\n" .
			'Reply-To: f32ee@localhost' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		
		$headers .= "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		

		mail($to, $subject, $message, $headers, '-ff32ee@localhost');
	?>
	</div>
	</div>
</div>
	<?php include "../footer.php";?>
</div>
</body>
