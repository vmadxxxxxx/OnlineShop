<?php


define('TITLE', "admin");
include($_SERVER['DOCUMENT_ROOT']."/OnlineShop/structure/header.php");



if  ($_SERVER['REQUEST_METHOD'] == 'DELETE') {


    parse_str(file_get_contents("php://input"), $del_vars);

    $id = intval($del_vars['id']);
    
    $toDelete = User::loadById($id);


    $result = $toDelete->delete($id);
    
    echo json_encode($result);
}
include($_SERVER['DOCUMENT_ROOT'].'/OnlineShop/structure/footer.php');