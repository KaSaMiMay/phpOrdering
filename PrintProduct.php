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
        <title>Product Management</title>
        <style>
            body {
                font-family: 'Roboto', sans-serif;
                background-color: #f5f5f5;
                /* Light gray background */
                margin: 0;
                padding: 0;
                color: #333;
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
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                /* Subtle shadow */
            }

            table,
            th,
            td {
                border: 1px solid #ddd;
            }

            th {
                background-color: #333;
                /* Dark gray header */
                color: #fff;
                /* White text */
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
                background-color: #f9f9f9;
                /* Light gray for alternate rows */
            }

            img {
                border-radius: 5px;
                display: block;
                margin: 0 auto;
            }

            a {
                text-decoration: none;
                color: #007bff;
                /* Blue link */
            }

            a:hover {
                color: #0056b3;
                /* Darker blue for hover effect */
            }

            .entries {
                padding: 20px;
                margin: 0 auto;
                background: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                /* Card-like effect */
            }

            .btn {
                padding: 10px 20px;
                font-size: 16px;
                cursor: pointer;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .btn:hover {
                background-color: #0056b3;
            }
        </style>
        <script language="JavaScript" type="text/javascript">
            function PrintDoc() {
                var toPrint = document.getElementById('printarea');
                var popupWin = window.open('', '_blank', 'width=900,height=900,location=no,left=200px');
                popupWin.document.open();
                popupWin.document.write('<html><title>Preview</title><head></head><body onload="window.print()">');
                popupWin.document.write(toPrint.innerHTML);
                popupWin.document.write('</body></html>');
                popupWin.document.close();
            }
        </script>
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

        <div id="printarea" class="entries">
            <center>
                <?php
                include "connect.php";
                $query = "SELECT * FROM product ORDER BY productid DESC";

                mysqli_select_db($con, $database);
                $result = mysqli_query($con, $query);
                echo "<h1 align=center>Product List</h1>";
                if ($result) {
                    print "<table align=center border=1 width='800'>";
                    print "<tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Photo</th>
                       </tr>";
                    $i = 0;
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $i++;
                        $pid = $row['productid'];
                        $pcat = $row['catname'];
                        $pname = $row['productname'];
                        $price = $row['price'];
                        $photo = $row['photo'];
                        print "<tr align='center'>
                                <td>{$i}</td>
                                <td>{$pcat}</td>
                                <td>{$pname}</td>
                                <td>{$price}</td>
                                <td><img src='{$photo}' width='100px' height='70px'></td>
                           </tr>";
                    }
                    print "</table>";
                } else {
                    die("Query=$query failed!");
                }
                mysqli_close($con);
                ?>
            </center>
        </div>

        <!-- Print button placed here at the bottom -->
        <center>
            <form action="" method="post">
                <input type="button" value="Print" class="btn" onclick="PrintDoc()">
            </form>
        </center>
    </body>

    </html>
<?php
}
?>
