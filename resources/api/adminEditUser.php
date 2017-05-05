<?php

require_once('../config.php');
require_once('../class/activeRecordInterface.php');
require_once('../class/activeRecord.php');
require_once('../class/User.php');

// receiving json from adminPanel.js and action after clicking delete User button
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    parse_str(file_get_contents("php://input"), $del_vars);

    $idUser = intval($del_vars['id']);

    $toDeleteUser = User::loadById($idUser);

    $resultUser = $toDeleteUser->delete();

    echo json_encode($resultUser);
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {

    parse_str(file_get_contents("php://input"), $put_vars);
    $id = $put_vars['id'];
    $name = $put_vars['name'];
    $surname = $put_vars['surname'];
    $email = $put_vars['email'];
    $toUpdate = User::loadById($id);
    $toUpdate->setName($name);
    $toUpdate->setSurname($surname);
    $toUpdate->setEmail($email);
    $toUpdate->save();

    echo json_encode($toUpdate);
}
