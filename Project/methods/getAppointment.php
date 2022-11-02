<?php //authmain.php
include "dbconnect.php";
$apptID = $_POST['apptID'];
$apptData = [];
if ($apptID) {
  $query = "SELECT *
  FROM appointments a
  INNER JOIN doctors d on a.doctor = d.doctorid
  INNER JOIN clinics c on a.location = c.clinicid
  WHERE appointmentID = $apptID";
  // echo "<br>" .$query. "<br>";
  $result = $dbcnx->query($query);

  if ($result->num_rows >0 )
  {
    while ($row = mysqli_fetch_assoc($result)){
      $apptData = $row;
    }
  }
  // echo $apptData;

  $row = $apptData;
    $location = $row['clinicname'];
    $doctor = $row['docname'];
    $date = $row['date'];
    $time = $row['time'];
    $apptID = $row['appointmentID'];
    $date2 = date("d-m-Y", strtotime($date));
    echo "
    <table class='appointment-table' style='font-size:16px;border:1px solid black;height:300px;width:350px;padding: 20px'>
    <th colspan='2' >
      <h3 style='margin:0;'><i>Current Appointment</i></h3>
    </th>
    <tr>
      <td style='width:150px;'><b>ID: </b></td>
      <td><span id='aptid'>
      NTCL$apptID
      </span></td>
    </tr>
    <tr>
      <td style='width:150px;'><b>Doctor: </b></td>
      <td><span id='doctorname'>
      $doctor
      </span></td>
    </tr>
    <tr>
      <td style='width:150px;'><b>Date: </b></td>
      <td><span id='dates'>
      $date2
      </span></td>
    </tr>
    <tr>
      <td style='width:150px;'><b>Time: </b></td>
      <td><span id='times'>
      $time
      </span></td>
    </tr>
    <tr>
      <td style='width:150px;'><b>Location: </b></td>
      <td><span id='locations'>
      $location
      </span></td>
    </tr>
    <tr>
      <td style='width:150px;'><b>Status: </b></td>
      <td><span id='status'>
      Paid
      </span></td>
    </tr>
    </table><br>";

  $dbcnx->close();
}

?>