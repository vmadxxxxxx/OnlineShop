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

    //creating table with all Users and buttons to delete and edit them
    $users = User::loadAll();
    ?>
    <div class='panel panel-default table-responsive'>
        <table class='table table-condensed table-hover'>
            <thead>
                <tr><span class='table-header'>Users</span></th></tr>
            </thead>
            <tr>
                <td><span class='table-col'>Id</span></td><td><span class='table-col'>Name</span></td>
                <td><span class='table-col'>Surname</span></td><td><span class='table-col'>E-mail<span></td>
                <td><span class='table-col'>Action</span></td>
            </tr>
<?php
    foreach ($users as $key) {
        $idUser = $key->getId(); ?>
            <tr>
                <td><?php echo $idUser ?></td>
                <td><?php echo $key->getName();?></td>
                <td><?php echo $key->getSurname(); ?></td>
                <td><?php echo $key->getEmail(); ?></td>
                <td><button type='submit' class='btnSendMsg btn btn-primary' name='btnSendMsg'>Send Message </button> 
                    <button type='submit' class='btnEditUser btn btn-info' name='btnEditUser'>Edit </button> 
                    <button type='submit' class='btnDelUser btn btn-danger' name='btnDelUser'>Delete </button>
            </tr>
            
<?php 

    } 
        $items = Item::loadAll();
?>
            
        </table>
                            <!-- table with all items -->  
        <table class='table table-hover table-condensed'>
            <thead>
                <tr><span class='table-header'>Items</span></th></tr>
            </thead>
                <tr>
                    <td><span class='table-col'>Id</span></td>
                    <td><span class='table-col'>Name</span></td>
                    <td><span class='table-col'>Price</span></td>
                    <td><span class='table-col'>Description<span></td>
                    <td><span class='table-col'>Action</span></td></tr>

<?php
    foreach ($items as $key) {
        $idItem = $key->getId();
?>
                <tr>
                    <td><?php echo $idItem; ?></td>
                    <td><?php echo $key->getName(); ?></td>
                    <td><?php echo $key->getPrice(); ?></td>
                    <td><?php echo $key->getDescription(); ?></td>
                    <td><button type='submit' class='btnEditItem btn btn-primary' name='btnEditItem'>Add Image </button>
                        <button type='submit' class='btnAddImage btn btn-info' name='btnAddImage'>Edit </button>
                        <button type='submit' class='btnDelItem btn btn-danger' name='btnDelItem'>Delete </button></td>
                </tr>
<?php
    }   
        $admins = Admin::loadAll();
?>
        </table>
                            <!-- table with all admins -->
                            
        <table class='table table-hover table-condensed'>
            <thead>
                <tr colspan='6'><span class='table-header'>Admins</span></th></tr>
            </thead>
                <tr>
                    <td><span class='table-col'>Id</span></td>
                    <td colspan='2'><span class='table-col'>Name</span></td>
                    <td colspan='2'><span class='table-col'>Email<span></td>
                    <td><span class='table-col'>Action</span></td></tr>
<?php
                            foreach ($admins as $key) {
                                $idAdmin = $key->getId();
?>
                <tr>
                    <td><?php echo $idAdmin?></td>
                    <td colspan='2'><?php echo $key->getName() ?></td>
                    <td colspan='2'><?php echo $key->getEmail() ?></td>
                    <td><button type='submit' class='btnAddAdmin btn btn-primary' name='btnAddAdmin'>Add Admin </button>
                        <button type='submit' class='btnEditAdmin btn btn-info' name='btnEditAdmin'>Edit </button>
                        <button type='submit' class='btnDelAdmin btn btn-danger' name='btnDelAdmin'>Delete </button></td></tr>
<?php
    }
?>
        </table>
    </div>
<?php
    }

include('structure/footer.php');
?>

<script src="./structure/js/adminPanel.js"></script>
