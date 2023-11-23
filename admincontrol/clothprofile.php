<?php
$qry='';
    include_once('../databaseconnection.php');
    if($con){
        echo"connected";
    }
    if(isset($_GET['cid'])){
        $cid=$_GET['cid'];
        $qry=mysqli_query($con, "SELECT * from clothes WHERE cid='$cid'");
        $data=mysqli_fetch_assoc($qry);
    }
   
       
           
           
          
        
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admincss/admincss.css">
</head>
    <style>
        *{over}
        .container{width:100vw;height:100vh;display:flex;align-items:center;justify-content:center}
        .content{background-color:re;width:76%;height:100%;}
        .information{display:flex;flex-wrap:wrap}
        .info{margin:10px}
        /* General styles */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h1 {
    color: #333;
    margin-bottom: 10px;
}

/* Table styles */
table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 20px;
    background-color: #fff;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f2f2f2;
}

.img{display:flex;width:300px;height:400px;overflow:hidden;}
.tables{width:900px}


.button {
            /* Green */
           
            
            padding: 10px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
        }
        .button:hover{
            background-color:aliceblue;
        }
        
    </style>
<body>
<?php include_once('left.php')?>



    <div class="container">
        <div class="content">
            <header>
                <h1><?php echo $data['type'];?></h1>
            </header>
            <div class="information">
                <div class="img"><img src="../productimage/<?php echo $data['image']; ?>" alt="User Image"width="200" ></div>

                <div class="info">
                    
                    
                    <div class="tables">
                        <div>
                            <?php
                              
                                    echo '
                                        <h1>Other Informations</h1>
                                        <table id="table">
                                            <tr>
                                                <th>Total Proposals</th>
                                                    <td>';

                                                        $qry = mysqli_query($con, "SELECT COUNT(*) AS total_count FROM orderproposal WHERE forcloth='$cid'");
                                                        $row = mysqli_fetch_assoc($qry);
                                                        $totalProposalCount = $row['total_count'];
                                                        echo $totalProposalCount;
                                                    echo '</td>
                                            </tr>

                                            <tr>
                                                <th>Proposal Status</th>
                                                    <td>';

                                                    $qry = mysqli_query($con, "SELECT COUNT(*) AS total_count FROM orderproposal WHERE forcloth='$cid'AND accept=1");
                                                    $row = mysqli_fetch_assoc($qry);
                                                    $totalProposalCount = $row['total_count'];
                                                    echo($totalProposalCount==1)?'Accepted':'Not-Accepted';
                                                echo '</td>
                                            </tr>

                                            <tr>
                                                <th>Complete Order</th>
                                                <td>';

                                                  

                                                echo '</td>
                                            </tr>
                                            
                                           

                                        </table>';
                                
                            ?>



                    
                </div>

                    
    
                </div>

                </div>
                
            </div>

        </div>
    </div>
</body>
</html>