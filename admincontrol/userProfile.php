<?php
    include_once('../databaseconnection.php');

$hlo="say_hrrrrrrrrrrello";
    if(isset($_GET['role'])){
        if(isset($_GET['userid'])){
            //echo$_GET['role'];
            $userid=$_GET['userid'];
            $hlo="say_hello".$_GET['role'];

            $qry=mysqli_query($con,"SELECT * from user where uid=$userid");
            if($qry){
                $data=mysqli_fetch_assoc($qry);
            }
        }
    }
    //
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admincss/admincss.css">
</head>
    <style>
        *{over}
        .container{width:100vw;height:100vh;display:flex;align-items:center;justify-content:center}
        .content{background-color:re;width:76%;height:100%;}
        .information{display:flex;flex-wrap:wrap}
        .info{margin:10px}
        /* General styles */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h1 {
    color: #333;
    margin-bottom: 10px;
}

/* Table styles */
table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 20px;
    background-color: #fff;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f2f2f2;
}

/* Table specific styles */
.info-table {
    /* Add specific styles for Personal Information table */
}

.transaction-table {
    /* Add specific styles for Transaction Information table */
}

        
    </style>
<body>
<nav class="sidebar">
        <div class="logo">
            <img src="logo.png" alt="Logo">
            <h3>Admin Dashboard</h3>
        </div>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="usermanagement.php?catagory=buyer">Customers</a></li>
            <li><a href="usermanagement.php?catagory=seller">Retailers</a></li>
            <li><a href="#">Logout</a></li>
            <!-- Add more menu items as needed -->
        </ul>
</nav>



    <div class="container">
        <div class="content">
            <header>
                <h1><?php echo $data['name'];?></h1>
            </header>
            <div class="information">
                <div class="img"><img src="../userimage/<?php echo $data['userimg']; ?>" alt="User Image"width="400" ></div>

                <div class="info">
                    
                    <h1>Personal information</h1>
                    <table>
                        <tr>
                            <td>Address: </td>
                            <td><?php echo $data['address'];?></td>
                        </tr>
                        <tr>
                            <td>phone: </td>
                            <td><?php echo $data['phone'];?></td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td><?php echo $data['email'];?></td>
                        </tr>

                 
                    </table>

                    <h1>Information As Seller</h1>
                    <table id="sellertable">
                                <tr>
                                    <th><a href="home.php?id=<?php echo$id."&&tosee=Item_uploaded";?>">Item Uploaded</a></th>
                                    <td><?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count FROM clothes WHERE retailer_id='$userid' ");
                                        $row = mysqli_fetch_assoc($qry);
                                        $totalClothesCount = $row['total_count'];echo $totalClothesCount?>
                                    </td>
                                </tr>
                                
                                 <a href="seerequest.php?id=<?php echo$id;?>"><tr>
                                    <th><a href="requestview.php?id=<?php echo$id."&&todo=Item_upload";?>">Pending Request</a></th>
                                    <td><?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count FROM orderproposal op 
                                                INNER JOIN clothes c ON op.forcloth = c.cid 
                                                WHERE c.retailer_id = '$userid' and accept=0");
                                        $row = mysqli_fetch_assoc($qry);
                                        echo  $row['total_count']; ?>
                                    </td>
                                </tr></a>

                                <tr>
                                    <th><a href="acceptedrequest.php?userid=<?php echo $uid?>">Accepted Request</a></th>
                                    <td><?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count FROM orderproposal op 
                                                INNER JOIN clothes c ON op.forcloth = c.cid 
                                                WHERE c.retailer_id = '$userid' and accept=1");
                                        $row = mysqli_fetch_assoc($qry);
                                        echo  $row['total_count']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th><a href="acceptedrequest.php?userid=<?php echo $uid."&&todo=pandingOrder";?>">Pending Order</th>
                                    <td>
                                    <?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count FROM `orders` o
                                            INNER JOIN orderproposal op ON o.pid = op.poid 
                                            INNER JOIN clothes c ON op.forcloth = c.cid 
                                            WHERE c.retailer_id = '$userid' AND o.complete = 0");
                                        $row = mysqli_fetch_assoc($qry);
                                        echo  $row['total_count']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th><a href="acceptedrequest.php?userid=<?php echo$userid."&&todo=completeOrder";?>">Completed Order</th>
                                    <td>
                                    <?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count FROM `orders` o
                                            INNER JOIN orderproposal op ON o.pid = op.poid 
                                            INNER JOIN clothes c ON op.forcloth = c.cid 
                                            WHERE c.retailer_id = '$userid' AND o.complete = 1");
                                        $row = mysqli_fetch_assoc($qry);
                                        echo  $row['total_count']; ?>
                                    </td>
                                </tr>

                                <tr>
                                <th><a href="home.php?id=<?php echo$id."&&tosee=Item_onsell";?>">Item On Sale</a></th>
                                    <td>
                                    <?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count
                                            FROM clothes c
                                            LEFT JOIN orderproposal op ON c.cid = op.forcloth
                                            WHERE op.forcloth IS NULL and retailer_id='$userid';"
                                            );
                                        $row = mysqli_fetch_assoc($qry);
                                        echo $totalClothesCount = $row['total_count']; ?>
                                   
                                    </td>
                                </tr>

                                <tr>
                                    <th>Total sales Amount</th>
                                    <td><?php $qry=mysqli_query($con,"SELECT sum(proposalprice) AS sum FROM orderproposal op left join clothes c ON op.forcloth=c.cid  where accept=1 AND retailer_id=$userid"); $row = mysqli_fetch_assoc($qry); echo $totalClothesCount = $row['sum'].'rs'; ?></td>
                                </tr>
                            </table>

                </div>
                
            </div>

        </div>
    </div>
</body>
</html>