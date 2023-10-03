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
            if($role=='buyer'||$_SESSION['role']='seller'){

                echo '
           
                <nav class="nav"> 
            
                
                <a href="proposalview.php?id='.$id.'">Proposals</a>
                <a href="#">Accepted</a>


              
            </nav>';

            }
        }
    ?>
</body>
</html>
 