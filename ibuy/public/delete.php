
<?php
              require("header.php");
			?>

		<main>



            <center> <h1>Delete item </h1> </center> 






















<?php
//if the user is not logged in display the following 

if(!isset($_SESSION['loggedin'])){
        echo 'You not logged in  ';
    }
    else {


//if the submit button is pressed then delete the selected item from the database
if (isset($_POST['submit3'])) {
    echo 'delete';
    var_dump($_POST);
    $stmt = $pdo->prepare('DELETE FROM item 
    
     WHERE item_id=:item_id
    ');
    $values = [
        'item_id'=> $_POST['item_id']
     ];
    $stmt->execute($values);
    }
    else {
    ?>
    <form action="delete.php" method="POST">

    <label> Select Item name you wish to delete:</label>
    <select name = "item_id"> 
    <?php



    //get all products from the database which is passed in the select column which 
    //will be displayed for the user


        $stmt1 = $pdo->prepare('SELECT * FROM item');
      
        $stmt1->execute();
        foreach ($stmt1 as $row) {
    

         echo '<option value='.$row['item_id'].'>'.$row['item_name'].'</option>';


       
         
        }


        ?>
    </select>


    <br> </br>


    <input type="submit" name="submit3" value=”Submit” />
    </form>
    <?php
    }
   


    }




?>








			
