
<?php 
    session_start();
    if(isset($_POST['login'])){

        include_once('databaseconnection.php');
        $email=$_POST["email"];
        $password=$_POST['password'];


        $encriptpw=md5($password);
        $msg='';

        if(!empty($email)&&!empty($password)){
        $sql="SELECT * from user WHERE email='$email'&& password='$encriptpw'";
        
        $qry=mysqli_query($con,$sql);
        if($qry){
           $data= mysqli_fetch_assoc($qry);
          

           
           if( isset($data)){
                
                
           
                $_SESSION['role']=$data['role'];
            
                $_SESSION['clothexPass']="thisispass";

                
                $_SESSION['userid']=$data['uid'];
                   header('Location:index.php');
                   echo$_SESSION['role'];
           }

           else{
                $msg='Email and password not matched';
           }
           

        }

        
        else{
            $msg='Query not happens';
        }
    }
    else{
        $msg='Please Enter every detail';
    }


    
       
         
}

   
       
        
           
        


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    
    <link rel="stylesheet" href="css/forms.css">
</head>
<style>
     body{background:url('images/cover.png');opacity: 1;background:cover;}
    #msg1{font-size:10px;color:red;}
    .container{background-color:white;opacity: 1;}
    legend{background-color: #eeeeee;text:bold}
    table{text-align:left}
   

</style>
<body>
    <div class="container">
        <div class="heading">
            <div class="logo">


            </div>
          
        </div>
        <div class="form">
            <form name="myform" onsubmit="return validateForm()" action="" method="Post"  >
            <fieldset>
                    <table>
                    
                    <legend><b>Login</b></legend>
                    <table>
                        <tr>
                            <th><label for="email"><b>Email</b></label></th>
                            <td><input type="text" placeholder="___________________" class="inputs" name="email" id="email"><br></td>
                        </tr>
                        <tr>
                            <th><label for="password"><b>Password</b></label></th>
                            <td><input type="password" placeholder="___________________" class="inputs" name="password" id="password"><br></td>
                        </tr>
                        
                    </table>
                    <div class="button_sanga">
                        <div class="button"><button type="submit" name="login" id="submit">Login</button></div>
                        <div class="link">Don't have an Account? <a href="userregistration.php">Register</a></div>
                    </div>
                    <a href="forgetpw.php"><b>Forget password</b></a>
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