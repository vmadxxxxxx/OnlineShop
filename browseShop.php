<?php
define('TITLE', "Browse Shop;");
include('structure/header.php');

// $pictures = Image::loadAllById(3);

// foreach ($pictures as $val) {
//  $sciezka = $val->getSource();
//  echo "$sciezka <br>";
//
// }

// $image = Image::loadByItemId(3);
// $path = $image->getSource();

$items = Item::loadAll();
// var_dump($items);
    echo "<table class='table'><thead colspan='4'><tr><span class='table-header'>Items</span></th></tr></thead><tr><td><span class='table-col'>Id</span></td><td><span class='table-col'>Name</span></td><td><span class='table-col'>Price</span></td><td><span class='table-col'>Description<span></td><td><span class='table-col'>Image<span></td></tr>";
    foreach ($items as $key) {
        $itemId = $key->getId();
        //var_dump($itemId);
        $images = Image::loadByItemId($itemId);
        $path = $images->getSource();
        echo "<tr><td>".$key->getId()."</td><td>".$key->getName()."</td><td>".$key->getPrice()."</td><td>".$key->getDescription()."</td><td>"
        ."<a href='$path'><img src='$path' width='130' height='80'/></a>"."</td></tr>";

    }
    echo "</table>";
?>


<?php
include('structure/footer.php');
?>
