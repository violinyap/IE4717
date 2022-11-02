<?php
  
  echo '
  <script type="text/javascript" src="methods/getPath.js"></script>
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
  </nav>';
?>
<?php // Show registered name
include 'methods/getUserData.php';
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  if (isset($_SESSION['valid_user']))
        { 
					$usertype = $_SESSION['valid_user_type'];
					$newpath = 'patient/profile.php';
					if ($usertype == 'doctors') {
            echo "<a href='doctor/profile.php' id='headerprofile'>";
            echo '<img src="images/doctors/'.$currentUserData['image'].'" width="38" height="38" class="icon profimg"">';
          } else {
            echo "<a href='$newpath' id='headerprofile'>";
            echo "<img src='images/profile.png' width='38' height='38' class='icon'>";
          }
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
  echo '</header>';
?>  

