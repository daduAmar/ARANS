<?php 
  require_once 'connect.php';
?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>viewTeacher</title>
    <script language="javascript" type="text/javascript">
    function confirmDelete()
      {
        return confirm('Delete, Are you sure?');
      }

    </script>
  </head>
  <body>
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
              
              <td class="text-center"> <a href="subdel.php?sid=<?php echo $row[0]; ?>" onclick="return confirmDelete()"> <button class="btn btn-danger">Remove</button></a></td>
            </tr>
        
        <?php endforeach; ?>

    </tbody>
  </table>
  </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>