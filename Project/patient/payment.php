<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../style.css" />
<link rel="stylesheet" href="./sidepanel.css" />
<link rel="stylesheet" href="./myappointment.css" />
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
		<a href="payment.php" id="botnav">Payment</a>
		&nbsp;
	</div>
	
	<div class="maincontainer">
	<dt id="abcd">
		<?php include 'preappointmentRetrieval.php';
		echo "<p>
		Make payment here if you want to continue/edit your planned appointment.<br>
		Slots will be reserved only for 1 hour and will be deleted after the timing.<br><br>" .
		"<i>" . $count . " pre-appointment(s) found.</i></p><br>";
		?>
		<?php
		include "methods/getUserData.php";
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
		$db = mysqli_connect('localhost', 'root', '');
		mysqli_select_db($db,'project');
		$sql=
		"SELECT a.userid, a.location, a.doctor, a.date, a.time, 
		a.paid_status, a.book_status, a.timeCompleted
		FROM appointments a
		INNER JOIN patients p on a.userid = p.userid";
		$result = mysqli_query($db,$sql);
		while ($row = mysqli_fetch_assoc($result)){
		if ($row['userid'] == $currentUserData['userid']) {
		if ($row['paid_status'] == "0") {
			if ($row['book_status'] == "1")
			{
			$location = $row['location'];
			$doctor = $row['doctor'];
			$date = $row['date'];
			$time = $row['time'];
			$date2 = date("d-m-Y", strtotime($date));
			$timeCompleted = $row['timeCompleted'];
			echo "
			<table class='appointment-table' style='font-size:20px;border:1px solid black;height:300px;width:450px;'>
			<th colspan='2' style='float:left;font-size:24px;'>
				<i>Appointment Details</i>
			</th>
			<tr>
				<td style='width:250px;'><b>Doctor: </b></td>
				<td><span id='doctor'>
				$doctor
				</span></td>
			</tr>
			<tr>
				<td style='width:250px;'><b>Date: </b></td>
				<td><span id='date'>
				$date2
				</span></td>
			</tr>
			<tr>
				<td style='width:250px;'><b>Time: </b></td>
				<td><span id='time'>
				$time
				</span></td>
			</tr>
			<tr>
				<td style='width:250px;'><b>Location: </b></td>
				<td><span id='location'>
				$location
				</span></td>
			</tr>
			<tr>
				<td style='width:250px;'><b>Status: </b></td>
				<td><span id='status'>
				Unpaid
				</span></td>
			</tr>
			<tr>
				<td style='width:250px;'><b>Time Completed: </b></td>
				<td><span id='time_completed'>
				$timeCompleted
				</span></td>
			</tr>
			<tr>
			<td style='float: center; width:250px;'>
				<button id='editbutton' onclick='alertpopup2()'>Pay</button>
			</td>
			<td style='float: center;'>
				<button id='cancelbutton' onclick='alertpopup()'>Cancel</button>
			</td>
			</tr>
			</table><br>";
			}
			}
			}
			}
			$result->free();
			$db->close();
		?>
	<script>
	function alertpopup(){
		var val = confirm("Confirm to cancel the pre-appointment? Refund will be made.");
		if (val == true) {
		alert("Appointment successfully cancelled.");
		} else {
		alert("Appointment not cancelled. To confirm the appointment, click pay.");
		}
	}
	function alertpopup2(){
		var val1 = window.confirm("Open payment in new window?")
		if (val1 == true) {
		alert("Payment Successful!");
		}
		else {
		alert("Payment not successful. Try again.");
		}
		}
	</script>
	</div>
	</div>
	<?php include "../footer.php";?>
</div>
</body>
