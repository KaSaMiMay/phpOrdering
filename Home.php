<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Ordering System</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5; /* Light gray background */
            margin: 0;
            padding: 0;
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

        center img {
            margin: 20px 0;
            border-radius: 10px; /* Rounded corners for images */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .entries {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            max-width: 800px;
            margin: 20px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Card-like effect */
        }

        .entries h1 {
            font-size: 28px;
            color: #333;
        }

        .entries p {
            font-size: 18px;
            color: #666;
            margin: 10px 0;
        }

        .entries h1 {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <center>
        <img src="media/Banner.jpg" alt="Banner" width="370" height="110">
        <p>
        <nav>
            <div class="topnav" id="myTopnav">
                <a href="Home.php">Home</a>
                <a href="AboutUs.php">About</a>
                <a href="UPView.php">Food</a>
                <a href="Order.php">Order</a>
                <a href="UReview.php">Review</a>
                <a href="Login.php">Admin Log In</a>
            </div>
        </nav>
        </p>
    </center>

    <!-- Main Content -->
    <center>
        <img src="media/Logo_2.jpg" alt="Logo" width="600">
    </center>
    <div class="entries">
        <center>
            <h1>Welcome to Our Restaurant</h1>
            <p>We are delighted to have you here. Enjoy browsing through our menu and feel free to order your favorite dishes.</p>
            <p><strong>Written By:</strong> -------</p>
        </center>
    </div>
</body>

</html>
