<?php
define('TITLE', "Browse Shop;");
include('structure/header.php');


$items = Item::loadAll();
    echo "<table class='table'><thead colspan='4'><tr><span class='table-header'>Users</span></th></tr></thead><tr><td><span class='table-col'>Id</span></td><td><span class='table-col'>Name</span></td><td><span class='table-col'>Surname</span></td><td><span class='table-col'>E-mail<span></td></tr>";
    foreach ($items as $key) {
        echo "<tr><td>".$key->getId()."</td><td>".$key->getName()."</td><td>".$key->getPrice()."</td><td>".$key->getDescription()."</td></tr>";

    }
    echo "</table>";
?>


<?php
include('structure/footer.php');
?>
