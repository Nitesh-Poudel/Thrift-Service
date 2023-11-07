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
        if(isset($_GET['userid'])){
            $id=$_GET['userid'];


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
                WHERE op.accept = 1 AND c.retailer_id = $id ;
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
        
          .contents{width:100%; background-color:#002024; overflow:scroll;margin-bottom:10px;}
        .introbuyer{height:50px;display:flex; justify-content:right;border-bottom:1px solid white}
        .introbuyer .image{width:50px;overflow:hidden;display:flex;justify-content:center;margin-right:10px;border-radius:5px}
         img{border-radius:8px;height:250px;width:auto}
        .images{display:flex;flex-direction:end;}
        .productdetail{width:100%; display:flex;align-items:center}
        tr,table{border:1px solid gray;border-collapse:collapse;width:80%;font-size:22px;}
      
        

        button {
            padding: 8px 220px;
        }

 

       .intro h1,h3{
       }
       .aaa{width:100%;height:100%;overflow:scroll
       }
       .productImg{width:40%;display:flex;justify-content:center;align-items:center}
       .table{width:50%}
       tr,table{border-top:5px solid gray;color:white;width:100%;border-collapse:collapse;font-size:22px;text-align:left}
        .right a{color:white}

      
       
        tr:hover{background-color: #214271;}
        #table_head{color:gold;}

        
        #custumerProfile{
        width:100px;
          margin-left:5px;
          border-radius:8px;
        } 
        #button{width:100%; display:flex; justify-content:right;}

.productdetail button{ border:none;padding:18px 34px;background-color: green;color:white;
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


               
           
           
               
                <div class="aaa"> 
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
                                        <tr rowspan="2" id="table_head"><th>Customer Personal Detail</th></tr>
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
    </div>
</body>
</html>
