

<?php

define('TITLE', "Cart");
include('structure/header.php');


if (isset($_SESSION['cart'])) {

    $cartArray = $_SESSION['cart'];
    $total = 0;
    ?>

    <h1>My cart</h1>
    
    <div>
    <table class="table">
        <thead class="table-header">
        <tr>
            <td>Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Edit</td>
        </tr>
        </thead>

  <?php  
    foreach ($cartArray as $id => $value) {
        $total += $value['quantity']*$value['price'];
        ?>
        <tr>
        <td><?php echo $value['name']."<br>"; ?></td>
        <td><?php echo $value['price']."<br>"; ?></td>
        <td><?php echo $value['quantity']."<br>"; ?></td>
        <td><form action="" method="POST"><input type="submit" value="Remove"></form></td>
        </tr>
      <?php  
    }
 ?>   
    </table>
    </div>
    
    <div>
        <h3>Total price</h3>
        <?php echo $total; ?>
    </div>
<?php
} else {
    echo "Cart is empty!";
}














include('structure/footer.php');
