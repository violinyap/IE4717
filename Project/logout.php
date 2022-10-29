<?php
  if(!isset($_SESSION)) 
	{ 
		session_start(); 
	} 
  
  // store to test if they *were* logged in
  $old_user = $_SESSION['valid_user'];  
  unset($_SESSION['valid_user']);
  unset($_SESSION['valid_user_id']);
  session_destroy();
?>

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
        <h1>Login</h1>
        <?php 
          if (!empty($old_user))
          {
            echo 'You have been logged out.<br />';
          }
          else
          {
            // if they weren't logged in but came to this page somehow
            echo 'You were not logged in. Please log in here.<br />'; 
          }
        ?> 
        <form class="login-form" method="post" action="login_auth.php">
          <label for="email">Email*</label>
					<input type="email" class="login-input" id="email" name="email" placeholder="example@email.com" required>
					<label for="pass">Password*</label>
          <input class="login-input" type="password" id="pass" name="pass" placeholder="Password" required/>
          <div class="login-buttons">
            <a href="signup.php">No account? Sign up here</a>
            <button class="primarybutton">
              Login
            </button>
          </div>
        </form>
      </div>
		</div>


	</div>
		

	<?php include "footer.php";?>
</div>
</body>
