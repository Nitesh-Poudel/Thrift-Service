<?php
    include_once('../databaseconnection.php');

$hlo="say_hrrrrrrrrrrello";
    if(isset($_GET['role'])){
        if(isset($_GET['userid'])){
            //echo$_GET['role'];
            $userid=$_GET['userid'];
            $hlo="say_hello".$_GET['role'];

            $qry=mysqli_query($con,"SELECT * from user u LEFT Join sellerinfo s ON u.uid=s.sellerid where uid=$userid");
            if($qry){
                $data=mysqli_fetch_assoc($qry);
            }
        }
    }
$msg='';
    if(isset($_POST['accept'])){

        $updatequery=mysqli_query($con,"UPDATE user set role='seller' WHERE uid=$userid");
        
        if($updatequery){
            $date=date('Y-m-d H:i:s');
            $msg=ucwords("Your profile is Approvied To sell clothes");
            $notification=mysqli_query($con,"INSERT into notification(destination,subject,time)VALUES('$userid','$msg','$date')");

            if($notification){
                $msg="Accepted_sucessfully";

            }
            else{
                $msg="some_thing_happen";
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

.img{display:flex;width:300px;height:400px;overflow:hidden;}
.tables{width:900px}


.button {
            /* Green */
           
            
            padding: 10px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
        }
        .button:hover{
            background-color:aliceblue;
        }
        
    </style>
<body>
<nav class="sidebar">
        <div class="logo">
            <img src="logo.png" alt="Logo">
            <h3>Admin Dashboard</h3>
        </div>
        <ul>
            <li><a href="admin_Home.php">Home</a></li>
            <li><a href="usermanagement.php?catagory=buyer">Customers</a></li>
            <li><a href="usermanagement.php?catagory=seller">Seller</a></li>
            <li><a href="usermanagement.php?catagory=non-seller">Request</a></li>
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
                <div class="img"><img src="../userimage/<?php echo $data['userimg']; ?>" alt="User Image"width="200" ></div>

                <div class="info">
                    
                    <h1>Personal information</h1>
                    <table>
                    <tr>
                            <td>Name: </td>
                            <td><?php echo $data['name'];?></td>
                        </tr>

                        <tr>
                            <td>Userid: </td>
                            <td><?php echo $data['uid'];?></td>
                        </tr>

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
                        <?php 
                            if ($data['role'] == 'non-seller') {
                                echo '
                                    <tr>
                                        <td>Citizenship-No: </td>
                                        <td>'.$data['citizenshipNo'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Issue-Date</td>
                                        <td>'.$data['issueDate'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Citizenship Image</td>
                                        <td><a href="../sellerDocument/'.$data['citizenshipImg'].'">"<img src="../sellerDocument/'.$data['citizenshipImg'].'"width="80px"></a></td>
                                    </tr>
                                </table>
                                <form method="POST">
                                    <button type="submit"class="button" name="accept">Accept</button>
                                </form>
                                    ';
                            }
                        ?>


                 
                  

                    <div class="tables">
                        <div>
                            <?php
                                if($data['role']==='seller') {
                                    echo '
                                        <h1>Information As Seller</h1>
                                        <table id="sellertable">
                                            <tr>
                                                <th><a href="../home.php?id=' . $userid . '&&tosee=Item_uploaded">Item Uploaded</a></th>
                                                    <td>';

                                                        $qry = mysqli_query($con, "SELECT COUNT(*) AS total_count FROM clothes WHERE retailer_id='$userid'");
                                                        $row = mysqli_fetch_assoc($qry);
                                                        $totalClothesCount = $row['total_count'];
                                                        echo $totalClothesCount;
                                                    echo '</td>
                                            </tr>

                                            <tr>
                                                <th><a href="../requestview.php?id=' . $userid . '&&todo=Item_upload">Pending Request</a></th>
                                                    <td>';

                                                        $qry = mysqli_query($con, "SELECT COUNT(*) AS total_count FROM orderproposal op 
                                                        INNER JOIN clothes c ON op.forcloth = c.cid 
                                                        WHERE c.retailer_id = '$userid' AND accept=0");
                                                         $row = mysqli_fetch_assoc($qry);
                                                            echo $row['total_count'];

                                                    echo '</td>
                                            </tr>

                                            <tr>
                                                <th><a href="../acceptedrequest.php?userid=' . $userid . '">Accepted Request</a></th>
                                                <td>';

                                                    $qry = mysqli_query($con, "SELECT COUNT(*) AS total_count FROM orderproposal op 
                                                    INNER JOIN clothes c ON op.forcloth = c.cid 
                                                    WHERE c.retailer_id = '$userid' AND accept=1");
                                                    $row = mysqli_fetch_assoc($qry);
                                                    echo $row['total_count'];

                                                echo '</td>
                                            </tr>
                                            
                                            <tr>
                                                <th><a href="../acceptedrequest.php?userid=' . $userid . '&&todo=pandingOrder">Pending Order</a></th>
                                                <td>';

                                                    $qry = mysqli_query($con, "SELECT COUNT(*) AS total_count FROM `orders` o
                                                    INNER JOIN orderproposal op ON o.pid = op.poid 
                                                    INNER JOIN clothes c ON op.forcloth = c.cid 
                                                    WHERE c.retailer_id = '$userid' AND o.complete = 0");
                                                    $row = mysqli_fetch_assoc($qry);
                                                    echo $row['total_count'];

                                                echo '</td>
                                            </tr>


                                            <tr>
                                                <th><a href="../acceptedrequest.php?userid=' . $userid . '&&todo=completeOrder">Completed Order</a></th>
                                                <td>';

                                                    $qry = mysqli_query($con, "SELECT COUNT(*) AS total_count FROM `orders` o
                                                    INNER JOIN orderproposal op ON o.pid = op.poid 
                                                    INNER JOIN clothes c ON op.forcloth = c.cid 
                                                    WHERE c.retailer_id = '$userid' AND o.complete = 1");
                                                    $row = mysqli_fetch_assoc($qry);
                                                    echo $row['total_count'];

                                                echo '</td>
                                            </tr>


                                            <tr>
                                                <th><a href="../home.php?id=' . $userid . '&&tosee=Item_onsell">Item On Sale</a></th>
                                                    <td>';

                                                        $qry = mysqli_query($con, "SELECT COUNT(*) AS total_count
                                                            FROM clothes c
                                                            LEFT JOIN orderproposal op ON c.cid = op.forcloth
                                                            WHERE op.forcloth IS NULL and retailer_id='$userid';");
                                                        $row = mysqli_fetch_assoc($qry);
                                                        echo $row['total_count'];

                                                echo '</td>
                                            </tr>


                                            <tr>
                                                <th>Total sales Amount</th>
                                                    <td>';

                                                        $qry = mysqli_query($con, "SELECT SUM(proposalprice) AS sum FROM orderproposal op 
                                                            LEFT JOIN clothes c ON op.forcloth=c.cid  
                                                            WHERE accept=1 AND retailer_id=$userid");
                                                                   $row = mysqli_fetch_assoc($qry);
                                                        echo $row['sum'] . 'rs';

                                                    echo '</td>
                                            </tr>
                                        </table>';
                                }
                            ?>



                    
                </div>

                    <div>
                        <h1>Information as buyer</h1>
                        <table>
                            <tr>
                                <td>Sent Proposals</td>
                                <td><?php $qry = mysqli_query($con, "SELECT COUNT(*) AS total_count FROM `orderproposal` 
                                                    
                                                    WHERE byperson = '$userid'");
                                                    $row = mysqli_fetch_assoc($qry);
                                                    echo $row['total_count'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Accepted Proposals</td>
                                <td><?php $qry = mysqli_query($con, "SELECT COUNT(*) AS total_count FROM `orderproposal` 
                                                    
                                                    WHERE byperson = '$userid'AND accept=1");
                                                    $row = mysqli_fetch_assoc($qry);
                                                    echo $row['total_count'];
                                    ?></td>
                            </tr>
                            <tr>
                                <td>Rejected Proposals</td>
                                <td><?php $qry = mysqli_query($con, "SELECT COUNT(*) AS total_count FROM `orderproposal` 
                                                    
                                                    WHERE byperson = '$userid'AND accept=2");
                                                    $row = mysqli_fetch_assoc($qry);
                                                    echo $row['total_count'];
                                    ?></td>
                            </tr>
                            <tr>
                                <td>Non-response</td>
                                <td><?php $qry = mysqli_query($con, "SELECT COUNT(*) AS total_count FROM `orderproposal` 
                                                    
                                                    WHERE byperson = '$userid'AND accept=0");
                                                    $row = mysqli_fetch_assoc($qry);
                                                    echo $row['total_count'];
                                    ?></td>
                            </tr>

                            <tr>
                                <td>Received-Clothes</td>
                                <td>fkfonr</td>
                            </tr>

                        </table>
                    </div>
    
                </div>

                </div>
                
            </div>

        </div>
    </div>
</body>
</html>