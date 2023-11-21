<?php
include_once('session.php');
include_once('databaseconnection.php');
include_once('session.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['seen'])) {
    // Sanitize and process the 'seen' value
    $seen = $_POST['seen'];


    $userid=$_SESSION['userid'];

    // Update 'seen' status in the database (Adjust this query according to your database structure)
    $userId = $_SESSION['userid']; // Assuming you have the user's ID in the session
    $updateQuery = "UPDATE notification SET seen = 1 WHERE destination = $userid";
    
    
    // Execute the query and handle any errors
    // Ensure proper error handling and security measures (e.g., prepared statements) in your actual code
    if (mysqli_query($con, $updateQuery)) {
        //echo "Notification status updated successfully";
        header('Location:home.php');
    } else {
        echo "Error updating notification status: " . mysqli_error($con);
    }
} else {
    echo "Invalid request";
}
?>
