<?php
define('TITLE', "Admin Panel");


include($_SERVER['DOCUMENT_ROOT'] . "/OnlineShop/structure/header.php");



if (isset($_SESSION['adminEmail'])) {
    
    //creating table with all Users and buttons to delete them
    $users = User::loadAll();
    echo "<table class='table'><thead colspan='5'><tr><span class='table-header'>Users</span></th></tr></thead>"
    . "<tr><td><span class='table-col'>Id</span></td><td><span class='table-col'>Name</span></td><td><span class='table-col'>Surname</span></td>"
    . "<td><span class='table-col'>E-mail<span></td><td><span class='table-col'>Edit</span></td></tr>";
    foreach ($users as $key) {
        $id = $key->getId();
        echo "<tr><td>" . $id . "</td><td>" . $key->getName() . "</td><td>" . $key->getSurname() . "</td><td>" . $key->getEmail() . "</td>"
        . "<td><button type='submit' class='btnDelUser btn' name='btnDelUser'>Delete</button></tr>";
    }
    echo "</table>";

    
    $items = Item::loadAll();
    echo "<table class='table'><thead colspan='5'><tr><span class='table-header'>Items</span></th></tr></thead>"
    . "<tr><td><span class='table-col'>Id</span></td><td><span class='table-col'>Name</span></td><td><span class='table-col'>Price</span></td>"
    . "<td><span class='table-col'>Description<span></td><td><span class='table-col'>Edit</span></td></tr>";
    foreach ($items as $key) {
        $id = $key->getId();
        echo "<tr><td>" . $id . "</td><td>" . $key->getName() . "</td><td>" . $key->getPrice() . "</td><td>" . $key->getDescription() . "</td>"
        . "<td><button type='submit' class='btnDelItem btn' name='btnDelItem'>Delete</button></td></tr>";
    }
    echo "</table>";

}


include('structure/footer.php');
?>

<script src="./structure/js/adminPanel.js"></script>

