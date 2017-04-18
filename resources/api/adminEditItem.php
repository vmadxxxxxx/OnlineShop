<?php
include($_SERVER['DOCUMENT_ROOT'].'/OnlineShop/structure/header.php');

// receiving json from adminPanel.js and action after clicking delete User button
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

        
        parse_str(file_get_contents("php://input"), $del_vars);

        $idItem = intval($del_vars['id']);

        $toDeleteItem = Item::loadById($idItem);

        $resultItem = $toDeleteItem->delete($idItem);
        

     
}

include($_SERVER['DOCUMENT_ROOT'].'/OnlineShop/structure/footer.php');