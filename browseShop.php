<?php
define('TITLE', "Browse Shop;");
include('structure/header.php');

$image = Image::loadByItemId(1);
$path = $image->getSource();
echo $path;
var_dump($image);

foreach ($image as $value) {
  $path = $value->getSource();
  echo $path;
}

$items = Item::loadAll();
// var_dump($items);
    echo "<table class='table'><thead colspan='4'><tr><span class='table-header'>Items</span></th></tr></thead><tr><td><span class='table-col'>Id</span></td><td><span class='table-col'>Name</span></td><td><span class='table-col'>Price</span></td><td><span class='table-col'>Description<span></td><td><span class='table-col'>Image<span></td></tr>";
    foreach ($items as $key) {
        echo "<tr><td>".$key->getId()."</td><td>".$key->getName()."</td><td>".$key->getPrice()."</td><td>".$key->getDescription()."</td><td>"
        ."<img src='$path' width='130' height='80'/>"."</td></tr>";

    }
    echo "</table>";
?>


<?php
include('structure/footer.php');
?>
