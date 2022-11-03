<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../style.css" />
<link rel="stylesheet" href="./sidepanel.css" />

<link rel="stylesheet" href="./bookappointment.css" />
</head>
<body>
<div id="wrapper">
	<?php include 'header.php'; ?>
	
	<div id="bodycontent">
	<?php include "sidepanel.php"; ?>

	<div class="leftcontent">
		<div class="breadcrumb">
			<a href="profile.php" class="botnav">Make An Appointment</a>
			>	Step 1a
			><b>	Step 1b</b>
		</div>
		<div class="maincontainer">
<?php
include "../methods/dbconnect.php";

  $location = $_POST['location'];
      
  if (!empty($_POST['doctor'])) {
    $doctor = $_POST['doctor'];
  }
  else {
    $doctor = "";
  }
  if (!empty($_POST['date'])) {
    $date = $_POST['date'];
  }
  else {
    $date = "";
  }
  if (!empty($_POST['timeslot'])) {
    $time = $_POST['timeslot'];
  }
  else {
    $time = "";
  }
  $query = "SELECT * FROM doctors WHERE clinicid='".$location."'";
  $result = $dbcnx->query($query);
  if ($result->num_rows >0 )
  {
    while ($row = mysqli_fetch_assoc($result)){
    $doctor_name = $row['docname'];
    $doctor_id = $row['doctorid'];
    $d_id[] = $doctor_id;
    $d_name[] = $doctor_name;
    }
  }
?>
  <div class="leftform">
  <form method="post" action="bookappointment2a.php" id="appointmentform">
    <table>
    
    <th style="float:left;">Step 1b:</th>
    <tr><td colspan='2'>Select available doctors.</td></tr>
    <tr style="height:25px;"><td colspan='2'></td></tr>
    <tr><td colspan='2'><i>Note: Doctors available are subjected to a <u>first come first serve basis</u> and their available schedule. </i></td></tr>
    </tr>
    <tr style="height:25px;"><td colspan='2'></td></tr>
    <tr style="height:25px;text-align:left;"><th colspan='2'>Doctors:</th></tr>
    <tr style="height:10px;"><td colspan='2'></td></tr>
    <?php
    if ($location == 1) {$j=2;} else {$j=3;}
    for ($i=0;$i<$j;$i+=1) {
      if ($doctor == $d_id[$i]) {
        echo "
        <tr><td colspan='2'><label><input type='radio' value='".$d_id[$i]."' name='doctor' onInput='getdoctor()' checked><span>".$d_name[$i]."</span></label></td></tr>
		<tr height='10px'><td></td></tr>
        ";
        }
      else {
      echo "
      <tr><td colspan='2'><label><input type='radio' value='".$d_id[$i]."' name='doctor' onInput='getdoctor()' required><span>".$d_name[$i]."</span></label></td></tr>
	  <tr height='10px'><td></td></tr>
      ";
      }
      /*echo "
      <label>".$d_name[$i]."</label></td></tr>
      <tr style='height:10px;'><td colspan='2'></td></tr>
      ";*/
    }
    if ($location == 1) {$j=2;} else {$j=3;}
    for ($i=0;$i<$j;$i+=1) {
      if ($doctor == ""){$doctor2="TBD";}
      else if ($doctor == $d_id[$i]) {
        $doctor2 = $d_name[$i];
      }
    }
      $dbcnx->close();
  ?>
  
    <tr height="35px"><td>
    <input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
    <input type="hidden" name="date" value='<?php echo "$date";?>'></input>
    <input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
    <input type="submit" value="Previous" class="primarybutton" formaction="bookappointment1a.php" id="nextBtn"></input></td>
    <td><input type="submit" value="Next" class="darkbluebutton" id="nextBtn"></input></td>
    </tr>
    <!-- <input value="Back" id="nextBtn" onclick></input></td></tr> -->
    </table>
  </form>
  </div>
		<div class="rightform">
			<?php include "bookaptbox.php"?>
		</div>
	</div>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
<script type="text/javascript" src="bookappointment.js"></script>
</body>
