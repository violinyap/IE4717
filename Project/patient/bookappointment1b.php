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
			if ($location == "NTU Clinic Fullerton") {
				echo "
				<tr><td><input type='radio' value='Dr Tan' name='doctor' onInput='getdoctor();' checked='check'> 
				 <label>Dr Tan</label></td></tr>
				<tr style='height:10px;'><td></td></tr>
				<tr><td><input type='radio' value='Dr Stanford' name='doctor' onInput='getdoctor();' > 
				 <label>Dr Standford</label></td></tr>
				<tr style='height:25px;'><td></td></tr>
				 ";
				}
			else {
				echo "
				<tr><td><input type='radio' value='Dr Tasha' name='doctor' onInput='getdoctor();' checked='check'> 
				 <label>Dr Tasha</label></td></tr>
				<tr style='height:10px;'><td></td></tr>
				 <tr><td><input type='radio' value='Dr Strange' name='doctor' onInput='getdoctor();' > 
				 <label>Dr Strange</label></td></tr>
				<tr style='height:10px;'><td></td></tr>
				 <tr><td><input type='radio' value='Dr Kang' name='doctor' onInput='getdoctor();' > 
				 <label>Dr Kang</label></td></tr>
				";
				}
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
	<?php include "../footer.php";?>
</div>
</body>