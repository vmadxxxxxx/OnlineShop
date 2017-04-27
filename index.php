<?php
define('TITLE', "Main page");
include('structure/header.php');

$item1 = Item::loadById(1);
$image1 = Image::loadById(6);
$image2 = Image::loadById(7);
$image3 = Image::loadById(8);
?>


<div class="col-md-6 carousel" id="karuzela1" data-ride="carousel">
    <h2>iPhone 7</h2>
    
    <ol class="carousel-indicators">
        <li data-target="#karuzela1" data-slide-to="0" class="active"></li>
        <li data-target="#karuzela1" data-slide-to="1"></li>
        <li data-target="#karuzela1" data-slide-to="2"></li>
    </ol>
    
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="img img-responsive center-block" src="<?= $image1->getSource();?>">
        </div>
        <div class="item">
             <img class="img img-responsive center-block" src="<?= $image2->getSource();?>">
        </div>
        <div class="item">
             <img class="img img-responsive center-block" src="<?= $image3->getSource();?>">
        </div>
    
        <a class="left carousel-control" href="#karuzela1" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#karuzela1" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>    
    
    <div class="bg-info">
        <h4  id="price">Price: <s class="text-muted"> 4199 zł </s> <span class="glyphicon glyphicon-arrow-right"></span>
        <strong><span> <?= $item1->getPrice();?> zł </span></strong><a class="btn btn-danger" href="browseShop.php"> Buy now! </a></h4>
    </div>
        
</div>


<?php 
$item2 = Item::loadById(2);
$image4 = Image::loadById(1);
$image5 = Image::loadById(2);
$image6 = Image::loadById(3);
?>

<div class="col-md-6 carousel" id="karuzela2" data-ride="carousel">
    <h2>Samsung Galaxy S7</h2>
    
    <ol class="carousel-indicators">
        <li data-target="#karuzela2" data-slide-to="0" class="active"></li>
        <li data-target="#karuzela2" data-slide-to="1"></li>
        <li data-target="#karuzela2" data-slide-to="2"></li>
    </ol>
    
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="img img-responsive center-block" src="<?= $image4->getSource();?>">
        </div>
        <div class="item">
             <img class="img img-responsive center-block" src="<?= $image5->getSource();?>">
        </div>
        <div class="item">
             <img class="img img-responsive center-block" src="<?= $image6->getSource();?>">
        </div>
    
        <a class="left carousel-control" href="#karuzela2" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#karuzela2" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>    
    
    <div class="bg-info">
        <h4  id="price">Price: <s class="text-muted"> 3500 zł </s> <span class="glyphicon glyphicon-arrow-right"></span>
        <strong><span> <?= $item2->getPrice();?> zł </span></strong><a class="btn btn-danger" href="browseShop.php"> Buy now! </a></h4>
    </div>
</div>

<?php
include('structure/footer.php');
?>
