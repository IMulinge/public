<?php
require("header.php");
//commands used to unset and cancel all stored/currently running sessions
 unset($_SESSION['username']);
 unset($_SESSION['loggedin']);
 session_destroy();
 unset($_SESSION['counter']);

//session_start();


 

 echo'You are now logged out';


   require("footer.php");

 ?>