<?php
require("header.php");
?>
<?php
//if statement checks to see if the user is not logged in then display log in form
if(!isset($_SESSION['loggedin'])){
echo'<center> <h1> Crypto Login Account managment system </h1>';
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
if(isset($_POST['submit'])){
$stmt = $pdo->prepare('SELECT * FROM Person1 WHERE username = :username');
$values = [
 'username' => $_POST['username'],
];
$stmt->execute($values);
$user = $stmt->fetch();
//This if statement that checks if a  user has entered their password and if it matches with the password in the database
if  (isset($_POST['submit']) && (password_verify($_POST['password'], $user['password']))) {
 $_SESSION['loggedin'] = $user['user_id'];
 $_SESSION['maxcode'] = $user['Usercode'];
 //The two varibables above assign the User ID and usercode(RFID code) if login is successful
//if successfull session logged in stores the user id whcih allows us to track the user
//Refreshes the page
echo("<meta http-equiv='refresh' content='1'>");


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
