<?php
$qry='';
    include_once('../databaseconnection.php');
    if($con){
       
    }
    
    if(isset($_POST['search'])){
        $tosearch=$_POST['tosearch'];

        $qry=mysqli_query($con, "SELECT * from clothes c join user u ON c.retailer_id=u.uid where name LIKE '%$tosearch%' OR catagory like '%$tosearch%' OR gender like '%$tosearch%' OR fiber like '%$tosearch%'  OR cid like '%$tosearch%'");
           
    }
    else{
            $qry=mysqli_query($con, "SELECT * from clothes c join user u ON c.retailer_id=u.uid ");
    }  

            //count
             $qryy = mysqli_query($con, "SELECT COUNT(*) AS total_count FROM orderproposal op 
              JOIN clothes c ON op.forcloth = c.cid 
             WHERE c.cid = '' ");
             $row = mysqli_fetch_assoc($qryy);  
        
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothes_detail</title>
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
            <h1>Clothes_detail</h1>
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
            <th>cid</th>
            <th>Image</th>
            <th>Upload By</th>
            <th>Catagory</th>
            <th>Fiber</th>
            <th>Price</th>
           
            <th>Detail</th>

        </tr>
        <?php
         $sn=1;
        while($data=mysqli_fetch_assoc($qry)){
            
         
        
            echo '
            <tr>
                <td>'.$sn++.'</td>
                <td>'.$data['cid'].'</td>
                <td><img src="../productimage/'.$data['image'].'" width="40px"></td>
                <td>'.$data['name'].'</td>
                <td>'.$data['catagory'].'</td>
                <td>'.$data['fiber'].'</td>
                <td>'.$data['price'].'</td>
               
                <td><a href="clothProfile.php?cid='.$data['cid'].'">See Detail</a></td>
            </tr>';
        }            
        ?>
    </table>
    </div>
</section>


 



       
    </div>

</body>
</html>

