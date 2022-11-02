<!DOCTYPE html>
<html lang="en">
<head>
	<title>NTUClinic</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css" />
	<link rel="stylesheet" href="./doctors.css" />
<body>
<div id="wrapper">

	<header>
		<div id="headerlogo">
			<img src="images/cliniclogo.png" width="50" height="50" class="icon"/> 
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
					echo "<img src='images/profile.png' width='38' height='38' class='icon'>";
					echo $_SESSION["valid_user"]; 
					echo "<form method=\"post\" action=\"login.php\" ><button class=\"profiledrop\" type=\"submit\">V</button></form>";
					echo "</a>";
				} 
        else { 
					echo "<a href='login.php' id='headerprofile'>";
					echo "<img src='images/profile.png' width='38' height='38' class='icon'>";
					echo "Login / Signup"; 
					echo "</a>";
				}
      ?>  
	</header>
	
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
