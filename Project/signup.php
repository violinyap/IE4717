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
        <form class="login-form" action="signup_auth.php" method="post" enctype="multipart/form-data">
					<label for="email">Email*</label>
					<input type="email" class="login-input" id="email" name="email" placeholder="example@email.com" required>
					<label for="pass">Password*</label>
          <input class="login-input" type="password" id="pass" name="pass" placeholder="Password" required/>
					<label for="cpass">Confirm Password*</label>
          <input class="login-input" type="password" id="cpass" name="cpass" placeholder="Password" required/>
					<label for="name">Name*</label>
					<input type="text" class="login-input" id="name" name="name" placeholder="Your name" required>
					<label for="contact">Contact*</label>
          <input class="login-input" type="tel" id="contact" name="contact" pattern="[0-9]{4}-[0-9]{4}" placeholder="9999-9999" required/>
					<label for="nric">NRIC*</label>
					<input type="text" class="login-input" id="nric" name="nric" placeholder="NRIC" required>
					<label for="bday">Birthday*</label>
					<input type="date" class="login-input" id="bday" name="bday" placeholder="Birthday" required>
          <div class="login-buttons">
            <a href="login.php">Already have an account? Login here</a>
            <button class="primarybutton">
              Signup
            </button>
          </div>
        </form>
      </div>
		</div>


	</div>
		

	<?php include "footer.php";?>
</div>
</body>
