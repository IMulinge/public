
<?php
              require("header.php");
			?>


<?php
// if statement to check if they are not logged in display the following
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
    //else run a query that checks to they are an admin if yes and using the is statment below, if they 
    //are also logged in then display the following 
if(isset($_SESSION['loggedin']) && $user['Admin'] == 'yes'){

$server = 'v.je';
$username = 'student';
$password = 'student';

$schema = 'csy2028';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


?>








    <form action="appitem.php" method="POST">
<h1>Approve of items </h1> 
<h1>Please type in yes to approve of item </h1> 
<br> </br> 
    <label> item name:</label>
    <select name = "item_id"> 
    <?php
//form button to select the item you wish to approve
        
        $stmt1 = $pdo->prepare('SELECT * FROM item WHERE approved IS NULL');
        $values1 = [
         'approved' => $_POST['approved']
        ];
        $stmt1->execute($values1);
        foreach ($stmt1 as $row) {
         

         echo '<option value='.$row['item_id'].'>'.$row['item_name'].'</option>';
        }
//select table used to check if the approved section if the item record is empty
//meaning not approved then display the item name 
        ?>


<?php
//if submit button is pressed then pass yes into the approved section of that record
//making the item approved
if (isset($_POST['submit'])) {
	$stmt = $pdo->prepare('UPDATE item SET
								
								approved = :approved,
                                item_id = :item_id
							WHERE item_id = :item_id
						');

//unset the submit button and form

	unset($_POST['submit']);
	$stmt->execute($_POST);


	
    header('Location:more.php');
	
}
else {
		$stmt = $pdo->prepare('SELECT * FROM item WHERE item_id = :item_id');

	$values = [
		'item_id' => $_GET['item_id']
	];

	$stmt->execute($values);

	$person = $stmt->fetch();
//form that is used
?>
<br> </br> 
	<form action="appitem.php" method="post">
		
		
		<input type="text"  name="approved"  value="<?php echo $person['approved'];?>" />


		<input type="submit" value="submit" name="submit" />
	</form>
<?php
}

}
//if they are not a logged in user then simply display the following
else{
    echo'You do not have the correct permissions';
}
?>


<?php
              require("footer.php");
			?>