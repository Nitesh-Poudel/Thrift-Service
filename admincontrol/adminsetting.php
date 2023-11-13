
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Reset some default browser styles */
        body, h1, h2, ul, li {margin: 0;padding: 0;}

       
        .sidebar {width: 250px;background-color: #3a3f51;color: #fff;position: fixed;
            height: 100%;overflow-y: auto;}

        .logo {display: flex;align-items: center;padding: 20px;}

        .logo img { width: 40px; height: 40px;margin-right: 10px;}

        .logo h3 {font-size: 1.5rem;}

        .sidebar ul {list-style: none;padding: 20px;}

        .sidebar ul li {margin-bottom: 10px;}

        .sidebar a {text-decoration: none;color: #fff;display: block;padding: 10px;transition: background-color 0.3s;}

        .sidebar a:hover {background-color: #5e6381;}

        /* Main Content Styles */
        .content { margin-left: 250px; padding: 20px;}

        header {background-color: #f5f5f5;padding: 20px;margin-bottom: 20px;border-bottom: 1px solid #ddd;}

        /* Section Styles */
        .section {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        /* Typography */
        h1, h2 {
            color: #333;
        }

    </style>
</head>
<body>
    <!-- Sidebar Navigation -->
    <nav class="sidebar">
        <div class="logo">
            <img src="logo.png" alt="Logo">
            <h3>Your Dashboard</h3>
        </div>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="usermanagement.php?catagory=buyer">Customers</a></li>
            <li><a href="usermanagement.php?catagory=seller">Retailers</a></li>
            <li><a href="#">Settings</a></li>
            <!-- Add more menu items as needed -->
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="content">
        <header>
            <h1>Setting</h1>
        </header>

        <!-- Customer Section -->
       <!-- Customer Section -->
<section class="section">
    <h2>Customer Management</h2>
    <div class="customer-list">
    </h1>Total custumer : 67</h1>
    </div>
</section>


        <!-- Retailer Section -->
        <section class="section">
            <h2>Retailer Management</h2>
            <!-- Add retailer management content here -->
        </section>

       
    </main>
    

</body>
</html>

