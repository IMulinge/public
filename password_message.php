<?php
              require("header.php");
            
            
			?>
<title>Password message</title>

<style>
.center {

    display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;
}

.center p {
  line-height: 1.5;
  display: inline-block;
  vertical-align: middle;
}
</style>

<div class="center">
<center> <h1> Password message</h1> </center>
<br></br>
<p>An email has been sent to your email address with a link to reset your password</p>
</div>

<?php 

function sendPasswordResetLink($userEmail, $token)
{
    global $mailer;
    $body = <'!DOCTYPE html>
    <html lang = "eng">
    <head>
    <meta charset="UTF-8">
    <title>Verify email</title>
    </head>

    <body>
    <div class ="wrapper">
    <p> 
    Hello there,

    Please click on the link below to reset your password 
    </p>

    <a href= "https:ibuy.v.je/"index.php?password-token='.$token.'">
    Reset your password 
    </a>
    </div>
    </body>
    </html>';


    $message = (new Swift_Message('Reset your password'))
    ->setFrom(EMAIL)
    ->SetTo($userEmail)
    ->setBody($body, 'text/html');

    $result = $mailer->send($message);
    
}






function resetPassword($token){
  
    $pdo = new PDO('mysql:dbname=csy2028;host:v.je', 'student', 'student');
//search query that presents the latest items by listing them in decending order presenting the latest 10 items 
$sql = $pdo->prepare("SELECT * from Person1 WHERE token='$token' LIMIT 1");
$result = mysqli_query($pdo, $sql);
$user = mysql_fetch_assoc($result); 
$_SESSION['email'] = $user['email'];
header('location: reset_password.php');
exit(0);
}




?>
<?php
              require("footer.php");
            
            
			?>