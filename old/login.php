<?php
              require("header.php");
            
            
			?>




<?php
//if statement checks to see if the user is not logged in then display log in form
if(!isset($_SESSION['loggedin'])){
echo'<center> <h1> Login </h1>';
  echo'<form action="login.php" method="POST">';
  echo'<label>Username: </label> <input type="text" name="username" />';
  echo'<label>Password: </label> <input type="password" name="password" />';
  echo'<input type="submit" name="submit" value="Log In" />';
  echo'</form>';




}else {
  echo'<form action="logout.php">';
    echo'<input type="submit" name="logout" value="Log Out" />';
 echo'</form>';
 //if they are loggedin and on the login page then the logout button will appear
}
?>

<br> </br>
            <form action="acc_create.php">
    <input type="submit" name="submit2" value="Create an account" />
 </form>
 </center> 






<?php


if  (isset($_POST['submit'])){
$stmt = $pdo->prepare('SELECT * FROM Person1 WHERE username = :username');
$values = [
 'username' => $_POST['username'],
 
];
$stmt->execute($values);
$user = $stmt->fetch();
//admin section of login checks when the submit button is pressed that the password matches with the password of the username and password in the database
//as well as if they are an admin

if  (isset($_POST['submit']) && (password_verify($_POST['password'], $user['password'])) && $user['Admin'] == 'yes') {
  $_SESSION['loggedin'] = $user['user_id'];
 //search of database for username from the post and added to session 
 //admin in logged in and taken to the more.php page

header('Location:more.php');

if ($stmt->rowCount() > 0) {
         
  $_SESSION['username'] = $_POST['username'];
 }

}

//this another if statement that checks if a plain user has entered their password and if it matches with the password in the database
elseif  (isset($_POST['submit']) && (password_verify($_POST['password'], $user['password']))) {
 $_SESSION['loggedin'] = $user['user_id'];
//if successfull session logged in stores the user id whcih allows us to track the user
//user is also taken to the index.php page if successful
 header('Location:index.php');

//database serach for if the posted user and store sthe usernane in the session also good for tracking
 if ($stmt->rowCount() > 0) {
         
  $_SESSION['username'] = $_POST['username'];
 }

}
//else statement for if the account was unfound
else {
 echo 'Sorry, your account could not be found';
}

}




?>




<?php
              require("footer.php");
			?>