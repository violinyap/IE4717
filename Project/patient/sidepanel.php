<?php
  include '../methods/getUserData.php';

    echo '<div class="sidecontainer">';
    echo '<nav id="sidepanel">';
    echo '<a href="profile.php"><div class="panel" id="panel1">';
    echo '<img src="../images/profile_white.png" width="75" height="75">';
    echo '<p><b>'.$currentUserData['name'].'</b>';
    echo '<p>Patient</p>';
    echo '</div></a>';
    echo '<a href="bookappointment.php" id="sidenav">';
    echo '<div class="panel">';
    echo '<p id="abc">Make An<br>Appointment</p>';
    echo '<img src="../images/add.svg" width="43" height="43"> ';
    echo '</div></a>';
    echo '<a href="myappointment.php" id="sidenav">';
    echo '<div class="panel">';
    echo '<p id="abc">My<br>Appointment</p>';
    echo '<img src="../images/myapp.svg" width="43" height="43" style="color:white;">';
    echo '</div> </a>';
    echo '<a href="payment.php" id="sidenav">';
    echo '<div class="panel">';
    echo '<p id="abc">Payment</p>';
    echo '<img src="../images/payment.svg" width="43" height="43">';
    echo '</div> </a>';
    echo '</nav>';
    echo '</div>';
?>

