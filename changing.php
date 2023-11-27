if($qry){
            $time=date('Y-m-d H:i:s');

            $buyer=mysqli_query($con,"SELECT * FROM orders o 
                JOIN orderproposal op 
                JOIN clothes c 
                JOIN user
                ON o.pid = op.poid AND op.forcloth = c.byperson 
                WHERE o.oid=$orderID  "
            );
        

            $destination=$byperson;
            $uid=$_SESSION['userid'];
            $subject="Seller complete Order";

            //$sql="INSERT into notification(destination,source,subject,time)Values('$byperson','$uid','$subject','$time')";
            //$qry=mysqli_query($con,$sql);
            //if($qry){
            //    header("Location:home.php");
            //} 
        }