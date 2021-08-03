
<?php
              require("header.php");
			?>

		<main>



            <center> <h1>Delete Category</h1> </center> 






















<?php

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
    //search for if the user is an admin merged with if statement to check if logged in
    //if so then continue with following
if(isset($_SESSION['loggedin']) && $user['Admin'] == 'yes'){
//if the submit button is pressed the delete the category which the user has selected from the database when matched
if (isset($_POST['submit3'])) {
    echo 'delete categorys';
    var_dump($_POST);
    $stmt = $pdo->prepare('DELETE FROM categories 
    
     WHERE cat_id=:cat_id
    ');
    $values = [
        'cat_id'=> $_POST['cat_id']
     ];
    $stmt->execute($values);
    }
    else {
        //form that is displayed
    ?>
    <form action="deletecat.php" method="POST">

    <label> Select category name you wish to delete:</label>
    <select name = "cat_id"> 
    <?php



    //get all prducts from the database
    //for each product and displays in the select section
      



        $stmt1 = $pdo->prepare('SELECT * FROM categories');
      
        $stmt1->execute();
        foreach ($stmt1 as $row) {
    

         echo '<option value='.$row['cat_id'].'>'.$row['category_name'].'</option>';
        }


        ?>
    </select>


    <br> </br>


    <input type="submit" name="submit3" value=”Submit” />
    </form>
    <?php
    }
   
//if the user is not an admin that is logged in then display the following 
}else{
    echo'You do not have the correct permissions';
}





?>







