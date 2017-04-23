<?php
define('TITLE', "Register");
include('structure/header.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['passwd'])) {


        //assigning data form sent form into variables
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['passwd'];

        //check if eamil is already in dataabse
        if (User::loadByEmail($email)) {
            echo "<span>E-mail already used!</span>";
            return false;
        } else {

            try {

//Creting new user and saving info into database
                $user = new User();
                $user->setName($name);
                $user->setSurname($surname);
                $user->setEmail($email);
                $user->setPassword($password);
                $user->save();

                echo "Account created. You can log in now. ";
                echo "<a href='./loginForm.php'>Log In</a>";
            } catch (Exception $e) {
                echo "Uwaga: " . $e->getMessage() . "\n";
                return false;
            }
        }
    } else {
        echo "<span>Fill all empty spaces!</span>";
    }
}
?>

<h2>Register new account</h2><br>

<form action="" method="POST">
    <div class="form-group center-block">
        <label for="name" class="control-label">Name:</label>

        <input class="form-control" id="name" type="text" name ="name"></input><br>

        <label class="control-label" for="surname">Surname</label>

        <input class="form-control" id="surname" type="text" name="surname"></input><br>

        <label class="control-label" for="email">Email</label>

        <input class="form-control" id="email" type="email" name="email"></input><br>

        <label class="control-label" for="passwd">Password</label>

        <input class="form-control" id="passwd" type="password" name="passwd"></input>
        <br>


        <button class="btn btn-info" type="submit" name="submit">Send</button>

    </div>
</form>




<?php
include('structure/footer.php');
?>