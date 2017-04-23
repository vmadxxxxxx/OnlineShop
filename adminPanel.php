<?php
define('TITLE', "Admin Panel");


include($_SERVER['DOCUMENT_ROOT'] . "/OnlineShop/structure/header.php");


if (isset($_SESSION['adminEmail'])) {
    ?>
    <!--form for sending message to all users -->
    <br>
    <div class="form-group center-block">
        <form action="" method="POST">
            <label for='msg'>Send message to all users</label>
            <textarea class='form-control' name='msg'></textarea>
            <button type="submit" class="btnSendMsgs btn" name="btnSendMsgs">Send</button>
        </form>
    </div>
    
    
 <?php
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['msg'])) {
            $emailAdmin = $_SESSION['adminEmail'];
            $content = $_POST['msg'];
            $date = date("Y.m.d H:i:s");
            $id = Admin::loadByEmail($emailAdmin);
            $sender = $id['id'];
            $receivers = User::loadAll();

            foreach ($receivers as $key) {
                $receiver = $key->getId();
                $message = new Message();
                $message->setSender($sender);
                $message->setReceiver($receiver);
                $message->setContent($content);
                $message->setDate($date);
                $message->save();
            }
            echo "Messages sent!";
        }
    }



    //creating table with all Users and buttons to delete them
    $users = User::loadAll();
    echo "<div class='panel panel-default table-responsive'><table class='table table-condensed table-hover'><thead colspan='5'><tr><span class='table-header'>Users</span></th></tr></thead>"
    . "<tr><td><span class='table-col'>Id</span></td><td><span class='table-col'>Name</span></td><td><span class='table-col'>Surname</span></td>"
    . "<td><span class='table-col'>E-mail<span></td><td><span class='table-col'>Edit</span></td></tr>";
    foreach ($users as $key) {
        $idUser = $key->getId();
        echo "<tr><td>" . $idUser . "</td><td>" . $key->getName() . "</td><td>" . $key->getSurname() . "</td><td>" . $key->getEmail() . "</td>"
        . "<td><button type='submit' class='btnDelUser btn btn-danger' name='btnDelUser'>Delete</button></tr>";
    }
    echo "</table>";


    $items = Item::loadAll();
    echo "<table class='table table-hover table-condensed'><thead colspan='5'><tr><span class='table-header'>Items</span></th></tr></thead>"
    . "<tr><td><span class='table-col'>Id</span></td><td><span class='table-col'>Name</span></td><td><span class='table-col'>Price</span></td>"
    . "<td><span class='table-col'>Description<span></td><td><span class='table-col'>Edit</span></td></tr>";
    foreach ($items as $key) {
        $idItem = $key->getId();
        echo "<tr><td>" . $idItem . "</td><td>" . $key->getName() . "</td><td>" . $key->getPrice() . "</td><td>" . $key->getDescription() . "</td>"
        . "<td><button type='submit' class='btnDelItem btn btn-danger' name='btnDelItem'>Delete</button></td></tr>";
    }
    echo "</table>";


    $admins = Admin::loadAll();
    echo "<table class='table table-hover table-condensed'><thead colspan='5'><tr><span class='table-header'>Admins</span></th></tr></thead>"
    . "<tr><td><span class='table-col'>Id</span></td><td colspan='2'><span class='table-col'>Name</span></td>"
    . "<td colspan='2'><span class='table-col'>Email<span></td><td><span class='table-col'>Edit</span></td></tr>";
    foreach ($admins as $key) {
        $idAdmin = $key->getId();
        echo "<tr><td>" . $idAdmin . "</td><td colspan='2'>" . $key->getName() . "</td><td colspan='2'>" . $key->getEmail() . "</td>"
        . "<td><button type='submit' class='btnDelAdmin btn btn-danger' name='btnDelAdmin'>Delete</button></td></tr>";
    }
    echo "</table></div>";
}


include('structure/footer.php');
?>

<script src="./structure/js/adminPanel.js"></script>

