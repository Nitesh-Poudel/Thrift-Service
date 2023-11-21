<?php



include_once('databaseconnection.php');


$msg = '';
$date = date("j M Y");
$name='';
$newname='';

if (isset($_POST['submit'])) {
    echo"xnhubu7gbvyugvuhnjnuhbguvf6yv7yhinbhdcyyyyyyyyyyyyyu";
    $name =mysqli_real_escape_string($con,ucwords($_POST['fullname']));
    $phone = mysqli_real_escape_string($con,ucwords($_POST['phone']));;
    $email = mysqli_real_escape_string($con,ucwords($_POST['email']));
    $address = mysqli_real_escape_string($con,ucwords($_POST['address']));
    $role = isset($_POST['role']) ? $_POST['role'] : ''; // Use isset() to check if 'role' is set
    $password = mysqli_real_escape_string($con,md5($_POST['password']));
    
    $cpassword = mysqli_real_escape_string($con,md5($_POST['cpassword']));


    $newname = '';
    if(isset($_FILES['image'])) {
        $imgname = $_FILES['image']['name'];
        $imgtemp = $_FILES['image']['tmp_name'];
        $imgtype = $_FILES['image']['type'];
        $extension = pathinfo($imgname, PATHINFO_EXTENSION);


        $replaced = str_replace(' ', '-', $name);
        $newname =  $replaced . '.' . $extension;
        $a = move_uploaded_file($imgtemp, "userimage/" . $newname);
    }

    if ($name != '' && $email != '' && $password != '' && $cpassword != '' && $phone != '' && $address != '' && $date != '') {
        if ($cpassword == $password) {
            


            $sql = "INSERT INTO user(name, phone, email, address, role, password, date,userimg) VALUES('$name', '$phone', '$email', '$address', '$role', '$password', '$date', '$newname')";

            $qry=mysqli_query($con,$sql);
            

                if ($qry) {
                    header('location: login.php');
                } 
                


        } 
        else {
            $msg = 'Passwords do not match';
        }

    }
    else {
        $msg = 'Please fill in all required fields';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserRegistration</title>
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/head.css">
    <style>
       
       body{ background-image: linear-gradient(red, yellow);
    display: flex;
   justify-content: right;}
   .ccontainer {
    border: 1px solid white;
    border-radius: 10px;
    margin: 2px 12px;
    display: flex;
    flex-direction: column;
   padding:50px 30px;
   opacity:0.6;
   z-index:1;
   max-height: 80%;
    min-width: 25vw;
    background-color:whitesmoke;
    ;
} .form{
    font-size:18px
}
th,td{border-bottom:1px solid gray;padding-left: 15px;}

    </style>
</head>
<body>
    <div class="texts">
    <h1 style="color:White;text-align:center;font-size:100px;font-family:Verdana">heheh</h1>
    </div>
    <div class="container">
        <div class="heading">
        </div>
        <div class="form" >
            <form name="myform"  method="post" enctype="multipart/form-data">
                <div class="title"><h1>Create an Account</h1></div>
                <table>
                    <tr>
                        <th><label for="fullname">Full Name  </label>
                        <td> <input type="text"  class="inputs" name="fullname" require><br></td>
                    </tr>

                    <tr>
                        <th><label for="email">Email  </label>
                        <td> <input type="email" placeholder="Email" class="inputs" name="email" require><br></td>
                    </tr>

                    <tr>
                        <th><label for="phone"> Phone </label>
                        <td> <input type="number" placeholder="+977" class="inputs" name="phone" min="0000000000"max="9999999999"required><br> </td>
                    </tr>

                    <tr>
                        <th><label for="address">Address</label>
                        <td><input type="text" placeholder="Distric-Local Gov-Ward" class="inputs" name="address" required><br></td>
                    </tr>

                    <tr>
                        <th><label for="role">Role</label>
                        <td> <select name="role" class="inputs">
                                <option value="" disabled selected>Ragisterr yourself as.....</option>
                                <option value="buyer">Buyer</option>
                                <option value="seller">Sellerf</option>
                            </select><br>
                        </td>
                    </tr>

                    <tr>
                        <th><label for="password">Password</label>
                        <td> <input type="text" placeholder="Password" class="inputs" name="password" value="admin" required><br></td>
                    </tr>

                    <tr>
                        <th><label for="cpassword">Conform Password</label>
                        <td> <input type="text" placeholder="Password" class="inputs" name="cpassword" value="admin" required><br></td>
                    </tr>

                    <tr>
                        <th><label for="image">Photo</label>
                        <td> <input type="file" class="inputs" name="image" accept="image/*"><br></td>
                    </tr>
                    
                </table>
                
               
                 
                <div class="button_sanga">
                    <div class="button">
                        <button type="submit" name="submit" id="submit">Register</button>
                    </div>
                    <div class="link">
                        Already have an account? <a href="login.php">Login</a>
                    </div>
                </div>
                <div class="msg">
                    <p id="error"><?php echo $msg; ?></p>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.forms["myform"];
            const nameInput = form.elements["fullname"];
            const phoneInput = form.elements["phone"];
            const passwordInput = form.elements["password"];
            const cpasswordInput = form.elements["cpassword"];
            const submitButton = form.elements["submit"];
            const errorDisplay = document.getElementById("error");

            form.addEventListener("submit", function(event) {
                let isValid = true;
                let errorMsg = "";

                // Validate name (only alphabet)
                const namePattern = /^[A-Za-z\s]+$/;
                if (!namePattern.test(nameInput.value)) {
                    errorMsg += "Name should contain only alphabets.\n";
                    isValid = false;
                }

                // Validate phone number (10 digits)
                const phonePattern = /^\d{10}$/;
                if (!phonePattern.test(phoneInput.value)|| phoneInput.value < 0) {
                    errorMsg += "Phone number should be a positive 10-digit number.\n";
                    isValid = false;
                }

                // Validate password (minimum 8 characters)
                if (passwordInput.value.length < 8) {
                    errorMsg += "Password should have a minimum of 8 characters.\n";
                    isValid = false;
                }

                // Check if password and confirm password match
                if (passwordInput.value !== cpasswordInput.value) {
                    errorMsg += "Passwords do not match.\n";
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault(); // Prevent form submission
                    errorDisplay.textContent = errorMsg;
                }
            });

            // Clear error message when user interacts with the form
            nameInput.addEventListener("input", function() {
                errorDisplay.textContent = "";
            });

            phoneInput.addEventListener("input", function() {
                errorDisplay.textContent = "";
            });

            passwordInput.addEventListener("input", function() {
                errorDisplay.textContent = "";
            });

            cpasswordInput.addEventListener("input", function() {
                errorDisplay.textContent = "";
            });
        });
    </script>
</body>
</html>
