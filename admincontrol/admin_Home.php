<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Reset some default browser styles */
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

        /* Section Styles */
        .section {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-bottom: 20px;
        }

        /* Typography */
        h1, h2 {
            color: #333;
        }

        /* Custom Styles */
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
    <!-- Sidebar Navigation -->
    <?php include_once('left.php') ?>

    <!-- Main Content -->
    <div class="content">
        <header>
            <h1>Welcome to Admin Dashboard</h1>
        </header>

        <!-- New Section -->
        <div class="section">
            <div class="container">
                <h1>New Section Title</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a libero id lorem ultrices eleifend.</p>
                <!-- Additional content goes here -->
            </div>
        </div>

        <!-- Existing Content -->
        <div class="container">
            <h1>Existing Content</h1>
            <p>This is the existing content. Feel free to add more or modify it as needed.</p>
        </div>
    </div>

    <!-- Additional content or scripts can be added here -->
</body>
</html>
