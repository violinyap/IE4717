<?php
	include "methods/getPatientsData.php";
	
	if(!isset($_SESSION)) 
	{
		session_start(); 
	}
	
	$db = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($db,'project');
	$sql=
		"SELECT a.userid, a.location, a.doctor, a.date, a.time, 
		a.paid_status, a.book_status
		FROM appointments a
		INNER JOIN patients p on a.userid = p.userid";
	/*$sql= "SELECT location as location, doctor as doctor, date as date, time as time, 
	paid_status as paid_status, book_status as book_status
	FROM appointments";*/
	$result = mysqli_query($db,$sql);
	$count=0;
	while ($row = mysqli_fetch_assoc($result)){
	if ($row['userid'] == $currentUserData['userid']) {
		if ($row['paid_status'] == "1") {
			if ($row['book_status'] == "1")
			{
			$location = $row['location'];
			$doctor = $row['doctor'];
			$date = $row['date'];
			$time = $row['time'];
			$date2 = date("d-m-Y", strtotime($date));
			$count=$count+1;
			}
		}
	}
	}
	$result->free();
	$db->close();
?>
