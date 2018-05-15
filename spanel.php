<?php 
  require_once "connect.php";

  session_start();

  if (empty($_SESSION['uname'])) {
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
   <link rel="stylesheet" href="trialadminpanel.css">

    <title>Hello, world!</title>
  </head>
  <body>
    
<div class="container-fluid">
   <div class="jumbotron jumbotron-fluid text-body text-left mb-0 mt-0">
      <div class="container">
             <div class="text-muted text-left display-4"> ARANS </div>
                <div class="text-muted">Attendance Records & Assignments Notifying System</
                </div>
                </div>
             <div class="text-right text-muted display-4">STUDENT PANEL</div>
          </div>  
      </div>

    <!-- <div class="container-fluid"> -->
    
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="trialhome.php">Home</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="addsubject.php">News & Events</a>
    </li>
  
  </ul>
  <!-- <div class="collapse navbar-collapse justify-content-end mr-0">
    <ul class="navbar-nav">
      <li class="nav-item text-white">
        <p>Welcome <?php echo $_SESSION['uname']; ?></p>
      </li>
    </ul>
  </div> -->
  <div class="collapse navbar-collapse justify-content-end mr-3">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <p>Welcome <?php echo $_SESSION['uname']; ?></p>
      </a>
      <div class="dropdown-menu">
      <a href="slogout.php"><button type="button" class="btn btn-sm dropdown-item">Logout</button></a>
      </div>
    </li>
    </ul>
  </div>
</nav>
<!-- </div> -->
    
<div class="mid">

    

<br><br>
 <div class="container-fluid ml-4">
  <div class="row ml-5">


      <div class="col align-self-start">
      <div class="card bg-secondary" style="width: 250px;">
         <img class="card-img-top" src="images/att3.jpg" alt="Card image cap">
        <div class="card-body">
            <h6 class="card-title text-white">Check your attendance</h6>
            <a href="#" class="btn btn-info">View Attendance</a>
       </div>
     </div>
    </div>

   <div class="col align-self-center">
      <div class="card bg-secondary" style="width: 250px;">
            <img class="card-img-top" src="images/notes1.jpg" alt="Card image cap">
         <div class="card-body">
           <h6 class="card-title text-white">Check your notes</h6>
            <a href="retrievenote.php" class="btn btn-info">View Notes</a>
     </div> 
   </div>
  </div>

    <div class="col align-self-end">
        <div class="card bg-secondary" style="width: 250px;">
            <img class="card-img-top" src="images/assign7.png" alt="Card image cap">
         <div class="card-body"> 
           <h6 class="card-title text-white">Check your assignments</h6> 
          <a href="assigndisp.php" class="btn btn-info">View Assignments</a>
        </div>
    </div>
  </div>

  </div>
</div>
<br><br>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  	<!-- <div class="container-fluid"> -->
    <?php 
  			include 'footer.php';
  	 ?>
    <!-- </div> -->
  </body>
</html>
	