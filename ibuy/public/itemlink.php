
<?php
              require("header.php");
			?>

<?php


//if not logged in print the following

if(!isset($_SESSION['loggedin'])){
	echo'You are not logged in please log in first in order to access more content';
}
else {
$pdo = new PDO('mysql:dbname=csy2028;host:v.je', 'student', 'student');
$stmt = $pdo->prepare('SELECT * FROM item WHERE item_id = :item_id');
$values = [
 'item_id' => $_GET['item_id']
];
$stmt->execute($values);
//else get the item id from the url
//call another database query that connect the two databases

$stmt1 = $pdo->prepare('SELECT * FROM categories WHERE cat_id = :cat_id');

   foreach ($stmt as $message) {

    $values1 = [
        'cat_id' => $message['cats_id']
       ];
       $stmt1->execute($values1);

   $stem = $stmt1->fetch();

   //calling the persons table and retrives value from the mysql work bench user_createdid

   $stmt2 = $pdo->prepare('SELECT * FROM Person1 WHERE user_id = :user_id');

   

    $values2 = [
        'user_id' => $message['user_createdid']
       ];
       $stmt2->execute($values2);

   $stem2 = $stmt2->fetch();

    


// functionality of the timer countdown by collecting the current and finding the difference from the set time left date
//which was set when the user created the auction
//this also sets the format of presenting the time left
$currenttime = new DateTime(date("h:i:sa"));
        $endtime = new DateTime($message['time_left']);
$timeRemaining = $currenttime->diff($endtime);




//echo statements printing out all the infomation on 1 product

echo '<ul>';

    echo '<h1>'.'Product Page'.'</h1>';
    echo '<article class="product">';
//item picture
    echo'<img src="'.$message['pic'].'" alt="product name">';
    echo '<section class="details">';
 
        echo '<h2>'.$message['item_name'].'</h2>';
        echo '<h3>'.'Product Category: '. $stem['category_name'] .'</h3>';
        


        $stmt = $pdo->prepare('SELECT * FROM Person1');
        $stmt->execute();
        echo '<ul>';
        while ($person = $stmt->fetch()) {
  //a select search is carried out that gets the userid and hyperlinks the name of who ever create dthe auction 
  //this will take the user to the page which will allow them to see all of that users reviews that he or she made
        
        }


       echo '<p>'.'Auction created by: <a href="msgfil.php?userid=' . $stem2['user_id'] . '">' . $stem2['username'] .'</a>'.'</p>';
        
      
      
      


       
       ?>


		
		
    
    <?php 






//update bidding 
if (isset($_POST['Placebid'])) {
	$stmt = $pdo->prepare('UPDATE item SET
			     
								item_price = :item_price,
                                item_id = :item_id
							WHERE item_id = :item_id
						');


//undets the Placebid
	unset($_POST['Placebid']);
	$stmt->execute($_POST);



	echo '<p>Record Updated</p>';

	
}
else {
 

 



//if statement checks if a winner has won the action first if so then print the following

    if(isset($message['whowon_id'] )) {
      echo'Auction is over!!!  Winner of the auction is:  '. $message['whowon_id'];
      
     
    }
    

//else print the auction and allow it to continue going
    else{
      echo'<p class="price">'.'Current bid: '. '£'.$message['item_price'].'</p>';
      echo 'Time left is: '.$timeRemaining->format("%H:%I:%S");
      echo '<form action="itemlink.php?item_id='.$message['item_id'].'" method="post" >';

      
    

     echo' <input type="hidden"  name="item_id"  value="'.  $message['item_id'].'" />';
      echo '<input type="text"  placeholder="Enter bid amount" name="item_price"  value="'.  $message['item_price'].'" />';
     echo' <input type="hidden"  name="olditem_price"  value="'.  $message['item_price'].'" />';
  
    

      echo '	<input type="submit" value="Placebid" name="Placebid" />';
      echo '	</form>';



      echo '<form action="itemlink.php?item_id='.$message['item_id'].'" method="post" >';
      echo '<label>'.'Buy now: £'.'</label>';
    echo $message['buy_now']. '       ';
    
    echo '<input type="hidden"  name="item_id"  value="'. $message['item_id'].'" />';
    echo' <input type="hidden"  name="whowon_id"  value="'. $_SESSION['username'].'" />';
    echo'<input type="submit" value="BUY NOW!" name="submit7" />';
    
    echo '	</form>';
     
    }

      //submit button for when pressed updates the item record for when someone has purchased an item 
      //declaring the auction over 
if (isset($_POST['submit7'])) {
  
	$stmt = $pdo->prepare('UPDATE item SET
			     
								whowon_id = :whowon_id,
                                item_id = :item_id
							WHERE item_id = :item_id
						');



	unset($_POST['submit7']);
	$stmt->execute($_POST);



  echo '<p>Record Updated</p>';
}

else{
 
   
      

 
      


    ?>
    <?php
  }

}





echo '<section class="description">';
echo '<p>' . $message['item_desc'] .'</p>';
echo '	</section>';



   }
    ?> 
		
    </form>
    
       <?php



       




  


                          
        
                            
    // displays all message content  from the message table and user/person1 table merging to print out users messages
                            $messageQuery = $pdo->prepare('SELECT * from message ');
                            $userQuery = $pdo->prepare('SELECT * FROM Person1 WHERE user_id = :user_id');
                            $itemQ = $pdo->prepare('SELECT * FROM item WHERE item_id = :item_id');
                            

                            $messageQuery->execute();
                            echo '<ul>';


                            
                            foreach ($messageQuery as $message) {

                                $values2 = [
                                  
                                    'item_id' => $message['itemid']
                                    ];
                                $itemQ->execute($values2);
                                $user2 = $itemQ->fetch();


                             $values = [
                             'user_id' => $message['userid'],
                            
                             ];
                             $userQuery->execute($values);
                             $user = $userQuery->fetch();
                            
                            
                            echo ' <section class="reviews">';
                            echo ' <h2>Reviews of '.$user['username'] .'</h2>';
                            echo '<li>' .
                            $user['username'] .
                            ' posted the message <strong>' . $message['message'] . '</strong>' .
                            ' on ' . $message['date']
                            . '</li>';
                            }





                            //posting reviews if review button is pressed insert message in to messagae table
                            if (isset($_POST['Review'])) {
                                $pdo = new PDO('mysql:dbname=csy2028;host:v.je', 'student', 'student');


                                $stmt = $pdo->prepare('INSERT INTO message (date, message, userid, itemid)
                                 VALUES (:date, :message, :userid, :itemid)
                                ');

//data that is posted in message table
                                $values = [
                                 'date' => date("Y/m/d"),                             
                                 'message' => $_POST['reviewtext'],
                                 'userid' => $_SESSION['loggedin'],
                                 'itemid' => $_GET['item_id']

                                 ];
                                $stmt->execute($values);
                                
                            
                        }
                                else{

                                    $stmt1 = $pdo->prepare('SELECT * FROM item WHERE item_id = :item_id');
$values = [
 'item_id' => $_GET['item_id']
];
$stmt1->execute($values);
foreach ($stmt1 as $item){
                           //form that is requried for posting review
                            echo '<form action="itemlink.php?item_id=' . $item['item_id'] . '"' .'method="POST">';
                            echo '    <label>Add your review</label> <textarea name="reviewtext"></textarea>';
    
                            echo '     <input type="submit" Value="review" name="Review"/>';
                            echo '    </form>';
                            echo '    </section>';
                            echo '    </article>';
                            

                            
                            










//Twitter share link is echoed and created for when pressed taking user to twitter with prefilled content on the currenct auction avaliable

?>






  <a class="twitter-share-button"
  <?php
  echo 'href="https://twitter.com/intent/tweet?text=Check%20out%20what%20Ibuy%20has%20to%20offer%20https://v.je/itemlink.php?item_id='.$item['item_id'].'"';
}         
}
  ?>
  data-size="large">
Tweet</a>

<?php

?>


        <?php    


    }

echo '</ul>';



?>


<?php
              require("footer.php");
			?>
