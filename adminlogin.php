<?php 

  if (isset($_POST['submit'])) {
    require 'connect.php';

    $username = $_POST['uname'];
    $password = $_POST['pswd'];

    $sql = "SELECT * FROM admin WHERE uname='$username' and pswd='$password'";

    if ($result = mysqli_query($link, $sql)) {
      if (mysqli_num_rows($result) == 1) {
        
        session_start();

        $_SESSION['uname'] = $username;

        header("Location: trialadminpanel.php");

      }
      else {
        echo "<p>Invalid Login</p>";
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
  <p class="display-4 bg-primary text-center m-3""> ADMIN LOGIN </p>

  <div class="row">
  <div class="col-md-6 offset-md-3">
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label>Username: </label>
        <input type="text" name="uname" class="form-control" required="required" placeholder="Enter username">
      </div>
      
      <div class="form-group">
        <label>Password: </label>
        <input type="password" name="pswd" class="form-control" required="required" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      <button type="reset" class="btn btn-primary ">Reset</button>
      
  </form>
  </div>
  </div>
  </div>       
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>