<?php
include_once('session.php');

include_once('databaseconnection.php');

if(isset($_SESSION['role'])){
  $role=$_SESSION['role'];
  if($role!='seller'){
    header('Location:home.php');
  }
}
else{
    header('Location:home.php');
  }


$msg='';

 
        if(isset($_POST['submit'])){

   
            $seller=$_SESSION['userid'];
            $img='';
            $gender=$_POST['gender'];
            $catagory=$_POST['catagory'];

            $type=$_POST['type'];
            $size=$_POST['size'];
            $fiber=$_POST['fiber'];
            $brand=$_POST['brand'];
            $price=$_POST['price'];
            $description=$_POST['description'];
            $date = date("j M Y");

            $newname = '';

            if ($seller != '' && $gender != '' && $catagory != ''  && $type != '' && $size != '' && $fiber != ''&& $brand != ''&& $price != ''&& $description != '') {
                if (isset($_FILES['image'])) {
                    $imgname = $_FILES['image']['name'];
                    $imgtemp = $_FILES['image']['tmp_name'];
                    $imgtype = $_FILES['image']['type'];
                    $extension = pathinfo($imgname, PATHINFO_EXTENSION);
                    $date = date('YmdHisv'); // e.g., 20230719123456789)
                
                    $imgname = str_replace(' ', '-', $imgname);
                    $newname = $seller . '_' . $date . '.' . $extension;
                    $a = move_uploaded_file($imgtemp, "productimage/" . $newname);
                } 
                else{
                    echo "hohrefia oiv aofvaiofvodj vhafuo ha0ifio hio io  doi jgio p";
                }  
            
            

        
                    $sql="INSERT INTO clothes(retailer_id,gender,catagory,type,size,fiber,brand,price,description,date,image) 
                    VALUES('$seller','$gender','$catagory','$type','$size','$fiber','$brand','$price','$description','$date','$newname')";

                    $qry=mysqli_query($con,$sql);


                    if($qry){
                        header('Location:home.php');
                    }

            }
        }


    

    
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload_Product</title>
    <link rel="stylesheet" href="css/productUpload.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        .rightHead .topic {
            text-align: center;
        }
        .searchMenue{display:none}
    </style>
</head>
<body>
    <div class="container">
        <div class="innercontainer">
            
            <?php 
            //Left part
            $link='profile.php';
            $id=$_SESSION['userid'];
            include_once('left.php')
            ?>

            <div class="right">
                
                  <?php include_once('header.php');?></div>


                <div class="topic"><h1>Upload your Product<h1></div>
                <div class="form">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="upload">
                            <input type="file" class="inputs" name="image" accept="image/*"><br>
                        </div>


                        <div class="select">
                           
                            <select id="dress-type" name="type">
                                <option value="" disabled selected>-- Select a Dress Type --</option>
                                <option value="Shirt">Shirt</option>
                                <option value="T-shirt">T-shirt</option>
                                <option value="Paint">Paint</option>
                                <option value="coat">coat</option>
                                <option value="Jacket">Jacket</option>
                                <option value="Hoodie">Hoodie</option>
                                <option value="Vest">Vest</option>
                                <option value="Sari">Sari</option>
                                <option value="kurtha">kurtha</option>
                                <option value="lehenga">lehenga</option>
                               
                                <option value="shoes">Shoes</option> 
                                <option value="sandel">Sandel</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                       

                        <div class="select">
                          
                          <select id="dress-category" name="catagory">
                              <option value="" disabled selected>-- Select a Dress Category --</option>
                              <option value="casual">Casual</option>
                              <option value="Formal">Formal</option>
                              <option value="unisex">party</option>
                              <option value="sports">Sports</option>
                              
                          </select>
                      </div>


                        <div class="select">  
                          <select id="gender" name="gender">
                            <option value="" disabled selected>Applicable for.....</option>
                              <option value="men">Men</option>
                              <option value="women">Women</option>
                              <option value="unisex">Unisex</option>
                            
                          </select>
                      </div>


                  

                      



                        



                      
                        </div>


                        
                        <div class="select">
                            
                            <select id="size" name="fiber">
                                <option value="" disabled selected>-- Select Fiber used --</option>
                                <option value="silk">Silk</option>
                                <option value="cotton">Cotton</option>
                                <option value="jeanse">jense</option>
                                <option value="leather">Leather</option>
                                <option value="cotrise">Cotrise</option>
                                <option value="Polyester">Polyester</option>
                                <option value="Wool">Wool</option>
                                <option value="Nylon">Nylon</option>
                                <option value="Polyester">Polyester</option>
                                <option value="other">other</option>
                            </select>
                        </div>


                        <div class="select">
                            
                            <select id="size" name="size">
                                <option value="" disabled selected>-- Select a Size --</option>
                                <option value="small">Small</option>
                                <option value="medium">Medium</option>
                                <option value="large">Large</option>
                                <option value="xl">Extra Large</option>
                            </select>
                        </div>



                        <div>
                          
                            <input type="text" id="brand" name="brand" placeholder="Brand" required>
                            <input type="number" placeholder="Your price" name="price" id="price"min="100">
                        </div>

                        <div>
                           
                            <textarea id="description" name="description" placeholder="Description or Key Words for Searching Purpose" required></textarea>
                        </div>


                        <div>
                          
                        </div>

                        <button type="submit" onclick="return conformUpload()"name="submit">Upload Product</button>
                        <h3><?php echo $msg; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
    function conformUpload(){
        var isConfirmed = confirm('Are you sure you want upload the product?');
        if (isConfirmed) {
           return true }
        // Return false to cancel the default link behavior if not confirmed
        return false; 

    }
</script>

    
</body>
</html>
