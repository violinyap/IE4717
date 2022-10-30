<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../style.css" />
<link rel="stylesheet" href="./sidepanel.css" />
<link rel='stylesheet' href="./profile.css" />
<style>
#maincontainer{
  background-color: #FFFFFF;
  position: absolute;
  top: 175px;
  left: 350px;
  height: 450px;
  width: 1200px;
}
#abcd{
  padding-top: 20px;
  padding-left: 20px;
}
#form{
  padding-top: 20px;
  padding-left: 50px;
}
</style>
<body>
<div id="wrapper">
<?php include 'header.php'; ?>
	
	<div id="bodycontent">
	<?php include "sidepanel.php"; ?>
	<div id="appointmentnav">
	<dt>
		<b>My Profile</b> &nbsp;
		>&nbsp;
		<a href="editprofile.php" id="botnav">Edit Profile</a>
	</dt>
	</div>
	<div id="maincontainer">
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
            echo '<b>Your data is successfully updated as below!</b>';
            echo '<br> <br> <br>';

            echo '<label for="username">Name: '.$name.'</label>';
          
            echo '<br> <br> <br>';
            echo '<label for="myEmail">E-mail: '.$email.'</label>';
    
            echo '<br> <br> <br>';
            echo '<label for="contact">Contact: '.$contact.'</label>';
          }
        }

			?>
	</div>
	</div>
	<?php include "../footer.php";?>
</body>
