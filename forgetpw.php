
<?php 
   session_start();
    if(isset($_POST['forgetpw'])){

        include_once('databaseconnection.php');
        $email=$_POST["email"];
        $phone=$_POST['phone'];
//

        $otp_input_box='';
        $msg='';

        
        $sql="SELECT * from user WHERE email='$email'&& phone='$phone'";
        
        $qry=mysqli_query($con,$sql);
        if($qry){
           $data= mysqli_fetch_assoc($qry);
          

           
           if( isset($data)){
            //generating random otp 6 digit number.
            $otp=rand(000000,999999);
            $_SESSION['otp'] = $otp;

            //sending mail to the related email
            $to=$data['email'];
            $subject = "OTP for changing Password";
            $message = "Hello, ".$data['name']." Your OTP for changing password in CLOTHEX.com is ".$otp." Please don't share it with others";
            
            $headers = "From: ntspoudel@gmail.com";

            /*$mailSent = mail($to, $subject, $message, $headers);

                if ($mailSent) {
                    echo "Email sent successfully.";
                } else {
                    echo "Email sending failed.";
                }

            */

            
            //if account found  only then place for otp will be generated
            
            $otp_input_box=' 
            <spam  style="font-size: 12px"><b>Please enter otp we sent in email<b></spam><br>
            <label for="otp"><b>OTP : </b></label>
            <input type="number" placeholder="________________________" class="inputs" name="enteredOTP" id="enteredOTP"><br>
            <div class="button"> <button type="button" name="otp" class="buttons" id="submitOTP">Submit OTP</button>
            </div>
               
          ';

          $_SESSION['userid']=$data['uid'];
           }

           else{
                $msg='No account found';
           }
          
        

        }
    
       
         
}
if(isset($_POST['otp'])){
    $formOTP=$_POST['enteredOTP'];
    if($enteredotp==$_SESSION['otp']){
        $_SESSION['formOTP']= $formOTP;
        header("Location:changepw.php");
    }
    else{
        $msg="Wrong otp";
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
    body{background:url('images/cover.png');opacity: 1;background:cover;}
    .buttons:Active{background-color:red}

</style>
<body>
    <div class="container">
        <div class="heading">
            <div class="logo">


            </div>
          
        </div>
        <div class="form">
            <form name="myform" onsubmit="" action="" method="Post"  >
                <div class="title" style="font-size: 12px"><b>We will sent OTP in your Email</b></div>
                <fieldset><legend>Change Password</legend>
                <label for="phone"><b>Phone : </b></label>
                <input type="phone" placeholder="________________________" class="inputs" name="phone" id="phone"><br>
                <label for="email"><b>Email : </b></label>
                <input type="email" placeholder="_________________________" class="inputs" name="email" id="email"><br>
            
                <div class="button_sanga">
                    <div class="button">  <button type="submit" class="buttons" name="forgetpw" id="submitEmailPassword">Send OTP</button></div>
                    <div class="link">Don't have an Account? <a href="userregistration.php">Register</a></a></div>

                </div>

                <span id="msg1"><b><?php if(isset($msg)){echo $msg;}?><b></span></br>
                <?php 
                    if(isset($otp_input_box)){echo $otp_input_box;} 
                    if(isset($otp)){echo $otp;}
                
                ?>
              </fieldset>      
            </form>
        </div>
    </div>


    <script>
        $(document).ready(function(){
        $("#submitOTP").on("click", function(event){
            event.preventDefault(); // Prevent the default form submission
            console.log("clicked");
            var enteredOTP = $("#enteredOTP").val();
            var sessionOTP = <?php echo isset($_SESSION['otp']) ? $_SESSION['otp'] : 'null';  ?>

            // Debugging output
          

            if( enteredOTP==sessionOTP ){
                

                // Continue server-side processing here
                $.ajax({
                    url: 'forgetpw.php', // Replace with the actual server-side script URL
                    method: 'POST',
                    success: function (response) {
                        //$("#msg1").html("hgfdsxcvbv OTP");
                        window.location.href = 'changepw.php';
                    }
                  
                });
            } else {
                $("#msg1").html("Wrong OTP from AJAX");
            }
        });

        $("#submitEmailPassword").on("click",function(event){
            event.preventDefult();
            var phone=$("#phone").val();
            var email=$("email").val();


            // Validate and sanitize the input here

        // Send data to the server using AJAX
       



           

        });
    });


    </script>
    
</body>
</html>