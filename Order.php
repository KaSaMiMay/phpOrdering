<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <title>Order</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f8fa;
            margin: 0;
            padding: 0;
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

        img {
            margin: 20px 0;
            display: block;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #212529;
            text-align: center;
        }

        .entries {
            max-width: 800px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #000;
            color: white;
        }

        td input[type="text"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-group input {
            width: 48%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            display: inline-block;
            background-color: #000;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #444;
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
                <a href="Order.php" class="active">Order</a>
                <a href="UReview.php">Review</a>
            </div>
        </nav>
    </center>

    <div class="entries">
        <h1>Place Your Order</h1>
        <form method="POST" action="Order1.php">
            <table>
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "connect.php";
                    $sql = "select * from product order by productname asc";
                    $query = $con->query($sql);
                    $iterate = 0;
                    while ($row = $query->fetch_array()) {
                    ?>
                        <tr>
                            <td>
                                <input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]">
                            </td>
                            <td><?php echo $row['catname']; ?></td>
                            <td><?php echo $row['productname']; ?></td>
                            <td><?php echo number_format($row['price'], 2); ?></td>
                            <td><input type="text" name="quantity_<?php echo $iterate; ?>" placeholder="Quantity"></td>
                        </tr>
                    <?php
                        $iterate++;
                    }
                    ?>
                </tbody>
            </table>
            <div class="form-group">
                <input type="text" name="customer" placeholder="Customer Name" required>
                <input type="text" name="address" placeholder="Address" required>
            </div>
            <button type="submit">Submit Order</button>
        </form>
    </div>
</body>

</html>
