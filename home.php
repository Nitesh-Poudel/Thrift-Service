<?php
    include_once('session.php');
    include_once('databaseconnection.php');
$id='';
    if(isset($_SESSION['userid'])){

        if($_SESSION['userid']=='admin'){
            header('Location:admincontrol/admindashboard.php'); 
        }



        $id=$_SESSION['userid'];
        //to chek role of the user;
        $qry=mysqli_query($con,"SELECT role FROM user WHERE uid=$id");
        $data=mysqli_fetch_assoc($qry);
    }
    else{
        header('location:login.php');
    }




    $link='';
    ($data['role']=='seller')?
        $link='<a id="link" href="productupload.php">Upload Product</a>':$link='';

    $title='Clothex';
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
       /**{background-color:black;color:white}*/
       .img img{}
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
                                        }
                                        if($tosee=='Item_onsell'){
                                            $qry = mysqli_query($con, "SELECT * FROM clothes c
                                            WHERE c.retailer_id = '$id'
                                            AND c.cid NOT IN (
                                                SELECT forcloth FROM orderproposal WHERE accept != 0 OR accept != 1
                                            )
                                            ORDER BY c.cid DESC;");
                                        }
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
                                
                                
                           
                                
                                //Show every clothes available in platform except one that we have uploaded
                                    else{ 
                                        
                                        
                                                                       
                                        //searching
                                         if (isset($_POST['search'])) {
                                            $tosearch = $_POST['search'];
    
                                          
                                          
                                            //searchhhhhhhhhhhhh
                                            $qry = mysqli_query($con, "SELECT * FROM clothes c
                                            WHERE c.retailer_id != '$id'
                                            AND gender LIKE '%$tosearch%' OR size LIKE '%$tosearch%' OR size LIKE '%$tosearch%'  OR type LIKE '%$tosearch%' OR brand LIKE '%$tosearch%' OR type LIKE '%$tosearch%' OR price<='$tosearch'  OR catagory like '$tosearch' OR description like '$tosearch'
                                            AND c.cid  NOT IN (
                                               SELECT forcloth FROM orderproposal WHERE accept = 0 OR accept = 1
                                            )
                                            ORDER BY c.cid DESC;");

                                            while ($data = mysqli_fetch_assoc($qry)){  
                                                echo '
                                                <a href="product.php?cloth_id=' . $data['cid'] . '"><div class="product">
                                                    <div class="img">
                                                        <img src="productimage/' . $data['image'] . '" title='.$data['cid'].'>
                                                    </div>
                                       
                                                        <div class="detail" id="type"><b>' . $data['type'] . '</b></div>
                                                        <div class="detail"><b>' . $data['price'] . '</b></div>
                                       
                                       
                                       
                                                </div></a>
                                                
                                                ';
    
                                                
    
                                            }
                                        }
                                        else{
                                    
                                        $qry = mysqli_query($con, "SELECT * FROM clothes c
                                        WHERE c.retailer_id != '$id'
                                        AND c.cid  NOT IN (
                                            SELECT forcloth FROM orderproposal WHERE  accept = 1 
                                        )
                                        ORDER BY c.cid DESC;");

                                        while ($data = mysqli_fetch_assoc($qry)){  
                                            echo '
                                            <a href="product.php?cloth_id=' . $data['cid'] . '"><div class="product">
                                                <div class="img">
                                                    <img src="productimage/' . $data['image'] . '" title='.$data['cid'].'>
                                                </div>
                                   
                                                    <div class="detail" id="type"><b>' . $data['type'] . '</b></div>
                                                    <div class="detail"><b>' . $data['price'] . '</b></div>
                                   
                                   
                                   
                                            </div></a>
                                            
                                            ';

                                            

                                        }
                                    }
                                
                                    }
                            
                               
                               
                            
                            

                        
                    ?>

                        



                        
                    </div>

                </div>


            </div>
        </div>
    
</body>
</html>
