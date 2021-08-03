<?php
              require("header.php");
            
            
			?>

<?php
//search query that matched the userid collected from the url with the message in the database to print all messages by 1 user
$pdo = new PDO('mysql:dbname=csy2028;host:v.je', 'student', 'student');
$stmt = $pdo->prepare('SELECT * FROM message WHERE userid = :userid');
$values = [
 'userid' => $_GET['userid']
];
$stmt->execute($values);
echo '<ul>';
echo 'All Reviews that have this person has made: ';
foreach ($stmt as $message) {
 echo '<li>' . $message['message'] .'</li>';
}






echo '</ul>';


?>


<?php
              require("footer.php");
            
            
			?>