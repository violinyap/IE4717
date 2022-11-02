<!DOCTYPE html>
<html lang="en">
<head>
	<title>NTUClinic</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css" />
	<link rel="stylesheet" href="./contact.css" />
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
		<div class="contact-banner">
			<h1>Contact Us</h1>
		</div>

		<div class="home-queries">
			<div class="queries-left">
				<img class="queries-img" src="images/home/all.jpeg"/>
			</div>
			<div class="queries-right">
				<h1>Ask us!</h1>
				<form class="queries-form">
					<label for="email">Email*</label>
					<input type="email" class="queries-input" id="email" name="email" placeholder="example@email.com" required>
					<label for="pass">Queries*</label>
          <textarea class="queries-input" id="pass" name="pass" placeholder="I need help with..." required></textarea>
					<button type="submit" class="primarybutton">
						Send
					</button>
				</form>
			</div>
		</div>

		<div class="home-services">
			<div class="service-left">
				<div class="about-locations">
				<h1>Locations</h1>
				<?php 
					include "methods/dbconnect.php";
					$query = "SELECT *  FROM clinics";
	
					$result = $dbcnx->query($query);
					$count = 0;
					if ($result->num_rows >0 )
					{
						while ($row = mysqli_fetch_assoc($result)){
							$cname = $row['clinicname'];
							$cloc = $row['cliniclocation'];
							$cctc = $row['cliniccontact'];
							$count = $count + 1;
							if ($count % 2 == 1) {
								echo '
									<div class="locations-box">
										<div class="locations-text">
											<h2>'.$cname.'</h2>
											<p>'.$cloc.'</p>
											<p>(65) '.$cctc.'</p>
										</div>
										<div class="locations-img">
											<img src="images/home/loc'.$count.'.jpeg"/>
										</div>
									</div>
								';
							} else {
								echo '
								<div class="locations-box">
									<div class="locations-img">
										<img src="images/home/loc'.$count.'.jpeg"/>
									</div>
									<div class="locations-text">
										<h2>'.$cname.'</h2>
										<p>'.$cloc.'</p>
										<p>(65) '.$cctc.'</p>
									</div>
								</div>
								';
							}
						}
					}
				?>
		</div>
			</div>
			<div class="service-right">
				<div class="hotline-box">
					<h1>NTUClinic Hotline </h1>
					<h1 style="transform:scale(2);font-size:72px;margin:0px;">✆</h1>
					<br>
					<h3>For emergency</h3>
					<p> (+65) 6938 1295 </p>

					<h3>For quick enquiries</h3>
					<p> (+65) 6938 1296 </p>

					<h3>For 24 hours service</h3>
					<p> (+65) 6938 1296 </p>

					<h3>Email services</h3>
					<p>ask@ntuclinic.sg</p>
				</div>
				
			</div>
		

	</div>
		

	<?php include "footer.php";?>
</div>
</body>
