<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("location:login.php");
} else {
?>
    <html>

    <head>
        <meta charset='utf-8'>
        <title>Ordering System</title>
        <link rel="stylesheet" type="text/css" href="Order.css" />
        <style>
            .error {
                color: #FF0001;
            }

            /* General Body Styles */
            body {
                font-family: 'Roboto', sans-serif;
                background-color: #f0f0f0;
                margin: 0;
                padding: 0;
                color: #333;
            }

            /* Top Navigation Bar */
            /* Top Navigation Bar */
            .topnav {
                background-color: #000;
                /* Black background */
                display: flex;
                /* Use flex for better alignment */
                justify-content: space-between;
                /* Align links and welcome message properly */
                align-items: center;
                /* Center items vertically */
                padding: 0 20px;
                /* Add some padding for space on the sides */
            }

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


            /* Shared Container Design */
            .container {
                max-width: 800px;
                margin: 40px auto;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                padding: 20px;
            }

            h1 {
                color: #000;
                text-align: center;
                font-weight: bold;
                margin-bottom: 20px;
            }

            /* Table Styles */
            table {
                width: 100%;

            }
        </style>
    </head>

    <body>
        <center>
            <img src="media/order-management.jpg" margin="auto" width="200px"
                height="150px"></img>
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
        <div class="entries">
            <h1 class="page-header text-center">Orders</h1>
            <table border=1 width="1000">
                <thead>
                    <th>No</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Total Sales</th>
                    <th>Details</th>
                </thead>
                <tbody>
                    <?php
                    include "connect.php";
                    $sql = "select * from purchase order by purchaseid desc";
                    $query = $con->query($sql);
                    $i = 0;
                    while ($row = $query->fetch_array()) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo date('d-m-Y H:i A', strtotime($row['date_purchase'])) ?></td>
                            <td><?php echo $row['customer']; ?></td>
                            <td class="text-right"> <?php echo number_format($row['total'], 2); ?></td>
                            <td><a href="#details<?php echo $row['purchaseid']; ?>"
                                    <?php include('AOViewDetail.php'); ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>

    </html>
<?php
}
?>