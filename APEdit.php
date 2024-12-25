<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("location:Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ordering System</title>
    <link rel="stylesheet" type="text/css" href="Order.css" />
    <style>
        /* General Reset */
        body,
        h1,
        p {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            color: #000;
        }

        /* Body Styling */
        body {
            background-color: #f0f0f0;
            /* Light gray background */
        }

        /* Header Section */
        header img {
            border-radius: 5px;
            display: block;
            margin: 0 auto;
        }

        /* Navigation Bar Styling */
        .topnav {
            background-color: #000;
            /* Black background */
            overflow: hidden;
            padding: 10px 0;
        }

        .topnav a {
            float: left;
            color: #fff;
            /* White text */
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #444;
            /* Dark gray hover effect */
            color: white;
        }

        .topnav h5 {
            float: right;
            margin-right: 20px;
            color: #fff;
            /* White text */
            font-size: 16px;
            margin-top: 12px;
        }

        /* Form Styling */
        .entries {
            max-width: 600px;
            margin: 40px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .entries h1 {
            text-align: center;
            color: #000;
            margin-bottom: 15px;
        }

        .entries table {
            width: 100%;
        }

        .entries td {
            padding: 8px;
            text-align: left;
        }

        .entries input[type="text"],
        .entries input[type="file"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .entries input[type="submit"],
        .entries input[type="reset"] {
            background-color: #000;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .entries input[type="submit"]:hover,
        .entries input[type="reset"]:hover {
            background-color: #444;
            /* Darker background */
        }

        .error {
            color: #FF0001;
        }
    </style>
</head>

<body>
    <header>
        <center>
            <img src="media/order-management.jpg" width="200px" height="150px" alt="Order Management Logo">
        </center>
    </header>

    <!-- Navigation Section -->
    <nav>
        <div class="topnav" id="myTopnav">
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

    <?php
    $edit_id = $_GET["edid"];
    include "connect.php";
    // Show product information in form to update
    $query = "SELECT * FROM product WHERE productid='" . $edit_id . "'";
    $result = mysqli_query($con, $query);
    $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (!$myrow) {
        print "<p>No such record</p>";
    } else {
        $pid = $myrow['productid'];
        $cat = $myrow['catname'];
        $pname = $myrow['productname'];
        $price = $myrow['price'];
        $photo = $myrow['photo'];
    ?>
        <div class="entries">
            <h1>Update Product Information</h1>
            <form name="UpdateForm" action="" method="post" enctype='multipart/form-data'>
                <table>
                    <tr>
                        <td>Product ID:</td>
                        <td><?php echo $pid; ?><input type="hidden" name="pid1" value="<?php echo $pid; ?>"></td>
                    </tr>
                    <tr>
                        <td>Category Name:</td>
                        <td><input type="text" name="pcategory1" value="<?php echo $cat; ?>"></td>
                    </tr>
                    <tr>
                        <td>Product Name:</td>
                        <td><input type="text" name="pname1" value="<?php echo $pname; ?>"></td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td><input type="text" name="price1" value="<?php echo $price; ?>"></td>
                    </tr>
                    <tr>
                        <td>Photo:</td>
                        <td><input type="file" name="pfile1" value="<?php echo $photo; ?>"></td>
                        <td><img src="<?php echo $photo ?>" width="100" height="100"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center;">
                            <input type="submit" name="submit" value="Update">
                            <input type="reset" value="Reset">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    <?php
    }
    // For Update button
    if (isset($_POST['submit'])) {
        // For upload image
        $name = $_FILES['pfile1']['name'];
        $target_dir = "meida/";
        $target_file = $target_dir . $_FILES["pfile1"]["name"];
        $maxsize = 5242880; // 5MB
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $extensions_arr = array("png", "jpeg", "jpg");
        if (in_array($imageFileType, $extensions_arr)) {
            if (($_FILES['pfile1']['size'] >= $maxsize) || ($_FILES["pfile1"]["size"] == 0)) {
                echo "File too large. File must be less than 5MB.";
            } else {
                move_uploaded_file($_FILES['pfile1']['tmp_name'], $target_file);
            }
        }

        $epid = $_POST['pid1'];
        $ecatname = $_POST['pcategory1'];
        $epname = $_POST['pname1'];
        $eprice = $_POST['price1'];
        $ephoto = $photo;
        if (!$name) {
            $ephoto = $photo;
        } else {
            $ephoto = $target_file;
        }

        $sql = "UPDATE product SET catname='$ecatname', productname='$epname', price='$eprice', photo='$ephoto' WHERE productid='" . $epid . "'";
        if (!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error($con));
        }
        print "<p>Your information has been updated in the database</p>";
        mysqli_close($con);
    }
    ?>
</body>

</html>