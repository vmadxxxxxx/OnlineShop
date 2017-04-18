<?php
define('TITLE', "LogIn");
include('structure/header.php');

unset($_SESSION['email']);

echo "You have benn logged out!";

header("Refresh: 1 index.php?");


include('structure/footer.php');
?>
