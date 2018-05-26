<?php 
  require_once "connect.php";

  session_start();

  if (empty($_SESSION['uname'])) {
    header("Location: trialhome.php");
  }


  date_default_timezone_set("Asia/Kolkata");
  $dat = date("Y-m-d");
  $stdid = $_SESSION['stdid'];

  $sql = "SELECT COUNT(*) as ac FROM assignment WHERE date='$dat' AND subid IN (SELECT subid FROM subject WHERE sem = (SELECT sem from students WHERE stdid=$stdid))";

  if ($result = mysqli_query($link, $sql)) {
    $row = mysqli_fetch_array($result);

    if ($row['ac'] > 0) {
      $as_no = $row['ac'];
      if (! isset($_SESSION['as_msg'])) {
        $_SESSION['as_msg'] = true;
      }

    }

  }
  else {
    // DB Error
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

    <title>spanel</title>
  </head>
  <body>
    
<div class="container-fluid">
   <div class="jumbotron jumbotron-fluid text-body text-left mb-0 mt-0">
      <div class="container">
             <div class="text-muted text-left display-4"> ARANS </div>
                <div class="text-muted">Attendance Records & Assignments Notifying System</
                </div>
                </div>
             <div class="text-right text-muted pr-2"><h1>STUDENT PANEL</h1></div>
          </div>  
      </div>

    <!-- <div class="container-fluid"> -->
    
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="trialhome.php">Home</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
    
    <?php if(! empty($_SESSION['as_msg'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="assigndisp.php">
              New Assignments <span class="badge badge-warning "><?php echo $as_no; ?></span>
          </a>
        </li>
    <?php endif; ?>  
  

  </ul>
   <div class="collapse navbar-collapse justify-content-end mr-0">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle mr-3  text-info" href="#" id="navbardrop" data-toggle="dropdown"><b>
      Welcome <?php echo $_SESSION['uname']."!"; ?>
      </b>
      </a>
      <div class="dropdown-menu">
        <button type="button" class="btn btn-md dropdown-item"><a href="chpswd.php">Change password</a></button>
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
      <div class="card bg-secondary" style="width: 200px;">
         <img class="card-img-top" src="images/att3.jpg" alt="Card image cap">
        <div class="card-body">
            <h6 class="card-title text-white">Check your attendance</h6>
            <a href="sviewattendance.php" class="btn btn-info">View Attendance</a>
       </div>
     </div>
    </div>

   <div class="col align-self-center">
      <div class="card bg-secondary" style="width: 210px;">
            <img class="card-img-top" src="images/notes1.jpg" alt="Card image cap">
         <div class="card-body">
           <h6 class="card-title text-white">Check your notes</h6>
            <a href="retrievenote.php" class="btn btn-info">View Notes</a>
     </div> 
   </div>
  </div>

    <div class="col align-self-end">
        <div class="card bg-secondary" style="width: 200px;">
            <img class="card-img-top" src="images/assign7.png" alt="Card image cap">
         <div class="card-body"> 
           <h6 class="card-title text-white">Check your assignments</h6> 
          <a href="assigndisp.php" class="btn btn-info">View Assignments</a>
        </div>
    </div>
  </div>
    
    <div class="col align-self-end">
        <div class="card bg-secondary" style="width: 200px;">
            <img class="card-img-top" src="images/assign.jpg" alt="Card image cap">
         <div class="card-body"> 
           <h6 class="card-title text-white">Upload your assignments</h6> 
          <a href="supload.php" class="btn btn-info">Upload Assignment</a>
        </div>
    </div>
  </div

  
</div>
</div>
<br><br>
</div>
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
	