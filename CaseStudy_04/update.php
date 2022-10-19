<!doctype html>
    <html lang="en">
    <head>
        <title>JavaJam Coffee House - Update Price</title>
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
                    <a class="navbar-menu" href="salesReport.php">Daily<br>Sales<br>Report</a>
                    <a class="navbar-menu active" href="update.php">Product <br> Price<br> Update</a>										
                </nav>
                <div class="content">
                    <h1 class="content-title">Coffee at JavaJam</h1>
                    <div class="content-wrapper">
    
                        <table class="menu-table">
                            <tr class="menu-row">
                                <th>Edit</th>
                                <th>Menu</th>
                                <th>Current Description</th>
                                <th colspan="2">Edit Price</th>
                                <th>Save</th>
                            </tr>
                            <tr class="menu-row">
                                <form action="update_jj.php" method="post">
                                    <td class="coffee-total">
                                        <input type="checkbox" id="editJJ" name="editJJ">
                                    </td>
                                    <td class="coffee-name"><strong>Just Java</strong></td>
                                    <td class="coffee-desc">
                                        Regular house blend, decaffeinated coffee, or flavor of the day. <br>
                                        <?php 
                                            include "getMenu.php";
                                            echo "<strong>Endless Cup $<span id=\"justjava-endless\">".$JJprice."</span></strong>";
                                        ?>
                                        
                                    </td>
                                    <td class="coffee-type" colspan="2">
                                        Endless Cup<br><br>
                                        $ <input type="text" class="priceInput" name="JustJavaPrice" id="JJPrice" value="0.00" disabled>
                                    </td>
                                    <td class="coffee-total">
                                        <button type="submit" id="saveJJ" disabled>save</button>
                                    </td>
                                </form>
                            </tr>
                            <tr class="menu-row">
                                <form action="update_al.php" method="post">
                                    <td class="coffee-total">
                                        <input type="checkbox" id="editAL" name="editAL">
                                    </td>
                                    <td class="coffee-name"><strong>Cafe au Lait</strong></td>
                                    <td class="coffee-desc">
                                        House blended coffee infused into a smooth, steamed milk. <br>
                                        <?php 
                                            include "getMenu.php";
                                            echo "<strong>Single $<span id=\"aulait-single\">".$ALPriceS."</span></strong>";
                                            echo "<strong> Double $<span id=\"aulait-double\">".$ALPriceD."</span></strong>";
                                        ?>
                                    </td>
                                    <td class="coffee-type">
                                    Single<br><br>
                                        $ <input type="text" class="priceInput" name="ALPriceS" id="ALPriceS" value="0.00" disabled>
                                    </td>
                                    <td class="coffee-type">Double<br><br>
                                        $ <input type="text" class="priceInput" name="ALPriceD" id="ALPriceD" value="0.00" disabled>
                                    </td>
                                    <td class="coffee-total">
                                    <button onclick="savePrice('aulait')" id="saveAL" disabled>save</button>
                                    </td>
                                </form>
                            </tr>
                            <tr class="menu-row">
                                <form action="update_ic.php" method="post">
                                    <td class="coffee-total">
                                        <input type="checkbox" id="editIC" name="editIC">
                                    </td>
                                    <td class="coffee-name"><strong>Iced Cappuccino</strong></td>
                                    <td class="coffee-desc">
                                        Sweetned espresso blended with icy-cold milk and served in a chilled glass. <br>
                                        <?php 
                                            include "getMenu.php";
                                            echo "<strong>Single $<span id=\"cappuccino-single\">".$ICPriceS."</span></strong>";
                                            echo "<strong> Double $<span id=\"cappuccino-double\">".$ICPriceD."</span></strong>";
                                        ?>
                                    </td>
                                    <td class="coffee-type">Single<br><br>
                                        $ <input type="text" class="priceInput" name="CPriceS" id="CPriceS" value="0.00" disabled>
                                    </td>
                                    <td class="coffee-type">Double<br><br>
                                        $ <input type="text" class="priceInput" name="CPriceD" id="CPriceD" value="0.00" disabled>
                                    </td>
                                    <td class="coffee-total">
                                    <button onclick="savePrice('cappuccino')" id="saveIC" disabled>save</button>
                                    </td>
                                </form>
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
        <script src="update.js"></script>
    </body>
</html>