
       <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Reset some default browser styles */
        body, h1, h2, ul, li {
            margin: 0;
            padding: 0;
        }

        /* Sidebar Navigation Styles */
        .sidebar {
            width: 250px;
            background-color: #3a3f51;
            color: #fff;
            position: fixed;
            height: 100%;
            overflow-y: auto;
        }

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
        }

        /* Typography */
        h1, h2 {
            color: #333;
        }

        /* Pagination Styles */
        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            display: inline-block;
            padding: 5px 10px;
            margin: 0 5px;
            background-color: #eee;
            color: #333;
            text-decoration: none;
            border-radius: 3px;
        }

        .pagination a:hover {
            background-color: #333;
            color: #fff;
        }

        .page-number {
            margin: 0 10px;
            font-weight: bold;
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
            <li><a href="#">Customers</a></li>
            <li><a href="#">Retailers</a></li>
            <li><a href="#">Settings</a></li>
            <!-- Add more menu items as needed -->
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="content">
        <header>
            <h1>Admin Dashboard</h1>
        </header>

        <!-- Customer Section -->
       <!-- Customer Section -->
<section class="section">
    <h2>Customer Management</h2>
    <div class="customer-list">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>john@example.com</td>
                    <td>
                        <button>Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>jane@example.com</td>
                    <td>
                        <button>Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>
                <!-- Add more customer rows as needed -->
            </tbody>
        </table>
    </div>
</section>


        <!-- Retailer Section -->
        <section class="section">
            <h2>Retailer Management</h2>
            <!-- Add retailer management content here -->
        </section>

        <!-- Pagination for customers -->
        <div class="pagination">
            <a href="#" class="prev">Previous</a>
            <span class="page-number">Page 1 of 3</span>
            <a href="#" class="next">Next</a>
        </div>
    </main>

    <!-- JavaScript for pagination -->
    <script>
        const prevButton = document.querySelector('.prev');
        const nextButton = document.querySelector('.next');
        const pageNumber = document.querySelector('.page-number');

        let currentPage = 1;
        const totalPages = 3; // Replace with the actual total number of pages

        function updatePageNumber() {
            pageNumber.textContent = `Page ${currentPage} of ${totalPages}`;
        }

        prevButton.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                updatePageNumber();
            }
        });

        nextButton.addEventListener('click', () => {
            if (currentPage < totalPages) {
                currentPage++;
                updatePageNumber();
            }
        });

        // Initialize page number
        updatePageNumber();
    </script>
</body>
</html>


        <!-- Retailer Section -->
        <section class="section">
            <h2>Retailer Management</h2>
            <!-- Add retailer management content here -->
        </section>

        <!-- Pagination for customers -->
        <div class="pagination">
            <a href="#" class="prev">Previous</a>
            <span class="page-number">Page 1 of 3</span>
            <a href="#" class="next">Next</a>
        </div>
    </main>

    <!-- JavaScript for pagination -->
    <script>
        const prevButton = document.querySelector('.prev');
        const nextButton = document.querySelector('.next');
        const pageNumber = document.querySelector('.page-number');

        let currentPage = 1;
        const totalPages = 3; // Replace with the actual total number of pages

        function updatePageNumber() {
            pageNumber.textContent = `Page ${currentPage} of ${totalPages}`;
        }

        prevButton.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                updatePageNumber();
            }
        });

        nextButton.addEventListener('click', () => {
            if (currentPage < totalPages) {
                currentPage++;
                updatePageNumber();
            }
        });

        // Initialize page number
        updatePageNumber();
    </script>
</body>
</html>
