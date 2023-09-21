
<?php
session_start();
include_once('databaseconnection.php');
$msg='';
if(isset($_POST['changepw'])){
   
    $new_password =  mysqli_real_escape_string($con,$_POST['new_password']);
    $confirm_password =   mysqli_real_escape_string($con,$_POST['conform_password']);

    if (!empty($new_password) && !empty($confirm_password)) {
        if ($new_password == $confirm_password) {

            $encriptedPassword=md5($new_password);
            $tochange= $_SESSION['userId'];
           $update=mysqli_query($con, "UPDATE user SET password= '$encriptedPassword' WHERE uid=$tochange");
           if($update){
            header('Location:login.php');
           }
        } else {
            $msg = 'Passwords do not match';
        }
    } 
    else {
        $msg = 'Please enter the details';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    
    <link rel="stylesheet" href="css/forms.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
    #msg1{
        font-size:10px;
        color:red;
    }
.container{
   
    background-color:white;
    opacity: 1;
}
    body{
        background:url('images/cover.png');
        opacity: 1;
        background:cover;
    }
</style>
<body>
    <div class="container">
        <div class="heading">
            <div class="logo">


            </div>
          
        </div>
        <div class="form">
            <form name="myform" onsubmit="return validateForm()" action="" method="Post"  >
                <div class="title" style="font-size: 12px"><b>We will sent OTP in your Email</b></div>
                <table>
                    <tr>
                        <td> <label for="new_password"><b>New Password </b></label></td>
                        <td><input type="password" placeholder="_________________________" class="inputs" name="new_password" id="new_password">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="conform_password"><b>Confirm Password</b></label>
                        </td>
                        <td><input type="password" placeholder="_________________________" class="inputs" name="conform_password" id="                <input type="password" placeholder="_________________________" class="inputs" name="conform_password" id="email"><br>
                        </td>
                    </tr>
                </table>
            
                <div class="button_sanga">
                    <div class="button">  <button type="submit" name="changepw" id="submit">Save</button></div>
                    <div class="link">Don't have an Account? <a href="userregistration.php">Register</a></a></div>

                </div>

                <span id="msg1"><b><?php if(isset($msg)){echo $msg;}?><b></span></br>
               
                    
            </form>
        </div>
    </div>


    <script>
       
    </script>
    
</body>
</html>