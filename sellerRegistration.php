
<?php
   session_start();

   if(isset($_SESSION['sellerid'])||isset($_SESSION['userid'])){
        include_once('databaseconnection.php');
        //if(isset($_SESSION['']))
        if(isset($_POST['submit'])){
             $CitizenshipNo =mysqli_real_escape_string($con,ucwords($_POST['CitizenshipNo']));
            $issueDate = mysqli_real_escape_string($con,ucwords($_POST['issueDate']));;
         
        }
    
 
        $newname='';
        if(isset($_FILES['citizenshipImg'])) {
            $imgname = $_FILES['citizenshipImg']['name'];
            $imgtemp = $_FILES['citizenshipImg']['tmp_name'];
            $imgtype = $_FILES['citizenshipImg']['type'];
            $extension = pathinfo($imgname, PATHINFO_EXTENSION);
 
 
            $replaced = str_replace(' ', '-', $CitizenshipNo);
            $newname =  $replaced . '.' . $extension;
            $a = move_uploaded_file($imgtemp, "sellerDocument/" . $newname);
        }
        if($newname!=''&&$CitizenshipNo!=''&&$issueDate!=''){

            $sellerid=$_SESSION['sellerid']??$_SESSION['userid']??null;

            $sql = "INSERT INTO sellerinfo(sellerId, citizenshipNo, citizenshipImg, issueDate) VALUES('$sellerid', '$CitizenshipNo', '$newname','$issueDate')";
            $qry=mysqli_query($con,$sql);

            if($qry){
                header('location: login.php');
            }
            
           

        }
        else{
         //echo$_SESSION['sellerid'];
        }
   }
   else{
    echo"no_sessioon";
   }
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller_Registration </title>
    
    <link rel="stylesheet" href="css/forms.css">
</head>
<style>
     body{ 
     display: flex;
    justify-content: right;}
    #msg1{font-size:10px;color:red;}
    .container{background-color:white;opacity: 1;width:100vw}
    legend{background-color: #eeeeee;text:bold}
    table{text-align:left};
    .form{
        display:flex;
        justify-content:center;
        align-items:center;
    }
   

</style>
<body>
    <div class="container">
        <div class="heading">
            <div class="logo">


            </div>
          
        </div>
        <div class="form">
            <form name="myform" onsubmit="return validateForm()"  method="Post" enctype="multipart/form-data" >
            <fieldset>
                    <table>
                    
                    <legend><b>Seller-Registration</b></legend>
                    <h1>Fill the Detail</h1>
                    <table>
                        <tr>
                            <th><label for="citizenship"><b>Citizenship-No</b></label></th>
                            <td><input type="number" id="citizenship"name="CitizenshipNo"><br></td>
                        </tr>

                        <tr>
                            <th><label for="issueDate"><b>Issue Date</b></label></th>
                            <td><input type="date" name="issueDate"><br></td>
                        </tr>
                        <tr>
                            <th><label for="citizenshipImg"><b>Citizenship Image</b></label></th>
                            <td><input type="file" accept=".jpg,.png"name="citizenshipImg"><br></td>
                        </tr>

                       
                        
                    </table>
                    <div class="button_sanga">
                        <div class="button"><button type="submit" name="submit" id="submit">Submit</button></div>
                        <div class="link">Skip for now? <a href="login.php"><b>Login</b></a></div>
                    </div>
                   
                    <span id="msg1"><b><?php if(isset($msg)){echo $msg;}?></b></span>
                </fieldset>
            </form>
        </div>
    </div>


    <script>
        /*function validateForm(){
          
            var email = document.forms["myform"]["email"].value;
            var password = document.forms["myform"]["password"].value;
           
            
            
           if(email==""||password==""){
           
                alert("Please enter both email and password");
                return false;


              
           }


        }*/
               
    </script>
    
</body>
</html>