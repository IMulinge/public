<?php
require("header.php");
?>
<?php
//checks if the person is logged in is not it will echo that message
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
    //runs a query to check if they are an admin and merges with an if statment to check if they are loggedin
if(isset($_SESSION['loggedin'])){


    $sin = $_SESSION['loggedin'];
//create a database connection with Docker MariaDB
    $conn = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //Update Person 1 table so that ADMIN will equal to yes for the logged in user making the RFID tag enabled
    $sql = "UPDATE Person1 SET Admin='yes' WHERE user_id=$sin";
  
    // Prepare statement
    $stmt = $conn->prepare($sql);
  
    // execute the query
    $stmt->execute();
  
    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " RFID Tag re-enabled";
}
      
?>

<?php
              require("footer.php");
			?>
