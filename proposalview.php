<?php
    include_once('session.php');
    include_once('databaseconnection.php');

    $qry='';$data='';
    if(isset($_SESSION['userid'])) {
        $uid=$_SESSION['userid'];
       
         if(isset($_GET['accept'])) {
            $accept=$_GET['accept'];

            $qry=mysqli_query($con,"SELECT *
            FROM orderproposal op
            INNER JOIN clothes c 
            ON op.forcloth = c.cid
            INNER JOIN User u 
            ON c.retailer_id = u.uid
            WHERE  op.byperson = $uid AND op.accept=$accept ;");
         }

         else{
      
            $qry=mysqli_query($con,"SELECT *
            FROM orderproposal op
            INNER JOIN clothes c 
            ON op.forcloth = c.cid
            INNER JOIN User u 
            ON c.retailer_id = u.uid
            WHERE  op.byperson = $uid;");
         }


        
    }
    else{
        header('location:login.php');
    }

    $link='';
    ($_SESSION['role']=='seller')?
        $link='<a href="productupload.php">Upload Product</a>':$link='';
   
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
        .searchMenue{display:none}
        .a{width:100%;height:100%;display:flex;}
        .outerintro{background-color:white;        }
       .contents{width:100%;height:80%;  overflow:scroll;}
       .other{width:20%;height:100%;  background-color:white; border-radius:8px;   box-shadow: 5px 3px 18px 0px #888888; }
       .intro h1,h3{
       }

        .Accepted, .Rejected, .Not-Respond{color:white;background-color:green; text-align:center;height:23px;font-size:16px}
        .Rejected{background-color:red;}
        .Not-Respond{background-color:orange;}
        #l5{color:gold;}

        .container .innercontainer .right .intro {
    
    
    height: auto;
    
}
.image img{height:164px;width:auto}

.seller_and_item{display:flex;justify-content:space-between}
.seller img{border-radius:50%;width:40px}
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
            <div class="a">
                <div class="contents">
                        
                    <?php
                   
                 
                    while($data=mysqli_fetch_assoc($qry)){
                       
                        $status='';
                        if($data['accept']==1){$status='Accepted';}if($data['accept']==2){$status='Rejected';}
                        if($data['accept']==0){$status='Not-Respond';}

                        if($data['accept']=='1'){$name=$data['name'];}
                        
                    echo'
                    
                        <div class="intro">

                            <div class="image"><div class="img"><img src="productimage/'.$data['image'].'"></div></div>
                            <div class="productdetail">
                            

                            <div class="seller_and_item">
                                <div class="item">';



                                   if(isset($name)){
                                    if(isset($data['accept'])&&$data['accept']==1){
                                           echo '<div>
                                                <h3>Accepted By: ' . $data['name']  .';</h3>
                                                
                                           </div>';

                                            }

                                    }

                                   echo' <div ><h3> Price : '.$data['price'].'</h3></div>
                                
                                    <div class="reviews"><h3> Proposed Rate : '.$data['proposalprice'].'</h3>
                                    <h3> District : '.$data['district'].'</h3>
                                    <h3>  '.$data['localgov'].'-'.$data['ward'].'</h3>
                                
                                    </div>
                                    
                                    </div>';
                                
                                    if(isset($data['accept'])&&$data['accept']==1){
                                        echo
                                        '<div class="seller">
                                            <a href="tel:'.$data['phone'].'"><img src="images/call.png"width="100px"></br><b>Call</b></a>
                                        </div>
                                        <div class="seller">
                                            <a href="mailto:'.$data['email'].'"><img src="images/mail.png"width="100px"></br><b>Mail</b></a>
                                        </div>
                                     ';
                                    }
                                echo'
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
                
            </div>







                </div>


            </div>
        </div>
    </div>
</body>
</html>
