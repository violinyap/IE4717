<?php
  $JJQty = $_POST['JJQty'];
  $ALQty = $_POST['ALQty'];
  $CQty = $_POST['CQty'];
  $AL = $_POST['AL'];
  $AL = $_POST['AL'];
  $C = $_POST['C'];
  $C = $_POST['C'];

?>
<html>
<head>
  <title>Javajam - Order Summary</title>
</head>
<body>
<h1>JavaJam Coffee House</h1>
<h2>Order Summary</h2>
<?php
	date_default_timezone_set("Asia/Singapore");
	echo date_default_timezone_get();
	echo "<p>Order processed at ".date('H:i, jS F Y')."</p>";

	echo "<p>Your order is as follows: </p>";

	$totalqty = 0;
	$totalqty = $JJQty + $ALQty + $CQty;
	echo "Items ordered: ".$totalqty."<br />";


	if ($totalqty == 0) {

	  echo "You did not order anything on the previous page!<br />";
	  exit;

	} else {

	  if ($JJQty > 0) {
		echo $JJQty." Endless Cup(s) of Just Java.<br />";
	  }

	  if ($ALQty > 0) {
		echo $ALQty." ".$AL." Cup(s) of Cafe Au Lait.<br />";
	  }

	  if ($CQty > 0) {
		echo $CQty." ".$C." Cup(s) of Iced Cappucino<br />";
	  }
	}


	$totalamount = 0.00;

	define('JJPRICE', 2);
	define('ALPRICE', 2);
	define('CPRICE', 4.75);

	$totalamount = $JJQty * JJPRICE
				 + $ALQty * ALPRICE
				 + $CQty * CPRICE;

	echo "Total: $".number_format($totalamount,2)."<br />";
	
	@ $db = new mysqli('localhost', 'root', '', 'orderlist');

	if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
	}

	$query = "insert into books values
            ('".$JJQty."', '".$ALQty."', '".$AL."', '".$CQty."', '".$C."')";
	$result = $db->query($query);

	if ($result) {
      echo  $db->affected_rows." order inserted into database.";
	} else {
  	  echo "An error has occurred.  The order was not added.";
	}

	$db->close();
?>
</body>
</html>