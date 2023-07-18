<?php
    session_start();
    include_once('databaseconnection.php');
    
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
        $link='<a href="productupload.php?id='.$id.'">Upload Product</a>':$link='<a href="#">About us</a>';
    
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
                        <a href="#"><li><i class="fa-solid fa-user"></i> Your Profile</li></a>
                        
                        <?php echo $link;?>
                        <a href="#"><li><i class="fa-regular fa-gear"></i> Setting</li></a>
                        <a href="#"><li><i class="fa-solid fa-mobile"></i> Contact</li></a>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="header">
                    <div class="moto">
                        <h1>Clothes</h1>
                        <h6>From Local market</h6>
                    </div>
                    
                    <div class="searchMenue">
                        <form method="post">
                            <input type="text" placeholder="search product..." name="search">
                            <button type="submit" name="search" id="search"><i class="fa-thin fa-magnifying-glass"></i></button>
                        </form>
                    </div>

                    <div class="extra">
                        <ul type="none">
                            <div class="list">
                                <li><a href="#"><i class="fa-sharp fa-solid fa-bell"></i></a><li>
                                <li><a href="#"><i class="fa-solid fa-messages"></i></a><li>
                                <li><a href="#"><img src="userimage/<?php echo $data['extra'];?>"></a><li>
                            </div>
                        </ul>
                    </div>


               
                </div>
                
                <div class="intro">
                    <div class="image"><div class="img"><img src="userimage/<?php echo $data['extra'];?>"></div></div>
                    <div class="productdetail">
                        <div class="productName"><h1>Welcome to our retail service<b><?php echo ' '.$data['name'];?></b></h1></div>
                        <div class="reviews"><h6>100views</h6></div>
                        <div class="description"><p>Lhuleluya  oream espan dispasitooream espan dispasito oream espan dispasitooream espan dispasitods in the naeke of the ramere etc loeam daster nirds in the naeke of the ramere etc.</p></div>
                        <div class="order"><form><button type="Submit" name="order" id="order-btn">Order<button></form></div>
                    </div>
                </div>

                
                <div class="products">
                    <div class="product">
                        <div class="img">
                            <img src="images/6.png">
                        </div>
                        <a href="product.php"><div class="detail">Get Detail</div></a>
                    </div>



                    <div class="product">
                        <div class="img">
                            <img src="images/3.png">
                            
                        </div>
                        <div class="detail"><a href="productDetail.php">Get Detail</a></div>
                    </div>



                    <div class="product">
                        <div class="img">
                            <img src="images/4.png">
                        </div>
                        <div class="detail"><a href="productDetail.php">Get Detail</a></div>
                    </div>


                    <div class="product">
                        <div class="img">
                            <img src="images/5.png">
                        </div>
                        <div class="detail"><a href="productDetail.php">Get Detail</a></div>
                    </div>


                    <div class="product">
                        <div class="img">
                            <img src="images/6.png">
                        </div>
                        <div class="detail"><a href="productDetail.php">Get Detail</a></div>
                    </div>


                    <div class="product">
                        <div class="img">
                            <img src="images/2.png">
                        </div>
                        <div class="detail"><p>Rs 1300</p><a href="productDetail.php">Get Detail</a></div>
                    </div>



                 
                </div>


            </div>
        </div>
    </div>
</body>
</html>
