<?php  
if (isset($_POST['submit'])) {
  // Get the database connection 
  require_once 'connect.php';


  $username = $_POST['uname'];
  $password = $_POST['psd'];
  
  // Is any field empty?
  if (empty(trim($username)) || empty(trim($password))) {
    $empty = "Please, fill in all the inputs";
  }
  else {
    $sql = "SELECT * FROM teachers WHERE username='$username' OR email='$username'";

    if ($result = mysqli_query($link, $sql)) {

      if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Check whether the user's account has been activated
        if($row['status'] == NULL) {
          
          $alert1="Account is not activated";
        
        }
        elseif($row['status'] == 0) {
        
          $alert2="You're rejected";
        
        }
        else {
          $hashed_password = $row['pswd'];

          if ($psw=password_verify($password, $hashed_password)) {
            
            
           // Start the session
            session_start();
  
            $_SESSION['username'] = $username;
            $_SESSION['tid'] = $row['tid'];

            // store tid in the $_SESSION

             header("Location: tpanel.php");
          }
         else {
             $login_error = "Invlid Login";
           }
        }
      }
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

    <title>Tlogin Page</title>
  </head>
  <body>
    

    <!-- <a href="trialhome.php">HOME</a> -->
    <h1 class="text-center" style="margin: 20px;"> TEACHER LOGIN</h1>
    
    <div class="mx-3 font-italic text-danger">
    <?php 
      if(!empty($empty))
        echo "<h3> $empty </h3>";
    ?>

    <?php 
      if(!empty($login_error))
        echo "<h3> $login_error </h3>";
    ?>
    <?php 
      if(isset($alert1))
        echo "<h3> $alert1 </h3>";
    ?>
    <?php 
      if(isset($alert2))
        echo "<h3> $alert2 </h3>";
    ?>
    </div> 
  
  <div class="mx-3">
  <form method="POST" action="tlogin.php">
      <div class="form-group">
        <label>Username/Email address</label>
        <input type="text" name="uname" class="form-control" required="required" placeholder="Enter username/email">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="psd" class="form-control" required="required" placeholder="Password">
      </div>
        <button type="submit" class="btn btn-secondary" name="submit">Login</button>
        <button type="reset" class="btn btn-secondary ">Reset</button>
      
  </form>
  </div> 





 





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>