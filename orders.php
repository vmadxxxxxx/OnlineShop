<?php

define('TITLE', "My orders");
include('structure/header.php');
if (isset($_SESSION['id']) || isset($_SESSION['adminEmail'])) {
    $userId = $_SESSION['id'];
    $order = Order::loadAllOrdersByUserId($userId);
?>

<table class='table'>
    <thead colspan='6'>
    <tr><span class='table-header' style="color: red">Orders history</span></th></tr>
    </thead>
    <tr>
        <td><span class='table-col'>Id</span></td>
        <td><span class='table-col'>Customer</span></td>
        <td><span class='table-col'>Summary</span></td>
        <td><span class='table-col'>Charge<span></td>
        <td><span class='table-col'>Date<span></td>
    </tr>
<?php
    foreach ($order as $key) {
        $OrderId = $key->getId();

?>          <tr>
    <td><?php echo $key->getId(); ?></td>
    <td><?php echo $key->getCustomer(); ?></td>
    <td><?php echo $key->getSummary() ?></td>
    <td><?php echo $key->getCharge(); ?></td>
    <td><?php echo $key->getDate(); ?></td>
    </tr>
<?php }
} ?>
    <?php

    include('structure/footer.php');
