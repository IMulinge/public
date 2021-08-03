<?php
require("header.php");
?>

		<main>
       <center> <h1> Account Managment page</h1> </center>

<?php 
if(!isset($_SESSION['loggedin'])){
    echo 'You not logged in  ';    
}
else {
//calls API and assigns variables to $block_io 
 $apiKey = "5867-e32a-0dfd-9c7e";
 $version = 2; // API version
 $pin = "RaspberryDark111111";
 $block_io = new BlockIo($apiKey, $pin, $version);

 
//Fetches the balance and find the balance within the Labels array and searchs for the balance using the Usercode which we were assigned which was fetched from the database 
 $balance = $block_io->get_balance(array('label' => $_SESSION['maxcode']));
 //The Balance is printed out from the balance array 
echo "<h2> You have a confirmed balance of: " . $balance->data->available_balance . " BTC  \n </h2>";
//The pending alance is printed out from the balance array 
echo "<h2> Your pending received balance: " . $balance->data->pending_received_balance . " BTC  \n </h2>";



//Swift is a new variable which gets the block_io variable and gets the adress from the get address array using the Labels array and searchs for the balance using the Usercode which we were assigned which was fetched from the database 
$swift = $block_io->get_address_by(array('label' => $_SESSION['maxcode']));
//The address is printed out from the address array 
echo "<h2> Your Address is: " . $swift->data->address . " on the BTC_TEST Network \n </h2>";
//Network is a variable which gets the block_io variables and reads the get balance varaible which also contains data in that array which prints of the network 
$network = $block_io->get_balance()->data->network;
//Passsphase is a key which assinged to us via the block_io api
$passphrase = strToHex('alpha1alpha2alpha3alpha4');
// The key variable is used to confirm the passphrase with with the API
$key = $block_io->initKey()->fromPassphrase($passphrase);
//The Network on which the user is using is printed
echo "<h2> Current Network: " . $network . "\n </h2> ";
//The Users Private keys is printed 
echo " <h2> Private Key: " . $key->toWif($network) . "\n </h2>";



echo"<h2>Raw Transaction data on Recieved Transactions </h2>";
 $tip = $block_io->get_transactions(array('type' => 'received', 'labels' => $_SESSION['maxcode']));
 //Variable tip gets the $block_io api and fetches the get_transactions array and fetched all transactions were that the user receives 
 //using the Labels array and searchs for the balance using the Usercode which we were assigned which was fetched from the database 
 
$lemon = $tip->data->txs;
//Lemon is a variable that gets the $tip variable(The users recieved transactions and gets the data txs from the array which is an array containing all the information about the recieved transactions)
 //if lemon the recieved transactions array is empty echo the following message if not print out the array 
if (empty($lemon)) {
    echo "Nothing here to report";
}
else{
echo "<i>".print_r($lemon, true)."</i>";
}


 echo"<h2>Raw Transaction data on Sent Transactions </h2>";
  //Variable ti2p gets the $block_io api and fetches the get_transactions array and fetched all transactions were that the user sent
 //using the Labels array and searchs for the balance using the Usercode which we were assigned which was fetched from the database 
 $tip2 = $block_io->get_transactions(array('type' => 'sent', 'labels' => $_SESSION['maxcode']));
 //echo "<h2> Your Sent Transactions: " . $tip->data->txs . "  on the BTC_TEST Network \n </h2>";

$lemon2 = $tip2->data->txs;
//Lemon2 is a variable that gets the $tip variable(The users sent transactions and gets the data txs from the array which is an array containing all the information about the sent transactions)
 //if lemons2 the recieved transactions array is empty echo the following message if not print out the array 
if (empty($lemon2)) {
     echo "Nothing here to report";
 }
 else{
    echo "<i>".print_r($lemon2, true)."</i>";
 }


?>
<?php
//Checks to see if the person is logged in if not logged in display the below

       //Below contains the forms of the Enable and Disable RFID tag
?>
            <br> </br>
            <center> <h1> Enable RFID Tag </h1> </center> 
            <br> </br>
            <form action="addrfid.php">
    <input type="submit" name="submit111" value="Enable RFID Tag" />
 </form>
 <center> <h1>Disable RFID Tag </h1> </center> 
 <br> </br>
            <form action="delrfid.php">
    <input type="submit" name="submit101" value="Disable RFID Tag" />
 </form>

<br> </br>
<center> <h2>Make a transaction  </h2> </center> 
<br> </br>
 <?php

//Here is a form which allows the user to input data for making a transaction including the amount and the desired address the user wishes to sent the funds to 
echo'<form action="trans.php" method="POST">';
echo'<label>Amount: </label> <input type="text" name="amount" />';
echo'<label>Address: </label> <input type="text" name="address" />';
echo'<input type="submit" name="submit" value="Withdraw Funds" />';
echo'</form>';
//Here is an if statement which says that is the submit button is pressed 
if  (isset($_POST['submit'])){
    #It will run the new variable withdraw which calls the $block_io command and runs the withdraw command that will pass the following attributes to the array 
    # The amount which we pass to it via the amount posted in the form and the to address(target address) which we had asked the user to provide also in the form
    $withdraw = $block_io->withdraw(array('amount' => $_POST['amount'], 'to_address' => $_POST['address']));
}
    }
?>
<?php     
            ?>
            <?php
          //Calls footer below    
        ?>
			<?php
              require("footer.php");
			?>



