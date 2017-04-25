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
     
}
