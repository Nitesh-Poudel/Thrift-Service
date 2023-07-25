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
        ON c.retailer_id = u.uid
        WHERE u.uid = $id;");



        $data=mysqli_fetch_assoc($qry);}
    }
    else{
        header('location:login.php');
    }

    $link='';
    ($data['role']=='retailer')?
        $link='<a href="productupload.php">Upload Product</a>':$link='<a href="#">About us</a>';
   
?>


<?php 
    $msg='';$a='';
   if(isset($_POST['accept'])||isset($_POST['reject'])){
    $clothid='';$opid='';
       
            $clothid=$_POST['cid'];
            $opid=$_POST['opid'];
            $byperson = $_POST['byperson'];

            /*$qry=mysqli_query($con,"SELECT *
            FROM user u
            JOIN orderproposal op ON op.byperson = u.uid
            WHERE op.poid = $opid;");

            $data=mysqli_fetch_assoc($qry);*/


           
            if(isset($_POST['accept'])){
                $qry2=mysqli_query($con,"UPDATE orderproposal set accept = 1 WHERE poid=$opid");

                if($qry2){$qry3=mysqli_query($con,"UPDATE orderproposal set accept = 2 WHERE forcloth=$clothid and poid!=$opid");}
                //here 2 means reject 1 means accept 0 is neutrol,, acception 1 means rejection all same.
            }


            


           
            
           
            

          
   }

    
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
        line-height:10px;
        
       }
       #accept{
        color:aliceblue;
        font-size:20px;
        background-color:green;
        padding:5px;
       }

       #reject{
        color:aliceblue;
        font-size:20px;
        background-color:red;
        padding:5px;
       }

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
                        <a href="#"><li><i class="fa-solid fa-user"></i> Your Profile</li></a>
                        
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
                       
                        
                    if($data['accept']==0){
                        
                    echo'
                     
                        <div class="intro">
                            <div class="image"><div class="img"><img src="productimage/'.$data['image'].'"></div></div>
                            <div class="productdetail">
                                <div class="district"><h1>Proposal From : <b>'.$data['district'].'</b></h1></div>
                                <div class="lg"><h3>'.$data['localgov'].' - '.$data['ward'].' </h3></div>

                                <div class="reviews"><h3> Your Rate : '.$data['price'].'</h3></div>
                               
                                <div class="reviews"><h3> Proposed Rate : '.$data['proposalprice'].'</h3></div>
                        
                                <div class="description"><p>Lhuleluya  oream espan dispasitooream espan dispasito oream espan dispasitooream espan dispasitods in the naeke of the ramere etc loeam daster nirds in the naeke of the ramere etc.</p></div>
                                <div class="order">
                                    <form method="POST">
                                        <input type="hidden" name="cid" value='.$data['cid'].' >
                                        <input type="hidden" name="opid" value='.$data['poid'].' >
                                        <input type="hidden" name="byperson" value='.$data['byperson'].' >
                                      
                                        <button type="submit" id="accept" name="accept">' . ($data['accept'] == 1 ? "Accepted" : "Accept") . '</button>
                                        <button type="submit" id="reject" name="reject">Reject</button>  
                                        
                                    
                                    </form>
                                </div>

                                

                            </div>
                        </div>
                      
                        
                 


                   
                        ';
                    }
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
