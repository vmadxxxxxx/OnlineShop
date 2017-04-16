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
                echo "<a href='http://localhost/Xpoint/sites/loginForm.php'>Log In</a>";
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








<!-- pierdolony formularz nie chce mi sie wyrownac, przenioslem go tez do glownego katalogu,
bo jak jest w structure to sie robia problemy z zalaczaniem bootstrapa i nie wiem jak te katalogi podpiac zeby bylo dobrze -->


<h2>Register new account</h2>
<div class="form-inline">
    <form action="" method="POST">
        <label class="label">Name</label>
        <input class="input-sm" type="text" name ="name"></input><br><br>
        <label class="label">Surname</label>
        <input class="input-sm" type="text" name="surname"></input><br><br>
        <label class="label">Email</label>
        <input class="input-sm" type="email" name="email"></input><br><br>
        <label class="label">Password</label>
        <input class="input-sm" type="password" name="passwd"></input><br><br>
        <button class="btn-primary" type="submit" name="submit">Confirm</button><br><br>
    </form>
</div>

<script src='structure/js/jquery-3.2.0.min.js'></script>
<script src="structure/js/bootstrap.min.js"></script>

<?php
include('structure/footer.php');
?>