<?php
include('header.php');

$key2 = $_GET["key2"];
$email = $_GET["email"];
$curDate = date("Y-m-d H:i:s");

$simp = $_GET["action"];
echo $simp;
echo $key2;
echo $email;



if ($_GET["action"]=="reset"){
    echo "Hi mate";
}

if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"])
&& ($_GET["action"]=="reset") || !isset($_POST["action"]) || ($_POST["action"]=="update")){



 //   if(isset($_POST["email"]) && isset($_POST["action"]) &&
 //   ($_POST["action"]=="update")){

    
  $key2 = $_GET["key2"];
  $email = $_GET["email"];
  $curDate = date("Y-m-d H:i:s");
  //$query = mysqli_query($con,
  //"SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';"
  //);
  $error="";




  $pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
  $messageQuery = $pdo->prepare('SELECT * FROM password_reset_temp WHERE  email = :email AND key2 = :key2    ');

  




 
    $values = [
       
        'email' => $email,
        'key2' => $key2
    ];

    $messageQuery->execute($values);
   
   //if statement checks to make sure that the item has been approved first 
   // if (isset($message['approved'])){
echo "Hi Jesus";
    foreach ($messageQuery as $message) {
       // echo '<li>' . $message['key2'] .'</li>';
    //  /   echo '<li>' . $message['expDate'] .'</li>';




//rintf($stmt1);
echo "Hi mate";
// /echo $user;


echo $key2;
// /printf($messageQuery);
  //$row = mysqli_num_rows($query);
  if ($message['expDate']==""){
  $error = '<h2>Invalid Link</h2>
<p>The link is invalid/expired. Either you did not copy the correct link
from the email, or you have already used the key in which case it is 
deactivated.</p>
<p><a href="https://www.allphptricks.com/forgot-password/index.php">
Click here</a> to reset password.</p>';
	}else{
        echo "finished boys";
  //$row = mysqli_fetch_assoc($query);
  $expDate = $message['expDate'];
echo "Gods Test";
  echo $expDate;
  echo "Your time sir";
  echo $curDate;
  if($expDate >= $curDate){
      echo "Chilly chips is my fav";
      
  ?>
  <br />
  <form method="post" action="" name="update">
  <input type="hidden" name="action" value="update" />
  <br /><br />
  <label><strong>Enter New Password:</strong></label><br />
  <input type="password" name="password1" maxlength="15" required />
  <br /><br />
  <label><strong>Re-Enter New Password:</strong></label><br />
  <input type="password" name="password2" maxlength="15" required/>
  <br /><br />
  <input type="hidden" name="email" value="<?php echo $email;?>"/>
  <input type="submit" value="Reset Password" />
  </form>
<?php
  if ($_POST["action"]=="update"){
echo "Hi mate this is JJ";
$error="";
$pass1 = $_POST["password1"];
$pass2 = $_POST["password2"];
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
if ($pass1!==$pass2){
$error= "<p>Password do not match, both password should be same.<br /><br /></p>";
echo "vin disel has arrived ";
  }
  if($error!=""){
echo "<div class='error'>".$error."</div><br />";
}else{
//$pass1 = md5($pass1);
/*
mysqli_query($con,
"UPDATE `users` SET `password`='".$pass1."', `trn_date`='".$curDate."' 
WHERE `email`='".$email."';"
);

$stmt = $pdo->prepare('UPDATE SET Person1 (password, email, trn_date)
VALUES (:password, :email, :trn_date)
');
$values = [
'password' => password_hash($pass1, PASSWORD_DEFAULT),
'email' => $email,
'trn_date' => $curDate

];
$stmt->execute($values);

*/
echo "Welcome sir tt";

//$stmt1 = $pdo->prepare('SELECT * FROM Person1');
  //      $values1 = [    
    //             'password' => password_hash($_POST['password'], PASSWORD_DEFAULT), 
      //           'trn_date' =>  $curDate
       // ];
        //$stmt1->execute($values1);

$killer = password_hash($_POST['password1'], PASSWORD_DEFAULT);
	    $sql = "UPDATE Person1 SET trn_date='$curDate', password='$killer' WHERE email='$email'";
    
    // Prepare statement
    $stmt = $pdo->prepare($sql);
    
    // execute the query
    $stmt->execute();
    
   
    
    echo '<p>Record Updated</p>';

echo "Ben 10 made it";

//mysqli_query($con,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");
	
echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
<p><a href="https://www.allphptricks.com/forgot-password/login.php">
Click here</a> to Login.</p></div><br />';
  }
	  }	












echo "Gooble the gum";














}else{
$error = "<h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which 
as valid only 24 hours (1 days after request).<br /><br /></p>";
            }
      }
if($error!=""){
  echo "<div class='error'>".$error."</div><br />";
  }			
 // isset email key validate end


 if (isset($_POST['submit'])){
     echo "Hi mate this is JJ";
$error="";
$pass1 = $_POST["password"];
$pass2 = $_POST["password"];
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
if ($pass1!=$pass2){
$error= "<p>Password do not match, both password should be same.<br /><br /></p>";
  }
  if($error!=""){
echo "<div class='error'>".$error."</div><br />";
}else{
//$pass1 = md5($pass1);
/*
mysqli_query($con,
"UPDATE `users` SET `password`='".$pass1."', `trn_date`='".$curDate."' 
WHERE `email`='".$email."';"
);

$stmt = $pdo->prepare('UPDATE SET Person1 (password, email, trn_date)
VALUES (:password, :email, :trn_date)
');
$values = [
'password' => password_hash($pass1, PASSWORD_DEFAULT),
'email' => $email,
'trn_date' => $curDate

];
$stmt->execute($values);

*/
echo "Eagle has landed";
/*
echo "Welcome sir";

$stmt1 = $pdo->prepare('SELECT * FROM Person1');
        $values1 = [    
                 'password' => password_hash($_POST['password'], PASSWORD_DEFAULT), 
                 'trn_date' =>  $curDate,
        ];
        $stmt1->execute($values1);
        if (isset($_POST['submit'])) {
$stmt = $pdo->prepare('UPDATE Person1 SET
								
password = :password,    
trn_date = :trn_date,
email = :email       
WHERE email = :email
');

//unset removes submit button / form to confirm that items have been sent 

unset($_POST['submit']);
$stmt->execute($_POST);

echo '<p>Record Updated</p>';
        }
	*/
}


//mysqli_query($con,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");
	
echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
<p><a href="https://www.allphptricks.com/forgot-password/login.php">
Click here</a> to Login.</p></div><br />';
	  }		

}



}




?>