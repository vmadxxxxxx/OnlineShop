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

    ?>
    <div class='panel panel-default table-responsive'>
        <div class='tableUsers'>
        <table class='table table-condensed'>
            <thead>
                <tr><span class='table-header'>Users</span></th></tr>
            </thead>
            <tr>
                <td><span class='table-col'>Id</span></td><td><span class='table-col'>Name</span></td>
                <td><span class='table-col'>Surname</span></td><td><span class='table-col'>E-mail<span></td>
                <td><span class='table-col'>Action</span></td>
            </tr>
<?php
    $users = User::loadAll();
    
    foreach ($users as $key) {
        $idUser = $key->getId(); ?>
            <tr class='trUsers'>
                <td class='userId'><?php echo $idUser ?></td>
                <td class='userName'><?php echo $key->getName();?></td>
                <td class='userSurname'><?php echo $key->getSurname(); ?></td>
                <td class = 'userEmail'><?php echo $key->getEmail(); ?></td>
                <td><button type='submit' class='btnSendMsg btn btn-primary' name='btnSendMsg'>Send Message </button> 
                    <button type='submit' class='btnEditUser btn btn-info' name='btnEditUser'>Edit </button> 
                    <button type='submit' class='btnDelUser btn btn-danger' name='btnDelUser'>Delete </button></td>  
            </tr>
            
<?php 

    } 
?>
            
            </table></div>
                            <!-- table with all items -->  
        <table class='table table-condensed'>
            <thead>
                <tr><span class='table-header'>Items</span></th></tr>
            </thead>
                <tr>
                    <td><span class='table-col'>Id</span></td>
                    <td><span class='table-col'>Name</span></td>
                    <td><span class='table-col'>Price</span></td>
                    <td><span class='table-col'>Description<span></td>
                    <td><span class='table-col'>Action</span></td>
                </tr>

<?php
    $items = Item::loadAll();
    
    foreach ($items as $key) {
        $idItem = $key->getId();
?>
                <tr class='trItems'>
                    <td class='itemId'><?php echo $idItem; ?></td>
                    <td class='itemName'><?php echo $key->getName(); ?></td>
                    <td class='itemPrice'><?php echo $key->getPrice(); ?></td>
                    <td class='itemDescription'><?php echo $key->getDescription(); ?></td>
                    <td><button type='submit' class='btnAddImage btn btn-primary' name='btnEditItem'>Add Image </button>
                        <button type='submit' class='btnEditItem btn btn-info' name='btnAddImage'>Edit </button>
                        <button type='submit' class='btnDelItem btn btn-danger' name='btnDelItem'>Delete </button></td>
                </tr>
<?php
    }   

?>
        </table>
                            <!-- table with all admins -->
                            
        <table class='table table-condensed'>
            <thead>
                <tr colspan='6'><span class='table-header'>Admins</span></th></tr>
            </thead>
                <tr>
                    <td><span class='table-col'>Id</span></td>
                    <td colspan='2'><span class='table-col'>Name</span></td>
                    <td colspan='2'><span class='table-col'>Email<span></td>
                    <td><span class='table-col'>Action</span></td>
                </tr>
<?php
        $admins = Admin::loadAll();
        
        foreach ($admins as $key) {
            $idAdmin = $key->getId();
?>
                <tr class="trAdmins">
                    <td class="adminId"><?php echo $idAdmin?></td>
                    <td class="adminName" colspan='2'><?php echo $key->getName() ?></td>
                    <td class="adminEmail" colspan='2'><?php echo $key->getEmail() ?></td>
                    <td><button type='submit' class='btnEditAdmin btn btn-info' name='btnEditAdmin'>Edit </button>
                        <button type='submit' class='btnDelAdmin btn btn-danger' name='btnDelAdmin'>Delete </button></td>
                </tr>
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
