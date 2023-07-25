<?php
    include('session.php');
    include_once('databaseconnection.php');
   
    $cloth_id='';$msg='';
    if(isset($_GET['cloth_id'])){
        $cloth_id=$_GET['cloth_id'];
        //$sqlpost="SELECT * FROM Users u JOIN  content c ON u.id=c.createrid ORDER BY newsid DESC"; 
       $qry=mysqli_query($con,"SELECT * FROM User u JOIN  clothes c ON u.uid=c.retailer_id where cid=$cloth_id");
       $data=mysqli_fetch_assoc($qry);



       if(isset($_POST['submit'])){
            $byperson=$_SESSION['userid'];
            $forcloth = $cloth_id;
            $district=mysqli_real_escape_string($con,ucwords($_POST['district']));
            $Localgov=mysqli_real_escape_string($con,ucwords($_POST['gov']));
            $ward=mysqli_real_escape_string($con,$_POST['ward']);
            $purposalprice=mysqli_real_escape_string($con,$_POST['cprice']);
            $pdate = date("j M Y");
            

            if($byperson !='' && $forcloth !='' && $district !='' && $Localgov != '' && $ward != '' && $purposalprice !='' && $pdate!=''){

                $sql="INSERT INTO orderproposal
                    (byperson, forcloth,district,localgov,ward,proposalprice,pdate,accept)
                    VALUES('$byperson','$forcloth','$district','$Localgov','$ward','$purposalprice','$pdate',0)";

                    if($sql){
                        $qry=mysqli_query($con,$sql);

                            if($qry){
                                $msg="Your purposal have been submitted.";
                            }

                    }
                    $msg="Sql error happen";
            }
            $msg="Please enter every detail";
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
                        <h1>Upload By <?php echo $data['name'];echo $cloth_id;?></h1>
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
                                    <option value="kavre">Kavre</option>
                                    <option value="sinduli">Sindhuli</option>
                                    <option value="jhapa">Jhapa</option>
                                    <option value="morang">Morang</option>
                                    <option value="sunsari">Sunsari</option>
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
