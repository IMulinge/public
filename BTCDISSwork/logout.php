<?php
//commands used to unset and cancel all stored/currently running sessions
session_start();
unset($_SESSION['username']);
unset($_SESSION['loggedin']);
session_destroy();
unset($_SESSION['counter']);
require("header.php");
echo'You are now logged out';
require("footer.php");
?>
