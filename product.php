<?php

    include_once('databaseconnection.php');
   
    $id='';
    if(isset($_GET['cloth_id'])){
        $cloth_id=$_GET['cloth_id'];
        //$sqlpost="SELECT * FROM Users u JOIN  content c ON u.id=c.createrid ORDER BY newsid DESC"; 
       $qry=mysqli_query($con,"SELECT * FROM User u JOIN  clothes c ON u.uid=c.retailer_id where cid=$cloth_id");
       $data=mysqli_fetch_assoc($qry);



       if(isset($_POST['submit'])){
            $district=$_POST['district'];
            $Localgov=$_POST['gov'];
            $ward=$_POST['ward'];
            $purposrd_rate=$_POST['cprice'];
            
       }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="css/productUpload.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
       
    </style>
</head>
<body>
    <div class="container">
        <div class="innercontainer">
            
            <?php 
            //Left part
            include_once('left.php')
            ?>

            <div class="right">
                
                   <?php include_once('header.php');?></div>

            <div class="pdetail">
                <div class="nameImg">
                    <div class="img"><img src="productimage/<?php echo $data['image'];?>" title="<?php echo $data['name'];?>"></div>
                    <div class="detail">
                        <h1>Upload By <?php echo $data['name']; echo $data['uid'];?></h1>
                        <table>
                            <tr>
                                <th>Dress type</th>
                                <td><?php echo $data['type'];?></td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td><?php echo $data['gender'];?><td>
                            </tr>
                            <tr>
                                <th>Size</th>
                                <td><?php echo $data['size'];?><td>
                            </tr>
                            <tr>
                                <th>Brand</th>
                                <td><?php echo $data['brand'];?></td>
                            </tr>
                            <tr>
                                <th>Fiber</th>
                                <td><?php echo $data['fiber'];?></td>
                            </tr>
                            <tr id="price">
                                <th>Price</th>
                                <td><?php echo $data['price'];?></td>
                            </tr>
                        </table>     
                                 
                     </div>


                     <div class="form">
                            <form method="POST">
                                
                                
                                <select id="" name="district">
                                    <option value="" disabled selected>-- Select District --</option>
                                    <option value="kathmandu">Kathmandu</option>
                                    <option value="bhaktapur">Bhaktapur</option>
                                    <option value="lalitpur">Lalitpur</option>
                                    <option value="cotrise">Kavre</option>
                                    <option value="silk">Sindhuli</option>
                                    <option value="cotton">Jhapa</option>
                                    <option value="jeanse">Morang</option>
                                    <option value="cotrise">Sunsari</option>
                                </select>

                                <input type="text" placeholder ="Local Government " name="gov"><br>
                                
                                    <input type="number" placeholder="Ward number" name="ward">
                               

                               

                                <input type="number" placeholder ="Enter your Price" name="cprice"><br>
                                <button type="submit" name="submit" id="submit">Send proposal</button>
                            </form>
                        </div> 
                </div>
            </div>
            

                
            </div>
        </div>
    </div>

    
</body>
</html>
