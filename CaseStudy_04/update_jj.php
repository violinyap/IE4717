<?php
  $editJJ = $_POST['editJJ'];
  $JJPrice = $_POST['JustJavaPrice'];

  @ $db = new mysqli('localhost', 'root', '', 'javajam');

  if (mysqli_connect_errno()) {
   echo "Error: Could not connect to database.  Please try again later.";
   exit;
  }

  $JJ_Price = (float) $JJPrice;
  
  if ($JJ_Price > 0) {
    $update_query = 
      "UPDATE coffee SET coffee_price = ".$JJ_Price." WHERE coffee_name = 'Just Java' AND coffee_type='Endless Cup'";
      $result = mysqli_query($db,$update_query);
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
                                <td class="coffee-name"><strong>Just Java</strong></td>
                                <td class="coffee-desc">
                                    Regular house blend, decaffeinated coffee, or flavor of the day. <br>
                                    <?php 
                                        include "getMenu.php";
                                        echo "<strong>Endless Cup $<span id=\"justjava-endless\">".$JJprice."</span></strong>";
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