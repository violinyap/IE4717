<!doctype html>
<head>
  <title>JavaJam Coffee House - Sales Report Product</title>
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
                    <a class="navbar-menu active" href="salesReport.html">Daily<br>Sales<br>Report</a>
                </nav>
                <div class="content">
                    <h1 class="content-title">Sort by product sales:</h1>
                    <div class="content-wrapper">
                        <table class="menu-table">
                            <tr class="menu-row">
                                <th>Product</th>
                                <th>Total Dollar Sales</th>
                                <th>Quantity Sales</th>
                            </tr>
                            <tr class="menu-row">
                                <td class="coffee-name"><strong>Just Java</strong></td>
                                <td class="coffee-desc">
									<?php include "sales.php";
									echo "$". number_format((float)$sum,2,'.','');
									?>
                                </td>
								<td class="coffee-type">
                                    <?php include "sales.php";
									echo $EndlessQty;
									?>
                                </td>
                            </tr>
                            <tr class="menu-row">
                                <td class="coffee-name"><strong>Cafe au Lait</strong></td>
                                <td class="coffee-desc">
                                    <?php include "sales.php";
									echo "$". number_format((float)$sumSingle + $sumDouble,2,'.','');
									?>
                                </td>
								<td class="coffee-type">
                                   <?php
									echo $SingleQty + $DoubleQty;
									?>
                                </td>
                            </tr>
                            <tr class="menu-row">
                                <td class="coffee-name"><strong>Iced Cappuccino</strong></td>
                                <td class="coffee-desc">
                                    <?php include "sales.php";
									echo "$". number_format((float)$sumSingle2 + $sumDouble2,2,'.','');
									?>
                                </td>
                                <td class="coffee-type">
                                    <?php
									echo $SingleQty2 + $DoubleQty2;
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
