<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Ordering System - Login</title>
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
            margin-top: 20px;
            border-radius: 10px; /* Rounded corners for banner */
        }

        h2 {
            font-size: 24px;
            margin-top: 20px;
            color: #333;
        }

        /* Login Form Styles */
        .login-form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
            max-width: 400px;
            margin: 20px auto;
            text-align: center;
        }

        .login-form input[type="text"], 
        .login-form input[type="password"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-form input[type="submit"] {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-form input[type="submit"]:hover {
            background-color: #444; /* Darker hover color */
        }

        /* Error Message */
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <center>
        <img src="media/Banner.jpg" width="370px" height="110px" alt="Banner">
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

    <!-- Login Form -->
    <div class="login-form">
        <h2>Login Form</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" required><br />
            <input type="password" name="pass" placeholder="Password" required><br />
            <input type="submit" value="Login" name="submit">
        </form>
        <div class="error">
            <?php
            if (isset($_POST["submit"])) {
                if (!empty($_POST['user']) && !empty($_POST['pass'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $con = mysqli_connect('localhost', 'root', '', 'bucjunedb') or die("Could not connect to database");
                    $query = mysqli_query($con, "SELECT * FROM users WHERE username='" . $user . "' AND password='" . $pass . "'");
                    $numrows = mysqli_num_rows($query);
                    if ($numrows != 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            $dbusername = $row['username'];
                            $dbpassword = $row['password'];
                        }
                        if ($user == $dbusername && $pass == $dbpassword) {
                            session_start();
                            $_SESSION['sess_user'] = $user;
                            header("Location: AdminWelcome.php");
                        }
                    } else {
                        echo "Invalid username or password!";
                    }
                } else {
                    echo "All fields are required!";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>
