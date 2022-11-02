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
            $newpath = 'doctor/profile.php';
            echo "<a class='headerprofile' id='headerbutton' onClick='hidePopup()'>";
            echo '<img src="images/doctors/'.$currentUserData['image'].'" width="38" height="38" class="icon profimg"">';
          } else {
            echo "<a class='headerprofile' id='headerbutton'  onClick='hidePopup()'>";
            echo "<img src='images/profile.png' width='38' height='38' class='icon'>";
          }
					echo $_SESSION["valid_user"]; 
					echo "</a>";
          echo '</header>';
          echo '
          <div id="headeroptions" style="display:none;position:absolute; right:10px;background-color:white; width:150px;padding:10px;text-decoration:none;">
            <a href="'.$newpath.'"><p style="margin:10px;cursor:pointer;">My Profile </p></a>
            <a href="login.php"><p style="margin:10px;cursor:pointer;"> Logout </p></a>
          </div>
        ';
				} 
  else { 
    echo "<a href='login.php' class='headerprofile'>";
    echo "<img src='images/profile.png' width='38' height='38' class='icon'>";
    echo "Login / Signup"; 
    echo "</a>";
    echo '</header>';
  }

  echo '
    <script>
      function hidePopup() {
        var x = document.getElementById("headeroptions");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
    </script>
  '
 
?>