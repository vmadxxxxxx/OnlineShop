


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
        <nav class='navbar navbar-default navbar-fixed-top navbar-inverse'>
            <div class='container-fluid'>
                <div class='navbar-header navbar-left col-md-2'>
                    <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#nav-rolled'>
                        <span class='sr-only'>Toggle</span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                    </button>
                    <p><a class='navbar-text' href='./index.php'><strong>Online Shop</strong></a></p>
                </div>

                <div class='collapse navbar-collapse' id='nav-rolled'>
                        <ul class='nav navbar-nav col-md-8'>
                            <li class='active'><a href='./browseShop.php'>Browse Shop <span class='glyphicon glyphicon-search' aria-hidden='true'></span></a></li>
                            <li><a href='./structure/pages/messages.php'>Messages <span class='glyphicon glyphicon-envelope' aria-hidden='true'></span></a></li>
                            <li><a href='#myOrders'>My orders</a></li>
                            <li><a href='#cart'>Cart <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span></a></li>
                        </ul>

                        <ul class='nav navbar-nav navbar-right'>
                            <li><a href='./contact.php'>Contact</a></li>
                            <li><a href='./logOut.php'>Log out</a></li>
                        </ul>
                </div>
            </div>
        </nav>";

$adminUser = "
        <nav class='navbar navbar-default navbar-fixed-top navbar-inverse'>
            <div class='container-fluid'>
                <div class='navbar-header navbar-left col-md-2'>
                    <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#nav-rolled'>
                        <span class='sr-only'>Toggle</span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                    </button>
                    <p><a class='navbar-text' href='./index.php'><strong>Online Shop</strong></a></p>
                </div>

                <div class='collapse navbar-collapse' id='nav-rolled'>
                        <ul class='nav navbar-nav col-md-8'>
                            <li class='active'><a href='./browseShop.php'>Browse Shop <span class='glyphicon glyphicon-search' aria-hidden='true'></span></a></li>
                            <li><a href='#messages'>Messages <span class='glyphicon glyphicon-envelope' aria-hidden='true'></span></a></li>
                            <li><a href='#myOrders'>My orders</a></li>
                            <li><a href='#cart'>Cart <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span></a></li>
                        </ul>

                        <ul class='nav navbar-nav navbar-right'>
                            <li><a href='./adminPanel.php'>Admin Panel</a></li>
                            <li><a href='./contact.php'>Contact</a></li>
                            <li><a href='./logOut.php'>Log out</a></li>
                        </ul>
                </div>
            </div>
        </nav>";

if (isset($_SESSION['email'])) {
    echo $loggedUser;
} else if (isset($_SESSION['adminEmail'])) {
    echo $adminUser;
} else {
    echo $newUser;
}
?>
