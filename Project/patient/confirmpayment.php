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
	<?php include 'header.php'; ?>
	
	<div id="bodycontent">
	<?php include "sidepanel.php"; ?>
	<div id="appointmentnav">
		<a href="payment.php" id="botnav">Payment</a>
		&nbsp;
	</div>
	
	<div class="maincontainer">
	<dt id="abcd">
		<?php
		include "../methods/getUserData.php";
		include "../methods/dbconnect.php";
		$apptID = $_POST['apptID'];
		date_default_timezone_set("Asia/Singapore");
		$timeCompleted = date('H:i');

		$query = "UPDATE `Appointments` SET `paid_status`='1',`timeCompleted`='".$timeCompleted."'
		WHERE `appointmentID`='".$apptID."'";
		$result = mysqli_query($dbcnx,$query);
		if ($result) {
			echo '
				<script>
				var val = confirm("Payment confirmed.");
				window.location.href = "myappointment.php";

				</script>
			';
		} else {
			echo '
				<script>
				var val = confirm("Payment not updated.");
				window.location.href = "payment.php";

				</script>
			';
		}
		
			$result->free();
			$dbcnx->close();
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
