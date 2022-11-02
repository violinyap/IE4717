<!DOCTYPE html>
<html lang="en">
<head>
	<title>NTUClinic</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css" />
	<link rel="stylesheet" href="./doctors.css" />
<body>
<div id="wrapper">

	<?php include "header.php"?>
	
	<div id="bodycontent">
		<div class="doctors-banner">
			<h1>Our Doctors</h1>
		</div>

    <div class="doctors-section">
    <?php
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
						echo '
							<a href="doctor_details.php?docid='.$docid.'" class="post" style="text-decoration: none; color:black;">
							<div class="doctor-card">
								<img src="images/doctors/'.$docimg.'"class="doctor-card-img" resi>
								<div class="doctor-card-text">
									<h2>'.$docname.'</h2>
									<p class="doctor-desc">'.$docdesc.'</p>
								</div>
							</div>
							</a>
						';
					}
				}

			?>
    </div>
    
	</div>
	

	<?php include "footer.php";?>

</div>
</body>
