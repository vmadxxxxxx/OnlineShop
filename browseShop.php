<?php

define('TITLE', "Browse Shop");
include('structure/header.php');

if (isset($_SESSION['id']) || isset($_SESSION['adminEmail'])) {
    $items = Item::loadAll();
    
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id = intval($_GET['id']); 
        $price = $_GET['price'];
        $name = $_GET['name'];
        
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['quantity']++; 
              
        } else {
            $_SESSION['cart'][$id]=array( 
                        'quantity' => 1, 
                        'price' => $price,
                        'name' => $name
                    ); 
          }
              
    } else { 
                  
        $message="This product id is invalid!"; 
                  
           } 
          
     

?>
    <table class='table'>
        <thead colspan='6'>
            <tr><span class='table-header'>Items</span></th></tr>
        </thead>
            <tr>
                <td><span class='table-col'>Id</span></td>
                <td><span class='table-col'>Name</span></td>
                <td><span class='table-col'>Price</span></td>
                <td><span class='table-col'>Description<span></td>
                <td class='img'><span class='table-col'>Images<span></td>
            </tr>
            
<?php
    foreach ($items as $key) {
        $itemId = $key->getId();
        $pictures = Image::loadAllById($itemId);

?>          <tr>
                <td><?php echo $key->getId(); ?></td>
                <td><?php echo $key->getName(); ?></td>
                <td><?php echo $key->getPrice() ?></td>
                <td><?php echo $key->getDescription(); ?></td>
                <td>
<?php
        foreach ($pictures as $val) {
            $sciezka = $val->getSource();
            
            ?>
            <a href='<?php echo $sciezka; ?>'><img src='<?php echo $sciezka; ?>' width='130' height='80'/></a>
            
<?php
        }
?>
            </td>
                <td class="link"><a href="browseShop.php?action=add&id=<?php echo $key->getId(); ?>&price=<?php echo $key->getPrice(); ?>&name=<?php echo $key->getName(); ?>">Add to cart</a></td>
            </tr>
<?php
    }
    ?>
                
    </table>

<?php
} else {
    echo "You have to log in first!";
    header("Refresh: 2 loginForm.php?");
    echo "<br>Click here if you are not redirected autmatically! <a href='loginForm.php'>Login</a>";
}
?>


<?php

include('structure/footer.php');

