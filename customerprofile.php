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
        WHERE  op.byperson = $id ;");



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
        .outerintro{background-color:white;        }
       .contents{width:100%;height:80%;  overflow:scroll;}
       .other{width:20%;height:100%;  background-color:white; border-radius:8px;   box-shadow: 5px 3px 18px 0px #888888; }
       .intro h1,h3{
       }

        .Accepted, .Rejected, .Not-Respond{color:white;background-color:green; text-align:center;height:50px;font-size:36px}
        .Rejected{background-color:red;}
        .Not-Respond{background-color:orange;}

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
                        <a href="<?php echo $_SESSION['role'].'profile.php?id='.$id;?>"><li><i class="fa-solid fa-user"></i> Profile </li></a>
                        
                        <?php echo $link;?>
                        <a href="#"><li><i class="fa-regular fa-gear"></i> Setting</li></a>
                        <a href="#"><li><i class="fa-solid fa-mobile"></i> Contact</li></a>
                        <a href="logout.php"><li><i class="fa-solid fa-mobile"></i> Logout</li></a>
                    </ul>
                </div>
            </div>
            <div class="right">
                <?php include_once('header.php');?>


               
            </div>
            <div class="a">
                <div class="contents">
                        
                    <?php
                   
                 
                    while($data=mysqli_fetch_assoc($qry)){
                       
                        $status='';
                        if($data['accept']==1){$status='Accepted';}if($data['accept']==2){$status='Rejected';}
                        if($data['accept']==0){$status='Not-Respond';}
                        
                    echo'
                     
                        <div class="intro">
                            <div class="image"><div class="img"><img src="productimage/'.$data['image'].'"></div></div>
                            <div class="productdetail">
                               
                                <div class="reviews"><h3> Price : '.$data['price'].'</h3></div>
                               
                                <div class="reviews"><h3> Proposed Rate : '.$data['proposalprice'].'</h3>
                                <h3> District : '.$data['district'].'</h3>
                                <h3>  '.$data['localgov'].'-'.$data['ward'].'</h3>
                               
                                </div>

                        
                                <div class="description"><p>Lhuleluya  oream espan dispasitooream espan dispasito oream espan dispasitooream espan dispasitods in the naeke of the ramere etc loeam daster nirds in the naeke of the ramere etc.</p></div>
                                <div class="'.$status.'">
                                   <b>'.$status.'</b>
                                </div>

                                

                            </div>
                        </div>
                      
                        
                 


                   
                        ';
                    }
                    
                    
                    
                    ?>
                 
                    
                </div>
                <div class="other">
                     <ul type="none">
                        <li><?php $msg;?></li>
                        <li></li>
                     </ul>
                </div>
            </div>







                </div>


            </div>
        </div>
    </div>
</body>
</html>
