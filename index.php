<?php
    include_once('session.php');
    include_once('databaseconnection.php');
$id='';
    if(isset($_SESSION['userid'])){


        $id=$_SESSION['userid'];
        $qry=mysqli_query($con,"SELECT * FROM user WHERE uid=$id");
        $data=mysqli_fetch_assoc($qry);
    }
    else{
        header('location:login.php');
    }

    $link='';
    ($data['role']=='retailer')?
        $link='<a href="productupload.php">Upload Product</a>':$link='<a href="">About us</a>';
    
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
       
    </style>
</head>
<body>
        <div class="container">
            <div class="innercontainer">
                <div class="left">

                    <div class="name"><h1>Clothex.</h1></div>

                    <div class="innerLeft">
                        <ul type="none">
                            <a href="#"><li><i class="fa-solid fa-house"></i> Home</li></a>
                            <a href="profile.php?id=<?php echo$id;?>"><li><i class="fa-solid fa-user"></i>Profile </li></a>

                            <?php echo $link;?>
                            <a href="#"><li><i class="fa-regular fa-gear"></i> Setting</li></a>
                            <a href="#"><li><i class="fa-solid fa-mobile"></i> Contact</li></a>
                            <a href="logout.php"><li><i class="fa-solid fa-mobile"></i> Logout</li></a>
                        </ul>
                    </div>
                </div>
                <div class="right">
                    <?php include_once('header.php');?></div>

                    
                <div class="tocenter">
                    <div class="products">

                    <?php 
                        $qry = '';

                        if (isset($_POST['search'])) {
                            $tosearch = mysqli_real_escape_string($con, $_POST['search']);
                        
                            $qry = mysqli_query($con, "SELECT * FROM clothes WHERE gender LIKE '%$tosearch%' OR size LIKE '%$tosearch%' OR size LIKE '%$tosearch%'  OR type LIKE '%$tosearch%' OR brand LIKE '%$tosearch%' OR type LIKE '%$tosearch%' OR price<='$tosearch' Order by cid desc");

                        } 
                        else {
                        
                            $qry = mysqli_query($con, "SELECT * FROM clothes ");
                        }
                        
                        
                        
                        //to check and filter ordered clothes.
                        
              

                            while ($data = mysqli_fetch_assoc($qry)) {
                                $cltid=$data['cid'];

                                $qry2 = mysqli_query($con,"SELECT * FROM orderproposal where forcloth= $cltid ");
                                $accepted=mysqli_fetch_assoc($qry2);

                              

                              
                             
                                if(isset($accepted['accept'])!=1){ 
                                //if(isset($accepted['byperson'])!==$id){//TO show only those clothes whose proposal in not accepted
                                        
                                         echo '
                                         <a href="product.php?cloth_id=' . $data['cid'] . '"><div class="product">
                                             <div class="img">
                                                 <img src="productimage/' . $data['image'] . '" title='.$data['cid'].'>
                                             </div>
                                
                                                 <div class="detail" id="type"><b>' . $data['type'] . '</b></div>
                                                 <div class="detail"><b>' . $data['price'] . '</b></div>
                                
                                
                                
                                         </div></a>';
                                       
                                        
                                        }
                                    

                                //}
                              
                                }
                               
                            
                            

                        
                    ?>

                        



                        
                    </div>

                </div>


            </div>
        </div>
    
</body>
</html>
