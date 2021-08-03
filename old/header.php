
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
		<img src="logomax.png" alt="Logo">
			










			<form action="header.php" method="POST">
				<input type="text" name="search1" placeholder="Search for anything" />
				<input type="submit" name="submitser" value="Search" />
				<i class="fa fa-shopping-cart"></i>
			</form>

			
		</header>




		<meta property="og:url"           content="https://v.je/index.php" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="CryptoFashion" />
  <meta property="og:description"   content="Buy High-End Fashion using crypto" />
  <meta property="og:image"         content="https://v.je.php/logo.jpg" />




 


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
		<img src="images/randombanner.php" alt="Banner" />