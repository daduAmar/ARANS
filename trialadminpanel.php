<?php 
  require_once "connect.php";  

  session_start();

  if (empty($_SESSION['a_uname'])) {
    header("Location: trialhome.php");
  }
?>


<!DOCTYPE html>
<html>
<head>
  <title>trialap</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="trialadminpanel.css">
</head>
<body>
  

<div class="container-fluid">
    
  <div class="jumbotron jumbotron-fluid text-body text-left mb-0 mt-0">
      <div class="container">
        <div class="text-muted text-left display-4"> ARANS </div> 
          <div class="text-muted">Attendance Records & Assignments Notifying System</div>
        </div> 
      <div class="text-right text-muted pr-5"><h1>ADMIN PANEL</h1></div>
    </div>
   </div>
  
   <div class="container-fluid">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="trialhome.php">Home</a>

  <!-- Links -->
  <ul class="navbar-nav">
     
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Subject
      </a>
      <div class="dropdown-menu">
        <a href="addsubject.php"><button type="button" class="btn btn-md dropdown-item">
        Add Subject</button></a>
        <a href="vsubject.php"><button type="button" class="btn btn-md dropdown-item">Delete Subject</button></a>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="alogout.php">Logout</a>
    </li> 

  </ul>

  <div class="collapse navbar-collapse justify-content-end mr-0">
    <ul class="navbar-nav">
      <li class="nav-item text-info">
        <h5 class="pt-2"><a href="trialadminpanel.php"> <b>Welcome <?php echo $_SESSION['a_uname']."!"; ?></b></a></h5>
      </li>
    </ul>
  </div>
</nav>

  
    
   
  <div class="mid">
  <br><br>
  <?php if (isset($_GET['upd'])): ?>
    <div class="row">
    <div class="col-md-6 offset-md-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            
            <?php   
                  echo "Student's Record Updated Successfully!"
            ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    </div>
    </div>
  <?php endif; ?>

  <?php if(isset($_GET['delete'])): ?>
    <div class="alert alert-success alert-dismissible fade show container" role="alert">
       <?php
         echo "<strong> Student deleted successfully!</strong>";

        ?>
        
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
      </button>
          
       </div>

    <?php endif; ?>
  
  <div class="col-md-6 offset-md-3">
  <?php if(isset($_GET['added'])): ?>
    <div class="alert alert-success alert-dismissible fade show container" role="alert">
       <strong>
          <?php
            echo "New Student Added Successfully!";

      ?>
        </strong> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
      </button>
          
       </div>

    <?php endif; ?>
  </div>

    <?php if (isset($_GET['success'])): ?>
    <div class="row">
    <div class="col-md-6 offset-md-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            
            <?php echo "Teacher's Record Updated Successfully!"; ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
     </div>
     </div> 
  <?php endif; ?>

  <?php if(isset($_GET['del'])): ?>
    <div class="alert alert-success alert-dismissible fade show container" role="alert">
       <?php
         echo "<strong> Teacher deleted successfully!</strong>";

        ?>
        
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
      </button>
          
       </div>

    <?php endif; ?>

    <?php if(isset($_GET['alert'])): ?>
    <div class="alert alert-warning alert-dismissible fade show container" role="alert">
       <?php
         echo "<strong> The student's record couldn't be inserted! </strong>";

        ?>
        
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
      </button>
          
       </div>

    <?php endif; ?>
  

<div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">New Student</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">View Students</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Approve Teacher</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">View Teachers</a>
      <!-- <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">View Attendance</a> -->
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"> <?php include "studentAdd.php"; ?> </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"> <?php include "studentDetls.php"; ?> </div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"><?php include "approveteacher.php"; ?></div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"><?php include "vteacher.php"; ?></div>
      
    </div>
  <!--   <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"><?php include "#"; ?></div> -->
    </div>
  </div>
</div>
</div>

  
<div class="container-fluid">
<div class="footer bg-dark">
      ARANS <br>
      &copy; Copyright 2018 Designed by Amar & Dipsikha
</div>
</div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>