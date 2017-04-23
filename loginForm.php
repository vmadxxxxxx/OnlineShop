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

                    $obj = User::loadByEmail($email);
                    
                    //assigning session parameters
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $obj['id'];

                    echo "Success!<br>";
                    header("Refresh: 1 index.php?");

                } catch (Exception $e) {
                    echo "Uwaga: " . $e->getMessage() . "\n";
                    return false;
                }
            }
        } else if (!!Admin::loadByEmail($email)) {
            if (Admin::verifyPassword($password, $email) ===true) {
                try {


                    //assigning session parameters
                    $_SESSION['adminEmail'] = $email;

                    echo "Success!<br>";
                    header("Refresh: 1 index.php?");

                } catch (Exception $e) {
                    echo "Uwaga: " . $e->getMessage() . "\n";
                    return false;
                }

            } else {

                echo "Wrong password";
            }
        }


        else {
            echo "E-mail doesn't exist in database!";
        }
    } else {
        echo "<span>Fill all empty spaces!</span>";
    }
}
?>
<h2>Log In</h2><br>

<div class="form-group center-block">
    <form action="" method="POST">
        <label class="control-label">Email</label>
        <input class="form-control" type="email" name ="email"></input><br><br>
        <label class="control-label">Password</label>
        <input class="form-control" type="password" name="passwd"></input><br><br>
        <button class="btn btn-info" type="submit" name="submit">Confirm</button><br><br>
    </form>
</div>

<?php
include('structure/footer.php');
?>
