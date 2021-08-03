
<?php
              require("header.php");
			?>

		<main>

			<h1>Latest Listings / Search Results / Category listing</h1>

		
			<?php
$pdo = new PDO('mysql:dbname=csy2028;host:v.je', 'student', 'student');
$stmt = $pdo->prepare('SELECT * FROM item WHERE cats_id = :cats_id ');
//test statment one-line below
$stmt1 = $pdo->prepare('SELECT * FROM categories WHERE cat_id = :cat_id ');
$values = [
 'cats_id' => $_GET['cats_id']
];
$stmt->execute($values);

foreach ($stmt as $message) {
$values2 = [
'cat_id' => $message['cats_id']
];
$stmt1->execute($values2);
$stem = $stmt1->fetch();

if (isset($message['approved'])){

echo '<ul class="productList">';
echo '<li>';
echo '<img src="'.$message['pic'].'" alt="product name">';
echo '<article>';
 echo '<h2>' . $message['item_name'] .'</h2>';
 echo '<h3>'.'Product Category: '. $stem['category_name'] .'</h3>';
 echo '<p>' . $message['item_desc'] .'</p>';


 echo '<p class="price">'.'Current bid: £'. $message['item_price'] .'</p>';
 echo '<li><a class="more"href="itemlink.php?item_id=' . $message['item_id'] . '">' .'More'. '&gt;&gt'  .'</a></li>';
 echo '</article>';
 echo '</li>';
 echo '</ul>';
  

} else{
	echo " ";
}




					
		
}



?>








			<?php
              require("footer.php");
			?>
