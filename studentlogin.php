<?php   

  if (isset($_POST['submit'])) {
    require 'connect.php';

    $username = $_POST['uname'];
    $password = $_POST['psd'];

    $sql = "SELECT * FROM students WHERE uname='$username' and password='$password'";

      if ($result = mysqli_query($link, $sql)) {
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        
        session_start();

        $_SESSION['uname'] = $username;
        $_SESSION['stdid'] = $row['stdid'];

        header("Location: spanel.php");

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

    <title>stdlogins</title>
  </head>
  <body>
    
    <div class="container">
      <h1 class="display-4"> Student Login</h1>
    </div>
    <div class="row">
    <div class="col-md-6 offset-md-3">
    <form method="POST" action="studentlogin.php">
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="uname" class="form-control" required="required" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="psd" class="form-control" required="required" placeholder="Password">
      </div>
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
    </div>
    </div> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>  