<?php 
	require('header.php');
	?> 

		<main>


            <center> <h1>Add categories</h1> </center> 




<?php
//if the user is not logged in display the following
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
                //query search takes in session username to retrive record on user 
                //uses that table/record to check if they are an admin and merges with if statement to check is they are loggedin
            if(isset($_SESSION['loggedin']) && $user['Admin'] == 'yes'){
          
//if submit button is pressed insert new category name in the categories table 
            if (isset($_POST['submit102'])) {
                $stmt = $pdo->prepare('INSERT INTO categories (category_name)
                 VALUES (:category_name)
                ');
                $values = [
               
                 'category_name' => $_POST['category_name']
                 ];
                $stmt->execute($values);
                }
                else {
                    //form to collect category name 
                ?>
                <form action="addcat.php" method="POST">
                

                <label> Insert new category name :</label>
                <input type="text" name="category_name" />
              
                <input type="submit" name="submit102" value=”Submit” />
                </form>
                <?php
                }
                
             

                $stmt = $pdo->prepare('SELECT * FROM categories');
$stmt->execute();
while ($person = $stmt->fetch()) {
 echo '<li><a href="index.php?cats_id=' . $person['cat_id'] . '">' . $person['category_name'] .'</a></li>';
//creates a list that prints of all categories makes it easy to track
}
            }
            else{
                //if they are not logged as as admin they do not have any permissons here 
                echo'You do not have the correct permissions';
            }

 ?> 

 
<?php 
	require('footer.php');
	?> 