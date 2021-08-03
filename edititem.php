<?php
              require("header.php");
			?>
  
  








<?php


if(!isset($_SESSION['loggedin'])){
        echo 'You not logged in  ';
    }
    else {


$server = 'v.je';
$username = 'student';
$password = 'student';

$schema = 'csy2028';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


?>

    <form action="edititem.php" method="POST">
<h1>Auction change page </h1> 
<br> </br> 
    <label> Item name:</label>
    <select name = "item_id"> 
    <?php

        $stmt1 = $pdo->prepare('SELECT * FROM item');
        $values1 = [
         'item_name' => $_POST['item_name'],
         'item_desc' => $_POST['item_desc'],
                 'buy_now' => $_POST['buy_now'],
                 'item_price' => $_POST['item_price'],
                 'time_left' => $_POST['time_left']
        ];
        $stmt1->execute($values1);
        foreach ($stmt1 as $row) {
         //select function prints availiable item names

         echo '<option value='.$row['item_id'].'>'.$row['item_name'].'</option>';
         
        }
        

        ?>


<?php
//if statement when submit button is pressed updates the old values with the new ones entered by the user
if (isset($_POST['submit'])) {
	$stmt = $pdo->prepare('UPDATE item SET
								
								item_name = :item_name ,                 
                                item_desc = :item_desc,
                                buy_now = :buy_now,
                                item_price = :item_price,
                                time_left = :time_left,
                                item_id = :item_id
							WHERE item_id = :item_id
						');

//unset removes submit button / form to confirm that items have been sent 

	unset($_POST['submit']);
	$stmt->execute($_POST);

//confirmation text
	echo '<p>Record Updated</p>';

	
}
else {
    //select form gets the item id from url and compares value with the item  id in the database
		$stmt = $pdo->prepare('SELECT * FROM item WHERE item_id = :item_id');

	$values = [
		'item_id' => $_GET['item_id']
	];

	$stmt->execute($values);

    $person = $stmt->fetch();
    //Edit item form below collects the values entered using an echo

?>
<br> </br> 
	<form action="edititem.php" method="post">
		
		<label>Item name</label>
		<input type="text"  name="item_name"  value="<?php echo $person['item_name'];?>" />

		<input type="hidden"  name="olditem_name"  value="<?php echo $person['item_name'];?>" />

        <br> </br>

        
        <label> Insert new auction description:</label>
                <input type="text" name="item_desc" value="<?php echo $person['item_desc'];?>"/>
              

                <label> Insert new auction price:</label>
                <input type="text" name="item_price" value="<?php echo $person['item_price'];?>" />
                <br> </br>

                <label> Insert a buy now price :</label>
                <input type="text" name="buy_now"  value="<?php echo $person['buy_now'];?>"/>

                <br> </br>
                
                <label> Insert time :</label>
                <input type="datetime-local" name="time_left" value="<?php echo $person['time_left'];?>">
                <br> </br>

                
		<input type="submit" value="submit" name="submit" />
	</form>
<?php
}

    }
?>



    <?php
              require("footer.php");
			?>