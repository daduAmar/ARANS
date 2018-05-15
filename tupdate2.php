<?php
	if(isset($_POST['submit']))
	{ 
		include 'connect.php';

		$id=$_POST['tid'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$uname=$_POST['uname'];

	$ins="UPDATE teachers SET name='$name',email='$email',username='$uname' where tid='$id'";

	
	if (mysqli_query($link,$ins))
	{
			//echo "<br>"."New record updated successfully";
			
			header("Location: vteacher.php?success");	
	}
	 else
 	{
 		echo "<br>"."Cannot be updated successfully";
    }

 }
?>