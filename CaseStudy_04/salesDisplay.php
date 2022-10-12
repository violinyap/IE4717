<?php include 'sales.php';
									if (($EndlessQty > ($SingleQty + $SingleQty2)) && ($EndlessQty > ($DoubleQty + $DoubleQty2))) {
										echo "Endless of product: Just Java";			
									}
									else if ((($SingleQty + $SingleQty2) > $EndlessQty) && (($SingleQty + $SingleQty2) > ($DoubleQty + $DoubleQty2))) {
										echo "Single of product: Cafe Au Lait & Iced Cappucino";			
									}
									else if ((($DoubleQty + $DoubleQty2) > $EndlessQty) && (($DoubleQty + $DoubleQty2) > $EndlessQty)) {
										echo "Double of product: Cafe Au Lait & Iced Cappucino";			
									}
									else if ((($EndlessQty) == ($SingleQty + $SingleQty2)) || (($EndlessQty) == ($DoubleQty + $DoubleQty2)) || (($SingleQty + $SingleQty2) == ($DoubleQty + $DoubleQty2))) {
										if ((($EndlessQty) == ($SingleQty + $SingleQty2)) && (($EndlessQty) == ($DoubleQty + $DoubleQty2)) && (($SingleQty + $SingleQty2) == ($DoubleQty + $DoubleQty2))) {
											echo "Endless of product: Just Java<br>";
											echo "Single of product: Cafe Au Lait & Iced Cappucino<br>";
											echo "Double of product: Cafe Au Lait & Iced Cappucino";
										}
										else if (($EndlessQty) == ($SingleQty + $SingleQty2)) {
											echo "Endless of product: Just Java<br>";
											echo "Single of product: Cafe Au Lait & Iced Cappucino";
										}
										else if (($EndlessQty) == ($DoubleQty + $DoubleQty2)) {
											echo "Endless of product: Just Java<br>";
											echo "Double of product: Cafe Au Lait & Iced Cappucino";
										}
										else if ((($SingleQty + $SingleQty2)) == ($DoubleQty + $DoubleQty2)) {
											echo "Single of product: Cafe Au Lait & Iced Cappucino<br>";	
											echo "Double of product: Cafe Au Lait & Iced Cappucino";
										}
									}
									echo "<br><br>Best Selling (Revenue) Product Category: <br>";
									if (($sum > ($sumSingle + $sumSingle2)) && ($sum > ($sumDouble + $sumDouble2))) {
										echo "Endless of product: Just Java";
									}
									else if ((($sumSingle + $sumSingle2) > $sum) && (($sumSingle + $sumSingle2) > ($sumDouble + $sumDouble2))) {
										echo "Single of products: Cafe Au Lait & Iced Cappucino";
									}
									else if ((($sumDouble + $sumDouble2) > $sum) && (($sumDouble + $sumDouble2) > ($sumSingle + $sumSingle2))) {
										echo "Double of products: Cafe Au Lait & Iced Cappucino";
									}
									else if ((($sum) == ($sumSingle + $sumSingle2)) || (($sum) == ($sumDouble + $sumDouble2)) || (($sumSingle + $sumSingle2) == ($sumDouble + $sumDouble2))) {
										if ((($sum) == ($sumSingle + $sumSingle2)) && (($sum) == ($sumDouble + $sumDouble2)) && (($sumSingle + $sumSingle2) == ($sumDouble + $sumDouble2))) {
											echo "Endless of product: Just Java<br>";
											echo "Single of product: Cafe Au Lait & Iced Cappucino<br>";
											echo "Double of product: Cafe Au Lait & Iced Cappucino";
										}
										else if (($sum) == ($sumSingle + $sumSingle2)) {
											echo "Endless of product: Just Java<br>";
											echo "Single of product: Cafe Au Lait & Iced Cappucino";
										}
										else if (($sum) == ($sumDouble + $sumDouble2)) {
											echo "Endless of product: Just Java<br>";
											echo "Single of product: Cafe Au Lait & Iced Cappucino";
										}
										else if (($sumSingle + $sumSingle2) == ($sumDouble + $sumDouble2)) {
											echo "Single of product: Cafe Au Lait & Iced Cappucino<br>";	
											echo "Double of product: Cafe Au Lait & Iced Cappucino";
										}
									}
								
								?>