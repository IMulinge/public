<?php 
include('header.php');
?>

<?php
if(!isset($_SESSION['loggedin'])){
	echo'You are not logged in please log in first in order to access more content';
}
else {

    print_r($_SESSION['cart']);
    echo '<br>';
    echo 'Hello bro';
    echo $_SESSION['cart'][1];
    echo '<br>';
    echo 'Hello bro2222';
    echo '<br>';
    $vex = (array_chunk($_SESSION['cart'], 2, true));
    print_r($vex);
    echo '<br>';
    echo "Redcross";
    echo "<br>";
   // print_r(array_count_values($vex));

   function multi_unique($src){
    $output = array_map("unserialize",
    array_unique(array_map("serialize", $src)));
  return $output;
}

$output=multi_unique($vex);
echo "What are we making today gromit";
echo "<br>";
print_r($output);

    
    $arr = $vex;
   $out = array();
   foreach ($arr as $key => $value){
       foreach ($value as $key2 => $value2){
           $index = $key2.'-'.$value2;
           if (array_key_exists($index, $out)){
               $out[$index]++;
           } else {
               $out[$index] = 1;
           }
       }
   }
   var_dump($out);
    // /echo array_count_values(array_column($list, 'userId'))[$userId];
echo "<br>";
echo "darth varder has arrives";
$myMultiArray = $vex;

$uniqueMyArray =  array_map("unserialize", array_unique(array_map("serialize", $myMultiArray)));


echo "<pre>";

print_r($myMultiArray);

echo "</pre>";
echo "<br>";
echo "Gin gin win";
echo "<br>";
echo "<pre>";
print_r($uniqueMyArray);

echo "</pre>";
    print_r(array_chunk($_SESSION['cart'], 2, true));

    foreach(array_chunk($_SESSION['cart'], 2) as $pair) {
      echo '<div>';
  
      echo '<br>';
      echo 'Hello bro';
  
      print_r($pair[0]);
      print_r($pair[1]);


      echo '<br>';
      echo "Chilly chicken";

      $array = $vex;
      foreach($array as $k=>$v){
        $unique=array_unique($v);
        $array[$k]=$unique;
        print_r($v);
    }

//      $vals = array_count_values($vex);
//echo 'No. of NON Duplicate Items: '.count($vals).'<br><br>';
//print_r($vals);

echo "Welcome boys to the game";
echo "<br>";
print_r(array_unique($vex, SORT_REGULAR));
      echo "Jolly Jolly Jolly";
$products = $vex;
$ar = array_column($products, 1);
print_r($ar);

$subtotal = 0;



//$pdo = new PDO('mysql:dbname=csy2028;host:v.je', 'student', 'student');
$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$stmt = $pdo->prepare('SELECT * FROM item WHERE item_id = :item_id');
$values = [
 'item_id' => $pair[0]
];
$stmt->execute($values);
//else get the item id from the url
//call another database query that connect the two databases

$stmt1 = $pdo->prepare('SELECT * FROM stock WHERE item_id = :item_id');

   foreach ($stmt as $message) {

    $values1 = [
        'item_id' => $message['item_id']

       ];
       $stmt1->execute($values1);

  // $stem = $stmt1->fetch();

 
   $result = $stmt1->fetchAll();

   echo "Bill bow bags";

   echo $message['item_id'];
?>


<div class="cart content-wrapper">
    <h1>Shopping Cart</h1>
    <form action="index.php?page=cart" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
               
              


                    <?php 



$items = array();
foreach($result as $value) 
{
  if ($value["sold"] == NULL){
  //print_r($value["size"]);
  echo '<br>';
  echo '</br>';
  $items[]=$value["size"];
  // /print_r($a);
 // $output = array_unique($a);
//print_r($output);
  //print_r(array_unique($a));
  //$JIM = $value["size"];
  //$array = array_unique($JIM);
  //$array = array_unique($JIM, SORT_REGULAR);
  //print_r(array_unique($JIM));
  }
}
print_r($items);
echo '<br>';
echo 'Ian is back boys';
echo '<br>';
$counts = array_count_values($items);
echo 'Madmax has arrived';
echo $counts[$pair[1]];
echo '<br>';
echo 'Madmax has died';
$spin = $counts[$pair[1]];
// /$spin2 = $counts[$pair[0]];
                    ?>



<?php
$quantity = 0;
echo "I am very far away";
    if ($message['item_id'] && $spin > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($vex)) {
            echo "I found a cart in your sesssion doc";
            if (array_key_exists($message['item_id'], $vex)) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$message['item_id']] += $quantity;
                echo "Product already found in cart";
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$message['item_id']] = $quantity;
                echo "No items found";
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($message['item_id'] => $quantity);
            echo "No items found of this kind / or size found in cart i shall add it ";
        }
    }
?>


                <tr>
                    <?php
                    /*
                    echo "Tilly is alive"; 
                    echo $message['item_id']; ?>
                    <td class="img">
                        <a href="index.php?page=product&id=<?=$message['item_id']?>">
                            <img src="imgs/<?=$message['pic']?>" width="50" height="50" alt="<?=$message['item_name']?>">
                        </a>
                    </td>
                    <td>
                        <a href="itemlink.php?pitem_id=<?=$message['item_id']?>"><?=$message['item_name']?></a>
                        <br>
                        <a href="index.php?page=cart&remove=<?=$message['item_id']?>" class="remove">Remove</a>
                    </td>
                    <td class="price">&dollar;<?=$message['item_price']?></td>
                    <td class="quantity">
                        <?php
          


                        $arr = range(1,$spin);
// /print_r($arr);
echo '<select>';
foreach ($arr as $a) {
   $value = $a+1;
   echo '<option value=\"'.$value.'">'.$a.'</option><br />';
}
echo '</select>';

?>
                    </td>
                    <td class="price">&dollar;<?=$message['item_price'] * $message['item_id']?></td>
                </tr>
              
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">&dollar;<?=$subtotal?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
</div>

<?php
*/
   }
   
}

}

include('footer.php');
?>
