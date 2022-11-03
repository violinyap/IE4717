<!DOCTYPE html>
<html lang="en">
<head>
	<title>NTUClinic</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css" />
	<link rel="stylesheet" href="./login.css" />
	<script type="text/javascript" src="signup.js"></script>

</head>
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
            <button class="primarybutton" type="submit">
              Signup
            </button>
          </div>
        </form>
      </div>
		</div>


	</div>
		

	<?php include "footer.php";?>
	<script>
		var today = new Date();
		today = new Date(today.setDate(today.getDate()))
			.toISOString()
			.split("T")[0];
		document.getElementsByName("bday")[0].setAttribute("max", today);
		function checkNRIC(event) {

			// Get the target node of the event

			var nricInput = event.currentTarget;

			var pos = nricInput.value.search(/^[stfgSTFG]\d{7}[A-Za-z]$/);
			if (pos != 0) {
				alert("The NRIC/FIN you entered (" + nricInput.value + 
							") is not in the correct form. The format should be an alphabet (S/T/F/G), followed by 7 numbers, and ends with another alphabet. \n");
				nricInput.focus();
				nricInput.select();
				return false;
			} 
		}

		function checkPass(event) {

			// Get the target node of the event

			var newpassInput = document.getElementById("cpass").value;
			var passInput = document.getElementById("pass").value;
			
			if (newpassInput != passInput) {
				alert("The password you re-entered does not match your password input. Please retry.\n");
				newpassInput.focus();
				newpassInput.select();
				return false;
			} 
		}

			var nricNode = document.getElementById("nric");
			var confirmPassNode = document.getElementById("cpass");
			nricNode.addEventListener("change", checkNRIC, false);
			confirmPassNode.addEventListener("change", checkPass, false);
		</script>
</div>

	
</body>
