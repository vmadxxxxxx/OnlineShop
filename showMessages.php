<?php
define('TITLE', "Main page");
include('structure/header.php');

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    
    //load all messages by user id
    $msgs = Message::loadAllByReceiverId($userId);
    
    foreach ($msgs as $obj) {
        
        //load email of admin who sent the message
    $sender = Admin::loadById($obj->getSender());
    $senderEmail = $sender->getEmail();
    
        echo "<br><div class='container'>Message from Admin - $senderEmail <br>Date: ".$obj->getDate().
                "<br><div>".$obj->getContent()."</div></div><br>";
    }
    
}

include('structure/footer.php');

