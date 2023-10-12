<?php
    include_once("../databaseconnection.php");
    $sql = "SELECT 
            SUM(CASE WHEN role = 'buyer' THEN 1 ELSE 0 END) AS num_buyers,
            SUM(CASE WHEN role = 'seller' THEN 1 ELSE 0 END) AS num_sellers
        FROM user";

$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $buyerNum = $row['num_buyers'];
    $sellerNum = $row['num_sellers'];
} else {
    $buyerNum = 0; // Set to zero or handle the error as needed
    $sellerNum = 0; // Set to zero or handle the error as needed
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admincss/admincss.css">
    <style>
       
    </style>
</head>
<body>
    <!-- Sidebar Navigation -->
    <nav class="sidebar">
        <div class="logo">
            <img src="logo.png" alt="Logo">
            <h3>Your Dashboard</h3>
        </div>
        <ul>
            <li><a href="../admindashboard.php">Home</a></li>
            <li><a href="#">Customers</a></li>
            <li><a href="#">Retailers</a></li>
            <li><a href="adminsetting.php">Settings</a></li>
            <!-- Add more menu items as needed -->
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <header>
            <h1>Admin Dashboard</h1>
        </header>

        <!-- Customer Section -->
       <!-- Customer Section -->
<a href="usermanagement.php?toManage=buyer"><section class="section">
    <h2>Customer Management</h2>
    <div class="customer-list">
    </h1>Total custumer :<?php echo $buyerNum;?></h1>
    </div>
</section></a>


        <!-- Retailer Section -->
        <a href="usermanagement.php?toManage=seller"><section class="section">
            <h2>Seller Management</h2>
            </h1>Total Seller :<?php echo $sellerNum;?></h1>
        </section>



       
    </div>

</body>
</html>

