<?php
if(!isset($_SESSION)){
//if the session has not been started start one
session_start();
}




$server = 'mysql';
$username = 'tutorial';
$password = 'secret';
//The name of the schema we created earlier in MySQL workbench
//If this schema does not exist you will get an error!
$schema = 'tutorial';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$results = $pdo->query('SELECT * FROM Person1');
$results1 = $pdo->query('SELECT * FROM item');




?>