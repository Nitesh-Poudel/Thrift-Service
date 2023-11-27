<?php
    session_start(); 

    if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
        header("Location: ../login.php");
        exit; 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
       
        body, h1, h2, ul, li {margin: 0;padding: 0;}

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #3a3f51;
            color: #fff;
            position: fixed;
            height: 100%;
            overflow-y: auto;
        }

        /* Logo Styles */
        .logo {
            display: flex;
            align-items: center;
            padding: 20px;
        }

        .logo img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .logo h3 {
            font-size: 1.5rem;
        }

        .sidebar ul {
            list-style: none;
            padding: 20px;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar a {
            text-decoration: none;
            color: #fff;
            display: block;
            padding: 10px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #5e6381;
        }

        /* Main Content Styles */
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        header {
            background-color: #f5f5f5;
            padding: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .section {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-bottom: 20px;
        }

       
        h1, h2 {
            color: #333;
        }

     
        .container {
            width: 100%;
            text-align: center;
        }

        .container h1 {
            font-size: 60px;
            margin-bottom: 20px;
        }

        .container p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
        }
    </style>
</head>
<body>
   
    <?php include_once('left.php') ?>

   
    <div class="content">
        <header>
            <h1></h1>
        </header>

        <!-- New Section -->
        <div class="section">
            <div class="container">
                <h1>Welcome to Admin Pannel</h1>
                <p></p>
              
        </div>

     
      
    </div>

   
</body>
</html>
