<!DOCTYPE html>
<html lang="en">
<head>
   
</head>
<body>
    <?php 
 
        if(isset($_GET['role'])){
            $role=$_GET['role'];
            if($role=='seller'){
                echo '
           
                    <nav class="nav"> 
                        <a id="active"href="status.php?id='.$id.'&&role=seller">Seller</a>
                        <a class="seller" href="proposalview.php?id='.$id.'&&role=custumer">Custumer</a>
                        
                    </nav>';
            }
        }
        //if(isset($_GET['role'])){
            if($_SESSION['role']=='buyer'||$_GET['role']=='custumer'){

                echo '
           
                <nav class="nav"> 
            
                
                <a href="proposalview.php?id=5&&role=custumer">Proposals</a>
                <a href="proposalview.php?accept=1&&role=custumer" id="1">Accepted</a>
                <a href="proposalview.php?accept=2&&role=custumer" id="2">Rejected</a>
                <a href="proposalview.php?accept=0&&role=custumer" id="0">Non-Response</a>


              
            </nav>';

            }
        //}
        
    ?>
</body>
</html>
 