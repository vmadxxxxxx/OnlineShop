<?php
define('TITLE', "Browse Shop;");
include('structure/header.php');

$items = Item::loadAll();

echo "<table class='table'><thead colspan='4'><tr><span class='table-header'>Items</span></th></tr></thead><tr><td><span class='table-col'>Id</span></td><td><span class='table-col'>Name</span></td><td><span class='table-col'>Price</span></td><td><span class='table-col'>Description<span></td><td class='img'><span class='table-col'>Image<span></td></tr>";
    foreach ($items as $key) {
        $itemId = $key->getId();
        $pictures = Image::loadAllById($itemId);

        echo "<tr><td>".$key->getId()."</td><td>".$key->getName()."</td><td>".$key->getPrice()."</td><td>".$key->getDescription()."</td>";
        echo "<td>";
    foreach ($pictures as $val) {
        $sciezka = $val->getSource();
        echo "<a href='$sciezka'><img src='$sciezka' width='130' height='80'/></a>";
        }
    }
      echo"</td></tr>";
    echo "</table>";
?>


<?php
include('structure/footer.php');
?>
