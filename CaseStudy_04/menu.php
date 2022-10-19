<!doctype html>
    <html lang="en">
    <head>
        <title>JavaJam Coffee House - Daily Sales Report</title>
        <meta charset=“utf-8”>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <div class="wrapper">
            <header class="header">
                <img class="header-img" src="images/header.png" alt="JavaJam"/>
            </header>
            <div class="middle">
                 <nav class="navbar">
                    <dt class="navbar-menu"><strong>Order<br>Summary</Strong></dt>
                </nav>
                <div class="content">
                    <h1 class="content-title">Order Summary:</h1>
                    <div class="sales-wrapper">
					<table class="sales-table">
                            <tr class="sales-row">
							<td>
							<?php
							  $JJQty = $_POST['JJQty'];
							  $JJType = "null";
							  $ALQty = $_POST['ALQty'];
							  $ALType = $_POST['ALType'];
							  $CQty = $_POST['CQty'];
							  $CType = $_POST['CType'];
							?>
							<?php
								date_default_timezone_set("Asia/Singapore");
								echo date_default_timezone_get();
								echo "<p>Order processed at ".date('H:i, jS F Y')."</p>";

								$totalqty = 0;
								$totalqty = $JJQty + $ALQty + $CQty;
								echo "Items ordered: ".$totalqty."<br />";
							
								if ($totalqty == 0) {

								  echo "You did not order anything on the previous page!<br><br>";
								  echo "<tr class='sales-row'><td>" .
								  "<input type='button' class='button' onclick='history.back()' value='Restart Order' />" .
								  "</td></tr>";
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
								$JJPrice = 2;
								$ALPrice = 0;
								$CPrice = 0;
								
								if ($ALType == "Single")
								{
									$ALPrice = 2;
								}else{
									$ALPrice = 3;
								}
								if ($CType == "Single")
								{
									$CPrice = 4.75;
								}else{
									$CPrice = 5.75;
								}
								$Cost = $JJQty * $JJPrice
											 + $ALQty * $ALPrice
											 + $CQty * $CPrice;

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
								  echo "<p>Thank you for shopping with JavaJam Coffee!<br>" .
								  "Collect your order at the counter when your order number is called.<br><br>" .
								  "Your order number: ". $num_result . "</p>";
								} else {
								  echo "An error has occurred.  The order was not added.";
								}

								$db->close();
							?>
							</td>
							</tr>
							<tr class="sales-row"><a href="menu2.html">
							<td><a href="menu2.html">
							<input type="button" class="button" value="Start a new order" />
							</td></a>
							</tr>
					</div>
                </div>
            </div>
	</body>
</html>
