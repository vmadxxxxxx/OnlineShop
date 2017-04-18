<?php
define('TITLE', "Admin Panel");


include($_SERVER['DOCUMENT_ROOT']."/OnlineShop/structure/header.php");








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

// receiving json from adminPanel.js and action after clicking delete User button
if  ($_SERVER['REQUEST_METHOD'] == 'DELETE') {


    parse_str(file_get_contents("php://input"), $del_vars);

    $id = intval($del_vars['id']);
    
    $toDelete = User::loadById($id);


    $result = $toDelete->delete($id);

}




include('structure/footer.php');
?>

<script src="./structure/js/adminPanel.js"></script>

