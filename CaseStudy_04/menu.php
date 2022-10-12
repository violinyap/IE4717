<?php
  $JJQty = $_POST['JJQty'];
  $JJType = "null";
  $ALQty = $_POST['ALQty'];
  $ALType = $_POST['ALType'];
  $CQty = $_POST['CQty'];
  $CType = $_POST['CType'];

?>
<html>
<head>
  <title>Javajam - Order Summary</title>
</head>
<body>
<h1>JavaJam Coffee House</h1>
<h2>Order Summary</h2>
<?php
	echo "<p>Thank you for shopping with JavaJam Coffee!</p>";
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
		echo $ALQty." ".$ALType." Cup(s) of Cafe Au Lait.<br />";
	  }

	  if ($CQty > 0) {
		echo $CQty." ".$CType." Cup(s) of Iced Cappucino<br />";
	  }
	}


	$Cost = 0.00;

	define('JJPRICE', 2);
	define('ALPRICE', 2);
	define('CPRICE', 4.75);

	$Cost = $JJQty * JJPRICE
				 + $ALQty * ALPRICE
				 + $CQty * CPRICE;

	echo "Total: $".number_format($Cost,2)."<br />";
	
	
	@ $db = new mysqli('localhost', 'root', '', 'orderlist');

	if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
	}
	
	$query = "insert into orders values
            (NULL, '".$JJQty."', '".$JJType."', '".$ALQty."', '".$ALType."', '".$CQty."', '".$CType."', '".$Cost."')";
	$result = $db->query($query);

	$sql = "SELECT * FROM orders";
	$result2 = $db->query($sql);
	
	$num_result = $result2->num_rows;

	if ($result) {
      echo  "Collect your order at the counter when your order no. is called.<br />";
	  echo "<p>Your order no.: ".$num_result."</p>";
	} else {
  	  echo "An error has occurred.  The order was not added.";
	}

	$db->close();
?>
</body>
</html>