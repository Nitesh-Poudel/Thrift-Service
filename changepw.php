
<?php

include_once('databaseconnection.php');
include_once('session.php');

$msg='';$otp='';
$tochange= $_SESSION['userid'];

//changing from regular process
if(isset($_GET['task'])){
    if($_GET['task']=='change'){
        $change='<tr><td> <label for="current_password"><b>Password </b></label></td>
        <td><input type="password" placeholder="_________________________" class="inputs" name="current_password" id="current_password"></tr>';

        


    }
}

//changing password from otp:
if (isset($_SESSION['otp']) || (isset($_GET['task']) && $_GET['task'] == 'change')){

   
if(isset($_POST['changepw'])){
   
    $new_password =  mysqli_real_escape_string($con,$_POST['new_password']);
    $confirm_password =   mysqli_real_escape_string($con,$_POST['conform_password']);
    if(isset($_GET['task'])){$current_password=  mysqli_real_escape_string($con,$_POST['current_password']);}

   if(isset($_GET['task'])){
    if($_GET['task']=='change'){
    
        if (!empty($new_password) && !empty($confirm_password)&& !empty($current_password)) {

            if ($new_password == $confirm_password) {

                $encriptedPassword=md5($new_password);
                $encripted_current_Password=md5($current_password);
              
                $update=mysqli_query($con, "UPDATE user SET password= '$encriptedPassword' WHERE password='$encripted_current_Password'AND uid='$tochange'");
           
                if($update){
                    //setting_notification
                    $time=date('Y-m-d H:i:s');
                    $destination=$tochange;
                    $subject="Password updated sucessfully";

                    $sql="INSERT into notification(destination,source,subject,time)Values('$destination','','$subject','$time')";
                    $qry=mysqli_query($con,$sql);

                    if($sql){
           
                        echo"<script>alert('Password updated successfully.'); </script>";
                        header('Location:logout.php');
                    }
                    else{ 
                        echo"<script>alert('Password updated unsuccess.');</script>";
                    }
                }
       
            } 
        }
    $msg='Please enter all information';

   }
   
}
   
        if(!isset($_GET['task'])){
            if (!empty($new_password) && !empty($confirm_password)) {
            
                       if ($new_password == $confirm_password) {
                
                    $encriptedPassword=md5($new_password);
                    $tochange= $_SESSION['userid'];
                    $update=mysqli_query($con, "UPDATE user SET password= '$encriptedPassword' WHERE uid=$tochange");
                
                    if($update){
                        $date=date('Y-m-d H:i:s');
                        $destination=$tochange;
                        $subject="Password updated sucessfully";
    
                        $sql="INSERT into notification(destination,source,subject,time)Values('$destination','','$subject','$date')";
                        $qry=mysqli_query($con,$sql);
    
                        if($sql){
               
                            echo "<script>
                                alert('Password updated successfully.');
                                window.location.href = 'logout.php';
                            </script>";
                            
                        }
                        else{ 
                            echo"<script>alert('Password updated unsuccess.');</script>";
                        }
                    }
                
                } 
            }
            else {
                $msg = 'Please enter the details';
            }
        }

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
                <div class="title" style="font-size: 12px"><b>Enter detail to change password</b></div>
                <fieldset><legend><b>Change Password</b></legend>
                <table>
                    <tr>
                        <?php if(isset($_GET['task'])){echo$change;}?>
                        <td> <label for="new_password"><b>New Password </b></label></td>
                        <td><input type="password" placeholder="_________________________" class="inputs" name="new_password" id="new_password">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="conform_password"><b>Confirm Password</b></label>
                        </td>
                        <td><input type="password" placeholder="_________________________" class="inputs" name="conform_password" id="conform_password"><br>
                        </td>
                    </tr>
                </table>
            
                <div class="button_sanga">
                    <div class="button">  <button type="submit" onclick="sure()" name="changepw" id="submit">Save</button></div>
                    <div id="link">Don't have an Account? <a href="userregistration.php">Register</a></a></div>

                </div>

                <span id="msg1"><b><?php if(isset($msg)){echo $msg;} ?><b></span></br>
               
                </fieldset>      
            </form>
        </div>
    </div>


  
    <script>
   
</script>

   
    
</body>
</html>