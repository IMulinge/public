<?php 
require('csy2028data.php'); //Call Database connection
require("block_io.php");   //call block.io API
?> 
<!DOCTYPE html>
<html>
	<head>
		<title>Crypto RFID portal software </title>
		 <meta charset="UTF-8" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<header>
		<nav>
			<ul>
			<?php
			?>				
			    <h2><a href="trans.php">View transactions page</a></h2>
			
				<h2><a href="login.php">Login/out</a></h2>
			</ul>
			<?php
			
// if logged in display username
if(isset($_SESSION['loggedin'])){
	echo'You are logged in:'.$_SESSION['username'];
}
else{	
}
//if not logged in display the following 
if(!isset($_SESSION['loggedin'])){
	echo'You are not logged in';
}
?>
		</nav>

