
<?php
              require("header.php");
			?>


<?php
//checks if the person is logged in is not it will echo that message
if(!isset($_SESSION['loggedin'])){
    echo 'You not logged in  ';
}
else {

$stmt = $pdo->prepare('SELECT * FROM Person1 WHERE username = :username');
$values = [
    
    'username' => $_SESSION['username'],
   ];
   $stmt->execute($values);
    $user = $stmt->fetch();
}
    //runs a query to check if they are an admin and merges with an if statment to check if they are loggedin
if(isset($_SESSION['loggedin']) && $user['Admin'] == 'yes'){

$server = 'v.je';
$username = 'student';
$password = 'student';

$schema = 'csy2028';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


?>








    <form action="addadmin.php" method="POST">
<h1>Make a user an Admin </h1> 
<h1>Please type in yes to approve of user </h1> 
<br> </br> 
    <label> User name:</label>
    <select name = "user_id"> 
    <?php
//form and query search work together that checks if the a user is not an admin by checking the admin column if it is empty
        
        $stmt1 = $pdo->prepare('SELECT * FROM Person1 WHERE Admin IS NULL');
        $values1 = [
         'Admin' => $_POST['admin']
        ];
        $stmt1->execute($values1);
        foreach ($stmt1 as $row) {
         

         echo '<option value='.$row['user_id'].'>'.$row['username'].'</option>';
        }

        ?>


<?php
//update query that posts yes in to the admin section when types and submit button is pressed
if (isset($_POST['submit'])) {
	$stmt = $pdo->prepare('UPDATE Person1 SET
								
								admin = :admin,
                                user_id = :user_id
							WHERE user_id = :user_id
						');



	unset($_POST['submit']);
	$stmt->execute($_POST);


	
    header('Location:more.php');
	
}
else {
		$stmt = $pdo->prepare('SELECT * FROM Person1 WHERE user_id = :user_id');

	$values = [
		'user_id' => $_GET['user_id']
	];

	$stmt->execute($values);

	$person = $stmt->fetch();

?>
<br> </br> 
	<form action="addadmin.php" method="post">
		
		
		<input type="text"  name="admin"  value="<?php echo $person['admin'];?>" />


		<input type="submit" value="submit" name="submit" />
	</form>
<?php
}

}
else{
    //If non-admin user trys to accesss this page 
    echo'You do not have the correct permissions';
}
?>


<?php
              require("footer.php");
			?>