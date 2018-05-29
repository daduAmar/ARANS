<?php

require_once 'connect.php';


// Starting session
session_start();

//session_unset(); // remove all session variables

// Destroying session
//session_destroy();
if(isset($_SESSION['uname'])){
    unset($_SESSION['uname']);
}


header("Location: trialhome.php");
?>