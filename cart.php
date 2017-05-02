

<?php

define('TITLE', "Cart");
include('structure/header.php');


if (isset($_SESSION['cart'])) {

    $cartArray = $_SESSION['cart'];
    
    foreach ($cartArray as $id => $value) {
        
        echo $value['quantity']."<br>";
    }
    print_r ($_SESSION['cart'][2]);

    print_r ($_SESSION['cart'][1]);
}














include('structure/footer.php');
