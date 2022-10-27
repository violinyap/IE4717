<?php //authmain.php
include "methods/dbconnect.php";
session_start();

if (isset($_SESSION['valid_user']))
{
  // if the user has just tried to log in
  $currentName = $_SESSION['valid_user'];
  $currentUserId = $_SESSION['valid_user_id'];
  $currentUserData = '';
  
  $query = 'select * from patients '
           ."where userid='$currentUserId'";
  // echo "<br>" .$query. "<br>";
  $result = $dbcnx->query($query);
  if ($result->num_rows >0 )
  {
    while ($row = mysqli_fetch_assoc($result)){
      $currentUserData = $row;
    }
  }
  // echo $currentUserData;
  // echo $currentUserData['userid'];
  $dbcnx->close();
}
?>