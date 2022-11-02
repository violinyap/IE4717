<?php
		include "../methods/dbconnect.php";
  
  echo '
  <div class="selectedbox">
			<h3>Current Selection</h3>
				<table>
					<tr class="selectedrow">
						<td><b>Location:</b></td>
						<td class="selectedoption">';


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
                  echo $name;
								}
                
    echo '
						</td>
					</tr>
					<tr class="selectedrow">
						<td><b>Doctor:</b></td>
						<td class="selectedoption">';
            
								if ($doctor == "") {
								echo "TBD";}
								else {echo $doctor2;}
    echo '				
						</td>
					</tr>
					<tr class="selectedrow">
						<td><b>Date:</b></td>
						<td class="selectedoption">';

								if ($date == "") {
								echo "TBD";}
								else {echo $date;}
echo'						</td>
					</tr>
					<tr class="selectedrow">
						<td><b>Time:</b></td>
						<td class="selectedoption">';

								if ($time == "") {
								echo "TBD";}
								else {echo $time;}
echo'						</td>
					</tr>
					
				</table>
				</div>
        
        ';

?>