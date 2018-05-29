<?php 

  if (isset($_POST['submit'])) {
    require 'connect.php';

    $username = $_POST['uname'];
    $password = $_POST['pswd'];

    $sql = "SELECT * FROM admin WHERE uname='$username' and pswd='$password'";

    if ($result = mysqli_query($link, $sql)) {
      if (mysqli_num_rows($result) == 1) {
        
        session_start();

        $_SESSION['a_uname'] = $username;

        header("Location: trialadminpanel.php");

      }
      else {
       $message="Invalid login!";
      }
    }
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
   <title>AdminLogin</title>
  </head>

    <body>
    
  <div class="container-fluid">
    
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
      <a class="navbar-brand" href="trialhome.php">Home</a>

    </nav>
<div class="bg-secondary">
 <p class="display-4 bg-primary text-center"> ADMIN LOGIN </p>
  <br><br><br>
  <div class="row">
  <div class="col-md-6 offset-md-3"><br><br>


    <?php if (isset($message) === true): ?>  
      <div class="alert alert-danger alert-dismissible fade show" role="alert">

           <?php 
                echo "<strong> $message </strong>"
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <?php endif; ?>

  <form class="text-white" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <b><div class="form-group">
        <label>Username: </label>
        <input type="text" name="uname" class="form-control" required="required" placeholder="Enter username">
      </div>
      
      <div class="form-group">
        <label>Password: </label>
        <input type="password" name="pswd" class="form-control" required="required" placeholder="Password">
      </div></b>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      <button type="reset" class="btn btn-primary ">Reset</button>
      <br><br><br><br><br><br>
  </form>
  </div>    
 </div>
</div>
  </div>
 
  <?php include "footer.php"; ?>
  
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>