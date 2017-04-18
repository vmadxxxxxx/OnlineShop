<?php
include($_SERVER['DOCUMENT_ROOT'].'/OnlineShop/structure/header.php');

// receiving json from adminPanel.js and action after clicking delete User button
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {


        parse_str(file_get_contents("php://input"), $del_vars);

        $id = intval($del_vars['id']);

        $toDelete = Item::loadAll();

        $resultUser = Item::delete($id);
        

     //not finished, errors with deleting item (deleting user works fine)
}

include($_SERVER['DOCUMENT_ROOT'].'/OnlineShop/structure/footer.php');