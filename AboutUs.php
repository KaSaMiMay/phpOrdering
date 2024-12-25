<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <title>Ordering System</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f8fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Navigation Styles */
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

        

        img {
            margin: 20px 0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #212529;
            text-align: center;
        }

        section {
            margin-bottom: 20px;
        }

        h4 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #007bff;
        }

        p {
            margin: 0 0 10px;
            color: #555;
        }

        ul {
            padding-left: 20px;
            list-style: none;
        }

        ul li {
            position: relative;
            margin: 10px 0;
            padding-left: 20px;
            color: #555;
        }

        ul li:before {
            content: "✔";
            position: absolute;
            left: 0;
            top: 0;
            color: #28a745;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background: #2d3e50;
            color: white;
            font-size: 14px;
            margin-top: 20px;
        }

        footer a {
            color: #007bff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <center>
        <img src="media/Logo_3.jpg" alt="Logo" width="370" height="110">
        <nav>
            <div class="topnav">
                <a href="Home.php">Home</a>
                <a href="AboutUs.php" class="active">About</a>
                <a href="UPView.php">Food</a>
                <a href="Order.php">Order</a>
                <a href="UReview.php">Review</a>
            </div>
        </nav>
    </center>

    <div class="container">
        <h2>About Us</h2>
        <section>
            <h4>Our Story</h4>
            <p>Founded with a vision to make ordering easier and more efficient, we bring your favorite products and meals directly to your fingertips. Our journey started with a passion for innovation and a commitment to enhancing your everyday life with a seamless online ordering experience.</p>
        </section>
        <section>
            <h4>Our Mission</h4>
            <p>We aim to transform the way you shop and order, combining convenience, speed, and reliability. Our mission is to connect you with high-quality products and services while ensuring affordability and timely delivery. Your satisfaction fuels our progress.</p>
        </section>
        <section>
            <h4>Our Values</h4>
            <ul>
                <li><strong>Customer First:</strong> Your happiness is our top priority. We listen, learn, and evolve to meet your needs and exceed your expectations.</li>
                <li><strong>Innovation:</strong> We continuously adapt and innovate to provide you with the most modern and user-friendly platform possible.</li>
                <li><strong>Integrity:</strong> Transparency, trust, and honesty guide everything we do, ensuring a genuine and reliable experience for our customers.</li>
            </ul>
        </section>
        <section>
            <h4>Join Us</h4>
            <p>Be a part of our journey to redefine convenience. With the Ordering System, you gain more than a service; you join a community dedicated to simplifying your life and saving your time. Experience the difference today.</p>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 Ordering System. <a href="#">Privacy Policy</a></p>
    </footer>
</body>

</html>
