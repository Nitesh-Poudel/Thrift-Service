<?php
session_start();
include_once('databaseconnection.php');

if(isset($_SESSION['role'])!='retailer'){
    header('location:index.php');
   
}
$msg='';

 $sql =   "SELECT * FROM balance where rid=$_SESSION[userid]";
 $qry=mysqli_query($con,$sql);


    $data=mysqli_fetch_assoc($qry);
 
    if ($data['amt']>200){

if(isset($_POST['submit'])){

   
    $retailer=$_SESSION['userid'];
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

    if ($retailer != '' && $gender != '' && $catagory != ''  && $type != '' && $size != '' && $fiber != ''&& $brand != ''&& $price != ''&& $description != '') {
        if (isset($_FILES['image'])) {
            $imgname = $_FILES['image']['name'];
            $imgtemp = $_FILES['image']['tmp_name'];
            $imgtype = $_FILES['image']['type'];
            $extension = pathinfo($imgname, PATHINFO_EXTENSION);
            $date = date('YmdHisv'); // e.g., 20230719123456789)

            $imgname = str_replace(' ', '-', $imgname);
            $newname = $retailer . '_' . $date . '.' . $extension;
            $a = move_uploaded_file($imgtemp, "productimage/" . $newname);
        }   
    


        
        $sql="INSERT INTO clothes(retailer_id,gender,catagory,season,type,size,fiber,brand,price,description,date,image) 
        VALUES('$retailer','$gender','$catagory','','$type','$size','$fiber','$brand','$price','$description','$date','$newname')";

        $qry=mysqli_query($con,$sql);
        
        
        if($qry){
            mysqli_query($con,"UPDATE balance set amt = amt-200 WHERE rid=$retailer");
            $msg="Product upload sucessfully";
        }

    }
}

else{
    $msg="Your balance is less than mininum charge";
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


                <div class="topic"><h1>Upload your Product<h1></div>
                <div class="form">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="upload">
                            <input type="file" class="inputs" name="image" accept="image/*"><br>
                        </div>


                       
                        <div class="select">  
                          <select id="gender" name="gender">
                            <option value="" disabled selected>Select gender for.....</option>
                              <option value="men">Men</option>
                              <option value="women">Women</option>
                              <option value="unisex">Unisex</option>
                            
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
                           
                            <select id="dress-type" name="type">
                                <option value="" disabled selected>-- Select a Dress Type --</option>
                                <option value="summer">Shirt</option>
                                <option value="spring">T-shirt</option>
                                <option value="autumn">Paint</option>
                                <option value="winter">Jacket</option>
                                <option value="summer">Sari</option>
                                <option value="spring">kurtha</option>
                                <option value="autumn">lehenga</option>
                                <option value="winter">Hoodie</option>
                                <option value="summer">Vest</option>
                            </select>
                        </div>



                      
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



                        <div class="select">
                            
                            <select id="size" name="fiber">
                                <option value="" disabled selected>-- Select Fiber used --</option>
                                <option value="silk">Silk</option>
                                <option value="cotton">Cotton</option>
                                <option value="jeanse">jense</option>
                                <option value="cotrise">Cotrise</option>
                            </select>
                        </div>

                        <div>
                          
                            <input type="text" id="brand" name="brand" placeholder="Brand" required>
                            <input type="number" placeholder="Your price" name="price" id="price">
                        </div>

                        <div>
                           
                            <textarea id="description" name="description" placeholder="Description or Key Words for Searching Purpose" required></textarea>
                        </div>


                        <div>
                          
                        </div>

                        <button type="submit" name="submit">Upload Product</button>
                        <h3><?php echo $msg; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>/*
    document.addEventListener('DOMContentLoaded', function () {
        const genderSelect = document.getElementById('gender');
        const dressCategorySelect = document.getElementById('dress-category');
        const dressTypeSelect = document.getElementById('dress-type');

        const dressTypes = {
            men: ['Shirt', 'T-Shirt', 'Pants'],
            women: ['Sari', 'Kurta', 'T-Shirt', 'Pants', 'Lehenga'],
            unisex: ['T-Shirt', 'Jeans', 'Jacket'],
       
        };

        genderSelect.addEventListener('change', function () {
            const selectedGender = this.value;
            dressCategorySelect.selectedIndex = 0;
            dressTypeSelect.innerHTML = '';

            if (selectedGender !== '') {
                const types = dressTypes[selectedGender];
                types.forEach(function (type) {
                    const option = document.createElement('option');
                    option.text = type;
                    dressTypeSelect.add(option);
                });
            }
        });
    });*/
</script>

    
</body>
</html>
