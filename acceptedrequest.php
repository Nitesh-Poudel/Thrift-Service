<?php
    include_once('session.php');
    include_once('databaseconnection.php');

    $qry='';$data='';
    if(isset($_SESSION['userid'])){
        if(isset($_GET['id'])){
            $id=$_GET['id'];


        $uid=$_SESSION['userid'];



       
        $qry=mysqli_query($con,"SELECT *
        FROM orderproposal op
        INNER JOIN clothes c 
        ON op.forcloth = c.cid
        INNER JOIN User u 
        ON op.byperson = u.uid
        WHERE  op.accept = 1 AND c.retailer_id=$id;");



        }
    }
    else{
        header('location:login.php');
    }

    $link='';
    ($_SESSION['role']=='retailer')?
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
        .a{width:100%;height:100%;display:flex;}
        .intro{background-color:black;}
        .productdetail{width:100%;background-color:black;}
        .outerintro{background-color:white;        }
       .contents{width:100%;  overflow:scroll;}
       .other{width:20%;  background-color:white; border-radius:8px;   box-shadow: 5px 3px 18px 0px #888888; }
       .intro h1,h3{
       }
       tr,table{border:1px solid white;background-color:black;color:white;border-collapse:collapse;width:100%;font-size:22px}
        .right a{color:white}
        tr:nth-child(even){background-color: #212221;color:aliceblue}
        tr{height:26px}
        th,td{text-align: left}
        tr:hover{background-color: #214271;}

        .container .innercontainer .right .intro {max-width: 1000px;min-width: 1000px;
            height: 30%;display: flex; background-color: rgb(10 10 10); margin-top: 10px;
            border-radius: 8px; align-items: center; box-shadow: 5px 3px 18px 0px #888888;
            margin-left: 20px;
        } 
        #custumerProfile{
          margin-right:auto;
          margin-left:5px;
        }        
       

    </style>
</head>
<body>
    <div class="container">
        <div class="innercontainer">
            <?php include_once('left.php')?>
            <div class="right">
                <?php include_once('header.php');?>
                <?php include_once('nav.php');?>


               
            </div>
           
                <div class="contents">
                        
                    <?php
                   
                 
                    while($data=mysqli_fetch_assoc($qry)){
                       
                     
                    echo'
                     
                        <div class="intro">
                       
                            <div class="image"><div class="img"><a href="productimage/'.$data['image'].'"><img src="productimage/'.$data['image'].'"></a></div></div>
                           
                            <div class="productdetail">
                            <div style="text-align: right;">
    <img id="customerProfile" src="userimage/'.$data['userimg'].'" width="100px" style="margin-left: auto;">
</div>  <table>
                           
                                <tr>
                                    <th>Receiver Name</th>
                                    <td>'.$data['name'].'</td>

                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>'.$data['email'].'</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>'.$data['phone'].'</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>'.$data['district'].','.$data['localgov'].'-'.$data['ward'].'</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>'.$data['proposalprice'].'</td>
                                </tr>

                            <table>
                              
                        

                                

                            </div>
                        </div>
                      
                        
                 


                   
                        ';
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
