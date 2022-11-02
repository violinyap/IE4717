<?php
		include "../methods/dbconnect.php";
  
  echo '
  <div class="selectedbox">
			<h3>Current Selection</h3>
				<table>
					<tr class="selectedrow">
						<td><b>Location:</b></td>
						<td class="selectedoption">
							<span id="location">';


								if ($location == "") {
								echo "TBD";}
								else {
                  $query = "SELECT * FROM clinics where clinicid='$location'";
                  $result = $dbcnx->query($query);
                  $name = $location;
                  if ($result->num_rows >0 )
                  {
                    while ($row = mysqli_fetch_assoc($result)){
                    $name=$row['clinicname'];
                    }
                  } 
                  echo $name . '</span>';
								}
                
    echo '
						</td>
					</tr>
					<tr class="selectedrow">
						<td><b>Doctor:</b></td>
						<td class="selectedoption">
							<span id="doctor">';
						if ($doctor == "") {
							echo "TBD";}
						else {
							$query = "SELECT * FROM doctors WHERE doctorid='".$doctor."'";
							// echo "<br>" .$query. "<br>";
							$result = $dbcnx->query($query);
							if ($result->num_rows >0 )
							{
								while ($row = mysqli_fetch_assoc($result)){
									$doctor_name = $row['docname'];
									echo $doctor_name . '</span>';
								}
							}
						}
    echo '				
						</td>
					</tr>
					<tr class="selectedrow">
						<td><b>Date:</b></td>
						<td class="selectedoption">
							<span id="date_show">';

								if ($date == "") {
								echo "TBD";}
								else {echo $date . '</span>';}
echo'						</td>
					</tr>
					<tr class="selectedrow">
						<td><b>Time:</b></td>
						<td class="selectedoption">
							<span id="time">';

								if ($time == "") {
								echo "TBD";}
								else {
									echo $time . '</span>';
								}
echo'						</td>
					</tr>
					
				</table>
				</div>
        
        ';

?>