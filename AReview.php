<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("location:Login.php");
} else {
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Customer Comments</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5; /* Light gray background */
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

        h1 {
            color: #333;
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background-color: #333; /* Dark gray header */
            color: #fff; /* White text */
            text-align: center;
            padding: 10px;
        }

        td {
            padding: 12px;
            text-align: center;
            color: #333;
            vertical-align: middle;
            background-color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Light gray for alternate rows */
        }

        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin: 20px;
        }

        .search-bar input[type="date"] {
            padding: 7px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .search-bar button {
            padding: 7px 15px;
            background-color: #333; /* Dark button */
            color: #fff; /* White text */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #444; /* Slightly lighter on hover */
        }

        .entries {
            padding: 20px;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Card-like effect */
            width: 90%;
        }
    </style>
</head>

<body>
    <center>
        <img src="media/order-management.jpg" width="200px" height="150px" alt="Order Management">
        <p>
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
        </p>
    </center>
    <div class="search-bar">
        <form method="POST">
            <input type="date" name="search_date" placeholder="Search by Date" required>
            <button type="submit">Search</button>
        </form>
    </div>
    <div class="entries">
        <center>
            <?php
            include "connect.php";

            // Retrieve the search date if provided
            $searchDate = isset($_POST['search_date']) ? $_POST['search_date'] : null;

            // Query for fetching data
            $query = $searchDate ? "SELECT * FROM review WHERE Date = '$searchDate'" : "SELECT * FROM review";

            mysqli_select_db($con, $database);
            $result = mysqli_query($con, $query);
            
            echo "<h1>Customer Comments</h1>";
            if ($result && mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr>
                        <th>No</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Product Name</th>
                        <th>Comments</th>
                        <th>Date</th>
                      </tr>";
                $id = 0;
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $id++;
                    echo "<tr>
                            <td>{$id}</td>
                            <td>" . htmlspecialchars($row['customer']) . "</td>
                            <td>" . htmlspecialchars($row['email']) . "</td>
                            <td>" . htmlspecialchars($row['productname']) . "</td>
                            <td>" . htmlspecialchars($row['comment']) . "</td>
                            <td>" . htmlspecialchars($row['Date']) . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No results found.</p>";
            }
            mysqli_close($con);
            ?>
        </center>
    </div>
</body>

</html>
<?php
}
?>
