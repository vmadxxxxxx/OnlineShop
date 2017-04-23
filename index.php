<?php
define('TITLE', "Main page");
include('structure/header.php');
?>


<div class="col-md-6 carousel" id="moja-karuzela" data-ride="carousel">
    <h1>iPhone 7</h1>
    
    <ol class="carousel-indicators">
        <li data-target="#moja-karuzela" data-slide-to="0" class="active"></li>
        <li data-target="#moja-karuzela" data-slide-to="1"></li>
        <li data-target="#moja-karuzela" data-slide-to="2"></li>
    </ol>
    
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="img img-responsive center-block" src="./resources/Images/iphone71.jpg">
        </div>
        <div class="item">
             <img class="img img-responsive center-block" src="./resources/Images/iphone72.jpg">
        </div>
        <div class="item">
             <img class="img img-responsive center-block" src="./resources/Images/iphone73.jpg">
        </div>
    
        <a class="left carousel-control" href="#moja-karuzela" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#moja-karuzela" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>    
    
    <div class="bg-warning">
        <h3  id="price">Price: <s class="text-muted"> 4199 zł </s> <span class="glyphicon glyphicon-arrow-right"></span>
        <strong><span> 3199 zł </span></strong><small><a class="text-danger bg-danger" href="#"> Buy now! </a></small></h3>
    </div>
        
</div>




<div class="col-md-6">
    <p>Przedmiot 2</p>
</div>

<?php
include('structure/footer.php');
?>
