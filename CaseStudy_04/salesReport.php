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
                    <a class="navbar-menu active" href="salesReport.php">Daily<br>Sales<br>Report</a>
                </nav>
                <div class="content">
                    <h1 class="content-title">Click to generate daily sales report:</h1>
                    <div class="sales-wrapper">
						<form action="" method="">
                        <table class="sales-table">
                            <tr class="sales-row">
								<td><strong>
								<input type="checkbox" id="myCheck" onclick="myFunction()">
								<label for "myCheck"><a href="salesReportProduct.php" class="sales-check">
								Total dollar and quantity sales by products</a>
								</label>
								<br>
								</strong><br></td>
                            </tr>
                            <tr class="sales-row">
								<td><strong>
								<input type="checkbox" id="myCheck2" onclick="myFunction2()">
								<label for "myCheck2"><a href="salesReportCategory.php" class="sales-check">
								Total dollar and quantity sales by categories</a>
								</label>
								<br>
								</strong><br></td>
                            </tr>
							 <tr class="sales-row">
								<td><strong>
                                Popular option of best selling product:
								<p id="text" style="display:none">Sort By Product<br>Highest Quantity Sold:
								<?php include 'sales.php';
									echo "<br>";
									if (($EndlessQty > $SingleQty) && ($EndlessQty > $SingleQty2) && ($EndlessQty > $DoubleQty) && ($EndlessQty > $DoubleQty2)) {
										echo "Just Java, Type: Endless";			
									}
									else if (($SingleQty > $EndlessQty) && ($SingleQty > $SingleQty2) && ($SingleQty > $DoubleQty) && ($SingleQty > $DoubleQty2)) {
										echo "Cafe Au Lait, Type: Single";			
									}
									else if (($SingleQty2 > $EndlessQty) && ($SingleQty2 > $SingleQty) && ($SingleQty2 > $DoubleQty) && ($SingleQty2 > $DoubleQty2)) {
										echo "Iced Cappucino, Type: Single";			
									}
									else if (($DoubleQty > $EndlessQty) && ($DoubleQty > $SingleQty) && ($DoubleQty > $SingleQty2) && ($DoubleQty > $DoubleQty2)) {
										echo "Cafe Au Lait, Type: Double";		
									}
									else if (($DoubleQty2 > $EndlessQty) && ($DoubleQty2 > $SingleQty) && ($DoubleQty2 > $SingleQty2) && ($DoubleQty2 > $DoubleQty)) {
										echo "Iced Cappucino, Type: Double";		
									}
									else if (($EndlessQty == $SingleQty) || ($EndlessQty == $SingleQty2) || ($EndlessQty == $DoubleQty) || ($EndlessQty == $DoubleQty2) || 
									($SingleQty == $SingleQty2) || ($SingleQty == $DoubleQty) || ($SingleQty == $DoubleQty2))
									{	
										if ($EndlessQty == $SingleQty) {
											if (($EndlessQty > $SingleQty2) && ($EndlessQty > $DoubleQty) && ($EndlessQty > $DoubleQty2)) {
											echo "Just Java, Type: Endless <br>";
											echo "Cafe Au Lait, Type: Single";	
											}
										}
										if ($EndlessQty == $DoubleQty) {
											if (($EndlessQty > $SingleQty2) && ($EndlessQty > $SingleQty) && ($EndlessQty > $DoubleQty2)) {
											echo "Cafe Au Lait, Type: Double";	
											}
										}
										if ($EndlessQty == $SingleQty2) {
											if (($EndlessQty > $SingleQty2) && ($EndlessQty > $DoubleQty) && ($EndlessQty > $DoubleQty2)) {
											echo "Iced Cappucino, Type: Single";	
											}
										}
										if ($EndlessQty == $DoubleQty2) {
											if (($EndlessQty > $SingleQty2) && ($EndlessQty > $SingleQty) && ($EndlessQty > $DoubleQty)) {
											echo "Iced Cappucino, Type: Double";	
											}
										}
										if ($SingleQty == $DoubleQty) {
											if (($SingleQty > $EndlessQty) && ($SingleQty > $DoubleQty) && ($SingleQty > $DoubleQty2)) {
											echo "Cafe Au Lait, Type: Single";	
											}
										}
										if ($SingleQty == $SingleQty2) {
											if (($SingleQty > $EndlessQty) && ($SingleQty > $DoubleQty) && ($SingleQty > $DoubleQty2)) {
											echo "Iced Cappucino, Type: Single";	
											}
										}
										if ($SingleQty == $DoubleQty2) {
											if (($SingleQty > $EndlessQty) && ($SingleQty > $DoubleQty) && ($SingleQty > $DoubleQty2)) {
											echo "Iced Cappucino, Type: Double";	
											}
										}	
									}
									echo "<br><br>Best Selling (Revenue) Product Type: <br>";
									if (($sum > $sumSingle) && ($sum > ($sumDouble)) && ($sum > $sumSingle2) && ($sum > $sumDouble2)){
										echo "Just Java, Type: Endless";
									}
									else if (($sumSingle > $sum) && ($sumSingle > ($sumDouble)) && ($sumSingle > $sumSingle2) && ($sumSingle > $sumDouble2)) {
										echo "Cafe Au Lait, Type: Single";
									}
									else if (($sumDouble > $sum) && ($sumDouble > ($sumSingle)) && ($sumDouble > $sumSingle2) && ($sumDouble > $sumDouble2)) {
										echo "Cafe Au Lait, Type: Double";
									}
									else if (($sumSingle2 > $sum) && ($sumSingle2 > ($sumSingle)) && ($sumSingle2 > $sumDouble) && ($sumSingle2 > $sumDouble2)) {
										echo "Iced Cappucino, Type: Single";
									}
									else if (($sumDouble2 > $sum) && ($sumDouble2 > ($sumSingle)) && ($sumDouble2 > $sumSingle2) && ($sumDouble2 > $sumDouble)) {
										echo "Iced Cappucino, Type: Double";
									}
									else {echo "There is a tie in the best selling product type. View detailed report for evaluation.";}
								?>
								</p>
								<p id="text2" style="display:none">Sort By Category<br><br>Highest Quantity Sold:<br>
								<?php include 'salesDisplay.php';
								?>
								</p>
                            </tr>
                        </table>
						</form>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <small class="footer-copy"><i>Copyright &copy; 2014 JavaJam Coffee House</i></small>
                <a class="footer-email" href="mailto:violin@yapputri.com"><small><i>violin@yapputri.com</i></small></a>
                <a href="mailto: lim@jiasheng.com"><small><i>lim@jiasheng.com</i></small></a>
            </footer>
        </div>
        <script>
			function myFunction() {
			  // Get the checkbox
			  var checkBox = document.getElementById("myCheck");
			  // Get the output text
			  var text = document.getElementById("text");

			  // If the checkbox is checked, display the output text
			  if (checkBox.checked == true){
				text.style.display = "block";
			  } else {
				text.style.display = "none";
			  }
			}
			function myFunction2() {
			  // Get the checkbox
			  var checkBox2 = document.getElementById("myCheck2");
			  // Get the output text
			  var text2 = document.getElementById("text2");

			  // If the checkbox is checked, display the output text
			  if (checkBox2.checked == true){
				text2.style.display = "block";
			  } else {
				text2.style.display = "none";
			  }
			}
		</script>
    </body>
</html>