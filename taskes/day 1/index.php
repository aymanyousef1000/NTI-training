<?php

    $electricityBill = 153;

    switch ($electricityBill) {

        case ($electricityBill <= 50 &&  $electricityBill > 0):
          echo  $electricityBill * 3.50;
          break;
        case ($electricityBill <= 150):
            echo  $electricityBill * 4.00;
          break;
        case  ($electricityBill > 150):
            echo $electricityBill * 6.50;
          break;
        default : 
            echo "invalid input";
            break;

      }

?>
