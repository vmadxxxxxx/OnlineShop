<?php
define('TITLE', "adminPanel;");
include('structure/header.php');

if (isset($_SESSION['adminEmail'])) {
    
    $users = User::loadAll();
    echo "<table class='table'><thead colspan='5'><tr><span class='table-header'>Users</span></th></tr></thead>"
    . "<tr><td><span class='table-col'>Id</span></td><td><span class='table-col'>Name</span></td><td><span class='table-col'>Surname</span></td>"
            . "<td><span class='table-col'>E-mail<span></td><td><span class='table-col'>Edit</span></td></tr>";
    foreach ($users as $key) {
        echo "<tr><td>".$key->getId()."</td><td>".$key->getName()."</td><td>".$key->getSurname()."</td><td>".$key->getEmail()."</td>"
                . "<td><button class='btn' name='delBtn'>Delete</button></tr>";
        
    }
    echo "</table>";
}
?>


<?php
include('structure/footer.php');
?>

<script src="./structure/js/adminPanel.js"></script>

