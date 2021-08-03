
<?php
              require("header.php");
			?>

		<main>


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

            <center> <h1> Order History </h1> </center> 
    


<?php 


$pdo = new PDO('mysql:dbname=csy2028;host:v.je', 'student', 'student');
$stmt = $pdo->prepare('SELECT * FROM Person1 WHERE user_id = :user_id');
$values = [
 'user_id' => $_SESSION['loggedin']
];
$stmt->execute($values);
foreach ($stmt as $message) {
    
 echo '<center> <p>' . $message['OrderHistory'] .'</p> </center>';
}









/*
$pdo = new PDO('mysql:dbname=csy2028;host:v.je', 'student', 'student');
//$sql = "SELECT user_id, username FROM Person1 WHERE Email=$_SESSION['Email']";
$sql = "SELECT user_id, username FROM Person1 WHERE username='test123'";
$result = mysqli_query($pdo, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["user_id"]. " - Name: " . $row["username"].  "<br>";
  }
} else {
  echo "0 results";
}
*/
?>

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

        echo '<br> </br>';
        echo '<center>';
        echo 'Click button below to Login';
        echo '</center>';
        echo '<br> </br>';
      
        echo '<form action="login.php">';
            echo '    <input type="submit" value="Login" />';
            echo '  </form>';
            
        
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
