<?php
	$db = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($db,'project');
	$sql= "SELECT location as location, doctor as doctor, date as date, time as time, 
	paid_status as paid_status, book_status as book_status, timeCompleted as timeCompleted
	FROM appointments";
	$result = mysqli_query($db,$sql);
	$count=0;
	while ($row = mysqli_fetch_assoc($result)){
		if ($row['paid_status'] == "0") {
			if ($row['book_status'] == "1")
			{
			$location = $row['location'];
			$doctor = $row['doctor'];
			$date = $row['date'];
			$time = $row['time'];
			$date2 = date("d-m-Y", strtotime($date));
			$timeCompleted = $row['timeCompleted'];
			$count=$count+1;
			}
		}
	}
	$result->free();
	$db->close();
?>