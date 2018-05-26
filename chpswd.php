<?php 
	session_start();
	$stdid=$_SESSION['stdid'];
	if(isset ($_POST['sub']))
	{

		require_once "connect.php";
		$cp=$_POST['cpswd'];
		$np=$_POST['npswd'];

		$sql="SELECT password FROM students where stdid=$stdid";
		$result=mysqli_query($link,$sql);
		$row=mysqli_fetch_assoc($result);
		$op=$row['password'];
		$npswd = password_hash($np, PASSWORD_DEFAULT);
		
		if ($op == $cp) {

			$query="UPDATE students set password='$npswd' WHERE stdid='$stdid' ";
			mysqli_query($link,$query);
			header("Location: chpswd.php?success");
		}
		 elseif ($psw=password_verify($cp, $op)) {
		
		$query="UPDATE students set password='$npswd' WHERE stdid='$stdid' ";
	 	mysqli_query($link,$query);
	 	header("Location: chpswd.php?success");
		} 
		else{
			echo "Wrong!!!";
		}
	}

?>

 <!DOCTYPE html>
<html>
<head>
	<title>Change password</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="trialhome.php">Home</a>

  <div class="collapse navbar-collapse justify-content-end mr-0">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="spanel.php">Back</a>
      </li>
    </ul>
  </div>
</nav>
<br>
	<div class="container">
	<br><br><br>
	<form class="form-group" method="POST" action="chpswd.php">
		<h6>Current password:<input class="form-control" type="password" name="cpswd"></h6><br><br>
		<h6>New password:<input class="form-control" type="password" name="npswd"></h6><br><br>
		<h6>Re-type new password:<input class="form-control" type="password" name="conpswd"></h6><br><br>
		<input class="form-control btn btn-primary" value="Update" type="submit" name="sub">

		
	</form>
	</div>
	 <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <div class="footer fixed-bottom bg-dark text-white text-center p-1">
     	 <h6>ARANS <br></h6>
     	 &copy; Copyright 2018 Designed by Amar & Dipsikha
	</div>
</body>
</html>
