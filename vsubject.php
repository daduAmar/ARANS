<?php 
  require_once 'connect.php';

  session_start();

  if (empty($_SESSION['a_uname'])) {
    header("Location: trialhome.php");
  }
?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="teacher.css">

    <title>viewTeacher</title>
    <script language="javascript" type="text/javascript">
    function confirmDelete()
      {
        return confirm('Delete, Are you sure?');
      }

    </script>
  </head>
  <body>
     <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="trialhome.php">Home</a>
     <div class="collapse navbar-collapse justify-content-end mr-0">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="trialadminpanel.php">Back</a>
      </li>
    </ul>
  </div>
    </nav> 
     <br>
 
  <?php if(isset($_GET['delete'])): ?>
    <div class="alert alert-success alert-dismissible fade show container" role="alert">
       <?php
         echo "<strong> Subject removed successfully!</strong>";

        ?>
        
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
      </button>
          
       </div>

    <?php endif; ?>

  <div class="container">
  
  <table class="table table-hover table-bordered bg-white">
          <thead class="thead-dark">
            <tr>
              <th class="text-center">Subject</th>
              <th class="text-center">Semester</th>
              <th class="text-center" colspan="1">Action</th>
            </tr>
          </thead>
          <tbody>

      <?php 

        $sql = "SELECT * FROM subject";

        $result = mysqli_query($link, $sql)
              or die("Error in fetching records");
        $rows = mysqli_fetch_all($result);
        
      ?>
          
          <?php  foreach ($rows as $row): ?>
            
            <tr>
              <td class="text-center"> <?php echo $row[1]; ?> </td>
              <td class="text-center"> <?php echo $row[2]; ?> </td>
              
              <td class="text-center"> <a href="subdel.php?sid=<?php echo $row[0]; ?>" onclick="return confirmDelete()"> <button class="btn btn-danger">Delete</button></a></td>
            </tr>
        
        <?php endforeach; ?>

    </tbody>
  </table>
  </div>
  <br><br><br>
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