<?php
  $editIC = $_POST['editIC'];
  $ICPriceS = (float) $_POST['CPriceS'];
  $ICPriceD = (float) $_POST['CPriceD'];

  @ $db = new mysqli('localhost', 'root', '', 'javajam');

  if (mysqli_connect_errno()) {
   echo "Error: Could not connect to database.  Please try again later.";
   exit;
  }

  
  if ($ICPriceS > 0) {
    $update_query = 
      "UPDATE coffee SET coffee_price = ".$ICPriceS." WHERE coffee_name = 'Iced Cappuccino' AND coffee_type='Single'";
      $result = mysqli_query($db,$update_query);
  }

  if ($ICPriceD > 0) {
    $update_query = 
      "UPDATE coffee SET coffee_price = ".$ICPriceD." WHERE coffee_name = 'Iced Cappuccino' AND coffee_type='Double'";
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
                <img class="header-img" src="images/header.png" alt="JavaJam"/>
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
                    <h3> Your Just Java coffee price is updated as below! </h3>
                    <div class="content-wrapper">
                        <table class="menu-table">
                            <tr class="menu-row">
                                <th>Menu</th>
                                <th>Current Description</th>
                            </tr>
                            <tr class="menu-row">
                                <td class="coffee-name"><strong>Iced Cappuccino</strong></td>
                                <td class="coffee-desc">
                                    Sweetned espresso blended with icy-cold milk and served in a chilled glass. <br>
                                    <?php 
                                        include "getMenu.php";
                                        echo "<strong>Single $<span id=\"cappuccino-single\">".$ICPriceS."</span></strong>";
                                        echo "<strong> Double $<span id=\"cappuccino-double\">".$ICPriceD."</span></strong>";
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