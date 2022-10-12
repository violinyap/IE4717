<?php
    // create short variable names
    $db = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($db,'javajam');
    $sql=
      "SELECT
      JJQty as JJQty,
      JJType as JJType
      FROM orders";
    $result = mysqli_query($db,$sql);
    $sum = 0;
    $EndlessQty = 0;
    $EndlessCount = 0;
    while ($row = mysqli_fetch_assoc($result)){
    if ($row['JJType'] == 'null')
    {
        $JJPrice = 2;
        $EndlessCount = 1;
        $EndlessQty = $EndlessQty + ($EndlessCount * $row['JJQty']);
        $sum = $EndlessQty * $JJPrice;
    }
    }
    $result->free();
    
    $sumSingle = 0;
    $sumDouble = 0;
    $SingleCount = 0;
    $DoubleCount = 0;
    $SingleQty = 0;
    $DoubleQty = 0;
    $sql=
    "SELECT
    ALQty as ALQty,
    ALType as ALType
    FROM orders";
    $result = mysqli_query($db,$sql);
      
    while ($row = mysqli_fetch_assoc($result)){
    if($row['ALType'] == 'Single')
    {
      $ALPrice = 2;
      $SingleCount = 1;
      $SingleQty = $SingleQty + $SingleCount * $row['ALQty'];
      $sumSingle = $SingleQty * $ALPrice;
    } else {
      $ALPrice = 3;
      $DoubleCount = 1;
      $DoubleQty = $DoubleQty + $DoubleCount * $row['ALQty'];
      $sumDouble = $DoubleQty * $ALPrice;
      }
    }
    $result->free();
      
    $sumSingle2 = 0;
    $sumDouble2 = 0;
    $SingleCount2 = 0;
    $DoubleCount2 = 0;
    $SingleQty2 = 0;
    $DoubleQty2 = 0;
    
    $sql=
    "SELECT
    CQty as CQty,
    CType as CType
    FROM orders";
    $result = mysqli_query($db,$sql);
      
    while ($row = mysqli_fetch_assoc($result)){
    if($row['CType'] == 'Single')
      {
      $CPrice = 4.75;
      $SingleCount2 = 1;
      $SingleQty2 = $SingleQty2 + $SingleCount2 * $row['CQty'];
      $sumSingle2 = $SingleQty2 * $CPrice;
      } else {
      $CPrice = 5.75;
      $DoubleCount2 = 1;
      $DoubleQty2 = $DoubleQty2 + $DoubleCount2 * $row['CQty'];
      $sumDouble2 = $DoubleQty2 * $CPrice;
      }
    }
    $result->free();
    
    $db->close();
  ?>