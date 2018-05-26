<?php  
if (isset($_POST['submit'])) {
  // Get the database connection 
  require_once 'connect.php';


  $username = $_POST['uname'];
  $password = $_POST['psd'];
  
  // Is any field empty?
  if (empty(trim($username)) || empty(trim($password))) {
    $empty = "Please, fill in all the inputs";
    header("Location: trialhome.php?emp");
  }
  else {
    $sql = "SELECT * FROM teachers WHERE username='$username' OR email='$username'";

    if ($result = mysqli_query($link, $sql)) {

      if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Check whether the user's account has been activated
        if($row['status'] == NULL) {
          
          header("Location: trialhome.php?al1");
        }
        elseif($row['status'] == 0) {
        
          header("Location: trialhome.php?al2");
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
             header("Location: trialhome.php?err");
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>