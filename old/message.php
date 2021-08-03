<?php
              require("header.php");
            
            
			?>


<center> <h1> Message stuff </h1> </center>

<?php
$pdo = new PDO('mysql:dbname=csy2028;host:v.je', 'student', 'student');
//selects all messages tied to the users_id 
$messageQuery = $pdo->prepare('SELECT * from message');
$userQuery = $pdo->prepare('SELECT * FROM Person1 WHERE user_id = :user_id');
$messageQuery->execute();
echo '<ul>';
foreach ($messageQuery as $message) {
 $values = [
 'user_id' => $message['userid']
 ];
 $userQuery->execute($values);
 $user = $userQuery->fetch();
 //prints username and messages along with date and time 
 echo '<li>' .
 $user['username'] .
 ' posted the message <strong>' . $message['message'] . '</strong>' .
 ' on ' . $message['date']
 . '</li>';
}
echo '</ul>';




// Creates a hyperlinked text of the persons username to a page that will display all of the users messages 


$stmt = $pdo->prepare('SELECT * FROM Person1');
$stmt->execute();
echo '<ul>';
while ($person = $stmt->fetch()) {
 echo '<li><a href="msgfil.php?userid=' . $person['user_id'] . '">' . $person['username'] .'</a></li>';

}
echo '</ul>';










?>


<?php
              require("footer.php");
            
            
			?>


