<?php
  echo '
  <script type="text/javascript" src="../methods/getPath.js"></script>
  <header>
  <div id="headerlogo">
    <img src="../images/cliniclogo.png" width="50" height="50" class="icon"/> 
    <h1> NTUClinic </h1>
  </div>
  <nav id="headernav">
    <a href="javascript:getAbsolutePath(\'home.php\',\'\');" class="topnav">Home</a>
    <a href="javascript:getAbsolutePath(\'about.php\',\'\');" class="topnav">About Us</a>
    <a href="javascript:getAbsolutePath(\'doctors.php\',\'\');" class="topnav">Our Doctors</a>
    <a href="javascript:getAbsolutePath(\'contact.php\',\'\');" class="topnav">Contact Us</a>
  </nav>';
?>
<?php // Show registered name
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  if (isset($_SESSION['valid_user']))
  { 
    echo "<div style='display:flex; flex-direction:'row';>";
    echo '<a href="javascript:getAbsolutePath(\'profile.php\',\'patient/\');" id="headerprofile">';
    echo "<img src='../images/profile.png' width='38' height='38' class='icon'>";
    echo $_SESSION["valid_user"]; 
    echo "</a>";
    echo '<a class="profiledrop" type="submit" href="javascript:getAbsolutePath(\'login.php\',\'\');">V</a>';
    echo "</div>";
  } 
  else { 
    echo "<a href='login.php' id='headerprofile'>";
    echo "<img src='../images/profile.png' width='38' height='38' class='icon'>";
    echo "Login / Signup"; 
    echo "</a>";
  }
  echo '</header>';
?>  

