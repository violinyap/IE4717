<!doctype html>
    <html lang="en">
    <head>
        <title>JavaJam Coffee House - Update Price</title>
        <meta charset=“utf-8”>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <?php
            /* Attempt to connect to MySQL database */
            @ $db = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($db,'javajam');
            
            // IFF ERROR
        ?>
        <div class="wrapper">
            <header class="header">
                <a href="index.html">
                    <img class="header-img" src="images/header.png" alt="JavaJam"/>
                </a>
            </header>
            <div class="middle">
                <nav class="navbar">
                    <a class="navbar-menu active" href="index.html">Home</a> 
                    <a class="navbar-menu active" href="menu.html">Menu</a> 
                    <a class="navbar-menu" href="music.html">Music</a> 
                    <a class="navbar-menu" href="jobs.html">Jobs</a>
                </nav>
                <div class="content">
                    <h1 class="content-title">Coffee at JavaJam</h1>
                    <div class="content-wrapper">
    
                        <table class="menu-table">
                            <tr class="menu-row">
                                <th>Menu</th>
                                <th>Current Description</th>
                                <th colspan="2">Edit Price</th>
                                <th>Save</th>
                            </tr>
                            <tr class="menu-row">
                                <form action="update_coffee.php" method="post">
                                    <td class="coffee-name"><strong>Just Java</strong></td>
                                    <td class="coffee-desc">
                                        Regular house blend, decaffeinated coffee, or flavor of the day. <br>
                                        <strong>Endless Cup $<span id="justjava-endless">2.00</span></strong>
                                        <?php
                                            $query = "SELECT * FROM coffee WHERE coffee_name = 'Just Java' AND coffee_type = 'Endless Cup'";
                                            $result = mysqli_query($db,$query);
                                            echo '<strong>Endless Cup $<span id="justjava-endless">'.$result.'</span></strong>'
                                        ?>
                                        
                                    </td>
                                    <td class="coffee-type" colspan="2">
                                        Endless Cup<br><br>
                                        $ <input type="text" class="priceInput" name="JustJavaPrice" id="JJPrice" value="0.00">
                                    </td>
                                    <td class="coffee-total">
                                    <button onclick="savePrice('justjava')" type="submit">save</button>
                                    </td>
                                </form>
                            </tr>
                            <tr class="menu-row">
                                <td class="coffee-name"><strong>Cafe au Lait</strong></td>
                                <td class="coffee-desc">
                                    House blended coffee infused into a smooth, steamed milk. <br>
                                    <strong>
                                      Single $<span id="aulait-single">2.00</span> 
                                      Double $<span id="aulait-double">3.00</span>
                                    </strong>
                                </td>
                                <td class="coffee-type">
                                  Single<br><br>
                                    $ <input type="text" class="priceInput" name="ALPriceS" id="ALPriceS" value="0.00">
                                </td>
                                <td class="coffee-type">Double<br><br>
                                    $ <input type="text" class="priceInput" name="ALPriceD" id="ALPriceD" value="0.00">
                                </td>
                                <td class="coffee-total">
                                  <button onclick="savePrice('aulait')">save</button>
                                </td>
                            </tr>
                            <tr class="menu-row">
                                <td class="coffee-name"><strong>Iced Cappuccino</strong></td>
                                <td class="coffee-desc">
                                    Sweetned espresso blended with icy-cold milk and served in a chilled glass. <br>
                                    <strong>
                                      Single $<span id="cappuccino-single">4.75</span> 
                                      Double $<span id="cappuccino-double">5.75</span>
                                    </strong>
                                </td>
                                <td class="coffee-type">Single<br><br>
                                    $ <input type="text" class="priceInput" name="CPriceS" id="CPriceS" value="0.00">
                                </td>
                                <td class="coffee-type">Double<br><br>
                                    $ <input type="text" class="priceInput" name="CPriceD" id="CPriceD" value="0.00">
                                </td>
                                <td class="coffee-total">
                                  <button onclick="savePrice('cappuccino')">save</button>
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
        <script src="update.js"></script>
    </body>
</html>