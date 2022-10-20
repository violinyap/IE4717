<?php
  $editAL = $_POST['editAL'];
  $ALPriceS = (float) $_POST['ALPriceS'];
  $ALPriceD = (float) $_POST['ALPriceD'];

  @ $db = new mysqli('localhost', 'root', '', 'javajam');

  if (mysqli_connect_errno()) {
   echo "Error: Could not connect to database.  Please try again later.";
   exit;
  }

  
  if ($ALPriceS > 0) {
    $update_query = 
      "UPDATE coffee SET coffee_price = ".$ALPriceS." WHERE coffee_name = 'Cafe au Lait' AND coffee_type='Single'";
      $result = mysqli_query($db,$update_query);
  } else if ($ALPriceS < 0) {
    echo "<script>alert('Please input positive value more than 0 for the price of Au Lait Single. The price will be kept the same.');</script>";
    
  }

  if ($ALPriceD > 0) {
    $update_query = 
      "UPDATE coffee SET coffee_price = ".$ALPriceD." WHERE coffee_name = 'Cafe au Lait' AND coffee_type='Double'";
      $result = mysqli_query($db,$update_query);
  } else if ($ALPriceD < 0) {
    echo "<script>alert('Please input positive value more than 0 for the price of Au Lait Double. The price will be kept the same.');</script>";
  }

  $db->close();

?>

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
                    <h3> Your Just Java coffee price is updated as below! </h3>
                    <div class="content-wrapper">
                        <table class="menu-table">
                            <tr class="menu-row">
                                <th>Menu</th>
                                <th>Current Description</th>
                            </tr>
                            <tr class="menu-row">
                                <td class="coffee-name"><strong>Cafe au Lait</strong></td>
                                <td class="coffee-desc">
                                    House blended coffee infused into a smooth, steamed milk. <br>
                                    <?php 
                                        include "getMenu.php";
                                        echo "<strong>Single $<span id=\"aulait-single\">".$ALPriceS."</span></strong>";
                                        echo "<strong> Double $<span id=\"aulait-double\">".$ALPriceD."</span></strong>";
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <a href="update.php">
                      <button>
                        Back
                      </button>
                    </a>
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