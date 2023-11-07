<?php
include_once('session.php');
    include_once('databaseconnection.php');
   
    $cloth_id='';$msg='';
    if(isset($_GET['cloth_id'])){
        $cloth_id=$_GET['cloth_id'];
        //$sqlpost="SELECT * FROM Users u JOIN  content c ON u.id=c.createrid ORDER BY newsid DESC"; 
       $qry=mysqli_query($con,"SELECT * FROM User u JOIN  clothes c ON u.uid=c.retailer_id where cid=$cloth_id");
       $data=mysqli_fetch_assoc($qry);


    if($data['retailer_id']==$_SESSION['userid']){
        //show current status of it
        //for now simlyredirect to index
        header("Location: status.php?id=" . $_SESSION['userid']);


       
        
    }
    else{
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
                               
                                    $time=date('Y-m-d H:i:s');
                                    $destination=$data['retailer_id'];
                                   


                                    $subject="Sent proposal";

                                    
                                    $sql="INSERT into notification(destination,source,subject,time)Values('$destination','$byperson','$subject','$time')";
                                    $qry=mysqli_query($con,$sql);
                            }

                    }
                    $msg="Sql error happen";
            }
            $msg="Please enter every detail";
       }
    }
}
    $link='';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/prodct.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        *{padding:0px;margin:0px}
        .searchMenue{display:none;}
       .p-container{display:flex;width:100%;height:50vh; background-color:red}
       .image{width:60%};
       button{
            padding: 10px 20px;
            font-size: 20px;
            background-color: #FF5733;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

      img{border-radius:10px};
       .detailAndOrder{display:flex;width:70vw; height:50vw;background-color:yellow}
       .product-detail{ background-color:red}
       .product-detail{}
       table{border:1px solid white;border-radius:12px;border-collapse:collapse;width:80%;font-size:26px;color:black;text-align:center}

  
        ttr:hover{background-color: brown;}
        .imgandform{display:flex;justify-content:space-around;background-color:#e7e5e1;margin:10px;border-radius:10px;padding:10px}

       
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


                   

            <div class="pcontainer">
                
                    <div class="imgandform"><div class="img"><img height="300px" src="productimage/<?php echo $data['image'];?>" title="<?php echo $data['name'];?>" ></div>
                    <div class="form">
                            <form method="POST">
                                
                            <select id="province">
                                <option value="" disabled selected>-- Select provience --</option>
                                <option value="koshi">Koshi</option>
                                <option value="madesh">Madesh</option>
                                <option value="bagmati">Bagmati</option>
                                <option value="gandaki">Gandaki</option>
                                <option value="lumbini">Lumbini</option>
                                <option value="karnali">Karnali</option>
                                <option value="sudurpaschim">Sudurpaschim</option>
            

                            </select>

        <!-- District Dropdown -->
       
                            <select id="district"name="district" disabled>
                                <option value="" disabled selected>-- Select District --</option>
                            </select>
                            <input type="text" placeholder ="Local Government " value="" name="gov"><br>
                                
                            <input type="number" placeholder="Ward number" name="ward">
                            <input type="text" placeholder="tole" name="tole">

                                    


                               

                            <input type="number" placeholder ="Enter your Price" name="cprice"><br>
                            <button type="submit" name="submit" id="submit">Send proposal</button>

                        </form>
                    
                    
                    <div class="detail">
                    <?php  $gender=$data['gender'];?>
                    <?php echo $type=$data['type'];?>
                       
                        <table>
                           
                            <tr>

                                <td><?php  $size=$data['size'];?><td>
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
                        <?php echo $data['description'];?>
                                 
                     </div>


                     
                        </div> 
</div>
               
                    
                </div>
                <h1>You may also like</h1> 

                <div class="tocenter">
                    <div class="products">

                    <?php 

                    
                        $qry = '';


                              
                                
                                
                                //Show every clothes available in platform except one that we have uploaded
                                       
                                    
                                $qry = mysqli_query($con, "SELECT *
                                FROM clothes c
                                WHERE c.gender = '$gender'
                                  AND (c.type = '$type'OR c.size='$size')
                                  AND c.retailer_id != '$id'
                                  AND c.cid!='$cloth_id'
                                  AND c.cid NOT IN (
                                    SELECT forcloth
                                    FROM orderproposal
                                    WHERE accept = 0 OR accept = 1
                                  )
                                ORDER BY c.cid DESC;
                                ");
                                

                                        while ($data = mysqli_fetch_assoc($qry)){  
                                            echo '
                                            <a href="product.php?cloth_id=' . $data['cid'] . '"><div class="product">
                                                <div class="img">
                                                    <img src="productimage/' . $data['image'] . '" title='.$data['cid'].'>
                                                </div>
                                   
                                                    <div class="detail" id="type"><b>' . $data['type'] . '</b></div>
                                                    <div class="detail"><b>' . $data['price'] . '</b></div>
                                   
                                   
                                   
                                            </div></a>
                                            
                                            ';

                                            

                                        }
                                    
                                
                            
                            
                               
                               
                            
                            

                        
                    ?>

                        



                        
                    </div>

                </div>

            </div>
            
           
               
            </div>
           
        </div>
       
    </div>

    <script>
        const provinceSelect = document.getElementById("province");
        const districtSelect = document.getElementById("district");

        // Create an object to map provinces to districts
        const districtsByProvince = {
            koshi: ["bhojpur","dhankuta","illam","jhapa","khotang","morang","okheldhunga","panchthar","sankuwasabha", "sunsari","taplejung","udayapur"],
            madesh: ["parsa","bara","rautahat","sarlahi","mahotari","dhanusha","siraha","saptari"],
            bagmati:["bhaktapur","chitwan","dhading","dolakha","kathmandu","kavrepalanchok","lalitpur","makwanpur","nuwakot","ramechhap","rasuwa","sindhuli","sindupalchok"],
            gandaki:["baglung","gorkha","kaski","lamjung","manang","mustang","myagdi","nawalpur"],
            lumbani:["arghakhanchi","banke","bardiya","dang","east-rukum","gulmi","kapilvastu","palpa","parasi","pyuthan","rolpa","rupandehi"],
            karnali:["dailekh","dolpa","humla","jagarkot","kallikot","mugu","salyan","surkhet","west-rukum"],
            sudurpaschim:["achham","baitadi","bajhang","dadeldhura","darchula","doti","kailali","kanchanpur"]

            
        };

        provinceSelect.addEventListener("change", function () {
            // Enable the district dropdown
            districtSelect.disabled = false;

            // Clear existing options
            districtSelect.innerHTML = '<option value="" disabled selected>-- Select District --</option>';

            // Get the selected province
            const selectedProvince = provinceSelect.value;

            // district dropdown with districts related to the selected province
            districtsByProvince[selectedProvince].forEach((districtName) => {
                const option = document.createElement("option");
                option.value = districtName;
                option.textContent = districtName;
                districtSelect.appendChild(option);
            });
        });
    </script>
</body>
</html>
