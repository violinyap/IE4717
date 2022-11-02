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
include '../methods/getUserData.php';
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  if (isset($_SESSION['valid_user']))
  { 
    $usertype = $_SESSION['valid_user_type'];
    $newpath = 'patient/profile.php';
    if ($usertype != 'patients') {
      echo '
        <script>
          getAbsolutePath(\'login.php\',\'\');
        </script>
      ';
    }
    echo "<a class='headerprofile' id='headerbutton' onClick='hidePopup()'>";
    echo "<img src='../images/profile.png' width='38' height='38' class='icon'>";
    echo $_SESSION["valid_user"]; 
    echo "</a>";
    echo '</header>';
    echo '
          <div id="headeroptions" style="display:none;position:absolute; right:10px;background-color:white; width:150px;padding:10px;text-decoration:none;">
            <a href="javascript:getAbsolutePath(\'profile.php\',\'patient/\');"><p style="margin:10px;cursor:pointer;">My Profile </p></a>
            <a href="javascript:getAbsolutePath(\'login.php\',\'\');"><p style="margin:10px;cursor:pointer;"> Logout </p></a>
          </div>
        ';
  } 
  else { 
    echo '
        <script>
          getAbsolutePath(\'login.php\',\'\');
        </script>
      ';
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

