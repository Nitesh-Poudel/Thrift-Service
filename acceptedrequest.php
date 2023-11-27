<?php
include_once('session.php');
include_once('databaseconnection.php');

$qry = '';
$data = '';



 if (isset($_SESSION['userid'])) {
    if($_SESSION['userid']!=$_GET['userid']){
        header("Location:home.php");
        exit;
    }
    if (isset($_POST['order_complete'])) {
        
        $orderID = $_POST['oid'];
        $completed_date = date('Y-m-d H:i:s');
        //$qry = mysqli_query($con, "UPDATE orders SET complete=1, completedate='$completed_date' WHERE oid=$orderID");


        //if($qry){
            $time=date('Y-m-d H:i:s');

            $find=mysqli_query($con,"SELECT * FROM orders o 
                JOIN orderproposal op 
                JOIN user u
                
                ON o.pid = op.poid AND op.byperson = u.uid 
                WHERE o.oid='$orderID'  "
            );
            $data=mysqli_fetch_assoc($find);
            

        

            $destination=$data['byperson'];
            $uid=$_SESSION['userid'];
            $subject="Seller complete Order";

            echo$destination;

            //$sql="INSERT into notification(destination,source,subject,time)Values('$destination','$uid','$subject','$time')";
            //$notificationqry=mysqli_query($con,$sql);
            //if($notificationqry){
                
                 //updating_proposal_order_4_so_that_custumer_will_be_notified
                $poid=$data['poid'];

                $updateqry=mysqli_query($con,"UPDATE orderproposal set accept=4 WHERE poid='$poid' AND accept=1");
                if($updateqry){
                    echo '<script>alert("Order Complete of '.$data['byperson'].'");</script>';
              
                }
            } 
        }
    






    if (isset($_GET['userid'])) {
        $id = $_GET['userid'];
        $uid = $_SESSION['userid'];

        if (isset($_GET['todo'])) {
            $_GET['todo'] == 'pandingOrder' ? $complete = 0 : $complete = 1;

            $qry = mysqli_query($con, "SELECT *
                FROM orderproposal op
                INNER JOIN clothes c ON op.forcloth = c.cid
                INNER JOIN User u ON op.byperson = u.uid
                INNER JOIN orders o ON o.pid = op.poid
                WHERE op.accept = 1 AND c.retailer_id = $id AND (o.complete = $complete);
            ");
        } else {
            $qry = mysqli_query($con, "SELECT *
                FROM orderproposal op
                INNER JOIN clothes c ON op.forcloth = c.cid
                INNER JOIN User u ON op.byperson = u.uid
                INNER JOIN orders o ON o.pid = op.poid
                WHERE op.accept = 1 AND c.retailer_id = $id;
            ");
        }
    }
 else {
    header('location:login.php');
}

$link = ($_SESSION['role'] == 'seller') ? '<a href="productupload.php">Upload Product</a>' : '<a href="#">About us</a>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oshop</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
   table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

     th,
     td {
        border: 1px solid #aaa;
        padding: 10px;
    }

     th {
        background-color: #f2f2f2;
        font-weight: bold;
        text-align: left;
        border: 1px solid #ccc; 
    }

     tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

     tr:nth-child(even) {
        background-color: #ffffff;
    }

    th, td {
    }

th {
    background-color: #f2f2f2;
    font-weight: bold;border: 1px solid #ddd;
    padding: 8px;
    text-align: left;

}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f2f2f2;
}

.img{display:flex;width:300px;height:400px;overflow:hidden;}
.tables{width:900px}

.searchMenue{display:none}
button {
          
            
            padding: 10px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            
        }
        button:hover{
            background-color:aliceblue;
        }
        #completed{background-color:green;color:white}
        #not-complete{background-color:red;color:white}
        
    </style>
</head>

<body>
    <div class="container">
        <div class="innercontainer">
            <?php include_once('left.php') ?>
            <div class="right">
                <?php include_once('header.php'); ?>

                <div class="aaa">
               <table class="custom-table">
                  
                   
                            <tr class="heading">
                                <th>S.n</th>
                                <th>Receiver Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Price</th>
                                <th>Photo</th>
                                <th>Order-status</th>
                            </tr>

                        <?php
                    $data = mysqli_fetch_assoc($qry);
                    if ($data) {
                        $sn=1;
                       echo '
                        
                            <tr>
                            <td>' . $sn . '</td>
                                <td>' . $data['name'] . '</td>
                                <td>' . $data['email'] . '</td>
                                <td>' . $data['phone'] . '</td>
                                <td>' . $data['district'] . ',' . $data['localgov'] . '-' . $data['ward'] . '</td>
                                <td>' . $data['proposalprice'] . '.Rs</td>
                                <td><img src="productimage/' . $data['image'] . '" height="50px" width="50px" title="' . $data['oid'] . '"></td>
                                <td>


                                <form method="POST">
                                <input type="hidden" name="oid" value='.$data['oid'].'>
                                ';
                                if (isset($data['complete'])) {
                                    if ($data['complete'] == 1) {
                                        echo '<button id="completed">Completed</button>';
                                    }  else {
                                        echo '<button id="not-complete"type="submit" name="order_complete" >Not-Complete</button>';
                                    }
                                }
                                echo '</form>

                                </td>
                            </tr>';
                        // Continue to display the rest of the rows
                        while ($data = mysqli_fetch_assoc($qry)) {
                            $sn++;
                            echo '
                                <tr> <td>' . $sn . '</td>
                                    <td>' . $data['name'] . '</td>
                                    <td>' . $data['email'] . '</td>
                                    <td>' . $data['phone'] . '</td>
                                    <td>' . $data['district'] . ',' . $data['localgov'] . '-' . $data['ward'] . '</td>
                                    <td>' . $data['proposalprice'] . '.Rs</td>
                                    <td><img src="productimage/' . $data['image'] . '" height="50px" width="50px" title="' . $data['oid'] . '"width="60px"></td>
                                    <td>
                                    
                                    
                                    <form method="POST">
                                        <input type="hidden" name="oid" value='.$data['oid'].'>
                                        ';
                                        if (isset($data['complete'])) {
                                            if ($data['complete'] == 1) {
                                                echo '<button id="completed">Completed</button>';
                                            }  else {
                                                echo '<button id="not-complete"type="submit" name="order_complete" >Not-Complete</button>';
                                            }
                                        }
                                        echo '</form>




                                    </td>
                                </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="7">No data available</td></tr>';
                    }
                    echo '</table>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
