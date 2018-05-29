<?php
  session_start();
  
  if (empty($_SESSION['username'])) {
    header("Location: trialhome.php");
  }

  $tid=$_SESSION['tid'];
  if(isset($_POST['submit'])) 
  {
    require_once "connect.php";
    $subid=$_POST['sub_id'];
    $assign=$_POST['con'];
    
    
    $sql="INSERT INTO assignment(subid,content,date) values('$subid','$assign',NOW())"; 
    mysqli_query($link,$sql);
    header("Location:assignment.php?success");
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
   <script src="js/jQuery-3.3.1.min.js"></script>
    <title>tassignment</title>
  
  </head>  
  
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="trialhome.php">Home</a>
    <div class="collapse navbar-collapse justify-content-end mr-0">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="tpanel.php">Back</a>
      </li>
    </ul>
  </div>
    </nav>  
    <br>
    <?php if (isset($_GET['success'])): ?>
    <div class="row">
    <div class="col-md-6 offset-md-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            
            <?php   
                  echo "File Uploaded Successfully!"
            ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    </div>
    </div>
  <?php endif; ?>

    <?php 
        require_once "connect.php";
  
        $query="SELECT * FROM subject WHERE tid=$tid";
        $result=mysqli_query($link,$query) or die(mysqli_error($link));

    ?>
    <div class="row">
    <div class="col-md-6 offset-md-3">
    <br>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

      <div class="form-group">
          <label>Subject: </label>
    
      <select class="form-control" name="sub_id">

            <option>Select Subject</option>

            <?php while ($row = mysqli_fetch_assoc($result)): ?>
              
                <option value="<?php echo $row['subid'] ?>"> <?php echo $row['subname'] ?> </option>

              <?php endwhile; ?>

        </select>
      </div>
    
      <div class="form-group">
        <label>Assignment: </label>
        <textarea class="form-control" name="con" placeholder="write..." required="required"></textarea><br>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      <button type="reset" class="btn btn-primary">Reset</button>
      </div>
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