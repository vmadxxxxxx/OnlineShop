<?php
define('TITLE', "Admin Panel");
include('structure/header.php');

if (isset($_SESSION['adminEmail'])) {
    
    $users = User::loadAll();
    echo "<table class='table'><thead colspan='5'><tr><span class='table-header'>Users</span></th></tr></thead>"
    . "<tr><td><span class='table-col'>Id</span></td><td><span class='table-col'>Name</span></td><td><span class='table-col'>Surname</span></td>"
            . "<td><span class='table-col'>E-mail<span></td><td><span class='table-col'>Edit</span></td></tr>";
    foreach ($users as $key) {
        $id = $key->getId();
        echo "<tr><td>".$id."</td><td>".$key->getName()."</td><td>".$key->getSurname()."</td><td>".$key->getEmail()."</td>"
                . "<td><button type='submit' class='btnDelUser' name='btnDelUser'>Delete</button></tr>";
        
    }
    echo "</table>";
    
}


include('structure/footer.php');
?>

<script src="./structure/js/adminPanel.js"></script>

