<?php

define('TITLE', "My orders");
include('structure/header.php');
echo "<br> Place for displaying accepted orders <br>";
if (isset($_SESSION['id']) || isset($_SESSION['adminEmail'])) {
$order = Order::loadAll();

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
