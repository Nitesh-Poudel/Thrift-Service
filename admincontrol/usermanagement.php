<?php
$qry='';
    include_once('../databaseconnection.php');
    if($con){
        echo"connected";
    }
    if(isset($_GET['catagory'])){
        $tomanage=$_GET['catagory'];

        if(isset($_POST['search'])){
            $tosearch=$_POST['tosearch'];
    
            $qry=mysqli_query($con, "SELECT * from  user  where role='$tomanage'AND name LIKE '%$tosearch%' OR role like '%$tosearch%' OR address like '%$tosearch%' OR phone like '%$tosearch%'  OR  email like '%$tosearch%'  OR  uid like '%$tosearch%'");
               
        }
        else{
       
            $qry=mysqli_query($con, "SELECT * from user WHERE role='$tomanage'");
        }   
          
        
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
        table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f2f2f2;
    }
    
    </style>
</head>
<body>
    <!-- Sidebar Navigation -->
  <?php include_once('left.php')?>

    <!-- Main Content -->
    <div class="content">
        <header>
            <h1><?php echo ucwords($tomanage." Management")?></h1>
            <form method="POST">
                <input type="text"name="tosearch">
                <button type="submit" name="search">Search</button>
            </form>
        </header>

       
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
            <td><a href="userProfile.php?userid='.$data['uid'].' & role='.$data['role'].'">Profile</td>
        </tr>';}
        ?>
    </table>
    </div>
</section>


 



       
    </div>

</body>
</html>

