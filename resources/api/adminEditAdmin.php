<?php

include($_SERVER['DOCUMENT_ROOT'] . '/OnlineShop/structure/header.php');

// receiving json from adminPanel.js and action after clicking delete Admin button
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {


    parse_str(file_get_contents("php://input"), $del_vars);

    $idAdmin = intval($del_vars['id']);

    $toDeleteAdmin = Admin::loadById($idAdmin);

    $result = $toDeleteAdmin->delete();

    echo json_encode($result);
    //json is not returned, error
}

include($_SERVER['DOCUMENT_ROOT'] . '/OnlineShop/structure/footer.php');