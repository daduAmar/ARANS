<?php

require_once 'connect.php';


// Starting session
session_start();

//session_unset(); // remove all session variables

// Destroying session
//session_destroy();
unset($_SESSION['a_uname']);

header("Location: trialhome.php");
?>