<?php //authmain.php
include "methods/dbconnect.php";
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

if (isset($_POST['email']) && isset($_POST['pass']))
{
  // if the user has just tried to log in
  $email = $_POST['email'];
  $password = $_POST['pass'];
	$usertype = $_POST['usertype'];
	$uid = 'userid';
	$name = 'name';
  if ($usertype == 'doctors') {
    $uid = 'doctorid';
		$name = 'docname';
  }

	$password = md5($password);

  $query = 'select * from '.$usertype.' '
           ."where email='$email' "
           ." and password='$password'";
// echo "<br>" .$query. "<br>";
  $result = $dbcnx->query($query);
  if ($result->num_rows >0 )
  {
    while ($row = mysqli_fetch_assoc($result)){

      $_SESSION['valid_user'] = $row[$name];
			$_SESSION['valid_user_id'] = $row[$uid];
			$_SESSION['valid_user_type'] = $usertype;
    }
    // echo reset($result)->name;
    // if they are in the database register the user id
  } 
  $dbcnx->close();
}
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
        <?php // login.php
          include "methods/dbconnect.php";

          if (isset($_SESSION['valid_user']))
          {
            echo 'You are logged in as: '.$_SESSION['valid_user'].' <br />';
            // echo '<a href="login.php">Log out</a><br />';

            // REDIRECT TO PROFILE
          }else {
						echo "User do not exist. Please sign up";
						// TODO add sign up button
					}
        ?>
      </div>
		</div>


	</div>
		

	<?php include "footer.php";?>
</div>
</body>
