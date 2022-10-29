<!DOCTYPE html>
<html lang="en">
<head>
	<title>NTUClinic</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css" />
	<link rel="stylesheet" href="./login.css" />
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
		<div class="login-banner">
			<div class="login-container">
        <h1>Signup</h1>
        <?php // register.php
          include "methods/dbconnect.php";


          if (isset($_POST['submit'])) {
            if (empty($_POST['email']) || empty ($_POST['pass'])
              || empty ($_POST['cpass']) ) { // TODO: ADD ALL EMPTY
            echo "All records to be filled in";
            exit;}
            }
          $email = $_POST['email'];
          $password = $_POST['pass'];
          $password2 = $_POST['cpass'];
          $name =  $_POST['name'];
          $image =  $_POST['image'];
          $contact =  $_POST['contact'];
          $nric =  $_POST['nric'];
          $bday =  $_POST['bday'];
          date_default_timezone_set("Asia/Singapore");
          $signupdate = date("Y-m-d");

          if ($password != $password2) {
            echo "Sorry passwords do not match";
            exit;
          }

          $password = md5($password);
          $sql = "INSERT INTO Patients (name,	contact, image,	nric,	signupdate,	birthday,	email,	password) 
              VALUES ('$name',	'$contact', 'img',	'$nric',	'$signupdate',	'$bday',	'$email',	'$password')";
            // echo "<br>". $sql. "<br>";
          $result = $dbcnx->query($sql);


          if (!$result) 
            echo "Your query failed.";
          else
            echo "<h3>Welcome ". $name . ". You are now registered </h3>";
            echo "<a class=\"login-buttons\" href=\"login.php\">
                    <button class=\"primarybutton\">
                      Login
                    </button>
                  </a>";
            
        ?>


      </div>
		</div>


	</div>
		

	<?php include "footer.php";?>
</div>
</body>
