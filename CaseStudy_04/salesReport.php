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
                <a href="index.html">
                    <img class="header-img" src="images/header.png" alt="JavaJam"/>
                </a>
            </header>
            <div class="middle">
                <nav class="navbar">
                    <a class="navbar-menu active" href="salesReport.php">Daily<br>Sales<br>Report</a>
										<hr/>
										<a class="navbar-menu" href="update.php">Product <br> Price<br> Update</a>										

                </nav>
                <div class="content">
                    <h1 class="content-title">Click to generate daily sales report:</h1>
                    <div class="sales-wrapper">
                        <table class="sales-table">
                            <tr class="sales-row">
								<td><strong>
								<input type="radio" name="radio" class="myCheck" onclick="openProduct()" > &nbsp;
								<label>
								Total dollar and quantity sales by products
								</label>
								<br>
								</strong><br></td>
                            </tr>
                            <tr class="sales-row">
								<td><strong>
								<input type="radio" name="radio" class="myCheck" onclick="openCategory()" > &nbsp;
								<label>
								Total dollar and quantity sales by categories
								</label>
								<br>
								</strong><br></td>
                            </tr>
							 <tr class="sales-row">
								<td><strong>
                                Popular option of best selling product is
								<?php include 'sales.php';
									if (($EndlessQty == 0) && ($SingleQty == 0) && ($DoubleQty == 0) && ($SingleQty2 == 0) && ($DoubleQty2 ==0) )
									{
										echo "N.A.<br>No sales for the day yet.";
									}
									else if (($sumDouble2 >= $sumSingle2) && ($sumDouble2 >= $sumDouble) && ($sumDouble2 >= $sumSingle) && ($sumDouble2 >= $sum))
									{	#5D
										if ( ($sumDouble2 == $sumSingle2) && ($sumDouble2 == $sumDouble) && ($sumDouble2 == $sumSingle) && ($sumDouble2 == $sum) )
										{	#if all revenue equal then lowest cost has highest qty (4D)
											echo "<br>Single of Cafe Au Lait";
											echo "<br>Endless of Just Java"; 
										}
										else if ( ($sumDouble2 == $sumSingle) && ($sumDouble2 == $sumDouble) && ($sumDouble2 == $sumSingle2) ) 
										{	#3D
											echo "<br>Single of Cafe Au Lait";
										}
										else if ( ($sumDouble2 == $sum) && ($sumDouble2 == $sumSingle) && ($sumDouble2 == $sumDouble) )
										{	#3D
											echo "<br>Single of Cafe Au Lait";
											echo "<br>Endless of Just Java";
										}
										else if ( ($sumDouble2 == $sumSingle2) && ($sumDouble2 == $sum) && ($sumDouble2 == $sumSingle) )
										{	#3D
											echo "<br>Single of Cafe Au Lait";
											echo "<br>Endless of Just Java";
										}
										else if ( ($sumDouble2 == $sumSingle2) && ($sumDouble2 == $sumDouble) && ($sumDouble2 == $sum) ) 
										{	#3D
											echo "<br>Endless of Just Java";
										}
										else if ( ($sumDouble2 == $sum) && ($sumDouble2 == $sumSingle) )
										{	#2D
											echo "<br>Single of Cafe Au Lait";
											echo "<br>Endless of Just Java";
										}
										else if ( ($sumDouble2 == $sum) && ($sumDouble2 == $sumDouble) )
										{	#2D
											echo "<br>Endless of Just Java";
										}
										else if ( ($sumDouble2 == $sum) && ($sumDouble2 == $sumSingle2) )
										{	#2D
											echo "<br>Endless of Just Java";
										}
										else if ( ($sumDouble2 == $sumSingle) && ($sumDouble2 == $sumDouble) )
										{	#2D
											echo "<br>Single of Cafe Au Lait";
										}
										else if ( ($sumDouble2 == $sumSingle) && ($sumDouble2 == $sumSingle2) )
										{	#2D
											echo "<br>Single of Cafe Au Lait";
										}
										else if ( ($sumDouble2 == $sumDouble) && ($sumDouble2 == $sumSingle2) )
										{	#2D
											echo "<br>Double of Cafe Au Lait";
										}
										else if ($sumDouble2 == $sumSingle2)
										{	#if Double of Iced Cappucino same revenue as Single of Iced Cappucino
											echo "<br>Single of Iced Cappucino";
										}
										else if ($sumDouble2 == $sumDouble)
										{	#if Double of Iced Cappucino same revenue as Double of Cafe Au Lait
											echo "<br>Double of Cafe Au Lait";
										}
										else if ($sumDouble2 == $sumSingle)
										{	#if Double of Iced Cappucino same revenue as Single of Cafe Au Lait
											echo "<br>Single of Cafe Au Lait";
										}
										else if ($sumDouble2 == $sum)
										{	#if Double of Iced Cappucino same revenue as Just Java
											echo "<br>Endless of Just Java.";
										}
										else
										{	#if Double of Iced Cappucino revenue is highest, no need to compare qty
											echo "<br>Double of Iced Cappucino"; 
										}
									}
									else if (($sumSingle2 > $sumDouble) && ($sumSingle2 > $sumSingle) && ($sumSingle2 > $sum))
									{
										echo "<br>Single of Iced Cappucino";
										if ($sumSingle2 == $sum)
										{
											echo "<br>Endless of Just Java";
										}
									}
									else if (($sumDouble > $sumSingle) && ($sumDouble > $sum))
									{
										echo "<br>Double of Cafe Au Lait";
									}
									else if ($sumSingle > $sum) 
									{
										echo "<br>Single of Cafe Au Lait";
									}
									else if ($sum > $sumSingle)
									{
										echo "<br>Endless of Just Java";
									}
									else
									{
										echo "<br>Single of Cafe Au Lait";
										echo "<br>Endless of Just Java";
									}
								?>
								</p>
                            </tr>
                        </table>
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
			function openProduct() {
			   var a = window.open("salesReportProduct.php");
			}
			function openCategory() {
			   var b = window.open("salesReportCategory.php");
			}
		</script>

    </body>
</html>
