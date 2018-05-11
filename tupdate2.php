<?php
include 'connect.php';
	if(isset($_POST['submit']))
	{ 
		$id=$_POST['tid'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$uname=$_POST['uname'];
		$psd=$_POST['pswd'];

	$ins="UPDATE students SET name='$name',email='$email',username='$uname',pswd='$psd' where stdid='$id'";

	if (mysqli_query($link,$ins))
		{
			echo "<br>"."New record updated successfully";
			
			header("Location:studentDetls.php");
		}
	else
		{
			echo "<br>"."Cannot be updated successfully";
		}

	}
?>