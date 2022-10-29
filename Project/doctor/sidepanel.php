<?php
  include '../methods/getUserData.php';

  echo '<div class="sidecontainer">';
  echo '<nav id="sidepanel">';
    echo '<div id="panel1">';
    echo '<a href="profile.php"><img src="../images/profile.png" width="75" height="75"> </a>';
    echo '<br><dt>'.$currentUserData['name'];
    echo '<br><b>Doctor</b><br><br>';
    // echo '<a href="editprofile.php" id="botnav">Edit Profile</a>';
    echo '</div>';
    echo '<div id="panel2">';
    echo '<a href="bookappointment.php" id="sidenav">';
    echo '<dt id="abc">Set Unavailable <br>Dates & Time</dt>';
    echo '<img src="../images/bookappointment.png" width="43" height="43"> </a>';
    echo '</div>';
    echo '<div id="panel2">';
    echo '<a href="myappointment.php" id="sidenav">';
    echo '<dt id="abc">My<br>Appointment</dt>';
    echo '<img src="../images/myappointment.png" width="43" height="43"> </a>';
    echo '</div>';
  echo '</nav>';
  echo '</div>';
?>

