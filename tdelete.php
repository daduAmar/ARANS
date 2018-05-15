<?php
if(isset($_GET['tid']))
{
	$id=$_GET['tid'];
	
	require_once "connect.php";
	
	$query="DELETE FROM teachers WHERE tid='$id'";
	
	mysqli_query($link,$query);
	
	header("Location: vteacher.php?delete");
}
?>