<?php
require("header.php");
?>

<?php


//if not logged in print the following

if(!isset($_SESSION['loggedin'])){
	echo'You are not logged in please log in first in order to access more content';
}
else {
//$pdo = new PDO('mysql:dbname=csy2028;host:v.je', 'student', 'student');
$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$stmt = $pdo->prepare('SELECT * FROM item WHERE item_id = :item_id');
$values = [
 'item_id' => $_GET['item_id']
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

//print_r($result);

//echo count($result);

//echo '<br>';

//echo sizeof($result);
//echo '<br>';
//echo '<p>Size displayed below!!! </p>';
//echo $result[2]["size"];

echo '<form action="itemlink.php?item_id='.$message['item_id'].'" method="post" >';

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
echo $counts['12'];
echo '<br>';
echo 'JJ is back boys';

 // print_r(array_unique($items));
  //echo(array_unique($items));
$chilly = (array_unique($items));
//echo '<br>';
//echo '<p>Hello mate!!! </p>';
//echo implode(" ",$chilly);

//$arr=explode($chilly); 

//print_r($arr); 

//$myJSON=json_encode($chilly);  
//echo($myJSON);  

$cars_together = implode('\n',$chilly);
echo $cars_together;
  
//print_r(array_unique($result));
//$array = array_unique($result, SORT_REGULAR);
//print_r($array);



   //calling the persons table and retrives value from the mysql work bench user_createdid

 

    


// functionality of the timer countdown by collecting the current and finding the difference from the set time left date
//which was set when the user created the auction
//this also sets the format of presenting the time left




//echo statements printing out all the infomation on 1 product

echo '<ul>';

  
    echo '<article class="product">';
//item picture
    echo'<img src="'.$message['pic'].'" alt="product name">';
    echo '<section class="details">';
 
        echo '<h2>'.$message['item_name'].'</h2>';
        echo '<h3>'.'Colour: '. $message['colour'] .'</h3>';

if (sizeof($result)== 0){
  echo 'All Sold Out - Sorry';
}
else {
  echo 'Shoes in stock';

  echo "Vim max";
  //printf($chilly);
 // echo  'sort($chilly, SORT_NATURAL | SORT_FLAG_CASE)';

  echo "Vim end";
  echo "Eskettie gang";
  echo implode(" ",$chilly);
  echo "Eskettie gang2";
 

  sort($chilly, SORT_NATURAL | SORT_FLAG_CASE);

  echo "Heros lose";
  echo '<br>';
  echo $chilly[1];
  echo '<br>';
  echo "Villians win";
  echo '</br>';



        //echo '<h3>'.'Sizes availiable: '. $stem['stockid'] .'</h3>';
        
        

       echo'<label for="cars">Select Size: </label>';
      // echo strlen($cars_together);
?>
      <select name ="size" id="size">
        <?php
  // / $vern = '<select name ="size" id="size">';

  
  


      
  
  

      foreach($chilly as $key => $value){
        if ($value == $row['scpe_grades_status']){
         
$jimmy= 0;
        $vim = $value;
        $jimmy = '<option value="'.$key.'">'.$value;
        echo '<option value="'.$key.'">'.$value.'</option>';
      
        }
        else{
          
          //$vim = $value;
          $jimmy = $value;
          echo '<option value="'.$key.'">'.'Hay JJ'.$value.'</option>';

       
        }
      }



    //  sort($fruits, SORT_NATURAL | SORT_FLAG_CASE);
//foreach ($fruits as $key => $val) {
  //  echo "fruits[" . $key . "] = " . $val . "\n";
//}



     // foreach ($chilly as $row) {
        //select function prints availiable item names

       // echo '<option value='.$row['chilly'].'>'.$row['chilly'].'</option>';
        
       //}
    
     // for ($x = 0; $x <= 10; $x++) {
      //  echo '<option value='.$chilly.'>'.$chilly.'</option>';
      //}
      
      echo'</select>';
    
      //print_r($size);

    
  
     }


       
  //a select search is carried out that gets the userid and hyperlinks the name of who ever create dthe auction 
  //this will take the user to the page which will allow them to see all of that users reviews that he or she made
       


        

        
      
      
      


 

 



//if statement checks if a winner has won the action first if so then print the following

 
    

//else print the auction and allow it to continue going
    
      echo'<p class="price">'.''. '£'.$message['item_price'].'</p>';
      
  

      
    

     echo' <input type="hidden"  name="item_id"  value="'.  $message['item_id'].'" />';
     echo' <input type="hidden"  name="olditem_price"  value="'.  $message['item_price'].'" />';
  
    



 
    
    
    echo '<input type="hidden"  name="item_id"  value="'. $message['item_id'].'" />';
   
    echo'<input type="submit" value="ADD TO CART" name="submit7" />';
    
    echo '	</form>';
     
    

      //submit button for when pressed updates the item record for when someone has purchased an item 
      //declaring the auction over 
if (isset($_POST['submit7'])) {

  
//if($var == "1"){
//echo"your data here";
//}
echo "Win my guy win";

//echo $vern;
echo 'Bill bow bags';
echo $jimmy;
 
$selected = $_POST['size'];
        echo 'You have chosen: ' . $selected;
        $tron = $chilly[$selected];

 // array_push($_SESSION['cart'], $message['item_id'], $tron);
  //$cart = array();
 // $prod_id = $message['item_id'];
 // array_push($_SESSION['cart'],$prod_id);
  echo "JJ was here";

 // array_push($cart, 16);




echo '<br>';
echo '<br>';
echo '<br>';



$_SESSION['cart'] [] = $message['item_id'].'-'. $tron;

/*
foreach ($_SESSION['cart'] as $task) {
	foreach ($task as $task_detail) {
		echo $task_detail . '<br>';
	}
}

*/
print_r($_SESSION['cart']);






  echo '<p>Added to Basket 22</p>';
}

else{
 
   
      

 
      


    ?>
    <?php
  

}





echo '<section class="description">';
echo '<p>' . $message['item_desc'] .'</p>';
echo '	</section>';



   }
    ?> 
		
    </form>
    
       



       




  


                          
        
   


        <?php    


    }

echo '</ul>';



?>


<?php
              require("footer.php");
			?>
