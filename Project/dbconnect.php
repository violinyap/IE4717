<?php
  @ $dbcnx = new mysqli('localhost', 'root', '', 'project');

  if (mysqli_connect_errno()) {
  echo "Error: Could not connect to database.  Please try again later.";
  exit;
  } else {
    echo "db connected";
  }
?>