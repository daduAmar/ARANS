<?php 

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWD', 'amar');
define('DB_NAME', 'arans');

// Connect to the database
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
		//or die('Error connecting to the database' . mysqli_connect_error());

if ($link === false) {
	die('Error connecting to the database ' . mysqli_connect_error());	
}

//echo "Succeefully connected";