<?php

    // Variable declarations
    $JJprice = 0;
    $ALPriceS = 0;
    $ALPriceD = 0;
    $ICPriceS = 0;
    $ICPriceD = 0;

    // Attempt to connect to MySQL database 
    $db = mysqli_connect('localhost', 'root', '');
    if (mysqli_connect_errno()) {
      echo "Error: Could not connect to database.  Please try again later.";
      exit;
    }
    mysqli_select_db($db,'javajam');


    // Prices
    $query = 
      "SELECT * FROM coffee";

    $result = mysqli_query($db,$query);

    if ($result) {
      while ($row = mysqli_fetch_assoc($result)){
        if ($row['coffee_name'] == 'Just Java' && $row['coffee_type'] == 'Endless Cup') {
          $JJprice = number_format((float)$row['coffee_price'],2,'.','');
        }
        if ($row['coffee_name'] == 'Cafe au Lait' && $row['coffee_type'] == 'Single') {
          $ALPriceS = number_format((float)$row['coffee_price'],2,'.','');
        }
        if ($row['coffee_name'] == 'Cafe au Lait' && $row['coffee_type'] == 'Double') {
          $ALPriceD = number_format((float)$row['coffee_price'],2,'.','');
        }
        if ($row['coffee_name'] == 'Iced Cappuccino' && $row['coffee_type'] == 'Single') {
          $ICPriceS = number_format((float)$row['coffee_price'],2,'.','');
        }
        if ($row['coffee_name'] == 'Iced Cappuccino' && $row['coffee_type'] == 'Double') {
          $ICPriceD = number_format((float)$row['coffee_price'],2,'.','');
        }
      }
    }
    
    $result->free();
    
    $db->close();
  ?>