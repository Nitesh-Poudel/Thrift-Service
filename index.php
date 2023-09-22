<?php
    include_once('session.php');
    include_once('databaseconnection.php');
$id='';
    if(isset($_SESSION['userid'])){


        $id=$_SESSION['userid'];
        //to chek role of the user;
        $qry=mysqli_query($con,"SELECT * FROM user WHERE uid=$id");
        $data=mysqli_fetch_assoc($qry);
    }
    else{
        header('location:login.php');
    }

    $link='';
    ($data['role']=='retailer')?
        $link='<a id="link" href="productupload.php">Upload Product</a>':$link='<a href="">About us</a>';

    $title='';
    if(isset($_GET['todo'])){
        $title=$_GET['todo'];
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($title)){echo $title;} ?></title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
       
    </style>
</head>
<body>
        <div class="container">
            <div class="innercontainer">
                <?php include_once('left.php')?>
                <div class="right">
                    <?php include_once('header.php');?></div>
                    

                    
                <div class="tocenter">
                    <div class="products">

                    <?php 

                    
                        $qry = '';


                              
                                    //Check uploaded status of the the person
                                    if(isset($_GET['tosee'])){
                                        $tosee=$_GET['tosee'];
                                        if($tosee=='Item_uploaded'){
                                            $qry=mysqli_query($con,"SELECT  * from clothes where retailer_id='$id'");
                                            while ($data = mysqli_fetch_assoc($qry)){
                                                
                                                echo '
                                                <a href="product.php?cloth_id=' . $data['cid'] . '"><div class="product">
                                                    <div class="img">
                                                        <img src="productimage/' . $data['image'] . '" title='.$data['cid'].'>
                                                    </div>
                                       
                                                        <div class="detail" id="type"><b>' . $data['type'] . '</b></div>
                                                        <div class="detail"><b>' . $data['price'] . '</b></div>
                                       
                                       
                                       
                                                </div></a>';

                                            }
                                        }
                                    }
                                
                           
                                
                                //Show every clothes available in platform except one that we have uploaded
                                    else{    
                                    
                                        $qry = mysqli_query($con, "SELECT * FROM clothes c
                           WHERE c.retailer_id != '$id'
                           AND (c.cid NOT IN (SELECT forcloth FROM orderproposal WHERE accept = 1)
                                OR c.cid NOT IN (SELECT forcloth FROM orderproposal WHERE accept = 1))");

                                        while ($data = mysqli_fetch_assoc($qry)){  
                                            echo '
                                            <a href="product.php?cloth_id=' . $data['cid'] . '"><div class="product">
                                                <div class="img">
                                                    <img src="productimage/' . $data['image'] . '" title='.$data['cid'].'>
                                                </div>
                                   
                                                    <div class="detail" id="type"><b>' . $data['type'] . '</b></div>
                                                    <div class="detail"><b>' . $data['price'] . '</b></div>
                                   
                                   
                                   
                                            </div></a>';

                                        }
                                    }
                                
                            
                            
                               
                               
                            
                            

                        
                    ?>

                        



                        
                    </div>

                </div>


            </div>
        </div>
    
</body>
</html>
