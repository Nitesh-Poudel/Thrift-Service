<?php
    include_once('databaseconnection.php');
    
    $a=md5('admin');
    //$renamebuyer = "UPDATE user SET password = '$a'";
    
    // Execute the first query to change "retailer" to "seller"
  

    // Execute the second query to change "customer" to "buyer"
    if (mysqli_query($con, $renamebuyer)) {
        echo "Buyer role changed successfully.";
    } else {
        echo "Error changing buyer role: " . mysqli_error($con);
    }
?>
