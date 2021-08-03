<?php 
require('csy2028data.php');	
?> 


<!DOCTYPE html>
<html>
	

	<head>
		<title>CryptoFashion | Purchase High-end fashion with crypto </title>
		<link rel="icon" href="logo3.png" type="image/png">
		 <meta charset="UTF-8" />
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="ibuy.css" />
	</head>

	<body>
	
		<header>
		<a href="http://127.0.0.1/">
		<img src="logomax.png" alt="Logo">
</a>
		
			







		



<form action="/submit" method="POST" >

<input type="text" name="search1" placeholder="Search for anything" />
				<input type="submit" name="submitser" value="Search" />
  
				<input type="submit" value="Basket" formaction="/shoppingcart.php" >
  <input type="submit" value="My account" formaction="/myaccount.php">
 
  
</form>


		
			
		</header>




		
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="CryptoFashion" />
  <meta property="og:description"   content="Buy High-End Fashion using crypto" />



<?php 

//$b=array("product"=>"$product","quantity"=>$quantity);
//array_push($_SESSION['cart'],$b);












/*
$max=sizeof($_SESSION['cart']);
for($i=0; $i<$max; $i++) { 

while (list ($key, $val) = each ($_SESSION['cart'][$i])) { 
echo "$key -> $val ,"; 
} // inner array while loop
echo "<br>";
}

print_r($_SESSION['cart']);
*/
/*
if(!empty($_SESSION["shopping_cart"])) {
$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$stmt = $pdo->prepare('SELECT * FROM item WHERE item_id = :item_id');
$values = [
 'item_id' => $_GET['item_id']
];
$stmt->execute($values);
foreach ($stmt as $row) {

$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

}
}
else {
	echo "Nothing to see here boss";
}
*/
?>


<?php
if (isset($_POST['submitser'])) {

$results = $pdo->query('SELECT * FROM item WHERE item_name  LIKE ' . $pdo->quote( "%".$_POST['search1']."%"));

foreach ($results as $row) {
	echo '<p>' . $row['item_name'] . '</p>';
   }
}
// if the submit button is pressed it takes the passed in value from the search box and searchs the database for a similar result using the LIKE function
?>












		<nav>
			<ul>

			<?php
				   $stmt = $pdo->prepare('SELECT * FROM categories');
				   $stmt->execute();
				   while ($person = $stmt->fetch()) {
					
					echo '<li><a href="indexcat.php?cats_id=' . $person['cat_id'] . '">' . $person['category_name'] .'</a></li>';
				   }
					//query selects all categories and prints/create a hyperlinked list/button of the categories creating the categories in nav section
			?>
			
			 <?php  
			 if(isset($_SESSION['loggedin'])){
				 ?>
				 <li><a href="more.php">More</a></li>
			<li><a href="logout.php">LogOut</a></li>

			<?php 

			 }
			 else {
				
			 ?>

<li><a href="login.php">Login</a></li>
<?php
			 }
?>
			</ul>

			<?php
// if logged in display username



?>
		</nav>
		

		