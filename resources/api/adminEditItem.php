<?php

require_once('../config.php');
require_once('../class/activeRecordInterface.php');
require_once('../class/activeRecord.php');
require_once('../class/Item.php');

// receiving json from adminPanel.js and action after clicking delete Item button
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {


    parse_str(file_get_contents("php://input"), $del_vars);

    $idItem = intval($del_vars['id']);

    $toDeleteItem = Item::loadById($idItem);

    $result = $toDeleteItem->delete();

    echo json_encode($result);
   
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    
    parse_str(file_get_contents("php://input"), $put_vars);
    $id = $put_vars['id'];
    $name = $put_vars['name'];
    $price = $put_vars['price'];
    $description = $put_vars['description'];
    $toUpdate = Item::loadById($id);
    $toUpdate->setName($name);
    $toUpdate->setPrice($price);
    $toUpdate->setDescription($description);
    $toUpdate->save();

    echo json_encode($toUpdate);
}


