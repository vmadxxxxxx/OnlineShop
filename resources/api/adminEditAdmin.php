<?php

require_once('../config.php');
require_once('../class/activeRecordInterface.php');
require_once('../class/activeRecord.php');
require_once('../class/Admin.php');

// receiving json from adminPanel.js and action after clicking delete Admin button
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {


    parse_str(file_get_contents("php://input"), $del_vars);

    $idAdmin = intval($del_vars['id']);

    $toDeleteAdmin = Admin::loadById($idAdmin);

    $result = $toDeleteAdmin->delete();

    echo json_encode($result);
    
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {

    parse_str(file_get_contents("php://input"), $put_vars);
    $id = $put_vars['id'];
    $name = $put_vars['name'];
    $email = $put_vars['email'];
    $toUpdate = Admin::loadById($id);
    $toUpdate->setName($name);
    $toUpdate->setEmail($email);
    $toUpdate->save();

    echo json_encode($toUpdate);
}
