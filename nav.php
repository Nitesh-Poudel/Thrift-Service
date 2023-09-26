<!DOCTYPE html>
<html lang="en">
<head>
   
</head>
<body>
    <?php 
 
        if(isset($_SESSION['role'])){
            $role=$_SESSION['role'];
            if($role=='seller'){
                echo '
           
                    <nav class="nav"> 
                        <a id="active"href="status.php?id='.$id.'">Status</a>
                        <a class="seller" href="requestview.php?id='.$id.'">Request</a>
                        <a href="proposalview.php?id='.$id.'">Proposals</a>

                        <a class="seller" href="#">Sales</a>
                        <a class="seller" href="#">Orders</a>
                        <a class="seller" href="#">Customers</a>
                        <a class="seller" href="#">Balance</a>
                    </nav>';
            }
            else{

                echo '
           
                <nav class="nav"> 
                <a id="active"href="status.php?id='.$id.'">Status</a>
                
                <a href="proposalview.php?id='.$id.'">Proposals</a>
                <a href="#">Accepted</a>


              
            </nav>';

            }
        }
    ?>
</body>
</html>
 