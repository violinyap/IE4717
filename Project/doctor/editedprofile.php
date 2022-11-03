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
    <b>My Profile</b> 
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
				$desc = $_POST['desc'];

        if (isset($_POST['fullname']) && isset($_POST['myEmail']) && isset($_POST['contact']) && isset($_POST['desc'])) {
          $userid = $_SESSION['valid_user_id'];
          $sql = 
            "UPDATE Doctors 
            SET docname='$name', contact='$contact', email='$email', description='$desc'
            WHERE doctorid='$userid'";

          // echo "<br>".$sql;
          $result = $dbcnx->query($sql);


          if ($result) {
            $_SESSION['valid_user'] = $name;
            echo '<b>Your data is successfully updated as below!</b>';
            echo '<br> <br> <br>';

            echo '<label for="username">Name: '.$name.'</label>';
          
            echo '<br> <br> <br>';
            echo '<label for="myEmail">E-mail: '.$email.'</label>';
    
            echo '<br> <br> <br>';
            echo '<label for="contact">Contact: '.$contact.'</label>';

						echo '<br> <br> <br>';
            echo '<label for="desc">Description: '.$desc.'</label>';

						echo '<br> <br> <br>';
          }
        }

			?>
      <button class="primarybutton" onclick="location.href='profile.php';" style="margin-top:20px">View Profile</button>
	</div>
	</div>
      </div>
	<?php include "footer.php";?>
</body>
