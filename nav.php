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
            if($_SESSION['role']=='buyer'||$_GET['role']=='custumer'){

                echo '
           
                <nav class="nav"> 
            
                
                <a href="proposalview.php?id=5">Proposals</a>
                <a href="proposalview.php?accept=1" id="1">Accepted</a>
                <a href="proposalview.php?accept=2" id="2">Rejected</a>
                <a href="proposalview.php?accept=0" id="0">Non-Response</a>


              
            </nav>';

            }
        
    ?>
</body>
</html>
 