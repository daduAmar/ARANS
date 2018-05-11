<?php 
  require_once 'connect.php';

  if(isset($_POST['submit'])) {
    $name=$_POST['name'];
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $pswd=$_POST['pswd'];
    $cpswd=$_POST['cpswd'];

    $is_ok=true;

    // Error messages
    $fname_error = $email_error = $uname_error = '';


    $pattern="/^[a-zA-Z]+$/";
    $pattern_uname="/\W/";
    
    if (preg_match($pattern, $name) !== 1) {
      $fname_error = "Only alphabates allowed!";
      $is_ok=false;
    }
    
    if (preg_match($pattern_uname, $uname) ) {
      $uname_error = "Only alphabates, digits and underscore(_) allowed in usernames!<br>";
      $is_ok=false;
    }


      if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      $email_error = "Invalid email!";
      
      $is_ok=false;
    }

    // Is any field empty?
      if (empty(trim($name)) || empty(trim($uname)) || empty(trim($email)) || empty(trim($pswd)) || empty(trim($cpswd))) {
        $empty = "Please, fill in all the inputs";
        $is_ok=false;
      }


      // Has the username already been taken?
      $sql = "SELECT * FROM teachers WHERE username='$uname'";
      $result = mysqli_query($link, $sql);

      if (mysqli_num_rows($result) > 0) {
        $name_error = "Username already exist";
        $uname = "";
        $is_ok=false;
      }

      // Are the passwords equal?
      if ($pswd !== $cpswd) {
        $pwd_error = "The passwords didn't match";
        $pswd = $cpswd = "";
        $is_ok=false;
      }

    
      // Creates a password hash
      $pswd = password_hash($pswd, PASSWORD_DEFAULT);

    
    if ($is_ok === true) {

        // Everything is Allright. Insert the student's record
        $sql="INSERT INTO teachers (name,email,username,pswd) values('$name','$email','$uname', '$pswd')";
               
       if(mysqli_query($link,$sql)) {
            $success = "New Teacher added successfully!";
       }
       
       else {
            
            $fail = "The teacher's record couldn't be inserted!";
          }
    
      }
     
    mysqli_close($link);
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


    <title>Teacher Register</title>
  </head>
  <body>
    <br>
    <br>
    <h1 class="container bg-info text-center">Teacher Registration</h1>
    <p class="container text-muted">Please fill this form to create an account</p>
    <hr>
    <br>
    <?php if(isset($_POST['submit']) AND $is_ok===false): ?>
      <div class="alert alert-warning alert-dismissible fade show container" role="alert">
          <strong>
            <?php
              echo empty($empty) ? "" : $empty; 
              echo isset($name_error) ? $name_error : "";
              echo isset($pwd_error) ? $pwd_error : "";
              echo isset($fname_error) ? $fname_error : "";
              echo isset($uname_error) ? $uname_error : "";
              echo isset($email_error) ? $email_error : "";
              
            ?>
          </strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <?php if(isset($_POST['submit']) AND $is_ok===true): ?>
      <div class="alert alert-success alert-dismissible fade show container" role="alert">
          <strong> 
            <?php 
              echo isset($success) ? $success : "";
              echo isset($fail) ? $fail : "";
            ?>
          </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>  
    <br>
    <div class="row">
    <div class="col-md-6 offset-md-3">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label>Name: </label>
        <input type="text" name="name" class="form-control" required="required" placeholder="Enter name">
      </div>
      
      <div class="form-group">
        <label>Username: </label>
        <input type="text" name="uname" class="form-control" required="required" placeholder="Enter username">
      </div>
      
      <div class="form-group">
        <label>Email: </label>
        <input type="email" name="email" class="form-control" required="required" placeholder="Enter email">
      </div>
      
      <div class="form-group">
        <label>Password: </label>
        <input type="password" name="pswd" class="form-control" required="required" placeholder="Password">
      </div>
      
      <div class="form-group">
        <label>Confirm Password: </label>
        <input type="password" name="cpswd" class="form-control" required="required" placeholder="Re-enter password">
      </div>

      <button type="submit" class="btn btn-secondary" name="submit">Submit</button>
      <button type="reset" class="btn btn-secondary ">Reset</button>
      <br>
      <br>
    </form>
    </div>
    </div>     

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>