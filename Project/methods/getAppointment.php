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
    <table class='appointment-table' style='font-size:16px;border:1px solid black;height:300px;width:450px;padding: 20px'>
    <th colspan='2' style='float:left;font-size:20px;'>
      <i>Current Appointment</i>
    </th>
    <tr>
      <td style='width:250px;'><b>ID: </b></td>
      <td><span id='doctor'>
      NTCL$apptID
      </span></td>
    </tr>
    <tr>
      <td style='width:250px;'><b>Doctor: </b></td>
      <td><span id='doctor'>
      $doctor
      </span></td>
    </tr>
    <tr>
      <td style='width:250px;'><b>Date: </b></td>
      <td><span id='date'>
      $date2
      </span></td>
    </tr>
    <tr>
      <td style='width:250px;'><b>Time: </b></td>
      <td><span id='time'>
      $time
      </span></td>
    </tr>
    <tr>
      <td style='width:250px;'><b>Location: </b></td>
      <td><span id='location'>
      $location
      </span></td>
    </tr>
    <tr>
      <td style='width:250px;'><b>Status: </b></td>
      <td><span id='status'>
      Paid
      </span></td>
    </tr>
    </table><br>";

  $dbcnx->close();
}

?>