<?php
if(isset($_GET['stdid']))
{
	$id=$_GET['stdid'];
	echo $id;
	include "connect.php";
	$query="delete from students where stdid='$id'";
	if($result=mysqli_query($link,$query))
	{
		while($row=mysqli_fetch_array($result))
		{
			echo "deleted";
		}
	}
	header("Location: studentDetls.php");
}
?>