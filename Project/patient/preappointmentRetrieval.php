<?php include "../methods/getUserData.php";

		$db = mysqli_connect('localhost', 'root', '');
		mysqli_select_db($db,'project');
		$sql=
		"SELECT a.user, a.location, a.doctor, a.date, a.time, 
		a.paid_status, a.book_status, a.timeCompleted
		FROM appointments a
		INNER JOIN patients p on a.user = p.userid";
		$result = mysqli_query($db,$sql);
	$count=0;
	while ($row = mysqli_fetch_assoc($result)){
	if ($row['user'] == $currentUserData['userid']) {
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
	}
	$result->free();
	$db->close();
?>
