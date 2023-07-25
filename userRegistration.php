<?php



include_once('databaseconnection.php');

$aaa ='ejglohgprwighwrp iugerug wrpitg io dsiugripugrwipguwrp ispdighsruoh spi wrpiuwripuwrpiurwpigrpi';
$msg = '';
$date = date("j M Y");
$name='';
$newname='';

if (isset($_POST['submit'])) {
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
            


            $sql = "INSERT INTO user(name, phone, email, address, role, password, date, extra) VALUES('$name', '$phone', '$email', '$address', '$role', '$password', '$date', '$newname')";

            $qry=mysqli_query($con,$sql);
            

                if ($qry) {
                    header('location: login.php');
                } 
                else {
                    $msg = 'Hertfdgsb  djba  kjbnpadp nfbjsnbpisfb jbnspvbsdp  ldjbnspfbsp jl npfbnpsfbnl ';
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
        body {
            color: rgb(78, 2, 4);
            font-family: fantasy;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="heading">
        </div>
        <div class="form" >
            <form name="myform"  method="post" enctype="multipart/form-data">
                <div class="title">Register as Regular customer</div>

                <input type="text" placeholder="Full name" class="inputs" name="fullname" value="Nites Poudel" require><br>
                <input type="email" placeholder="Email" class="inputs" name="email" value="ntspoudel@gmail.com" require><br>
                <input type="number" placeholder="Phone" class="inputs" name="phone" value="9876543208"><br>
                <input type="text" placeholder="Address" class="inputs" name="address" value="Pharping Kathmandu"><br>
                
                <select name="role" class="inputs">
                    <option value="" disabled selected>Ragisterr yourself as.....</option>
                    <option value="customer">Customer</option>
                    <option value="retailer">Retailer</option>
                </select><br>

                <input type="text" placeholder="Password" class="inputs" name="password" value="admin"><br>
                <input type="password" placeholder="Confirm Password" class="inputs" name="cpassword" value="admin"><br>
                
                <input type="file" class="inputs" name="image" accept="image/*"><br>
                <div class="button_sanga">
                    <div class="button">
                        <button type="submit" name="submit" id="submit">Register</button>
                    </div>
                    <div class="link">
                        Already have an account? <a href="login.php">Login</a>
                    </div>
                </div>
                <div class="msg">
                    <p id="error"> <?php echo $msg; echo $date; echo$name;echo$email;echo$phone;echo$address;echo$role;echo$password;  echo "this".$newname ?> </p>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Your form validation code or other JavaScript code goes here
    </script>
</body>
</html>
