<?php
session_start();
if (!isset($_SESSION["sess_pid"])) {
    header("location:Order1.php");
    exit();
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f8fa;
            color: #333;
        }

        .topnav {
            background-color: #000; /* Black navigation bar */
            overflow: hidden;
            padding: 10px 0;
        }

        .topnav a {
            float: left;
            color: #fff; /* White text */
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #444; /* Dark gray hover effect */
            color: white;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #000;
            font-size: 24px;
            margin-bottom: 10px;
        }

        h3 {
            color: #28a745;
            font-size: 20px;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background-color: #000;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #444;
        }

        img {
            margin: 20px 0;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <center>
        <img src="media/Logo_3.jpg" alt="Logo" width="370" height="110">
        <nav>
            <div class="topnav">
                <a href="Home.php">Home</a>
                <a href="AboutUs.php">About</a>
                <a href="UPView.php">Food</a>
                <a href="Order.php">Order</a>
            </div>
        </nav>
    </center>

    <div class="container">
        <h1>Order Successful!</h1>
        <p>Thank you for shopping with us. We truly appreciate your trust in our services.</p>
        <h3>Your Order ID: <?= htmlspecialchars($_SESSION['sess_pid']); ?></h3>
        <a href="Home.php" class="btn">Return to Home</a>
        <a href="Order.php" class="btn">Place Another Order</a>
    </div>
</body>

</html>
