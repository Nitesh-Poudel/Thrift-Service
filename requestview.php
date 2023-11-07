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
        WHERE u.uid = $id Order by poid desc;");



        




    }
    }
    else{
        header('location:login.php');
    }

    $link='';
   // ($data['role']=='seller')?
     //   $link='<a href="productupload.php">Upload Product</a>':$link='<a href="#">About us</a>';
   
?>


<?php 
    $msg='';$a='';
   if(isset($_POST['accept'])||isset($_POST['reject'])){
    $clothid='';$opid='';
       
            $clothid=$_POST['cid'];
            $opid=$_POST['opid'];
            $byperson = $_POST['byperson'];

            

           
            if(isset($_POST['accept'])){
                $qry2=mysqli_query($con,"UPDATE orderproposal set accept = 1 WHERE poid=$opid");

                if($qry2){$qry3=mysqli_query($con,"UPDATE orderproposal set accept = 2 WHERE forcloth=$clothid and poid!=$opid");}
                //here 2 means reject 1 means accept 0 is neutral,, acception 1 means rejection all same.


                $date=time();
                mysqli_query($con,"INSERT INTO orders (pid, acceptdate, complete, completedate) VALUES ($opid, '$date', 0, 0);");
            }

            if(isset($_POST['reject'])){

                mysqli_query($con,"UPDATE orderproposal set accept = 2 WHERE poid=$opid");
            }
        }

    
?>
   
<?php


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        .a{width:100%;height:100%;display:flex;}
        .outerintro{background-color:white;        }
       .contents{width:100%;height:90%;  overflow:scroll; font-size:small}
       .other{width:20%;height:100%;  background-color:white; border-radius:8px;   box-shadow: 5px 3px 18px 0px #888888; }
       .intro {width:100%}
       #accept{color:aliceblue; font-size:20px; background-color:green; padding:5px;}

       #reject{color:aliceblue; font-size:20px; background-color:red; padding:5px;}
        .productdetail{width:100%}
       .name{display:flex;width:100%; justify-content:space-between; border-radius:10px;border:none}
       .name img{border-radius:8px;  margin:5px; border:1px solid gray; cursor:pointer}
       .header{height:10px; }
       
.searchMenue{display:none;}
.intro .image img{width:90%;border-radius: 8px;box-shadow: 3px 3px 18px 0px #888888;
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
           
            <div class="a">
                <div class="contents">

                    <?php

                    while($data=mysqli_fetch_assoc($qry)){
                       
                        
                        if($data['accept']==0){
                            
                            //to get info about request sender.
                            if (isset($data['byperson'])) {
                                $qry3 = mysqli_query($con, "SELECT * FROM user WHERE uid=" . (int)$data['byperson']);
                                $reqsender = mysqli_fetch_assoc($qry3);
                            }
                        
                    echo'
                     
                        <div class="intro">
                            <div class="image"><div class="img"><a href="productimage/'.$data['image'].'"><img src="productimage/'.$data['image'].'"></a></div></div>
                            <div class="productdetail">
                                <div class="name"><h1>Proposal From : <b>'.$reqsender['name'].'</b></h1>
                                <img src="userimage/'.$reqsender['userimg'].'"width="30px">
                                </div>
                                <div class="district"><h2>  '.$data['district'].'</h2></div>
                                <div class="lg"><h3>'.$data['localgov'].' - '.$data['ward'].' </h3></div>

                                <div class="reviews"><h3> Your Rate : '.$data['price'].'</h3></div>

                               
                                <div class="reviews"><h3> Proposed Rate : '.$data['proposalprice'].'</h3></div>
                        
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
                 
                    
                </div></div>
         
            </div>







                </div>


            </div>
        </div>
    </div>
</body>
</html>
