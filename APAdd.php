<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("location:Login.php");
} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <title>Add Product</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f0f0; /* Light gray background */
            margin: 0;
            padding: 0;
            color: #333;
        }

        .topnav {
            background-color: #000; /* Black background */
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

        .topnav h5 {
            float: right;
            margin-right: 20px;
            color: #fff; /* White text */
            font-size: 16px;
            margin-top: 12px;
        }

        img {
            border-radius: 5px;
            display: block;
            margin: 0 auto;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            background-color: #fff; /* White container */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        h1 {
            color: #000; /* Black text */
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td {
            padding: 10px;
            vertical-align: top;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #000; /* Black border */
            border-radius: 4px;
            margin-bottom: 15px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #000; /* Black button */
            color: #fff; /* White text */
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #444; /* Dark gray hover effect */
        }

        .error {
            color: #ff0000; /* Red error text */
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <center>
        <img src="media/order-management.jpg" width="200px" height="150px">
        <nav>
            <div class="topnav">
                <a href="AdminWelcome.php">Home</a>
                <a href="APView.php">View Products</a>
                <a href="APAdd.php">Add Product</a>
                <a href="AReview.php">Review</a>
                <a href="AOView.php">Orders</a>
                <a href="ViewSaleResult.php">Report</a>
                <a href="PrintProduct.php" title="Print">Print Product Information</a>
                <a href="Logout.php" title="Logout">Logout</a>
                <h5>Welcome, <?= $_SESSION['sess_user']; ?>!</h5>
            </div>
        </nav>
    </center>

    <div class="container">
        <h1>Add Product</h1>
        <form name="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype='multipart/form-data'>
            <table>
                <tr>
                    <td>Category Name :</td>
                    <td><input type="text" name="pcategory"></td>
                </tr>
                <tr>
                    <td>Product Name :</td>
                    <td><input type="text" name="pname"></td>
                </tr>
                <tr>
                    <td>Price :</td>
                    <td><input type="text" name="price"></td>
                </tr>
                <tr>
                    <td>Photo :</td>
                    <td><input type="file" name="pfile"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center">
                        <input type="submit" name="submit" value="Add">
                        <input type="reset" value="Reset Form">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            include "connect.php";
            $target_dir = "media/";
            $target_file = $target_dir . $_FILES["pfile"]["name"];
            $maxsize = 5242880; // 5MB
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $extensions_arr = array("png", "jpeg", "jpg");
            if (in_array($imageFileType, $extensions_arr)) {
                if (($_FILES['pfile']['size'] >= $maxsize) || ($_FILES["pfile"]["size"] == 0)) {
                    echo "<div class='error'>File too large. File must be less than 5MB.</div>";
                } else {
                    if (move_uploaded_file($_FILES['pfile']['tmp_name'], $target_file)) {
                        $sql = "INSERT INTO product(catname,productname,price,photo)
                                VALUES('$_POST[pcategory]','$_POST[pname]','$_POST[price]','" . $target_file . "')";
                        if (!mysqli_query($con, $sql)) {
                            die('<div class="error">Error: ' . mysqli_error($con) . '</div>');
                        } else {
                            echo "<center><b>Product added successfully!</b></center>";
                        }
                        mysqli_close($con);
                    }
                }
            } else {
                echo "<div class='error'>Invalid file extension.</div>";
            }
        }
        ?>
    </div>
</body>

</html>
<?php
}
?>
