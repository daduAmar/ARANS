<?php
require_once "connect.php";


if(isset($_POST["submit"])) 
{
  $name=$_POST["name"];
  $roll=$_POST["roll"];
  $email=$_POST["email"];
  $sem=$_POST["sem"];
  $uname=$_POST["uname"];
  $psd=$_POST["pswd"];
  $cpsd=$_POST["cpswd"];

  $is_ok=true;

    // Error messages
    $fname_error = $email_error = $uname_error= $roll_error= '';


    $pattern="/^[a-zA-Z]+$/";
    $pattern_uname="/\W/";
    $pattern_roll="/\D/";

    if (preg_match($pattern, $name) !== 1) {
      $fname_error = "Only alphabates allowed in names!<br>";
      $is_ok=false;
    }

    
    if (preg_match($pattern_uname, $uname) ) {
      $uname_error = "Only alphabates, digits and underscore(_) allowed in usernames!<br>";
      $is_ok=false;
    }

    if (preg_match($pattern_roll, $roll) == 1) {
      $roll_error = "Only numbers allowed in roll numbers! <br>";
      $is_ok=false;
    }
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      $email_error = "Invalid email!<br>";
      $is_ok=false;
    }

    // Is any field empty?
      if (empty(trim($name)) || empty(trim($roll)) || empty(trim($email)) || empty(trim($sem)) || empty(trim($uname)) || empty(trim($psd)) || empty(trim($cpsd))) {
        $empty = "Please, fill in all the inputs<br>";
        $is_ok=false;
      }


      // Has the username already been taken?
      $sql = "SELECT * FROM students WHERE uname='$uname'";
      $result = mysqli_query($link, $sql);

      if (mysqli_num_rows($result) > 0) {
        $name_error = "Username already exist!<br>";
        $uname = "";
        $is_ok=false;
      }

      // Are the passwords equal?
      if ($psd !== $cpsd) {
        $pwd_error = "The passwords didn't match!<br>";
        $psd = $cpsd = "";
        $is_ok=false;
      }



      if ($is_ok === true) {

        // Everything is Allright. Insert the student's record
        $sql="insert into students(name,rollno,email,sem,uname,password) values('$name','$roll','$email','$sem','$uname','$psd')";
               
       if(mysqli_query($link,$sql)) {
            $success = "New student added successfully!";
            header("Location: trialadminpanel.php?added=New student added successfully!");   }
       else {
            $fail = "The student's record couldn't be inserted!";
            header("Location: trialadminpanel.php");
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


    <title>stuAdd</title>
  </head>
  <body>
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

  <br>
  <div class="row">
  <div class="col-md-6 offset-md-3">
  
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="text-white">
      <div class="form-group">
        <label>Name: </label>
        <input type="text" name="name" class="form-control" required="required" placeholder="Enter name" value="<?php echo (isset($name)) ? $name: '';?>">
      </div>
      <div class="form-group">
        <label>Username: </label>
        <input type="text" name="uname" class="form-control" required="required" placeholder="Enter username" value="<?php echo (isset($uname)) ? $uname: '';?>">
      </div>
      <div class="form-group">
        <label>Roll: </label>
        <input type="text" name="roll" class="form-control" required="required" placeholder="Enter roll" value="<?php echo (isset($roll)) ? $roll: '';?>">
      </div>
      <div class="form-group">
        <label>Email: </label>
        <input type="email" name="email" class="form-control" required="required" placeholder="Enter email" value="<?php echo (isset($email)) ? $email: '';?>">
      </div>
      <div class="form-group">
      <label>Semester: </label>
      <select class="form-control" name="sem">
      <option>Select Semester</option>
      <option>1st sem</option>
      <option>2nd sem</option>
      <option>3rd sem</option>
      <option>4th sem</option>
      <option>5th sem</option>
      <option>6th sem</option>
      </select>
      </div>

      <div class="form-group">
        <label>Password: </label>
        <input type="password" name="pswd" class="form-control" required="required" placeholder="Password">
      </div>
      
      <div class="form-group">
        <label>Confirm Password: </label>
        <input type="password" name="cpswd" class="form-control" required="required" placeholder="Re-enter password">
      </div>
    </div>

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      <button type="reset" class="btn btn-primary ">Reset</button>
      <br><br>
      
      
  </form>
  </div>     
  </div> 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>