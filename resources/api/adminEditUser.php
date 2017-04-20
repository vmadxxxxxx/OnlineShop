<?php
include($_SERVER['DOCUMENT_ROOT'].'/OnlineShop/structure/header.php');

// receiving json from adminPanel.js and action after clicking delete User button
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

        
        parse_str(file_get_contents("php://input"), $del_vars);

        $idUser = intval($del_vars['id']);

        $toDeleteUser = User::loadById($idUser);

        $resultUser = $toDeleteUser->delete();
        

     
}

include($_SERVER['DOCUMENT_ROOT'].'/OnlineShop/structure/footer.php');
