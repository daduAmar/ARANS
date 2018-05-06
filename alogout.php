<?php

require_once 'connect.php';


// Starting session
session_start();

// Destroying session
session_destroy();

header("Location: trialhome.php");