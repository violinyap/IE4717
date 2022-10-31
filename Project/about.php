<!DOCTYPE html>
<html lang="en">
<head>
	<title>NTUClinic</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css" />
	<link rel="stylesheet" href="./about.css" />
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
		<div class="about-banner">
			<h1>NTUClinic</h1>
			<h1>Always strives to give the best services</h1>
		</div>

    <div class="about-values">
			<h1>Our Values</h1>
			<div class="doctors-section">
				<div class="doctor-card">
					<img class="doctor-card-img" src="images/home/all.jpeg">
					<div class="doctor-card-text">
						<h2>Professional</h2>
						<p>Our doctors are stringently evaluated and practise only evidence-based medicine</p>
					</div>
				</div>
				<div class="doctor-card">
					<img class="doctor-card-img" src="images/home/lab.webp">
					<div class="doctor-card-text">
						<h2>Quality Assurance</h2>
						<p>We are constantly improving the quality of healthcare through technological advancements</p>
					</div>
				</div>
				<div class="doctor-card">
					<img class="doctor-card-img" src="images/home/doc.webp">
					<div class="doctor-card-text">
						<h2>Customized Care</h2>
						<p>Our medical services and treatments are tailored each to individual's needs</p>
					</div>
				</div>
			</div>
		</div>

    <div class="about-news">
      <h1>Latest News</h1>
      <p>
        Checkout latest update regarding medical area and NTUClinic. We want to provide the most accurate and relevant news to help you in understanding your medical needs. 
				The news ranges from facilities update, treatments, COVID-19 update, vaccination, and so on. If you want to give feedback please send your feedback to 
				<a href="mailto:news@ntuclinic.com">news@ntuclinic.com</a> for our assistance. We highly appreciate your support.
      </p>
			<div>
				<img class="news-img" src="images/home/news1.png"/>
				<img class="news-img" src="images/home/news2.jpeg"/>
				<img class="news-img" src="images/home/news3.jpeg"/>
				<img class="news-img" src="images/home/news4.webp"/>
			</div>
		</div>

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

	

	<?php include "footer.php";?>
</div>
</body>
