<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>tUpdate</title>
  </head>
  <body>
   
  

  <?php 
  
  include 'connect.php';
  
    $id=$_GET['tid'];
  
    $query="SELECT * FROM teachers WHERE tid='$id'";
    
    $result=mysqli_query($link,$query) or die(mysqli_error($link));
    
    $row=mysqli_fetch_assoc($result);
  ?>
    
    <div class="container">
      <h1 class="display-2">Update</h1>
    </div>
  
  <div class="row">
  <div class="col-md-6 offset-md-3">
  
  <form method="POST" action="tupdate2.php">
      <div class="form-group">
        <input type="hidden" name="tid" class="form-control" value="<?php echo $row['tid'];?>">
      </div>
      <div class="form-group">
        <label>Name: </label>
        <input type="text" name="name" class="form-control" required="required" placeholder="Enter name" value="<?php echo $row['name']; ?>">
      </div>
      
      <div class="form-group">
        <label>Email: </label>
        <input type="email" name="email" class="form-control" required="required" placeholder="Enter email" value="<?php echo $row['email']; ?>">
      </div>
      
      <div class="form-group">
        <label>Username: </label>
        <input type="text" name="uname" class="form-control" required="required" placeholder="Enter username" value="<?php echo $row['username']; ?>">
      </div>
      <button type="submit" class="btn btn-primary " name="submit">Update</button>

      
  </form>
  </div>     
  </div>  -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>