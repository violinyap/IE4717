<?php
  include '../methods/getUserData.php';

    echo '<div class="sidecontainer">';
    echo '<nav id="sidepanel">';
    echo '<a href="profile.php"><div class="panel" id="panel1">';
    echo '<img src="../images/doctors/'.$currentUserData['image'].'" width="75" height="75" class="profimg">';
    echo '<p><b>'.$currentUserData['docname'].'</b>';
    echo '<p>Doctor</p>';
    echo '</div></a>';
  
    echo '<a href="myappointment.php" id="sidenav">';
    echo '<div class="panel">';
    echo '<p id="abc">My<br>Appointment</p>';
    echo '<img src="../images/myapp.svg" width="43" height="43">';
    echo '</div> </a>';
    echo '</nav>';
    echo '</div>';
?>

