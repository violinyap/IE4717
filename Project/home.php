<!DOCTYPE html>
<html lang="en">
<head>
	<title>NTUClinic</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css" />
	<link rel="stylesheet" href="./home.css" />
<body>
<div id="wrapper">
	<?php include "header.php";?>
	
	<div id="bodycontent">
		<div class="home-banner">
			<h1>All new online service</h1>
			<h1>Book your appointment now!</h1>
			<div class="banner-button">
				<button class="primarybutton" onclick="location.href='patient/bookappointment.php'" type="button">
					Book Now
				</button>
			</div>
		</div>

		<div class="home-services">
			<div class="service-left">
				<h1>Best services</h1>
				<p>
				
				At NTUClinic, we are your trusted and respected family doctor in Singapore. 
				To us, your health is always our priority, and therefore, we aim to ease your mind by offering 
				medical services you can depend on. That’s why we screen and select our doctors and clinic assistants carefully and practise only evidence-based medicine. Through best-of-breed technologies and personalisation of healthcare, we aim to transform family medicine and bring you a brand new way of managing your health efficiently and cost-effectively.
				<br> <br> <br>
				NTUClinic is build with the value of caring. Our clinic offer a full range of services,
				from the management of acute and chronic medical conditions to minor procedures & medical testing. 
				We are also able to issue referrals to our specialist network & offer repeat prescription requests 
				for your convenience.
				</p>
			</div>
			<div class="service-right">
				<img src="images/home/doc.webp" id="service-image"/>
			</div>
		</div>

		<div class="home-doctors"> 
			<h1 class="home-docs-title">Our Doctors</h1> 
			<div class="doctors-section">
			<?php
				include "methods/dbconnect.php";
				$query = "SELECT *  FROM doctors";

				$result = $dbcnx->query($query);
				$count = 0;
				if ($result->num_rows >0 )
				{
					while ($row = mysqli_fetch_assoc($result)){
						if ($count == 3) {break;}
						$docname = $row['docname'];
						$docdesc = $row['description'];
						$docimg = $row['image'];
						echo '
							<div class="doctor-card">
								<img src="images/doctors/'.$docimg.'"class="doctor-card-img" resi>
								<div class="doctor-card-text">
									<h2>'.$docname.'</h2>
									<p class="doctor-desc">'.$docdesc.'</p>
								</div>
							</div>
						
						';
						$count = $count + 1;
					}
				}

			?>
			</div>
			<button class="primarybutton" onclick="location.href='doctors.php'" type="button">
				More..
			</button>
		</div>

		<div class="home-news">
			<div class="news-left">
				<h1>Latest News</h1>
				<p>
					Here is some latest update about NTUClinic and medical industry. <br/>
					Click on the photo on the right to find out more.
				</p>
			</div>
			<div class="news-right">
				<div class="news-photos">
					<img class="news-img"/>
					<img class="news-img"/>
					<img class="news-img"/>
					<img class="news-img"/>
				</div>
			</div>
		</div>

		<div class="home-small-banner">
			small banner
		</div>


		<div class="home-queries">
			<div class="queries-left">
				<img class="queries-img"/>
			</div>
			<div class="queries-right">
				<h1>Any queries?</h1>
				<form class="queries-form">
					<input placeholder="name"/>
					<input placeholder="name"/>
					<button type="submit">
						Send
					</button>
				</form>
			</div>
		</div>

	</div>
		

	<?php include "footer.php"; ?>
</div>
</body>
