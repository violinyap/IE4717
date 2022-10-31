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
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  if (isset($_SESSION['valid_user']))
  { 
    echo "<a href='patient/profile.php' id='headerprofile'>";
    echo "<img src='images/profile.png' width='38' height='38' class='icon'>";
    echo $_SESSION["valid_user"]; 
    echo "<form method=\"post\" action=\"logout.php\" ><button class=\"profiledrop\" type=\"submit\">V</button></form>";
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
