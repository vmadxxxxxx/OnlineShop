<?php
define('TITLE', "LogIn");
include('structure/header.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['passwd'])) {


        //assigning data form sent form into variables

        $email = $_POST['email'];
        $password = $_POST['passwd'];

        //check if eamil is already in dataabse
        if (!!User::loadByEmail($email)) {
            if (User::verifyPassword($password, $email) == true) {

                try {


                    //assigning session parameters
                    $_SESSION['email'] = $email;

                    echo "Success!<br>";
                    header("Refresh: 2 index.php?");
                    
                } catch (Exception $e) {
                    echo "Uwaga: " . $e->getMessage() . "\n";
                    return false;
                }
            }
        } else {
            echo "nie";
        }
    } else {
        echo "<span>Fill all empty spaces!</span>";
    }
}
?>
<h2>Log In</h2>
<div class="form-inline">
    <form action="" method="POST">
        <label class="label">Email</label>
        <input class="input-sm" type="email" name ="email"></input><br><br>
        <label class="label">Password</label>
        <input class="input-sm" type="password" name="passwd"></input><br><br>
        <button class="btn-primary" type="submit" name="submit">Confirm</button><br><br>
    </form>
</div>

<?php
include('structure/footer.php');
?>