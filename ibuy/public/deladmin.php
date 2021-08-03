
<?php
              require("header.php");
			?>


<?php
//if they are not logged in then display the following 


$stmt = $pdo->prepare('SELECT * FROM Person1 WHERE username = :username');
$values = [
    
    'username' => $_SESSION['username'],
   ];
   $stmt->execute($values);
    $user = $stmt->fetch();

    // query used to check if the user is an approved admin and uses the if statment to check if the user is logged


$server = 'v.je';
$username = 'student';
$password = 'student';

$schema = 'csy2028';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
//form used to delete admin

?>








    <form action="deladmin.php" method="POST">
<h1>Make a user an Admin </h1> 
<h1>Please type in yes to remove an admin </h1> 
<br> </br> 
    <label> User name:</label>
    <select name = "user_id"> 
    <?php

        
        $stmt1 = $pdo->prepare('SELECT * FROM Person1 WHERE Admin IS NOT NULL');
        $values1 = [
         'Admin' => $_POST['admin']
        ];
        $stmt1->execute($values1);
        foreach ($stmt1 as $row) {
         //search query that is run to check is any user in the database is not an admin then simply
         //display their name in the select column

         echo '<option value='.$row['user_id'].'>'.$row['username'].'</option>';
        }

        ?>


<?php
//if the submit button is pressed then set admin column of that user to null
if (isset($_POST['submit'])) {
	$stmt = $pdo->prepare('UPDATE Person1 SET
								
								admin = NULL  ,
                                user_id = :user_id
							WHERE user_id = :user_id
						');

//unsets the submit button and form

	unset($_POST['submit']);
	$stmt->execute($_POST);


	//takes the user to the more.php page if successful
    header('Location:more.php');
	
}
else {
		$stmt = $pdo->prepare('SELECT * FROM Person1 WHERE user_id = :user_id');

	$values = [
		'user_id' => $_GET['user_id']
	];

	$stmt->execute($values);

	$person = $stmt->fetch();
//displays the form
?>
<br> </br> 
	<form action="deladmin.php" method="post">
		
		
		<input type="hidden"  name="admin"  value="<?php echo NULL ?>" />


		<input type="submit" value="submit" name="submit" />
	</form>
<?php
}


?>


<?php
              require("footer.php");
			?>