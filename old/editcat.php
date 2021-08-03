
<?php
              require("header.php");
			?>


<?php
//checks is user is logged in if not prints of the following
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
    //query search is conducted which merges with the if statment to check ifthey are logged in and are an admin
if(isset($_SESSION['loggedin']) && $user['Admin'] == 'yes'){

$server = 'v.je';
$username = 'student';
$password = 'student';

$schema = 'csy2028';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

//select edit category form
?>
    <form action="editcat.php" method="POST">
<h1>Change Category name </h1> 
<br> </br> 
    <label> Category name:</label>
    <select name = "cat_id"> 
    <?php

        
        $stmt1 = $pdo->prepare('SELECT * FROM categories');
        $values1 = [
         'category_name' => $_POST['category_name']
        ];
        $stmt1->execute($values1);
        foreach ($stmt1 as $row) {
         
//select hyml type function is used to match name and id of the category the admin wishes to change
         echo '<option value='.$row['cat_id'].'>'.$row['category_name'].'</option>';
        }

        ?>


<?php
//when the submit button is pressed category name is updated and 
if (isset($_POST['submit'])) {
	$stmt = $pdo->prepare('UPDATE categories SET
								
								category_name = :category_name,
                                cat_id = :cat_id
							WHERE cat_id = :cat_id
						');



	unset($_POST['submit']);
	$stmt->execute($_POST);


	echo '<p>Record Updated</p>';

	
}
else {
		$stmt = $pdo->prepare('SELECT * FROM categories WHERE cat_id = :cat_id');

	$values = [
		'cat_id' => $_GET['cat_id']
	];

	$stmt->execute($values);

	$person = $stmt->fetch();
//form edit category form with php echos to collect the value whcih the user types in
?>
<br> </br> 
	<form action="editcat.php" method="post">
		
		<label>Catgeory name</label>
		<input type="text"  name="category_name"  value="<?php echo $person['category_name'];?>" />

		<input type="hidden"  name="oldcategory_name"  value="<?php echo $person['category_name'];?>" />
		<input type="submit" value="submit" name="submit" />
	</form>
<?php
}

}
else{
    echo'You do not have the correct permissions';
}
?>


<?php
              require("footer.php");
			?>