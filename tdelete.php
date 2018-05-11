<?php
if(isset($_GET['tid']))
{
	$id=$_GET['tid'];
	echo $id;
	require_once "connect.php";
	$query="DELETE FROM teachers WHERE tid='$id'";
	if($result=mysqli_query($link,$query))
	{
		while($row=mysqli_fetch_array($result))
		{
			echo "deleted";
		}
	}
	header("Location: vteacher.php");
}
?>tde