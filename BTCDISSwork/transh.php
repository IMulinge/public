
<?php
              require("header.php");
            

              
			?>

		<main>
        <h1> Your Transaction History page </h1> 

<?php 

 $apiKey = "5867-e32a-0dfd-9c7e";
 $version = 2; // API version
 $pin = "RaspberryDark111111";
 $block_io = new BlockIo($apiKey, $pin, $version);
 
 echo "Confirmed Balance: " . $block_io->get_balance(array())->data->available_balance . "\n";

 var_dump( $block_io->get_my_addresses(array('page' => '1')) );
 //echo "What is my BTC address: " .$block_io->get_my_addresses(array('page' => '1')). "\n";
      
 

 var_dump($block_io->get_address_by(array('label' => '1')));
 echo "Confirmed Balance: " . $block_io->get_balance(array())->data->available_balance . "\n";






 //$balance = $block_io->get_balance(array('label' => 'default'));
 //echo $balance->data->available_balance . "\n";

?>
<?php
//Checks to see if the person is logged in if not logged in display the below
if(!isset($_SESSION['loggedin'])){
        echo 'You not logged in  ';

      
    }
    else {
        //else display plain user allowed hyperlinked buttons/features such as giving the ability for the user to add, delete and edit categories 
        //and being able to see comments
?>

            

            <br> </br>

            <center> <h1> Modify auction section </h1> </center> 


            <br> </br>
            <form action="additem.php">
    <input type="submit" name="submit111" value="Add Auction" />
 </form>


    <br> </br>
            <form action="edititem.php">
    <input type="submit" name="submit110" value="Edit Auction" />
 </form>

 <br> </br>
            <form action="delete.php">
    <input type="submit" name="submit103" value="Delete Auction" />
 </form>




 <center> <h1> Review section </h1> </center> 

 <br> </br>
            <form action="message.php">
    <input type="submit" name="submit101" value="Message stuff" />
 </form>



 <?php
    }
?>

<?php 
if(!isset($_SESSION['username'])){
        echo 'at all  ';
    }
    else{

$stmt = $pdo->prepare('SELECT * FROM Person1 WHERE username = :username');
$values = [
    
    'username' => $_SESSION['username'],
   ];
   $stmt->execute($values);
    $user = $stmt->fetch();
//another query search is carried out only this time we use that retrived data that checks if they are an admin used with the word yes
//this is merged with the if logged in statement which will allow more admin only buttons to appear on the screen if they are an admin
    }
if(isset($_SESSION['loggedin']) && $user['Admin'] == 'yes'){
	
        //desired functions for admins
              
            ?>
            
            <center> <h1> Payment section mate  </h1> </center> 
            <form action="https://gocps.net/dcxi0h5pe8214ay88mrknp5tv/">
                <button type="submit">Make payment</button>
                </form>

         



        <center> <h1> Modify categorys </h1> </center> 
        
        <br> </br>
        <form action="addcat.php">
        <input type="submit" name="submit112" value="Add Category" />
        </form>
        
        
        <br> </br>
        <form action="editcat.php">
        <input type="submit" name="submit113" value="Edit Category" />
        </form>
        
        <br> </br>
        <form action="deletecat.php">
        <input type="submit" name="submit114" value="Delete Category" />
        </form>
        
        <center> <h1> Review section </h1> </center> 
        
        <br> </br>
        <form action="message.php">
        <input type="submit" name="submit101" value="Message stuff" />
        </form>


        <center> <h1> Approve of items </h1> </center> 

        <form action="appitem.php">
        <input type="submit" name="submit199" value="Approve of item" />
        </form>


        <center> <h1> Admin control section </h1> </center> 

        <form action="addadmin.php">
        <input type="submit" name="submit200" value="Make a user an Admin" />
        </form>
  <br> </br> 
        <form action="deladmin.php">
        <input type="submit" name="submit200" value="Remove an Admin" />
        </form>

            <?php
          
        }
        ?>



			<?php
              require("footer.php");
			?>




