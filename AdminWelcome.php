<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("location:Login.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ordering System</title>
        <style>
            /* General Reset */
            body, h1, p {
                margin: 0;
                padding: 0;
                font-family: 'Arial', sans-serif;
                color: #000;
            }

            /* Body Styling */
            body {
                background-color: #f0f0f0; /* Light gray background */
            }

            /* Header Styling */
            header img {
                border-radius: 5px;
                display: block;
                margin: 0 auto;
            }

            /* Navigation Bar Styling */
            .topnav {
                background-color: #000; /* Black background */
                overflow: hidden;
                padding: 10px 0;
            }

            .topnav a {
                display: inline-block;
                color: white; /* White text */
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
                border-radius: 5px;
                margin-right: 10px; /* Spacing between links */
            }

            .topnav a:hover {
                background-color: #444; /* Darker gray hover effect */
                color: white;
            }

            .topnav h5 {
                float: right;
                margin-right: 20px;
                color: #fff; /* White text */
                font-size: 16px;
                margin-top: 12px;
    }

            /* Container Styling */
            .container {
                max-width: 600px;
                margin: 40px auto;
                background-color: #fff; /* White container */
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                padding: 20px;
                text-align: center;
            }

            .container h1 {
                color: #000; /* Black text */
                font-weight: bold;
                margin-bottom: 15px;
            }

            .container p {
                font-size: 16px;
                margin-top: 10px;
            }
        </style>
    </head>

    <body>
        <!-- Header Section -->
        <header>
            <center>
                <img src="media/order-management.jpg" width="200px" height="150px" alt="Order Management">
            </center>
        </header>

        <!-- Navigation Section -->
        <nav class="topnav">
            <a href="AdminWelcome.php">Home</a>
            <a href="APView.php">View Products</a>
            <a href="APAdd.php">Add Product</a>
            <a href="AReview.php">Review</a>
            <a href="AOView.php">Orders</a>
            <a href="ViewSaleResult.php">Report</a>
            <a href="PrintProduct.php" title="Print">Print Product Information</a>
            <a href="Logout.php" title="Logout">Logout</a>
            <h5>Welcome, <?= $_SESSION['sess_user']; ?>!</h5>
        </nav>

        <!-- Content Section -->
        <div class="container">
            <h1>Log In Successful!</h1>
            <p>Welcome to the Ordering System Dashboard.</p>
        </div>
    </body>

    </html>
<?php
}
?>
