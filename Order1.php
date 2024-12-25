<?php
include "connect.php";
if (isset($_POST['productid'])) {
    $customer = $_POST['customer'];
    $address = $_POST['address'];
    $sql = "insert into purchase (customer, date_purchase,address) values ('$customer', NOW(),'$address')";
    $con->query($sql);
    
    $pid = $con->insert_id;

    $total = 0;

    foreach ($_POST['productid'] as $product):
        $proinfo = explode("||", $product);
        $productid = $proinfo[0];
        $iterate = $proinfo[1];
        echo "Data from previous page.." . $productid . $iterate;
        $sql = "select * from product where productid='$productid'";
        $query = $con->query($sql);
        $row = $query->fetch_array();
        echo "quantity..." . $_POST['quantity_' . $iterate];
        if (!isset($_POST['quantity_' . $iterate])) {
            // echo "Please fill quantity for order";
?>
            <script>
                window.alert('Please fill quantity for order');
                window.location.href = 'Order.php';
            </script>
    <?php } else {
            $subt = $row['price'] * $_POST['quantity_' . $iterate];
            $total += $subt;
            $sql = "insert into purchase_detail(purchaseid, productid, quantity) values ('$pid', '$productid', '" .
                $_POST['quantity_' . $iterate] . "')";
            $con->query($sql);
        }
    endforeach;
    $sql = "update purchase set total='$total' where purchaseid='$pid'";
    $con->query($sql);
    session_start();
    $_SESSION['sess_pid'] = $pid;
    header('location:OrderSuccess.php');
} else {
    ?>
    <script>
        window.alert('Please select a product');
        window.location.href = 'Order.php';
    </script>
<?php
}
?>