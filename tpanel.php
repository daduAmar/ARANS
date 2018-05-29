<?php  
  require_once "connect.php";

  session_start();

  if (empty($_SESSION['username'])) {
    header("Location: trialhome.php");
  }
?>
<!DOCTYPE html>
<html>   
<head>
  <title>tpanel</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="trialadminpanel.css">
</head>
<body>

<div class="container-fluid">
   <div class="jumbotron jumbotron-fluid text-body text-left mb-0 mt-0">
      <div class="container">
             <div class="text-muted text-left display-4"> ARANS </div>
                <div class="text-muted">Attendance Records & Assignments Notifying System</
                </div>
                </div>
             <div class="text-right text-muted pr-2"><h1>TEACHER PANEL</h1></div>
          </div>  
      </div>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="trialhome.php">Home</a>

  <!-- Links -->
  <ul class="navbar-nav">
  
    <li class="nav-item">
      <a class="nav-link" href="tlogout.php">Logout</a>
    </li>

  </ul>

   <div class="collapse navbar-collapse justify-content-end mr-0">
    <ul class="navbar-nav">
      <li class="nav-item text-info">
        <h5 class="pt-2">Welcome <?php echo $_SESSION['username']."!"; ?></h5>
      </li>
    </ul>
  </div>
</nav>

 
 
  <div class="mid">
    
    <br><br>
     
     <div class="row ml-5">
      <div class="col-4">
        <div class="card ml-5" style="width: 17rem;">
          <img class="card-img-top" src="images/att2.jpg" alt="Card image cap">
           <div class="card-body">
              <h5 class="card-title">Attendance</h5>
              <h6 class="card-subtitle mb-2 text-muted">Record & View attendance</h6>
              <a href="attendance.php" class="btn btn-primary">Record Attendance</a>
              <a href="viewattendance.php" class="btn btn-primary mt-2">View Attendance</a>
           </div>
         </div>
       </div>

        <div class="col-4">
        <div class="card ml-4" style="width: 17rem;">
          <img class="card-img-top" src="images/assign4.jpg" alt="Card image cap">
           <div class="card-body ">
              <h5 class="card-title">Study Materials</h5>
              <h6 class="card-subtitle mb-2 text-muted">Upload & View study materials</h6>
              <a href="nupload.php" class="btn btn-primary">Upload Study Materials</a>
              <a href="tretrieve.php" class="btn btn-primary mt-2">View Study Materials</a>
           </div>
          </div>
        </div>

          <div class="col-4">
          <div class="card" style="width: 17rem;">
          <img class="card-img-top" src="images/hw.jpg" alt="Card image cap">
           <div class="card-body ">
              <h5 class="card-title">Assignments</h5>
              <h6 class="card-subtitle mb-2 text-muted">Upload & View Assignments</h6>
              <a href="assignment.php" class="btn btn-primary">Upload Assignments</a>
              <a href="tvassign.php" class="btn btn-primary mt-2">View Assignments</a>
           </div>
          </div>
        </div>
</div>
<br><br>
</div>
</div>
 
<?php include "footer.php"; ?>
 
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>