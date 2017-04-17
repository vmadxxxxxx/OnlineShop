


<?php

$newUser = "
<nav class='navbar navbar-inverse navbar-fixed-top'>
    <div class='container'>
        <div class='navbar-header navbar-left'>
            <a class='navbar-brand' href='index.php'>Online Shop</a>
        </div>
        <div id='navabar' class='navbar-right'>
            <ul class='nav navbar-nav'>
                <li><a href='./contact.php'>Contact</a></li>
                <li><a href='./registerForm.php'>Register</a></li>
                <li><a href='./loginForm.php'>Login</a></li>
            </ul>
        </div>
    </div>
</nav> ";

$loggedUser = "
<nav class='navbar navbar-inverse navbar-fixed-top'>
    <div class='container'>
        <div class='navbar-header navbar-left'>
            <a class='navbar-brand' href='index.php'>Online Shop</a>
        </div>
        <div id='navabar' class='navbar-right'>
            <ul class='nav navbar-nav'>
                
                <li><a href='#items'>Browse Shop <span class='glyphicon glyphicon-search'></span></a></li>
                <li><a href='#messages'>Messages <span class='glyphicon glyphicon-envelope'></span></a></li>
                <li><a href='#myOrders'>My orders</a></li>
                <li><a href='#cart'>Cart</a></li>
                <li><a href='./contact.php'> Contact </a></li>
                <li><a href='./logOut.php'>Log out</a></li>
            </ul>
        </div>
    </div>
</nav> ";

$adminUser = "
<nav class='navbar navbar-inverse navbar-fixed-top'>
    <div class='container'>
        <div class='navbar-header navbar-left'>
            <a class='navbar-brand' href='index.php'>Online Shop</a>
        </div>
        <div id='navabar' class='navbar-right'>
            <ul class='nav navbar-nav'>
                
                <li><a href='#items'>Browse Shop <span class='glyphicon glyphicon-search'></span></a></li>
                <li><a href='#messages'>Messages <span class='glyphicon glyphicon-envelope'></span></a></li>
                <li><a href='#myOrders'>My orders</a></li>
                <li><a href='#cart'>Cart</a></li>
                <li><a href='#adminPanel'>Admin Panel</a></li>
                <li><a href='./contact.php'>Contact</a></li>
                <li><a href='#./logOut.php'>Log out</a></li>
            </ul>
        </div>
    </div>
</nav> ";

    if (isset($_SESSION['email'])) {
        echo  $loggedUser;
    }
    else if (isset($_SESSION['admin'])) {
        echo $adminUser;
    }
    
    
    else {
        echo $newUser;
        
    }
      


    
?>