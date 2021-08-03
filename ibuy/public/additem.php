<?php 
	require('header.php');
	?> 

		<main>


            <center> <h1>Add item</h1> </center> 




<?php
//if they are not logged in display the following
if(!isset($_SESSION['loggedin'])){
        echo 'You not logged in  ';
    }
    else {

			//if they are then insert the following varibales in to the database
          

            if (isset($_POST['submit102'])) {
                $stmt = $pdo->prepare('INSERT INTO item (item_name, item_desc, cats_id, item_price, user_createdid, time_left, buy_now, pic)
                 VALUES (:item_name, :item_desc, :cats_id, :item_price, :user_createdid, :time_left, :buy_now, :pic)
                ');
                $values = [
               
                 'item_name' => $_POST['item_name'],

                 'item_desc' => $_POST['item_desc'],
                 'cats_id' => $_POST['cats_id'],
                 'buy_now' => $_POST['buy_now'],
                 'item_price' => $_POST['item_price'],
                 'user_createdid' => $_SESSION['loggedin'],
                 'time_left' => $_POST['time_left'],
                 'pic' => $_POST['pic']

                 ];
                $stmt->execute($values);
                }
                //form used to collect the variables being posted into the database
                else {
                ?>
                <form action="additem.php" method="POST" enctype="multipart/form-data">
                

                <label> Insert new auction name :</label>
                <input type="text" name="item_name" />


                <label> Insert new auction description:</label>
                <input type="text" name="item_desc" />


                <label> Insert new auction price:</label>
                <input type="text" name="item_price" />
                <br> </br>

                <label> Insert picture:</label>
                <input type="text" placeholder="Please insert URL of your desired image" name="pic" />
                <br> </br>

                <label> Insert a buy now price :</label>
                <input type="text" name="buy_now" />
                <br> </br>
                
                <label> Insert time :</label>
                <input type="datetime-local" name="time_left">
                <br> </br>


                <label> Category name:</label>
                <br> </br> 
    <select name = "cats_id"> 
    <?php

        
        $stmt1 = $pdo->prepare('SELECT * FROM categories');
        $values1 = [
         'category_name' => $_POST['category_name']
        ];
        $stmt1->execute($values1);
        foreach ($stmt1 as $row) {
         //select option to ensure the user selects in the availiable categorys 

         echo '<option value='.$row['cat_id'].'>'.$row['category_name'].'</option>';
        }

        ?>




              
                <input type="submit" name="submit102" value=”Submit” />
                </form>
                <?php
                }
               

     
    }

 ?> 



 
<?php 
	require('footer.php');
	?> 