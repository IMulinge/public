<?php
              require("header.php");
            
            
			?>



<br> </br>



<center> <h1> Forgot Password </h1>
  <form action="forgot_pass.php" method="POST">
  <label>Email: </label> <input type="text" name="Email" />
  <input type="submit" name="submit" value="Forgot Password" />
  </form>
<br> </br>
 </center> 






<?php

if  (isset($_POST['submit'])){
  $stmt = $pdo->prepare('SELECT * FROM Person1 WHERE Email = :Email');
  $email = $_POST['Email'];
  $values = [
   'Email' => $_POST['Email'],
   
  ];
  $stmt->execute($values);
  $user = $stmt->fetch();
  //admin section of login checks when the submit button is pressed that the password matches with the password of the username and password in the database
  //as well as if they are an admin
  
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Email address is invalid";
  }
  if(empty($email)){
   $errors['emails'] = "Email required";
  }
  
  $token = $user['token'];
  sendPasswordResetLink($email, $token);
  header('Location: password_messsage.php');
  exit(0);
  

}




?>




<?php
              require("footer.php");
			?>