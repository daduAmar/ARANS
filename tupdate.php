<?php  
session_start();

  if (empty($_SESSION['a_uname'])) {
    header("Location: trialhome.php");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="teacher.css">
  
    <title>tUpdate</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="trialhome.php">Home</a>
    <div class="collapse navbar-collapse justify-content-end mr-0">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="trialadminpanel.php">Back</a>
      </li>
    </ul>
  </div>
    </nav> 
   
  

  <?php 
  
  include 'connect.php';
  
    $id=$_GET['tid'];
  
    $query="SELECT * FROM teachers WHERE tid='$id'";
    
    $result=mysqli_query($link,$query) or die(mysqli_error($link));
    
    $row=mysqli_fetch_assoc($result);
  ?>
    
    <div class="text-center">
      <div class="display-4 bg-info pt-0">Update</div>
    </div>
  
  <div class="row">
  <div class="col-md-6 offset-md-3">
  
  <form method="POST" action="tupdate2.php">
      <div class="form-group">
        <input type="hidden" name="tid" class="form-control" value="<?php echo $row['tid'];?>">
      </div>
      <div class="form-group">
        <label><b>Name:</b> </label>
        <input type="text" name="name" class="form-control" required="required" placeholder="Enter name" value="<?php echo $row['name']; ?>">
      </div>
      
      <div class="form-group">
        <label><b>Email:</b> </label>
        <input type="email" name="email" class="form-control" required="required" placeholder="Enter email" value="<?php echo $row['email']; ?>">
      </div>
      
      <div class="form-group">
        <label><b>Username:</b> </label>
        <input type="text" name="uname" class="form-control" required="required" placeholder="Enter username" value="<?php echo $row['username']; ?>">
      </div>
      <button type="submit" class="btn btn-primary " name="submit">Update</button>

      
  </form>
  </div>     
  </div>  
    <div class="footer bg-dark fixed-bottom">
         ARANS <br>  
         &copy; Copyright 2018 Designed by Amar & Dipsikha
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>