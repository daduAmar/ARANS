<?php 
      require_once "connect.php";

 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Studentdetails</title>
    <script language="javascript" type="text/javascript">
    function confirmDelete()
      {
        return confirm('Delete, Are you sure?');

      }




      </script>
  </head>
  <body>
    <br>
    
    <?php if (isset($_GET['success'])): ?>
    <div class="row">
    <div class="col-md-6 offset-md-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            
            <?php   
          
                $msg=$_GET['success'];
                echo $msg;
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
  
  

    
    <div class="container">
    <br>
    <table class="table table-hover table-bordered bg-white text-muted">
          <thead class="thead-dark">
            <tr>
            
              <th class="text-center">Name</th>
              <th class="text-center">Roll</th>
              <th class="text-center">Email</th>
              <th class="text-center">Semester</th>
              <th class="text-center">Username</th>
              <th class="text-center" colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
          <tbody>
          

      
      <?php 
        
          
        $sql = "SELECT * FROM students";

        $result = mysqli_query($link, $sql)
              or die("Error in fetching records");
        $rows = mysqli_fetch_all($result);
        if ($result === false) {
               exit("Couldn't execute the query." . mysqli_error($conn));
        } 
        ?>
      
        <?php  foreach ($rows as $row): ?>
            
            <tr>
              <td class="text-center"> <?php echo $row[1]; ?> </td>
              <td class="text-center"> <?php echo $row[2]; ?> </td>
              <td class="text-center"> <?php echo $row[3]; ?> </td>
              <td class="text-center"> <?php echo $row[4]; ?> </td>
              <td class="text-center"> <?php echo $row[5]; ?> </td>
              
              
              <td class="text-center"><a href="update.php?stdid=<?php echo $row[0]; ?>"><button class="btn btn-info">Update</button></a></td>
              <td class="text-center"><a href="deletestudent.php?stdid=<?php echo $row[0]; ?>" onclick="return confirmDelete()"><button class="btn btn-danger">Delete</button></a></td>
            </tr>
        
        <?php endforeach; ?>
    
    </tbody>
  </table>
  </div>
  <a href="trialadminpanel.php" class="btn btn-primary float-right mr-5" role="button">BACK</a>
  <br> <br>




   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>