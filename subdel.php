<?php
if(isset($_GET['sid']))
{
	$id=$_GET['sid'];
	
	require_once "connect.php";
	
	$query="DELETE FROM subject WHERE subid='$id'";
	
	mysqli_query($link,$query);
	
	header("Location: vsubject.php?delete");
}
?>