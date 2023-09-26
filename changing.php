<?php
    include_once('databaseconnection.php');
    
    $renameseller = "UPDATE clothes SET role = 'seller' WHERE role = 'retailer'";
    $renamebuyer = "UPDATE user SET role = 'buyer' WHERE role = 'customer'";
    
    // Execute the first query to change "retailer" to "seller"
    if (mysqli_query($con, $renameseller)) {
        echo "Seller role changed successfully.";
    } else {
        echo "Error changing seller role: " . mysqli_error($con);
    }

    // Execute the second query to change "customer" to "buyer"
    if (mysqli_query($con, $renamebuyer)) {
        echo "Buyer role changed successfully.";
    } else {
        echo "Error changing buyer role: " . mysqli_error($con);
    }
?>
