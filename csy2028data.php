<?php
if(!isset($_SESSION)){
session_start();
}
$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$query = $pdo->query('SHOW VARIABLES like "version"');
$row = $query->fetch();
$results = $pdo->query('SELECT * FROM Person1');
$results1 = $pdo->query('SELECT * FROM item');
?>
