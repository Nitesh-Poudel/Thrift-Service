<?php
    include_once('session.php');
    include_once('databaseconnection.php');

    $qry='';$data='';

    if(isset($_SESSION['userid'])){
        if(isset($_GET['order_complete'])){
            $orderID=$_GET['order_complete'];
            $completeDate=date("Y-m-d H:i:s");
            $qry=mysqli_query($con,"UPDATE orders SET complete=1 WHERE oid=$orderID");
          
        }
        if(isset($_GET['id'])){
            $id=$_GET['id'];


        $uid=$_SESSION['userid'];

            if(isset($_GET['todo'])){
                $_GET['todo']=='pandingOrder'?$complete=0:$complete=1;
            
           

                $qry = mysqli_query($con, "SELECT *
                FROM orderproposal op
                INNER JOIN clothes c ON op.forcloth = c.cid
                INNER JOIN User u ON op.byperson = u.uid
                INNER JOIN orders o ON o.pid = op.poid
                WHERE op.accept = 1 AND c.retailer_id = $id AND (o.complete = $complete);
                ");

            } 
            else{
                $qry = mysqli_query($con, "SELECT *
                FROM orderproposal op
                INNER JOIN clothes c ON op.forcloth = c.cid
                INNER JOIN User u ON op.byperson = u.uid
                INNER JOIN orders o ON o.pid = op.poid
                WHERE op.accept = 1 AND c.retailer_id = $id;
                ");
            } 
        }
    }
    else{
        header('location:login.php');
    }

    $link='';
    ($_SESSION['role']=='seller')?
        $link='<a href="productupload.php">Upload Product</a>':$link='<a href="#">About us</a>';
   
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oshop</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        body{background-color:red;}
          .contents{width:100%;  overflow:scroll;margin-bottom:10px;background-COLOR:}
        .introbuyer{height:50px;display:flex; justify-content:right;background-COLOR:black}
        .introbuyer .image{width:50px;overflow:hidden;display:flex;justify-content:center;margin-right:10px;border-radius:5px}
        .introbuyer img{border-radius:5px}
        .images{display:flex;flex-direction:end;}
        .productdetail{width:100%;background-color:black; display:flex;align-items:center}
      
     
       .intro h1,h3{
       }
       .productImg{width:40%;;display:flex;justify-content:center;align-items:center}
       .table{width:60%}
       tr,table{border-top:5px solid gray;background-color:black;color:white;width:100%;border-collapse:collapse;font-size:22px}
        .right a{color:white}
        tr:nth-child(even){background-color: #212221;color:aliceblue}
        tr{height:26px}
        th,td{text-align: left}
        tr:hover{background-color: #214271;}
        #table_head{background-color: #214271;}

        
        #custumerProfile{
        width:100px;
          margin-left:5px;
          border-radius:8px;
        } 
        #button{width:100%; display:flex; justify-content:right;}

.productdetail button{ border:none;padding:8px 24px;background-color: green;color:white;
    margin-right:auto;margin-left:auto;border-radius: 4px;cursor: pointer;font-weight: 600;
    font-size: 18px;margin-block:10px;
}
.productdetail button:hover{background-color: red;}   
.productdetail button:active{background-color: tomato;} 
#completed{background-color: tomato;}  

    </style>
</head>
<body>
    <div class="container">
        <div class="innercontainer">
            <?php include_once('left.php')?>
            <div class="right">
                <?php include_once('header.php');?>
                <?php include_once('nav.php');?>


               
           
           
               
                   
                    <?php
                   
                 
                    while($data=mysqli_fetch_assoc($qry)){
                       
                     
                        echo '
                        <div class="contents">
                            <div class="introbuyer">
                                <div class="image"><img src="userimage/' . $data['userimg'] . '" title="' . $data['name'] . '"></div>
                            </div>
                    
                            <div class="productdetail">
                                <div class="productImg">
                                    <img id="product_pic" src="productimage/' . $data['image'] . '" height="300px" width="200px" title="' . $data['oid'] . '">
                                </div>
                                <div class="table">
                                    <table>
                                        <tr colspan="2" id="table_head"><th>Customer Personal Detail</th></tr>
                                        <tr>
                                            <th>Receiver Name</th>
                                            <td>' . $data['name'] . '</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa-solid fa-envelope"></i>Email</th>
                                            <td>' . $data['email'] . '</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa-solid fa-phone"></i> Phone</th>
                                            <td>' . $data['phone'] . '</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa-solid fa-location-dot"></i>Address</th>
                                            <td>' . $data['district'] . ',' . $data['localgov'] . '-' . $data['ward'] . '</td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td>' . $data['proposalprice'] . '.Rs</td>
                                        </tr>
                                        <tr>
                                            <th>Dress type</th>
                                            <td>' . $data['type'] . '</td>
                                        </tr>
                                        <tr>
                                            <th>Size</th>
                                            <td>' . $data['size'] . '</td>
                                        </tr>
                                        <tr>
                                            <th>Brand</th>
                                            <td>' . $data['brand'] . '</td>
                                        </tr>
                                        <tr>
                                            <th>Fiber</th>
                                            <td>' . $data['fiber'] . '</td>
                                        </tr>
                                    </table>
                                    <form method="GET">
                                        <input type="hidden" name="oid" value="' . $data['oid'] . '">
                                        <div id="button">';
                                        
                                        if (isset($data['complete'])) {
                                            if($data['complete']==1){
                                                echo '<button id="completed" >Completed</button>';
                                            }
                                            else{
                                                echo '<button type="submit" name="order_complete" value="' . $data['oid'] . '">Complete</button>';
                                            }
                                        }
                                        
                                        echo '
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>';
                    
                    }
                    
                    
                    
                    ?>
                  
                 </div>    
               
                
            






                </div>
               


            </div>
        </div>
    </div>
</body>
</html>
