<?php
$qry='';
    include_once('../databaseconnection.php');
    if($con){
        echo"connected";
    }
    if(isset($_GET['toManage'])){
        $tomanage=$_GET['toManage'];
       
            $qry=mysqli_query($con, "SELECT * from user WHERE role='$tomanage'");
           
          
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucwords($tomanage)." Management"?></title>
    <link rel="stylesheet" href="admincss/admincss.css">
    <style>
       
    </style>
</head>
<body>
    <!-- Sidebar Navigation -->
    <nav class="sidebar">
        <div class="logo">
            <img src="logo.png" alt="Logo">
            <h3>Admin Dashboard</h3>
        </div>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="#">Customers</a></li>
            <li><a href="#">Retailers</a></li>
            <li><a href="adminsetting.php">Settings</a></li>
            <!-- Add more menu items as needed -->
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <header>
            <h1><?php echo ucwords($tomanage." Management")?></h1>
        </header>

        <!-- Customer Section -->
       <!-- Customer Section -->
<div class="section">

    <div class="customer-list">
    <table>
        <tr>
            <th>S.n</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Profile</th>
        </tr>
        <?php
         $sn=1;
        while($data=mysqli_fetch_assoc($qry)){
           
         
        
        echo'
        <tr>
            <td>'.$sn++.'</td>
            <td>'.$data['name'].'</td>
            <td>'.$data['phone'].'</td>
            <td>'.$data['email'].'</td>
            <td>'.$data['address'].'</td>
            <td><a href="../status.php?userid='.$data['uid'].'">Profile</td>
        </tr>';}
        ?>
    </table>
    </div>
</section>


 



       
    </div>

</body>
</html>

