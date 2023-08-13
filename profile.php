<?php
    include_once('session.php');
    include_once('databaseconnection.php');
$qry='';$data='';
    if(isset($_SESSION['userid'])){
        if(isset($_GET['id'])){
            $id=$_GET['id'];


        $uid=$_SESSION['userid'];
        
        $qry=mysqli_query($con,"SELECT *
        FROM user WHERE uid = $id && uid=$uid ");

        //fetching the data
        $data=mysqli_fetch_assoc($qry);


        
       





    }
    }
    else{
        header('location:login.php');
    }

    $link='';
   // ($data['role']=='retailer')?
     //   $link='<a href="productupload.php">Upload Product</a>':$link='<a href="#">About us</a>';
   
?>


<?php 
   
?>
   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oshop_<?php echo $data['name']?></title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    
    <style>
        .searchMenue{display:none;}
        .nav{position:sticky;top:0px;background-color:tomato; height:40px; display:flex;align-items:center;}
        .nav a{color:white;margin:20px;text-decoration:none;background-color:#1d4251;padding:5px;border-radius:8px;}
        .nav :hover,#active{background-color:#1d4251;color:gold;transition:0.5s}

        .introduction{display:flex;background-color:#249224;color:white;display:flex;align-items:center}
        .description{;width:100%;margin-left:50px;}
        .image img{width:300px}
        tr,table{border:1px solid white;border-collapse:collapse;width:80%;font-size:22px}
        tr:nth-child(even){background-color: green;color:aliceblue}
        tr{height:36px}
        th,td{text-align: left;}
        
    </style>

</head>
<body>

    <div class="container">
        <div class="innercontainer">
            <div class="left">
                <div class="name"><h1>Clothex.</h1></div>
                <div class="innerLeft">
                    <ul type="none">
                        <a href="index.php"><li><i class="fa-solid fa-house"></i> Home</li></a>
                        <a href="<?php echo 'profile.php?id='.$id;?>"><li><i class="fa-solid fa-user"></i> Profile </li></a>
                        
                        <?php echo $link;?>
                        <a href="#"><li><i class="fa-regular fa-gear"></i> Setting</li></a>
                        <a href="#"><li><i class="fa-solid fa-mobile"></i> Contact</li></a>
                        <a href="logout.php"><li><i class="fa-solid fa-mobile"></i> Logout</li></a>
                    </ul>
                </div>
            </div>


            
            <div class="right">
                <?php include_once('header.php');echo '</div>'?>
    
                    <nav class="nav"> 
                        <a id="active"href="#">Your Profile</a>
                        <a href="seerequest.php?id=<?php echo$id;?>">Request</a>
                        <a href="#">Proposals</a>
                   
                        <a href="#">Sales</a>
                        <a href="#">Orders</a>
                        <a href="#">Customers</a>
                        <a href="#">Balance</a>
                    </nav>
           
                <div class="contents">
                    <div class="introduction">
                        <div class="image">
                            <img src=<?php echo '"userimage/'.$data['extra'].'"'?>>
        
                        </div>
                        <div class="description">
                            
                           
                            <h1><?php echo $data['name'];?></h1>
                           
                            
                            <h3>Sales Detail</h3>
                            <table>
                                <tr>
                                    <th>Upload Item</th>
                                    <td><?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count FROM clothes WHERE retailer_id='$id' ");
                                        $row = mysqli_fetch_assoc($qry);
                                        $totalClothesCount = $row['total_count'];echo $totalClothesCount?>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>Panding Request</th>
                                    <td><?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count FROM orderproposal op 
                                                INNER JOIN clothes c ON op.forcloth = c.cid 
                                                WHERE c.retailer_id = '$id' and accept=0");
                                        $row = mysqli_fetch_assoc($qry);
                                        echo  $row['total_count']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Accept Request</th>
                                    <td><?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count FROM orderproposal op 
                                                INNER JOIN clothes c ON op.forcloth = c.cid 
                                                WHERE c.retailer_id = '$id' and accept=1");
                                        $row = mysqli_fetch_assoc($qry);
                                        echo  $row['total_count']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Panding Order</th>
                                    <td>
                                    <?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count FROM `orders` o
                                            INNER JOIN orderproposal op ON o.pid = op.poid 
                                            INNER JOIN clothes c ON op.forcloth = c.cid 
                                            WHERE c.retailer_id = '$id' AND o.complete = 0");
                                        $row = mysqli_fetch_assoc($qry);
                                        echo  $row['total_count']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Complete Order</th>
                                    <td>
                                    <?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count FROM `orders` o
                                            INNER JOIN orderproposal op ON o.pid = op.poid 
                                            INNER JOIN clothes c ON op.forcloth = c.cid 
                                            WHERE c.retailer_id = '$id' AND o.complete = 1");
                                        $row = mysqli_fetch_assoc($qry);
                                        echo  $row['total_count']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Item on sale</th>
                                    <td>
                                    <?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count
                                            FROM clothes c
                                            LEFT JOIN orderproposal op ON c.cid = op.forcloth
                                            WHERE op.forcloth IS NULL and retailer_id='$id';"
                                            );
                                        $row = mysqli_fetch_assoc($qry);
                                        echo $totalClothesCount = $row['total_count']; ?>
                                   
                                    </td>
                                </tr>

                                <tr>
                                    <th>Total sales</th>
                                    <td>4</td>
                                </tr>
                            </table>

                        
                        </div>
                    </div>

                </div>
        </div>
    </div>
             
                 
                    
                
         
</body>
</html>
