<?php
require('header.php');

if(isset($_POST['submit_email']) && $_POST['email'])
{
    $pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $select = $pdo->prepare('SELECT * FROM Person1 WHERE Email = :Email');
  //$select=mysql_query("select email,password from Person1 where email='$email'");



  $stmt = $pdo->prepare('SELECT * FROM Person1 WHERE Email = :Email');
  $values = [
   'Email' => $_POST['Email'],
   
  ];
  $stmt->execute($values);
  $user = $stmt->fetch();
  //admin section of login checks when the submit button is pressed that the password matches with the password of the username and password in the database
  //as well as if they are an admin
  
  

  
  header('Location:more.php');
  
  if ($stmt->rowCount() > 0) {
           
    $_SESSION['Email'] = $_POST['Email'];
   }





  if(mysql_num_rows($select)==1)
  {
    while($row=mysql_fetch_array($select))
    {
      $email=md5($row['email']);
      $pass=md5($row['password']);
    }

   // $userQuery = $pdo->prepare('SELECT * FROM categories WHERE cat_id = :cat_id');
    //$messageQuery->execute();
    //foreach ($messageQuery as $message) {
     //$values = [
     //'cat_id' => $message['cats_id']
     //];
     //$userQuery->execute($values);
     //$user = $userQuery->fetch();

    $link="<a href='www.samplewebsite.com/reset.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    require_once('phpmail/PHPMailerAutoload.php');
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "your_email_id@gmail.com";
    // GMAIL password
    $mail->Password = "your_gmail_password";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='your_gmail_id@gmail.com';
    $mail->FromName='your_name';
    $mail->AddAddress('reciever_email_id', 'reciever_name');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$pass.'';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }	
}
?>