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
     body{ background-image: linear-gradient(red, yellow);
     display: flex;
    justify-content: right;}
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
                    
                    <legend><b>Seller-Registration</b></legend>
                    <h1>Create an Account</h1>
                    <table>
                        <tr>
                            <th><label for="citizenship"><b>Citizenship-No</b></label></th>
                            <td><input type="number" id="citizenship"><br></td>
                        </tr>
                        <tr>
                            <th><label for="citizenshipImg"><b>Citizenship Image</b></label></th>
                            <td><input type="file" accept=".jpg"><br></td>
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