
<?php 
include_once('databaseconnection.php');
if(isset($_POST['submit'])){
    
    $id=$_POST['rid'];
    $amt=$_POST['amt'];

    if($id != '' &&  $amt != ''){
        $qry = mysqli_query($con ,"INSERT into balance(rid,amt) VALUES ('$id','$amt')");
    }
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Balance</title>
</head>
<body>
    <form method="POST">
        <input type="number"name="rid" placeholder="Add id"required>
        <input type="number" name="amt" placeholder="Amount" required>
        <button type="submit" name="submit">Add balance</button>
    </form>
    
</body>
</html>