<?php //authmain.php
include "methods/dbconnect.php";
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

if (isset($_POST['email']) && isset($_POST['pass']))
{
  // if the user has just tried to log in
  $email = $_POST['email'];
  $password = $_POST['pass'];
	$usertype = $_POST['usertype'];
	$uid = 'userid';
  if ($usertype == 'doctors') {
    $uid = 'doctorid';
  }

	$password = md5($password);

  $query = 'select * from '.$usertype.' '
           ."where email='$email' "
           ." and password='$password'";
// echo "<br>" .$query. "<br>";
  $result = $dbcnx->query($query);
  if ($result->num_rows >0 )
  {
    while ($row = mysqli_fetch_assoc($result)){
      $_SESSION['valid_user'] = $row['name'];
			$_SESSION['valid_user_id'] = $row[$uid];
			$_SESSION['valid_user_type'] = $usertype;
    }
    // echo reset($result)->name;
    // if they are in the database register the user id
  } 
  $dbcnx->close();
}
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
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
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
        <?php // login.php
          include "methods/dbconnect.php";

          if (isset($_SESSION['valid_user']))
          {
            echo 'You are logged in as: '.$_SESSION['valid_user'].' <br />';
            // echo '<a href="login.php">Log out</a><br />';

            // REDIRECT TO PROFILE
          }else {
						echo "User do not exist. Please sign up";
						// TODO add sign up button
					}
        ?>
      </div>
		</div>


	</div>
		

	<?php include "footer.php";?>
</div>
</body>
