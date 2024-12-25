<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review System</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f8fa;
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

        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #000;
            font-size: 28px;
            margin-bottom: 20px;
        }

        form {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        table td {
            padding: 10px;
            font-size: 16px;
        }

        table input,
        table textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        table textarea {
            resize: vertical;
        }

        table input[type="submit"],
        table input[type="reset"] {
            background-color: #000;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        table input[type="submit"]:hover,
        table input[type="reset"]:hover {
            background-color: #444;
        }

        .logo {
            margin-bottom: 20px;
            width: 200px;
        }

        footer {
            margin-top: 40px;
            text-align: center;
            background-color: #000;
            color: white;
            padding: 10px 0;
            font-size: 14px;
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
        <img src="media/Logo_2.jpg" alt="Logo" class="logo">
        <nav>
            <div class="topnav" id="myTopnav">
                <a href="Home.php">Home</a>
                <a href="AboutUs.php">About</a>
                <a href="UPView.php">Food</a>
                <a href="Order.php">Order</a>
                <a href="UReview.php">Review</a>
            </div>
        </nav>
    </center>

    <div class="container">
        <h1>Review Form</h1>
        <form name="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <table>
                <tr>
                    <td>Customer Name:</td>
                    <td><input type="text" name="cname" required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Product Name:</td>
                    <td><input type="text" name="pname" required></td>
                </tr>
                <tr>
                    <td>Comment:</td>
                    <td><textarea name="comment" rows="4" required></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center">
                        <input type="submit" name="submit" value="Submit">
                        <input type="reset" value="Reset Form">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            include "connect.php";
            $sql = "INSERT INTO review (customer, email, productname, comment, Date) 
                    VALUES ('$_POST[cname]', '$_POST[email]', '$_POST[pname]', '$_POST[comment]', NOW())";

            if (!mysqli_query($con, $sql)) {
                die('Error: ' . mysqli_error($con));
            } else {
                echo "<p style='color: green;'>Successfully added your review!</p>";
            }
            mysqli_close($con);
        }
        ?>
    </div>

    <footer>
        <p>&copy; 2024 Ordering System. <a href="#">Privacy Policy</a></p>
    </footer>

</body>

</html>
