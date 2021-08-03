<?php
include('header.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
?>
<html>
<head>
<title>Demo Forgot Password Recovery (Reset) using PHP and MySQL - AllPHPTricks.com</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2>Demo Forgot Password Recovery (Reset) using PHP and MySQL</h2>   

<form method="post" action="" name="reset"><br /><br />
<label><strong>Enter Your Email Address:</strong></label><br /><br />
<input type="email" name="email" placeholder="username@email.com" />
<br /><br />
<input type="submit" value="Reset Password"/>
</form>

<?php
if(isset($_POST["email"]) && (!empty($_POST["email"]))){

	
		$stmt = $pdo->prepare('SELECT * FROM Person1 WHERE Email = :Email');
$values = [
 'Email' => $_POST['email'],
 
];
$stmt->execute($values);
$user = $stmt->fetch();

print_r($user); 

// echo $user[3];
$email = "chimp";
$email = $user[3];

	$row = $user;

	
	



		
	$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
	$expDate = date("Y-m-d H:i:s",$expFormat);
	var_dump($email);

	$email2 = "111";
	//$key = md5(2418*2+$email2);

	$str = "Hello";
  $b ="VinDisel";
	$c = $str.$b;
$vin = md5($c);

echo "Hello fin ting";
echo $c;
echo $vin; 
echo'<br></br>';
echo md5($str);

$key = $vin;
//$vin2 = md5(2418*2+$vin);
	//$key = md5(2418*2+$str);
    //echo'<br></br>';
//	$key = $vin2;
  //  echo $key;
	
	$addKey = substr(md5(uniqid(rand(),1)),3,10);
	$key2 = $key . $addKey;


	echo "chicken is served";
	echo $key2;








	
// Insert Temp Table
//mysqli_query($con,
//"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
//VALUES ('".$email."', '".$key."', '".$expDate."');");



$stmt = $pdo->prepare('INSERT INTO password_reset_temp (email, key2, expDate)
VALUES (:email, :key2, :expDate)
');
$values = [

'email' => $email,
'key2' => $key2,
'expDate' => $expDate


];
$stmt->execute($values);
}



$mail = new PHPMailer(true);            
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "in-v3.mailjet.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "f21e14a2e648e674a3084d60ac21ebad";                 
$mail->Password = "ce2412e7105890db0fbe458d30a106ce";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;                                   

$mail->From = "ian.mulinge118@gmail.com";
$mail->FromName = "DarkHAckz";

$mail->addAddress("darktag118@gmail.com", "DarkZen118");

$mail->isHTML(true);

//$mail->Subject = "Subject Text";
//$mail->Body = "<i>Mail body in HTML</i>";
//$mail->AltBody = "This is the plain text version of the email content";

$output='<p>Dear user,</p>';
$output.='<p>Please click on the following link to reset your password.</p>';
$output.='<p>-------------------------------------------------------------</p>';
//$output ='<p>'.$key2.'</p>';
$output='<p><a href="http://127.0.0.1/reset-password.php?key2='.$key2.'&email='.$email.'&action=reset"</a></p>';		
$output.='<p>-------------------------------------------------------------</p>';
$output = '<a href="http://127.0.0.1/reset-password.php?key2='.$key2.'&email='.$email.'&action=reset"</a>';
$output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
$output.='<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';   	
$output.='<p>Thanks,</p>';
$output.='<p>AllPHPTricks Team</p>';



$body = $output; 
$subject = "Password Recovery - AllPHPTricks.com";


$mail->Subject = $body;
$mail->Body = $subject;
$mail->AltBody = $body;

if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}

elseif($user==""){
		$error = "<p>No user is registered with this email address!</p>";
		}
		else{

		}



//else{
//echo "<div class='error'>
//<p>An email has been sent to you with instructions on how to reset your password.</p>
//</div><br /><br /><br />";
//	}

			


?>




<br /><br />
<a href="https://www.allphptricks.com/forgot-password-recovery-reset-using-php-and-mysql/"><strong>Tutorial Link</strong></a> <br /><br />
For More Web Development Tutorials Visit: <a href="https://www.allphptricks.com/"><strong>AllPHPTricks.com</strong></a>
</div>
</body>
</html>