<?php
require('csy2028data.php');	
  echo $_POST['name'] ."<br />";
  echo $_POST['email'] ."<br />";
  echo $_POST['phone'] ."<br />";
  echo $_POST['gender'] ."<br />";
  echo "==============================<br />";
  echo "All Data Submitted Successfully!";


echo"Reduce item basket by  whats up mate ";
echo '<br>';
print_r($_SESSION['cart']);
echo '<br>';

if (($key = array_search("1-5", $_SESSION['cart'])) !== false) {
    unset($_SESSION['cart'][$key]);
}
echo '<br>';
print_r($_SESSION['cart']);
echo '<br>';
echo "Billy we did it!!!";
echo '<br>';
/*
echo "Chimp";
echo "<br";
echo array_search("1-5",$_SESSION['cart'],true);

//echo array_search("1-5",$_SESSION['cart'],true);
echo "<br";
echo "Chicken mates";
echo "<br";

print_r($_SESSION['cart']);
*/


/*
$favorite_foods = array(1 => 'artichokes', 'bread', 'cauliflower', 'deviled eggs');
$food = 1-5;
$position = array_search($food, $_SESSION['cart']);

if ($position !== false) {
    echo "My #$position favorite food is $food";
} else {
    echo "Blech! I hate $food!";
}
*/
?>

