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
   
}


