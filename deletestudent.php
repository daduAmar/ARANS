<?php
if(isset($_GET['stdid']))
{
	$id=$_GET['stdid'];
	echo $id;
	include "connect.php";
	$query="delete from students where stdid='$id'";
	mysqli_query($link,$query);
	header("Location:studentDetls.php?delete");
}

?>

