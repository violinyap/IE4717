<?php
  session_start();
  
  // store to test if they *were* logged in
  $old_user = $_SESSION['valid_user'];  
  unset($_SESSION['valid_user']);
  unset($_SESSION['valid_user_id']);
	unset($_SESSION['valid_user_type']);
  session_destroy();
?>

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
        <h1>Login</h1>
				<?php 
          if (!empty($old_user))
          {
            echo 'You have been logged out.<br />';
          }
        ?> 
        <form class="login-form" method="post" action="login_auth.php">
					<div>
						<label>User type</label>
						<input type="radio" id="patients" name="usertype" value="patients" checked> 
						<label for="patient">Patient</label>
						<input type="radio" id="patients" name="usertype" value="doctors"> 
						<label for="doctor">Doctor</label>
					</div>
					<br/>
          <label for="email">Email*</label>
					<input type="email" class="login-input" id="email" name="email" placeholder="example@email.com" required>
					<label for="pass">Password*</label>
          <input class="login-input" type="password" id="pass" name="pass" placeholder="Password" required/>
          <div class="login-buttons">
            <a href="signup.php">No account? Sign up here</a>
            <button class="primarybutton">
              Login
            </button>
          </div>
        </form>
      </div>
		</div>


	</div>
		

	<?php include "footer.php";?>
</div>
</body>
