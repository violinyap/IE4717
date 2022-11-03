<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../style.css" />
<link rel="stylesheet" href="./sidepanel.css" />
<link rel='stylesheet' href="./profile.css" />
</head>
<body>
<div id="wrapper">
<?php include 'header.php'; ?>
	
	<div id="bodycontent">
	<?php include "sidepanel.php"; ?>
  <div class="leftcontent">
	<div class="breadcrumb">
    <a href="profile.php" class="botnav">
    <b>My Profile</b> &nbsp;
    </a>
    &nbsp;>&nbsp;
    <a href="editprofile.php" class="botnav">Edit Profile</a>
  </div>
	<div class="maincontainer">
		<br>
		<?php 
				include "../methods/dbconnect.php";
        session_start();

        $name = $_POST['fullname'];
        $email = $_POST['myEmail'];
        $contact = $_POST['contact'];

        if (isset($_POST['fullname']) && isset($_POST['myEmail']) && isset($_POST['contact'])) {
          $userid = $_SESSION['valid_user_id'];
          $sql = 
            "UPDATE Patients 
            SET name='$name', contact='$contact', email='$email'
            WHERE userid='$userid'";

          // echo "<br>".$sql;
          $result = $dbcnx->query($sql);
					// echo 'done';
          if ($result) {
            $_SESSION['valid_user'] = $name;
            echo '<h3>Your data is successfully updated as below!</h3>';

            echo '<p>Name: '.$name.'</p>';
          
            echo '<p>E-mail: '.$email.'</p>';
    
            echo '<p>Contact: '.$contact.'</p>';
            
          }
        }

			?>
  <button class="primarybutton" onclick="location.href='profile.php';" style="margin-top:20px">View Profile</button>
	</div>
      </div>
	</div>
	<?php include "footer.php";?>
</body>
