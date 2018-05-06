<?php
include 'connect.php';
	if(isset($_POST['submit']))
	{ 
		$id=$_POST['stdid'];
		$name=$_POST['name'];
		$roll=$_POST['roll'];
		$email=$_POST['email'];
		$sem=$_POST['semester'];
		$uname=$_POST['uname'];
		$psd=$_POST['pswd'];

	$ins="update students set name='$name',rollno='$roll',email='$email',sem='$sem',uname='$uname',password='$psd' where stdid='$id'";

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
