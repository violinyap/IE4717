<!doctype html>
<head>
  <title>JavaJam Coffee House - Sales Report Categories</title>
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
                    <a class="navbar-menu active" href="salesReport.html">Daily<br>Sales<br>Report</a>
                </nav>
                <div class="content">
                    <h1 class="content-title">Sort by category sales:</h1>
                    <div class="content-wrapper">
                        <table class="menu-table">
                            <tr class="menu-row">
                                <th>Category</th>
                                <th>Total Dollar Sales</th>
                                <th>Quantity Sales</th>
                            </tr>
                            <tr class="menu-row">
                                <td class="coffee-name"><strong>Endless Cups</strong></td>
                                <td class="coffee-desc">
									<?php include 'sales.php';
										echo "$". number_format((float)$sum,2,'.','');
									?>
                                </td>
								<td class="coffee-type">
                                    <?php
										echo $EndlessQty;
									?>
                                </td>
                            </tr>
                            <tr class="menu-row">
                                <td class="coffee-name"><strong>Single</strong></td>
                                <td class="coffee-desc">
                                    <?php include 'sales.php';
										echo "$". number_format((float)$sumSingle + $sumSingle2,2,'.','');
									?>
                                </td>
								<td class="coffee-type">
                                   <?php include 'sales.php';
										echo $SingleQty + $SingleQty2;
									?>
                                </td>
                            </tr>
                            <tr class="menu-row">
                                <td class="coffee-name"><strong>Double</strong></td>
                                <td class="coffee-desc">
                                    <?php include 'sales.php';
										echo "$". number_format((float)$sumDouble + $sumDouble2,2,'.','');
									?>
                                </td>
                                <td class="coffee-type">
                                    <?php include 'sales.php';
										echo $DoubleQty + $DoubleQty2;
									?>
                                </td>
							</tr>
							<tr>
								<td colspan="3">
								<?php include "sales.php";
								
								echo "<p>Just Java - " . $EndlessQty .
								" Endless Cup(s) " . "($" . number_format((float)$sum,2,'.','') . ")" 
								. "</p>";
								
								echo "<p>Cafe Au Lait - " . $SingleQty . " Single (" .
									"$" . number_format((float)$sumSingle,2,'.','') . "), " . 
									$DoubleQty . " Double ($" . number_format((float)$sumDouble,2,'.','') . ")" .
									"</p>";

								echo "<p>Iced Cappuccino - " . $SingleQty2 . " Single (" .
									"$" . number_format((float)$sumSingle2,2,'.','') . "), " . 
									$DoubleQty2 . " Double ($" . number_format((float)$sumDouble2,2,'.','') . ")" .
									"</p>";
								?>
								</td>
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
    </body>
</html>
