
<?php 
    session_start();
    if(isset($_POST['login'])){

        include_once('databaseconnection.php');
        $email=$_POST["email"];
        $password=$_POST['password'];


        $encriptpw=md5($password);

        
        $sql="SELECT * from user WHERE email='$email'&& password='$encriptpw'";
        
        $qry=mysqli_query($con,$sql);
        if($qry){
           $data= mysqli_fetch_assoc($qry);
          

           
           if( isset($data)){
                
                
            if($data['role']=='retailer'){
                $_SESSION['role']=$data['role'];
            }
            else{
                echo"Herncow";
            }

                
                $_SESSION['userid']=$data['uid'];
                   header('Location:index.php');
                   echo$_SESSION['role'];
           }

           else{
                $msg='Phone and password not matched';
           }
           

        }

        
        else{
            $msg='Query not happens';
        }


    
       
         
}

   
       
        
           
        


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login <?php echo $data['name']?></title>
    
    <link rel="stylesheet" href="css/forms.css">
</head>
<style>
    #msg1{
        font-size:10px;
        color:red;
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
                <div class="title">Login</div>
              
                <input type="text" placeholder="email" class="inputs" name="email" id="email"><br>
                <input type="password" placeholder="Password" class="inputs" name="password" id="password"><br>
            
                <div class="button_sanga">
                    <div class="button">  <button type="submit" name="login" id="submit">Login</button></div>
                    <div class="link">Don't have an Account? <a href="userregistration.php">Register</a></a></div>

                </div>
                <p id="msg1"><?php echo ''?></p>

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