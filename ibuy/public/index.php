
<?php
              require("header.php");
			?>

		<main>

			<h1>Latest Listings / Search Results / Category listing</h1>

		





<?php
$pdo = new PDO('mysql:dbname=csy2028;host:v.je', 'student', 'student');
//search query that presents the latest items by listing them in decending order presenting the latest 10 items 
$messageQuery = $pdo->prepare('SELECT * from item  ORDER BY item_id DESC LIMIT 10');
$userQuery = $pdo->prepare('SELECT * FROM categories WHERE cat_id = :cat_id');
$messageQuery->execute();
foreach ($messageQuery as $message) {
 $values = [
 'cat_id' => $message['cats_id']
 ];
 $userQuery->execute($values);
 $user = $userQuery->fetch();
//if statement checks to make sure that the item has been approved first 
 if (isset($message['approved'])){

 echo '<ul class="productList">';
echo '<li>';
echo '<img src="product.png" alt="product name">';
echo '<article>';
 echo '<h2>' . $message['item_name'] .'</h2>';
 echo '<h3>'.'Product Category: '. $user['category_name'] .'</h3>';
 echo '<p>' . $message['item_desc'] .'</p>';
 echo '<p class="price">'.'Current bid: £'. $message['item_price'] .'</p>';
 echo '<li><a class="more"href="itemlink.php?item_id=' . $message['item_id'] . '">' .'More'. '&gt;&gt'  .'</a></li>';
 echo '</article>';
 echo '</li>';
 echo '</ul>';
}
else{
 echo'     ';
}

 
}


?> 





			<?php
              require("footer.php");
			?>
