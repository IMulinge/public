<?php
include('header.php');




if(!isset($_SESSION['loggedin'])){
	echo'You are not logged in please log in first in order to access more content';
}
else {
//$pdo = new PDO('mysql:dbname=csy2028;host:v.je', 'student', 'student');
$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);




























echo '<br>';

  print_r($_SESSION['cart']);
  echo '<br>';


echo '<br>';
echo "Coke is expensive";
  echo '<br>';
  print_r($_SESSION['cart']);
  echo '<br>';
  echo "Chickens have come to play";
  echo '<br>';

  $array = array_unique($_SESSION['cart'], SORT_REGULAR);

  print_r($array);
  echo 'Hello bro';
  echo 'Hello bro2';



echo '<br>';


// $tax = array_count_values(array_column($_SESSION['cart'], '0'));
$tax = array_count_values($_SESSION['cart']);
 print_r($tax);


 $callback = function($key, $value) {
  return "$key-$value";
};

echo '<br>';
echo 'Baseball king';
echo '<br>';
echo '<br>';
$res2 = array_map($callback, array_keys($tax), $tax);
echo "Pigs cannnot fly";
print_r($res2);
echo '<br>';
echo "Vin disel has arrived bitch";
print_r(array_count_values($_SESSION['cart']));
print_r($res2[1]);
echo '<br>';
echo sizeof($res2);

for ($i = 0; $i < count($res2); $i++) {
  echo "Little pump was here";
  print_r($res2);
}

//for ($i = 0; $i < count($res2); $i++) {
  $hemp = array();
  foreach($res2 as $x => $val) {

    echo "The simpsons did 911";
    echo "<br>";
    echo "$x = $val<br>";

  $stmt = $pdo->prepare('SELECT * FROM item WHERE item_id = :item_id');
 /// echo $array[$i]['filename'];
  //echo $array[$i]['filepath'];
  echo "Bil bow bagins was here mate";


echo '<br>';
echo 'checking the heavens2';
echo '<br>';
print_r($res2[0]);
echo '<br>';
//$test = str_replace("-", " ", $res2[0]);
//echo $test;
echo 'The hobbit lives';
echo '<br>';
$str_arr = explode ("-", $val); 
print_r($str_arr);
echo "<br>";
echo "tron has arrived";
print_r($str_arr[0]);
print_r($str_arr[1]);
print_r($str_arr[2]);

















$kim = $str_arr[0];
$values = [
 'item_id' => $kim
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


   echo'<img src="'.$message['pic'].'" alt="product name">';
   echo "<h1>Size selected:  ".$str_arr[1].'</h1>';

   echo "<h1>Quantity ".$str_arr[2].'</h1>';
   echo "<br>";
   // echo "<button> Add item</button>";
   echo '<form action="shoppingcart.php?item_id='.$message['item_id'].'" method="post" >';
    echo'<input type="submit" value="ADD item" name="additem" />';
    echo "<br>";
   // echo "<button> Delete item</button>";
    echo'<input type="submit" value="Delete item" name="delitem" />';
    echo "<br>";


    echo '	</form>';
   echo'<p class="price">'.''. '£'.$message['item_price'].'</p>';

$item_total = $message['item_price'] * $str_arr[2];
echo '</br>';
echo 'The item total is';
echo '</br>';
echo $item_total;




//$hemp = $item_total;
array_push($hemp, $item_total);
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
   echo "Lets do molly";
   echo $counts[$str_arr[1]];

  }
  }
  echo '<br>';
  echo "I have captured the outer total of the shopping cart";
  echo '<br>';
  print_r($hemp);
  echo '<br>';
  echo "Your basket total = £" . array_sum($hemp) . "\n";
  echo '<br>';
}
?>
   <select name="Quanity">
    <?php for ($i = 1; $i <= $counts[$str_arr[1]]; $i++) : ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
    <?php endfor; ?>
  
</select>

<?php 
if($str_arr[2]>$counts[$str_arr[1]]){
    echo "<h2>Sorry, there's not enough available stock for ".$message['item_name'].". We've reserved ".$counts[$str_arr[1]]." out of ".$str_arr[2]." for you. </h2>";
} 
    ?>
<?php

      


if (isset($_POST['delitem'])) {
  echo"Reduce item basket by 1";
//echo "<br>";


  //$pos = array_search('1-5', $_SESSION['cart']);

//echo '1-5 at: ' . $pos;

//$vin ='1-5';



// Remove from array
unset($_SESSION['cart']["1-5"]);

/*
print_r($_SESSION['cart']);
echo "<br><br>";
foreach($_SESSION['cart'] as $k => $v){
  //print_r( "k: ".$k." v: ".$v."<br><br>");
    if(($v == 1-5) || ($v == 'London')){
        unset($_SESSION['cart'][$k]);
    }
}
echo "<br><br>";

*/






print_r($_SESSION['cart']);

}

  

    




/*
foreach(array_keys($tax) as $nmkey)
    {
        echo $nmkey;
    }





 //print_r(array_slice($tax, 1, 3, false));
















// /  echo $_SESSION['cart'][1];
  echo '<br>';
  echo 'Hello bro2222';
$vex = array_chunk($_SESSION['cart'], 2, true);
print_r($vex);












echo "Redcross";
echo "<br>";
  print_r(array_chunk($_SESSION['cart'], 2, true));
  foreach(array_chunk($_SESSION['cart'], 2) as $pair) {
    echo '<div>';

    echo '<br>';
    echo 'Hello bro';

    print_r($pair[0]);
    echo '</br>';

//use pair to access the variable in array 

    echo 'Where is my bands';
    print_r($pair[1]);


    $skippy = implode(" ",$pair[0]);






    echo "<br>";
    echo "KSI music is ok";
    $arr_ph = explode("-",$skippy);
   
   //foreach loop to display the returned array
   foreach($arr_ph as $i){
       echo $i . "<br />";
   }
   
   





echo "this is the end of the road for your test sir";












    foreach ($pair as $item) {
      //  echo "<span>$item</span>";
       echo 'Vern ';
      echo '<br>';
        echo $item[0];
      
      echo '</br>';
      echo 'Bob';
    }
    echo '</div>';
}

echo 'Hi jimmy';


//select bar for quantity starts here fin code


//select bar for quantity finishes here fin code

  echo '<br>';
*/


echo "This should be the end of the loop";
 
?>

