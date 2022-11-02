<!DOCTYPE html>
<html lang="en">
<head>
	<title>NTUClinic</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css" />
	<link rel="stylesheet" href="./login.css" />
<body>
<div id="wrapper">

	<?php include "header.php"?>
	
	<div id="bodycontent">
		<div class="login-banner">
			<div class="login-container">
        <h1>Signup</h1>
        <?php // register.php
          include "methods/dbconnect.php";


          if (isset($_POST['submit'])) {
            if (empty($_POST['email']) || empty ($_POST['pass'])
              || empty ($_POST['cpass']) ) { // TODO: ADD ALL EMPTY
            echo "All records to be filled in";
            exit;}
            }
          $email = $_POST['email'];
          $password = $_POST['pass'];
          $password2 = $_POST['cpass'];
          $name =  $_POST['name'];
          $contact =  $_POST['contact'];
          $nric =  $_POST['nric'];
          $bday =  $_POST['bday'];
          $filename = $_FILES["image"]["name"];
          date_default_timezone_set("Asia/Singapore");
          $signupdate = date("Y-m-d");

          if ($password != $password2) {
            echo "Sorry passwords do not match";
            exit;
          }

        
          $password = md5($password);
          $sql = "INSERT INTO Patients (name,	contact, image,	nric,	signupdate,	birthday,	email,	password) 
              VALUES ('$name',	'$contact', '$filename',	'$nric',	'$signupdate',	'$bday',	'$email',	'$password')";
            // echo "<br>". $sql. "<br>";
          $result = $dbcnx->query($sql);


          if (!$result) 
            echo "Your query failed.";
          else {
           
            $tempname = $_FILES["image"]["tmp_name"];
            // echo $filename;
            // echo $tempname;
            $folder = "./uploads/" . $filename;
            if (move_uploaded_file($tempname, $folder)) {
              echo "<h3>  Image uploaded successfully!</h3>";
            } else {
              echo "<h3>  Failed to upload image!</h3>";
            }
  

            echo "<h3>Welcome ". $name . ". You are now registered </h3>";
            echo "<a class=\"login-buttons\" href=\"login.php\">
                    <button class=\"primarybutton\">
                      Login
                    </button>
                  </a>";
          }
            
        ?>


      </div>
		</div>


	</div>
		

	<?php include "footer.php";?>
</div>
</body>
