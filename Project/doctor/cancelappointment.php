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

		$query = "UPDATE `Appointments` SET `book_status`='0',`timeCompleted`=',".$timeCompleted."'
		WHERE `appointmentID`='".$apptID."'";

		// echo $query;
		
		$result = mysqli_query($dbcnx,$query);
		if ($result) {
			echo '
				<script>
				var val = confirm("Cancelation confirmed.");
				window.location.href = "myappointment.php";

				</script>
			';
		} else {
			echo '
				<script>
				var val = confirm("Failed to update.");
				window.location.href = "myappointment.php";

				</script>
			';
		}

			$result->free();
			$dbcnx->close();
		?>
	<script>



	</script>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>
